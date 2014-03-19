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
            $_POST['code'] = $this->get_user_code();
            $_POST['password'] = $this->get_user_password($_POST['password'], $_POST['code']);
            $_POST['nickname'] = $_POST['username'];
            $this->_db->add();
            $this->_ajax(1, '添加成功');
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
            //如果有post.state为未审核状态
            Q("post.state", 0, 'intval');
            //修改密码
            if (!empty($_POST['password'])) {
                $_POST['code'] = $this->get_user_code();
                $_POST['password'] = $this->get_user_password($_POST['password'], $_POST['code']);
            }
            $this->_db->save();
            $this->_ajax(1, '修改成功');
        } else {
            //会员组
            $this->role = M('role')->where('admin=0')->all();
            $user = $this->_db->where("uid=" . Q('uid'))->find();
            if (!$user['icon100']) {
                $user['icon100'] = __ROOT__ . '/data/image/user/100.jpg';
            }
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
            $this->_db->where("uid<>$uid");
        }
        echo $this->_db->where("username='$username'")->find() ? 0 : 1;
        exit;
    }

    /**
     * 添加|修改用户时，验证邮箱是否已经使用
     */
    public function check_email()
    {
        $email = Q('email');
        //编辑时，去年当前会员组
        if ($uid = Q("uid")) {
            $this->_db->join()->where("uid<>$uid");
        }
        echo $this->_db->join()->where("email='$email'")->find() ? 0 : 1;
        exit;
    }
}