<?php

/**
 * 会员信息管理模型
 * Class UserModel
 */
class UserModel extends CommonUserModel
{
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
}