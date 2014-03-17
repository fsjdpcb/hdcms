<?php

class LoginModel extends Model
{
    public $table = 'user';
    //自动验证
    public $validate = array(
        array('username', 'nonull', '帐号不能为空', 2, 3),
        array('username', 'check_user', '帐号已经存在', 2, 1),
        array('username', 'check_user_length', '帐号不能小于5位', 2, 3),
        array('email', 'nonull', '邮箱不能为空', 2, 3),
        array('email', 'email', '邮箱格式错误', 2, 3),
        array('password', 'nonull', '密码不能为空', 2, 3),
        array('password', 'regexp:/\w{5,}/', '密码不能小于5位', 2, 3),
        array('password-c', 'confirm:password', '两次密码不一致', 2, 3)
    );
    public $auto = array(
        array('code', '_auto_code', 'method', 2, 1),
        array('password', '_auto_password', 'method', 2, 1),
        array('logintime', 'time', 'function', 2, 3),
        array('ip', 'ip_get_client', 'function', 2, 3),
        //初始积分（注册时）
        array('credits', '_auto_credits', 'method', 2, 1),
        //昵称
        array('nickname', '_auto_nickname', 'method', 2, 1),
    );

    //昵称(注册）
    public function _auto_nickname()
    {
        return $_POST['username'];
    }

    //初始积分(注册）
    public function _auto_credits()
    {
        return intval(C('init_credits'));
    }

    //用户注册校验码字段数据
    public function _auto_code($v)
    {
        $code = get_user_code();
        $_POST['code'] = $code;
        return $code;
    }

    //帐号密码(注册）
    public function _auto_password($v)
    {
        return md5($v . $_POST['code']);
    }

    //验证帐号长度(注册）
    public function check_user_length($name, $value, $msg, $arg)
    {
        if (mb_strlen($value, 'utf8') >= 5) {
            return true;
        }
        return $msg;
    }

    //检测帐号是否存在(注册）
    public function check_user($name, $value, $msg, $arg)
    {
        if ($this->where("username='$value'")->find()) {
            return $msg;
        }
        return true;
    }

    //用户注册
    public function user_reg()
    {
        if ($this->create()) {
            return $this->add();
        }
    }

    //登录
    public function user_login()
    {
        //
    }
}