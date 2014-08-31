<?php

/**
 * 登录处理模块
 * Class LoginController
 * @author 向军 <houdunwangxj@gmail.com>
 */
class LoginController extends Controller
{
    public function __init()
    { //已经登录用户不允许执行
        if (isset($_SESSION['user']) && $_SESSION['user']['admin'] && ACTION != 'out') {
            go("Index/index");
        }
    }

    /**
     * 登录页面显示验证码
     * @access public
     */
    public function code()
    {
        C(array("CODE_BG_COLOR" => "#ffffff", "CODE_LEN" => 4, "CODE_FONT_SIZE" => 20, "CODE_WIDTH" => 120, "CODE_HEIGHT" => 35,));
        $code = new Code();
        $code->show();
    }

    //用户登录处理
    public function Login()
    {
        if (IS_POST) {
            $Model = K("User");
            if (Q('post.code', '', 'strtoupper') != session('code')) {
                $this->error = '验证码错误';
                $this->display();
                exit;
            }
            if (empty($_POST['username'])) {
                $this->error = '帐号不能为空';
                $this->display();
                exit;
            }
            if (empty($_POST['password'])) {
                $this->error = '密码不能为空';
                $this->display();
                exit;
            }
            $user = $Model->where(array('username' => $_POST['username']))->find();
            if (!$user) {
                $this->error = "帐号不存在";
                $this->display();
                exit;
            }
            if ($user['password'] !== md5($_POST['password'] . $user['code'])) {
                $this->error('密码输入错误');
                $this->display();
            }
            unset($user['password']);
            unset($user['code']);
            //删除验证码
            session('code', null);
            //是否为站长
            $user['web_master'] = strtolower($user['username']) == strtolower(C('WEB_MASTER'));
            //头像设置
            if (empty($user['icon'])) {
                $user['icon'] = __APP__ . '/Static/image/user.png';
            } else {
                $user['icon'] = __ROOT__ . '/' . $user['icon'];
            }
            $_SESSION['user'] = $user;
            $Model->save(array('uid' => $user['uid'], 'logintime' => time(), 'lastip' => ip_get_client()));
            go("Index/index");
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
        setcookie('login', '', 1, '/');
        echo "<script>
            window.top.location.href='" . U("login") . "';
        </script>";
        exit;
    }

}
