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
        $this->data = $this->_db->order("uid ASC")->where("rid=0")->all();
        $this->display();
    }

    /**
     * 添加会员
     */
    public function add()
    {
        if (IS_POST) {
            $_POST['code'] = get_user_code();
            $_POST['password'] = get_user_password($_POST['password'], $_POST['code']);
            $this->_db->add();
            $this->_ajax(1, '添加成功');
        } else {
            //会员组
            $this->group = M('group')->all();
            $this->display();
        }
    }

    /**
     * 修改会员
     */
    public function edit()
    {
        if (IS_POST) {
            //状态
            Q("post.state", 0, 'intval');
            //删除头像
            if (isset($_POST['del_favicon'])) {
                $_POST['favicon'] = '';
            }
            //修改密码
            if (!empty($_POST['password'])) {
                $_POST['code'] = get_user_code();
                $_POST['password'] = get_user_password($_POST['password'], $_POST['code']);
            }
            $this->_db->save();
            $this->_ajax(1, '修改成功');
        } else {
            //会员组
            $this->group = M('group')->all();
            $this->field = $this->_db->find(Q("uid"));
            $this->display();
        }
    }

    /**
     * 添加用户时，验证邮箱是否已经使用
     */
    public function check_email()
    {
        $email = Q('email');
        //编辑时，去年当前会员组
        if ($uid = Q("uid")) {
            $this->_db->where("uid<>$uid");
        }
        echo $this->_db->where("email='$email'")->find() ? 0 : 1;
        exit;
    }
}