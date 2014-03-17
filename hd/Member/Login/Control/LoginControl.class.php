<?php

/**
 * 用户登录与注册模块
 * Class UserControl
 */
class LoginControl extends CommonControl
{
    //模型
    private $_db;

    //构造函数
    public function __init()
    {
        if (session("uid") && METHOD != 'quit') {
            go(U("Home/Home/Index", array('g' => "Member")));
        }
        //实例模型对象
        $this->_db = K("Login");
    }

    //登录
    public function login()
    {
        if (IS_POST) {
            $password = Q('password');
            $username = Q('username', null, "htmlspecialchars,addslashes,trim,strip_tags");
            $error = null;
            if (!$username) {
                $error = '帐号不能为空';
            } else {
                $result = $this->_db->where("username='$username' or email='$username'")->find();
                if (!$result) {
                    $error = '帐号不存在';
                } else if ($result['password'] != md5($password . $result['code'])) {
                    $error = '密码输入错误';
                }
            }
            if ($error) {
                $this->ajax($error);
            } else {
                $this->record_user($result['uid']);
                $this->ajax(18);
            }
        } else {
            $this->display();
        }
    }

    //注册
    public function reg()
    {
        if (IS_POST) {
            if ($uid = $this->_db->user_reg()) {
                $this->session_record($uid);
                $this->ajax(18);
            } else {
                $this->ajax($this->_db->error);
            }
        } else {
            $this->display();
        }
    }

    /**
     * 退出登录
     */
    public function quit()
    {
        session(NULL);
        go(__ROOT__);
    }

}


































