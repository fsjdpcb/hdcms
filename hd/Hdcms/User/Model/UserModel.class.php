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
            $icon = $this->table('user_icon')->where("user_uid=$uid")->del();
            //删除评论与回复
            $this->table('comment')->where("uid=$uid")->del();
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
            //修改密码
            if (!empty($_POST['password'])) {
                $_POST['code'] = $this->get_user_code();
                $_POST['password'] = md5($_POST['password'] . $_POST['code']);
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
        $_POST['password'] = md5($_POST['password'] . $_POST['code']);
        $_POST['nickname'] = $_POST['username'];
        $_POST['domain'] = $_POST['username'];
        $_POST['regtime'] = time();
        $_POST['logintime'] = time();
        $_POST['regip'] = ip_get_client();
        $_POST['lastip'] = ip_get_client();
        $_POST['credits'] = C('init_credits'); //初始积分
        //设置用户头像
        if ($uid = $this->add()) {
            //设置用户头像
            $dir = 'upload/user/'.max(ceil($uid/500),1);
            //复制默认头像
            copy('data/image/user/50.png',$dir."/{$uid}_50.png");
            copy('data/image/user/100.png',$dir."/{$uid}_100.png");
            copy('data/image/user/150.png',$dir."/{$uid}_150.png");
            $icon = array(
                'user_uid' => $uid,
                'icon50' =>"{$dir}/{$uid}_50.png",
                'icon100' =>"{$dir}/{$uid}_100.png",
                'icon150' => "{$dir}/{$uid}_150.png"
            );
            M('user_icon')->add($icon);
        } else {
            $this->error = '帐号注册失败';
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