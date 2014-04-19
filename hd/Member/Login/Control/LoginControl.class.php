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
            go(U("Index/Index/Index", array('g' => "Member")));
        }
        //实例模型对象
        $this->_db = K("User");
    }

    //登录
    public function login()
    {
        if (IS_POST) {
            if ($this->_db->login()) {
                go(U('login', array('g' => 'Member')));
            } else {
                $this->error = $this->_db->error;
                $this->display();
            }
        } else {
            $this->display();
        }
    }
    //Ajax登录
    public function ajax_login()
    {
        if (IS_AJAX) {
            if ($this->_db->login()) {
                $this->_ajax(1,'登录成功');
            } else {
                $this->_ajax(0,$this->_db->error);
            }
        }
    }
    //注册
    public function reg()
    {
        if (IS_POST) {
            if ($this->_db->add_user()) {
                go(U('reg', array('g' => 'Member')));
            } else {
                $this->error = $this->_db->error;
                $this->display();
            }
        } else {
            $this->display();
        }
    }

    /**
     * 验证码
     */
    public function code()
    {
        $code = new Code();
        $code->show();
        exit;
    }

    /**
     * 退出登录
     */
    public function quit()
    {
        //清空SESSION
        session_unset();
        session_destroy();
        setcookie('login', '', 1,'/');
        go(__ROOT__);
    }

}


































