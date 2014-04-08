<?php

/**
 * 我的面板（管理员个人资料修改）
 * Class PersonalModel
 */
class UserModel extends Model
{
    public $table = "user";
    /**
     * 获取用户密码加密key
     * @return string
     */
    public function get_user_code()
    {
        return substr(md5(C("AUTH_KEY") . mt_rand() . time() . C('AUTH_KEY')), 0, 10);
    }

    /**
     * 获得用户密码
     * @param $password 密码
     * @param $code 加密key
     * @return string 储存到数据库中的密码
     */
    public function get_user_password($password, $code)
    {
        return md5($password . $code);
    }
}