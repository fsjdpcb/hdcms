<?php

class UserControl extends AuthControl
{
    private $_db;

    public function __init()
    {
        $this->_db = K('User');
    }

    /**
     * 会员列表
     */
    public function index()
    {
        if (Q('state')) {
            $this->_db->where("state=" . Q("state"));
        }
        $this->data = $this->_db->order("uid ASC")->where("admin=0")->all();
        $this->display();
    }

    /**
     * 删除帐号
     */
    public function del()
    {
        $this->_db->del_user();
        $this->_ajax(1, '删除成功！');
    }

    /**
     * 添加会员
     */
    public function add()
    {
        if (IS_POST) {
            if ($this->_db->add_user()) {
                $this->_ajax(1, '添加成功');
            } else {
                $this->_ajax(0, $this->_db->error);
            }
        } else {
            //会员组
            $this->role = M('role')->where('admin=0')->all();
            $this->display();
        }
    }

    /**
     * 修改会员
     */
    public function edit()
    {
        if (IS_POST) {
            $this->_db->edit_user();
            $this->_ajax(1, '修改成功');
        } else {
            //会员组
            $this->role = M('role')->where('admin=0')->all();
            $user = $this->_db->where("uid=" . Q('uid'))->find();
            $this->field = $user;
            $this->display();
        }
    }

    /**
     * 添加|修改用户时，验证帐号是否已经使用
     */
    public function check_username()
    {
        $username = Q('username');
        //编辑时，去年当前会员组
        if ($uid = Q("uid")) {
            $this->_db->join()->where("uid<>$uid");
        }
        echo $this->_db->join()->where("username='$username'")->find() ? 0 : 1;
        exit;
    }

    /**
     * 添加|修改用户时，验证邮箱是否已经使用
     */
    public function check_email()
    {
        $email = Q('email');
        if (empty($email)) {
            $this->ajax(1);
        } else {
            if ($uid = Q("uid")) {
                $this->_db->join()->where("uid<>$uid");
            }
            echo $this->_db->join()->where("email='$email'")->find() ? 0 : 1;
            exit;
        }
    }
}