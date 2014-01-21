<?php

/**
 * 后台内容管理
 * Class ContentControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class ContentControl extends AuthControl
{
    //栏目缓存
    protected $_category;
    //模型缓存
    protected $_model;
    //模型mid
    protected $_mid;
    //栏目cid
    protected $_cid;
    //当前模型
    protected $_db;
    //文章主表
    protected $_table;

    //构造函数
    public function __init()
    {
        //父类构造函数
        parent::__init();
        $this->_model = F("model", false);
        $this->_category = F("category", false);
        $this->_cid = Q("cid", NULL, "intval");
        $this->_mid = Q("mid", NULL, "intval");
        if ($this->_cid) {
            if (!isset($this->_category[$this->_cid])) {
                $this->error("栏目不存在！");
            }
            $this->_mid = $this->_category[$this->_cid]['mid'];
            $this->_table = $this->_model[$this->_mid]['tablename'];
            $this->_db = K("Content");
        }

    }

    /**
     * 显示文章列表
     */
    public function index()
    {
        $this->display();
    }

    /**
     * 异步获得目录树，内容左侧目录列表
     */
    public function ajax_category_ztree()
    {
        $category = array();
        foreach ($this->_category as $n => $cat) {
            $data = array();
            if ($cat['cattype'] != 3) {
                $data['id'] = $cat['cid'];
                $data['pId'] = $cat['pid'];
                $data['name'] = $cat['catname'];
                $data['url'] = $cat['cattype'] == 1 ? U('content', array('cid' => $cat['cid'], 'state' => 1)) : 'javascript:;';
                $data['target'] = 'content';
                $data['open'] = true;
                $category[] = $data;
            }
        }
        $this->ajax($category);
    }

    //待审核文章
    public function audit()
    {
        $_GET['status'] = 0;
        $this->content();
    }

    //已审核文章内容页列表
    public function content()
    {
        $db = K('ContentView');
        $this->flag = $this->_db->table("flag")->all();
        //$data=array('data'=>'文章数据','page'=>’页码')
        $this->assign( $db->get_content());
        $this->display();
    }

    //更新排序
    public function update_order()
    {
        $arc_order = Q("post.arc_order");
        if (!empty($arc_order)) {
            foreach ($arc_order as $aid => $order) {
                $aid = intval($aid);
                $order = intval($order);
                $data = array("aid" => $aid, "arc_sort" => $order);
                $this->_db->join(NULL)->save($data);
            }
        }
        $this->ajax(array('state' => 1, 'message' => "更改排序成功"));
    }

    /**
     * 添加文章
     */
    public function add()
    {
        if (IS_POST) {
            if ($this->_db->add_content()) {
                $this->ajax(array('state' => 1, 'message' => '发表成功！'));
            }
        } else {
            //分配属性
            $this->flag = F('flag');
            //分配栏目
            $this->category = $this->_category[$this->_cid];
            //模型type为1时即标准模型，显示编辑器、关键字等字段
            $this->model = $this->_model[$this->_mid];
            //自定义字段
            import('Field/Model/FieldModel');
            //FieldModel模型使用mid参数
            $_REQUEST['mid'] = $this->_mid;
            $fieldModel = new FieldModel();
            $this->custom_field = $fieldModel->field_view();
            $this->display();
        }
    }


    //修改文章
    public function edit()
    {
        //添加文章神图
        if (IS_POST) {
            if ($this->_db->edit_content()) {
                $this->ajax(array('state' => 1, 'message' => '修改文章成功'));
            }
        } else {
            $aid = Q("aid", null, "intval");
            if ($aid) {
                $field = $this->_db->find($aid);
                //分配栏目
                $this->category = $this->_category[$this->_cid];
                //模型type为1时即标准模型，显示编辑器、关键字等字段
                $this->model = $this->_model[$this->_mid];
                //FLAG属性
                $this->flag = $this->_db->get_content_flag($aid);
                $field['thumb_img'] = empty($field['thumb']) || !is_file($field['thumb']) ? __ROOT__ . '/hd/static/img/upload-pic.png' : __ROOT__ . '/' . $field['thumb'];
                $this->field = $field;
                //自定义字段处理
                import('Field/Model/FieldModel');
                //FieldModel模型使用mid参数
                $_REQUEST['mid'] = $this->_mid;
                $fieldModel = new FieldModel();
                $this->custom_field = $fieldModel->field_view($field);
                $this->display();
            }
        }
    }

    //删除文章
    public function del()
    {
        $aid = Q("request.aid");
        if (!empty($aid)) {
            if (!is_array($aid)) {
                $aid = array($aid);
            }
            $this->_db->del($aid);
            $this->ajax(1);
        }
    }

    //审核或取消审核
    public function set_status()
    {
        $status = Q("get.status", 1, "intval");
        $aids = Q("post.aid");
        foreach ($aids as $aid) {
            $this->_db->join()->trigger()->save(array("aid" => $aid, "status" => $status));
        }
        $this->ajax(1);
    }

    //移动文章
    public function move_content()
    {
        if (IS_POST) {
            //移动方式
            $from_type = Q("post.from_type", NULL, "intval");
            $to_cid = Q("post.to_cid", NULL, 'intval');
            $from_cid = Q("post.from_cid", NULL);
            switch ($from_type) {
                case 1:
                    //移动aid
                    $aid = Q("post.aid", NULL, "trim");
                    $aid = explode("|", $aid);
                    if ($aid) {
                        foreach ($aid as $id) {
                            $this->_db->trigger()->join()->save(array("aid" => $id, "cid" => $to_cid));
                        }
                    }
                    break;
                case 2:
                    //移动栏目
                    if ($from_cid) {
                        foreach ($from_cid as $fcid) {
                            $this->_db->trigger()->join()->where("cid=$fcid")->save(array("cid" => $to_cid));
                        }
                    }
                    break;
            }
            $this->ajax(1);
        } else {
            $category = $this->_category;
            foreach ($category as $n => $v) {
                $category[$n]['selected'] = "";
                if ($this->_cid == $v['cid']) {
                    $category[$n]['selected'] = "selected";
                }
                //非本栏目模型关闭
                if ($this->_mid != $v['mid']) {
                    $category[$n]['disabled'] = 'disabled';
                }
            }
            $this->assign("mid", $this->_mid);
            $this->assign("category", $category);
            $this->display();
        }
    }

}








































