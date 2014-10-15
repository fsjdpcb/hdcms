<?php

/**
 *内容添加/删除/修改操作
 * @author hdxj <houdunwangxj@gmail.com>
 */
class Content
{
    private $mid;
    private $cid;
    private $model;
    private $category;
    public $error;
    private $html;//静态生成对象

    public function __construct()
    {
        $this->model = S('model');
        $this->category = S('category');
        $this->mid = Q('mid', 0, 'intval');
        $this->cid = Q('cid', 0, 'intval');
        $this->html = new Html();
    }

    //添加文章
    public function add()
    {
        Hook::listen('content_add_begin');
        //文章多表关联模型
        $ContentModel = ContentModel::getInstance($this->mid);
        //数据前期处理
        $ContentInputModel = new ContentInputModel($this->mid);
        $data = $ContentInputModel->get();
        if ($data == false) {
            $this->error = $ContentInputModel->error;
            return false;
        }
        if ($ContentModel->create($data)) {
            $result = $ContentModel->add($data);
            $aid = $result[$ContentModel->table];
            //生成上一页静态
            $preAid = $ContentModel->where('aid<' . $aid)->getField('aid');
            if ($preAid) $this->html->createContentHtml($this->mid, $preAid);
            //生成静态
            $this->html->content($this->mid, $aid);
            //生成相关文章
            $this->html->relation_content($this->mid,$aid);
            //生成所有栏目
            $this->html->all_category();
            //生成首页
            $this->html->index();
            //修改上传表Upload中本次上传文件状态
            $this->alterUploadTable();
            //修改tag标签数据
            $this->alterTag($aid);
            Hook::listen('content_add_end');
            return $aid;
        } else {
            $this->error = $ContentModel->error;
            return false;
        }
    }

    //修改文章
    public function edit()
    {
        Hook::listen('content_edit_begin');
        $ContentModel = ContentModel::getInstance($this->mid);
        $ContentInputModel = new ContentInputModel($this->mid);
        $data = $ContentInputModel->get();;
        if ($data == false) {
            $this->error = $ContentInputModel->error;
            return false;
        }
        if ($ContentModel->create($data)) {
            if ($result = $ContentModel->save($data)) {
                //修改上传表Upload中本次上传文件状态
                $this->alterUploadTable();
                //修改tag标签数据
                $this->alterTag($data['aid']);
                //内容静态
                $this->html->content($this->mid,$data['aid']);
                //上下关联文章
                $this->html->relation_content($this->mid,$data['aid']);
                //生成所有栏目
                $this->html->all_category();
                Hook::listen('content_edit_end');
                return true;
            }
        } else {
            $this->error = $ContentModel->error;
            return false;
        }
    }

    /**
     * 删除文章
     * @param $aid 文章aid
     * @return bool
     */
    public function del($aid)
    {
        $ContentModel = ContentModel::getInstance($this->mid);
        //组合为数组
        $aid = is_array($aid) ? $aid : array($aid);
        $map['aid'] = array('IN', $aid);
        //旧文章
        $oldContent = $ContentModel->where($map)->all();
        //删除文章静态文件
        foreach($oldContent as $content){
            $htmlFile = Url::getContentHtml($content);
            $htmlFile = str_replace(__ROOT__,ROOT_PATH,$htmlFile);
            is_file($htmlFile) and @unlink($htmlFile);
        }
        if ($ContentModel->where($map)->del()) {
            //删除文章tag属性
            M('content_tag')->where(array('cid' => $this->cid))->del();
            //生成文章的上一篇与下一篇
            foreach ($aid as $_aid) {
                $this->html->relation_content($this->mid, $_aid);
            }
            //生成栏目
            $this->html->all_category();
            //生成首页
            $this->html->index();
            Hook::listen('content_del');
            return true;
        } else {
            $this->error = '删除文章失败';
        }
    }

    //修改上传表Upload中本次上传文件状态
    private function alterUploadTable()
    {
        if (isset($_SESSION['uploadFile']) && is_array($_SESSION['uploadFile'])) {
            $uploadModel = M("upload");
            foreach ($_SESSION['uploadFile'] as $path) {
                $uploadModel->where(array('path' => $path))->save(array('status' => 1, 'mid' => $this->mid));
            }
        }
    }

    //修改tag标签数据
    public function alterTag($aid)
    {
        $tagModel = M('tag');
        $contentTagModel = M("content_tag");
        //删除文章旧的tag记录
        $contentTagModel->where(array('aid' => $aid, 'mid' => $this->mid))->del();
        //修改tag
        $tag = Q('tag');
        if ($tag) {
            //全角标点转半角标点
            $tag = String::toSemiangle($tag);
            $tagData = explode(',', $tag);
            if (!empty($tagData)) {
                //去除重复tag标签
                $tagData = array_unique($tagData);
                foreach ($tagData as $tag) {
                    $tid = $tagModel->where(array('tag' => $tag))->getField('tid');
                    if ($tid) {
                        //修改tag记数
                        $tagModel->exe("UPDATE " . C('DB_PREFIX') . "tag SET `total`=total+1 WHERE tag='$tag'");
                    } else {
                        //tag表没有记录时，添加tag字符记录
                        $tid = $tagModel->add(array('tag' => $tag, 'total' => 1));
                    }
                    $contentTagModel->add(array('aid' => $aid, 'cid' => $this->cid, 'mid' => $this->mid, 'tid' => $tid));
                }
            }
        }
    }


}
