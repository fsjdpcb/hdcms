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
            //实例模型对象
            $this->db = K("User");
            $username = Q("post.username", NULL, "strip_tags,htmlspecialchars,addslashes");
            $user = $this->db->where("username='$username'")->find();
            $stat = null;
            if (!$user) {
                $stat = array("stat" => 0, "msg" => "帐号输入错误");
            } else if ($user['password'] != md5($_POST['password'] . $user['code'])) {
                $stat = array("stat" => 0, "msg" => "密码输入错误");
            } else if (Q('post.code', '', 'strtoupper') != Q('session.code')) {
                $stat = array("stat" => 0, "msg" => "验证码输入错误");
            } else {
                $this->record_user($user['uid']);
                $stat = array("stat" => 1, "msg" => "OK");
            }
            $this->assign("stat", json_encode($stat));
            $this->display("auth");
        } else {
            if (session('rid')) {
                go("Hdcms/Index/index");
            }
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