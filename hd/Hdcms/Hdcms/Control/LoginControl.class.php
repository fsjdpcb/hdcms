<?php

/**
 * 登录处理模块
 * Class LoginControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class LoginControl extends CommonControl
{
    //模型
    protected $_db;

    //构造函数
    public function __init()
    {

        $this->_db = K("User");
    }


    /**
     * 登录页面显示验证码
     * @access public
     */
    public function code()
    {
        C(array(
            "CODE_BG_COLOR" => "#ffffff",
            "CODE_LEN" => 4,
            "CODE_FONT_SIZE" => 20,
            "CODE_WIDTH" => 120,
            "CODE_HEIGHT" => 35,
        ));
        $code = new Code();
        $code->show();
    }

    /**
     * 用户登录处理
     * @access public
     */
    public function Login()
    {
        if (session('admin')) {
            go("Hdcms/Index/index");
        }
        if (IS_POST) {
            $error = null;
            $username = Q("post.username", NULL, 'htmlspecialchars,strip_tags,addslashes');
            $user = $this->_db->where("username='$username' || email='$username'")->find();
            //-----------------------验证码------------------------
            if (Q('post.code', '', 'strtoupper') != Q('session.code')) {
                $error = "验证码输入错误";
            } else if (empty($username)) {
                //-----------------------帐号与密码-----------------
                $error = '帐号不能为空';
            } else if (!$user) {
                //-----------------------帐号验证------------------------
                $error = "帐号不存在";
            } else if ($user['password'] != md5($_POST['password'] . $user['code'])) {
                //-----------------------密码验证------------------------
                $error = "密码输入错误";
            }
            if ($error) {
                $this->error = $error;
                $this->display();
            } else {
                $this->_db->record_user($user['uid']);
                go("Hdcms/Index/index");
            }
        } else {
            $this->display();
        }
    }

    /**
     * 退出
     */
    public function out()
    {
        //清空SESSION
        session_unset();
        session_destroy();
        setcookie('login', '', 1,'/');
        echo "<script>
            window.top.location.href='" . U("login") . "';
        </script>";
        exit;
    }
}