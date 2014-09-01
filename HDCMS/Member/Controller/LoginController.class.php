<?php

/**
 * 会员登录
 * Class LoginController
 */
class LoginController extends Controller
{
    private $db;

    public function __init()
    {
        $this->db = K('Login');
        if (session('user') && ACTION != 'out') {
            go('Index/index');
        }
    }

    //会员登录
    public function login()
    {
        if (IS_POST) {
            if ($this->db->userLogin()) {
                go(cookie('_HISTORY_'));
            } else {
                $this->error($this->db->error);
            }
        } else {
            cookie('_HISTORY_', $_SERVER['HTTP_REFERER']);
            $this->display();
        }
    }

    //注册帐号
    public function reg()
    {
        if (IS_POST) {
            if ($uid = $this->db->userReg()) {
                $user = $this->find($uid);
                $_SESSION['nickname'] = $user['username'];
                $this->success('注册成功', cookie('_HISTORY_'));
            } else {
                $this->error($this->db->error);
            }
        } else {
            cookie('_HISTORY_', $_SERVER['HTTP_REFERER']);
            $this->display();
        }
    }

    //退出登录
    public function out()
    {
        session_unset();
        session_destroy();
        $this->success('退出成功', $_SERVER['HTTP_REFERER']);
    }

    //找回密码
    public function findPassword()
    {
        if (IS_POST) {
            $username = Q('post.username');
            $email = Q('post.email');
            if (!$user = M('user')->where(array('username' => array('EQ', $username)))->find()) {
                $this->error('帐号不存在');
            }
            if ($user['email'] != $email) {
                $this->error('邮箱错误');
            }
            //新密码
            $password = substr(md5(mt_rand(1, 5)), 0, 6);
            $data['code'] = substr(md5(mt_rand(1, 5)), 0, 10);
            $data['password'] = md5($password . $data['code']);
            //更新密码
            if (!M('user')->where(array('username' => array('EQ', $username), 'email' => array('EQ', $email)))->save($data)) {
                $this->error('系统错误，请稍后重试...');
            }
            $title = C('WEB_NAME') . '找回密码'; //邮件标题
            $webname = C('WEBNAME'); //网站名称
            $body = <<<str
{$username}，您好：
您在 {$webname} 密码已成功重设。<br/>
新密码为：{$password}<br/>
为了您的帐号安全，请尽快修改密码。<br/>
如果您需要更多帮助，请联系 {$webname} 支持。<br/>
此致
{$webname} 支持
str;
            if ($status = Mail::send($email, $email, $title, $body)) {
                $this->assign('email', $email);
                $this->display('sendSuccess');
            } else {
                $this->error('邮件发送失败..，请联系管理员获得帮助');
            }
        } else {
            $this->display();
        }
    }
}










