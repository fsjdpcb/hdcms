<?php

/**
 * 会员信息管理模型
 * Class UserModel
 */
class UserModel extends Model
{
    public $table='user';
    /**
     * 修改昵称
     */
    public function edit_nickname()
    {
        $nickname = Q('nickname');
        if ($nickname) {
            if ($this->where("uid=" . session('uid'))->save(array('nickname' => $nickname))) {
                return session('nickname', $nickname);
            }
        }
    }
    /**
     * 获取用户密码加密key
     * @return string
     */
    public function get_user_code()
    {
        return substr(md5(C("AUTH_KEY") . mt_rand() . time() . C('AUTH_KEY')), 0, 10);
    }
}