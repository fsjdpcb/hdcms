<?php

/**
 * 内容tag管理
 * Class TagControl
 * @author <houdunwangxj@gmail.com>
 */
class TagControl extends AuthControl
{
    private $_db;

    public function __init()
    {
        parent::__init();
        $this->_db = K("tag");
    }

    //显示关键词列表
    public function index()
    {
        $page = new Page($this->_db->count(), C("ADMIN_LIST_ROW'"));
        $this->data = $this->_db->limit($page->limit())->order("total DESC")->all();
        $this->page = $page->show();
        $this->display();
    }

    //删除tag
    public function del()
    {
        $tid = Q("post.tid");
        if (!empty($tid)) {
            if (!is_array($tid))
                $tid = array($tid);
            foreach ($tid as $i) {
                $this->_db->del(intval($i));
            }
            $this->ajax(array('state' => 1, 'message' => '删除成功!'));
        }
    }

    //修改tag
    public function edit()
    {
        if (IS_POST) {
            if ($this->_db->replace()) {
                $this->ajax(array('state' => 1, 'message' => '修改成功!'));
            }
        } else {
            $tid = Q("get.tid", NULL, "intval");
            $this->field = $this->_db->find($tid);
            $this->display();
        }
    }

    //添加tag
    public function add()
    {
        if (IS_POST) {
            if ($this->_db->replace()) {
                $this->ajax(array('state' => 1, 'message' => '添加成功!'));
            }
        } else {
            $this->display();
        }
    }
}