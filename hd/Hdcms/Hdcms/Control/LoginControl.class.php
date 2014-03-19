<?php
import("User.Model.UserModel");

/**
 * 登录处理模块
 * Class LoginControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class LoginControl extends CommonControl
{
    //模型
    protected $db;

    //构造函数
    public function __init()
    {
        parent::__init();
        //判断浏览器
        if (!$this->check_browser()) {
            $this->display('check_browser');
            exit;
        }
    }

    /**
     * 浏览器检测
     * @return bool
     */
    public function check_browser()
    {
        $browser = browser_info();
        if (strstr($browser, 'msie')) {
            if (intval(substr($browser, 4)) < 9) {
                return false;
            }
        }
        return true;
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
        if (IS_POST) {
            $username = Q("post.username", NULL, "strip_tags,htmlspecialchars,addslashes");
            $user = M('user')->where("username='$username'")->find();
            $error = '';
            //-----------------------验证码------------------------
            if (Q('post.code', '', 'strtoupper') != Q('session.code')) {
                $error = "验证码输入错误";
            }
            //-----------------------帐号验证------------------------
            if (!$user) {
                $error = "帐号不存在";
            }
            //-----------------------密码验证------------------------
            if ($user && $user['password'] != md5($_POST['password'] . $user['code'])) {
                $error = "密码输入错误";
            }
            //-----------------------验证通过------------------------
            if (empty($error)) {
                $this->record_user($user['uid']);
                go("Hdcms/Index/index");
            }
            $this->error = $error;
            $this->display();
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
        session(NULL);
        echo "<script>
            window.top.location.href='" . U("login") . "';
        </script>";
        exit;
    }
}