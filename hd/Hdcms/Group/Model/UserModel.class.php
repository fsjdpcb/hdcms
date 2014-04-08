<?php

/**
 * 用户管理模型
 * Class UserModel
 */
class UserModel extends ViewModel
{
    public $table = "user";
    public $view = array(
        //角色表
        "role" => array(
            "type" => INNER_JOIN,
            "on" => "user.rid=role.rid"
        )
    );
    /**
     * 删除用户
     * @return mixed
     */
    public function del_user()
    {
        $uid = Q('uid');
        if ($uid) {
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

    /**
     * 修改用户
     */
    public function edit_user()
    {
        /**
         * 如果有POST中存在uid,则使用uid做为参数，否则使用SESSION数据
         * 使用session数据为修改自己的个人信息
         */
        $uid = Q('uid', null, 'intval');
        if ($uid) {
            //用户状态
            Q('post.state', 1, 'intval');
            //修改密码
            $password = Q("post.password");
            if (!empty($password)) {
                $_POST['code'] = $this->get_user_code();
                $_POST['password'] = $this->get_user_password($password, $_POST['code']);
            }
            return $this->where("uid=$uid")->save();
        }
    }


    /**
     * 添加帐号
     */
    public function add_user()
    {
        $code = $this->get_user_code();
        $_POST['code'] = $code;
        $_POST['password'] = $this->get_user_password($_POST['password'], $code);
        $_POST['nickname'] = $_POST['username'];
        $_POST['regtime'] = time();
        $_POST['logintime'] = time();
        $_POST['regip'] = ip_get_client();
        $_POST['lastip'] = ip_get_client();
        $_POST['credits'] = C('init_credits'); //初始积分
        return $this->add();
    }


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