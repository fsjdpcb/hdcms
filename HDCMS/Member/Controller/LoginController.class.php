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
                go("Index/index");
            } else {
                $this->error($this->db->error);
            }
        } else {
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
                $this->success('注册成功');
            } else {
                $this->error($this->db->error);
            }
        } else {
            $this->display();
        }
    }

    //退出登录
    public function out()
    {
        session_unset();
        session_destroy();
        $this->success('退出成功', __ROOT__);
    }
}










