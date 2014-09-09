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

    public function __construct()
    {
        $this->model = S('model');
        $this->category = S('category');
        $this->mid = Q('mid', 0, 'intval');
        $this->cid = Q('cid', 0, 'intval');
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
            //生成静态
            $this->createHtml($aid);
            //更新栏目静态
            $this->createCategoryHtml($this->cid);
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
        Hook::listen('conent_edit_begin');
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
                $this->createHtml($data['aid']);
                //生成栏目静态
                $this->createCategoryHtml($this->cid);
                Hook::listen('content_edit_end');
                return true;
            }
        } else {
            $this->error = $ContentModel->error;
            return false;
        }
    }

    //删除文章
    public function del($aid)
    {
        $ContentModel = ContentModel::getInstance($this->mid);
        if ($ContentModel->del($aid)) {
            //删除文章tag属性
            M('content_tag')->where(array('cid' => $this->cid))->del();
            //生成栏目静态
            $this->createCategoryHtml($this->cid);
            Hook::listen('content_del');
            return true;
        } else {
            $this->error = '删除文章失败';
        }
    }

    //更新栏目静态
    public function createCategoryHtml($cid)
    {
        //更新栏目静态
        $html = new Html();
        //生成当前栏目
        $html->relation_category($cid);
        //更新父级栏目
        $parentCategory = Data::parentChannel(S('category'), $cid);
        if (!empty($parentCategory)) {
            foreach ($parentCategory as $cat) {
                $html->relation_category($cat['cid']);
            }
        }
        //更新首页
        $html->index();
        return true;
    }

    //生成静态
    private function createHtml($aid)
    {
        $content = ContentViewModel::getInstance($this->mid)->getOne($aid);
        $html = new Html;
        //内容静态
        $html->content($content);
        //生成栏目
        $category = Data::parentChannel($this->category, $content['cid']);
        //生成当前栏目
        $html->relation_category($content['cid']);
        foreach ($category as $cat) {
            $html->relation_category($cat['cid']);
        }
        //生成首页
        $html->index();
        return true;
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
