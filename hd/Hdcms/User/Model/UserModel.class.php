<?php

/**
 * 用户表关联模型
 * Class UserModel
 */
class UserModel extends RelationModel
{
    public $table = "user";
    //自动完成
    public $auto = array(
        array("username", "auto_user", "method", 1, 3),
        array("logintime", "time", "function", 1, 3),
        array("password", "md5", "function", 1, 3),
        array("ip", "ip_get_client", "function", 1, 3)
    );
    //自动验证
    public $validate = array(
        array("username", "nonull", "用户名不能为空", 1, 3),
        array("password", "nonull", "密码不能为空", 1, 3),
        array("password", "confirm:c_password", "两次密码不一致", 1, 3),
        array("code", "nonull", "验证码不能为空", 1, 3),
        array("code", "validate_code", "验证码输入错误", 1, 3),
    );

    //构造函数
    public function __init()
    {
    }

    //验证码验证
    protected function validate_code($name, $value, $msg, $arg)
    {
        if (strtoupper($value) == Q("session.code")) {
            return true;
        }
        return $msg;
    }

    //username自动完成
    protected function auto_user($data)
    {
        return data_format($data);
    }

    public $join = array(
        "group" => array(
            "type" => BELONGS_TO,
            "foreign_key" => "gid",
            "parent_key" => "gid"
        ),
        "role" => array(
            "type" => BELONGS_TO,
            'foreign_key' => 'rid',
            'parent_key' => 'rid'
        ),
        "extcredits" => array( //扩展积分表
            "type" => HAS_MANY,
            'foreign_key' => 'uid',
            'parent_key' => 'uid'
        ),
    );

    /**
     * 添加用户
     */
    public function add_user($data){
//        $data['password']=
    }
}