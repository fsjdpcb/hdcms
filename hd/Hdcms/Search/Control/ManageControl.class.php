<?php

/**
 * 搜索关键词管理
 * Class ManageControl
 * @author <houdunwangxj@gmail.com>
 */
class ManageControl extends AuthControl
{
    private $_db;

    public function __init()
    {
        parent::__init();
        $_REQUEST['cid'] = M("category")->where('mid=1')->getField('cid');
        import('Index.Model.SearchModel');
        $this->_db = K("search");
    }

    //显示关键词列表
    public function index()
    {
        $page = new Page($this->_db->count(), C("ADMIN_LIST_ROW'"));
        $this->data = $this->_db->limit($page->limit())->order("total DESC")->all();
        $this->page = $page->show();
        $this->display();
    }

    //删除搜索词
    public function del()
    {
        $sid = Q("post.sid");
        if (!empty($sid)) {
            foreach ($sid as $i) {
                $this->_db->del(intval($i));
            }
            $this->_ajax(1);
        }
    }

    //修改搜索词
    public function edit()
    {
        if (IS_POST) {
            if ($this->_db->save()) {
                $this->_ajax(1);
            }
        } else {
            $sid = Q("get.sid", NULL, "intval");
            $field = $this->_db->find($sid);
            $this->assign("field", $field);
            $this->display();
        }
    }
}