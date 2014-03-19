<?php

/**
 * 会员组管理
 * Class GroupControl
 */
class GroupControl extends AuthControl
{
    private $_db;

    public function __init()
    {
        $this->_db = K('Group');
    }

    /**
     * 会员组列表
     */
    public function index()
    {
        $this->data = $this->_db->where('admin=0')->all();
        $this->display();
    }

    /**
     * 修改会员组
     */
    public function edit()
    {
        if (IS_POST) {
            $this->_db->save();
            $this->_ajax(1, '修改成功');
        } else {
            $this->field = $this->_db->find(Q('rid'));
            $this->display();
        }
    }

    /**
     * 添加会员组
     */
    public function add()
    {
        if (IS_POST) {
            $this->_db->add();
            $this->_ajax(1, '添加成功');
        } else {
            $this->display();
        }
    }

    /**
     * 验证会员组
     */
    public function check_rname()
    {
        $rname = Q('rname');
        //编辑时，去年当前会员组
        if ($gid = Q("gid")) {
            $this->_db->where("gid<>$rid");
        }
        echo $this->_db->where("rname='$rname'")->find() ? 0 : 1;
        exit;
    }
}