<?php

/**
 * 用户管理模型
 * Class UserModel
 */
class UserModel extends ViewModel
{
    public $table = "user";
    public $view = array(
        "role" => array(
            "type" => INNER_JOIN,
            "on" => "user.rid=role.rid"
        ),
        "user_icon"=>array(
            "type"=>LEFT_JOIN,
            "on"=>"user.uid=user_icon.user_uid"
        )
    );

    /**
     * 删除用户
     * @return mixed
     */
    public function del_user()
    {
        $uid = Q('uid');
        //删除头像数据
        $icon = $this->table('user_icon')->where("user_uid=$uid")->find();
        //删除头像
        if ($icon) {
            foreach ($icon as $pic) {
                is_file($pic) and @unlink($pic);
            }
        }
        //删除评论与回复
        $this->table('comment')->where("uid=$uid or reply_id=$uid")->del();
        //删除用户表记录
        return $this->del($uid);
    }
}