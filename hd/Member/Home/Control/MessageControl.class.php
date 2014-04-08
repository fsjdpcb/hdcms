<?php

/**
 * 短消息管理
 * Class MessageControl
 */
class MessageControl extends MemberAuthControl
{
    public $_db;

    public function __init()
    {
        $this->_db = K('Message');
    }

    public function index()
    {
        $where = 'to_uid=' . $_SESSION['uid'];
        $count = $this->_db->where($where)->count();
        $page = new Page($count, 10);
        $this->data = $this->_db->where($where)->limit($page->limit())->all();
        $this->page = $page->show();
        $this->count = $count;
        $this->display();
    }

    /**
     * 查看私信息
     */
    public function show()
    {
        $mid = Q("mid", null, 'intval');
        $this->field = $this->_db->find($mid);
        $this->display();
    }

    /**
     * 回复私信
     */
    public function reply()
    {
        $_POST['from_uid'] = $_SESSION['uid'];
        if ($this->_db->add()) {
            $this->_ajax(1, '回复成功');
        } else {
            $this->_ajax(0, '回复失败');
        }
    }
}