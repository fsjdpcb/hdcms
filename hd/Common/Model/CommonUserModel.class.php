<?php

/**
 * 用户操作公共模型
 * Class UserViewModel
 * @author hdxj <houdunwangxj@gmail.com>
 */
class CommonUserModel extends ViewModel
{
    public $table = "user";
    public $view = array(
        //角色表
        "role" => array(
            "type" => INNER_JOIN,
            "on" => "user.rid=role.rid"
        ),
        //头像表
        "user_icon" => array(
            "type" => LEFT_JOIN,
            "on" => "user.uid=user_icon.user_uid"
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
        } else {
            $this->error = '参数错误';
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
        $uid = Q('uid', null, 'intval') ? Q("uid", NUll, 'intval') : Q('session.uid');
        if ($uid) {
            //修改密码
            $password = Q("post.password");
            //用户状态
            Q('post.state', 1, 'intval');
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
        $db = M('user');
        //-----------------------验证码------------------------
        if (Q('session.code') && Q('code', '', 'strtoupper') != Q('session.code')) {
            $this->error = "验证码输入错误";
            return false;
        }
        //-----------------------帐号-----------------
        $username = Q("post.username", NULL, 'htmlspecialchars,strip_tags,addslashes');
        if (empty($username) || ! preg_match('@^.{3,}$@i',$username)) {
            $this->error = '帐号输入错误';
            return false;
        }
        $user = $db->where("username='$username'")->find();
        //-----------------------帐号验证------------------------
        if ($user) {
            $this->error = "帐号已存在";
        }
        //-----------------------邮箱-----------------
        $email = Q("post.email", NULL, 'htmlspecialchars,strip_tags,addslashes');
        $preg = "/^([a-zA-Z0-9_\-\.])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/i";
        if (!preg_match($preg, $email)) {
            $this->error = "邮箱格式不正确";
        }

        $email = $db->where("username='$username'")->find();
        //-----------------------帐号验证------------------------
        if ($email) {
            $this->error = "邮箱已经存在";
        }
        //------------------------验证密码-----------------------
        if (empty($_POST['password'])) {
            $this->error = '密码不能为空';
        } else {
            if (empty($_POST['password_c'])) {
                $this->error = '确认密码不能为空';
            } else if ($_POST['password'] != $_POST['password_c']) {
                $this->error = '确认密码输入错误';
            }
        }
        //-----------------------验证邮箱-----------------
        $email = Q("post.email", NULL, 'htmlspecialchars,strip_tags,addslashes');
        if ($email) {
            $chk_email = $db->where("email='$email'")->find();
            if ($chk_email) {
                $this->error = '邮箱已经存在';
            }
        }
        //-----------------------添加帐号------------------------
        if ($this->error) {
            return false;
        } else {
            if(isset($_SESSION['admin'])){
                unset($_SESSION['admin']);
            }
            $code = $this->get_user_code();
            $_POST['code'] = $code;
            $_POST['username'] = $username;
            $_POST['password'] = $this->get_user_password($_POST['password'], $code);
            $_POST['nickname'] = Q('nickname', $_POST['username']);
            $default_rid = $this->get_default_rid();
            $_POST['rid'] = Q('post.rid', $default_rid, 'intval');
            $_POST['regtime'] = time();
            $_POST['logintime'] = time();
            $_POST['regip'] = ip_get_client();
            $_POST['lastip'] = ip_get_client();
            $_POST['credits'] = C('init_credits'); //初始积分
            return $db->add();
        }
    }

    /**
     * 帐号登录
     */
    public function user_login()
    {
        //-----------------------验证码------------------------
        if (Q('session.code') && Q('code', '', 'strtoupper') != Q('session.code')) {
            $this->error = "验证码输入错误";
            return false;
        }
        //-----------------------帐号与密码-----------------
        $username = Q("post.username", NULL, 'htmlspecialchars,strip_tags,addslashes');
        if (empty($username)) {
            $this->error = '帐号不能为空';
            return false;
        }
        $user = $this->join()->where("username='$username' || email='$username'")->find();
        //-----------------------帐号验证------------------------
        if (!$user) {
            $this->error = "帐号不存在";
            return false;
        }
        //-----------------------密码验证------------------------
        if ($user && $user['password'] != md5($_POST['password'] . $user['code'])) {
            $this->error = "密码输入错误";
            return false;
        }
        if ($this->error) {
            return false;
        } else {
            //删除验证码
            unset($_SESSION['code']);
            return $this->record_user($user['uid']);
        }
    }


    /**
     * 记录用户登录信息
     * @param $uid 用户id
     */
    public function record_user($uid)
    {
        $db = M("user");
        $sql = "SELECT * FROM " . C("DB_PREFIX") . "user_icon AS c RIGHT JOIN " . C("DB_PREFIX") . "user AS u
                ON u.uid=c.user_uid
                JOIN " . C('DB_PREFIX') . "role AS r ON u.rid = r.rid WHERE u.uid=$uid";
        $user = current($db->query($sql));
        unset($user['password']);
        unset($user['code']);
        unset($user['user_uid']);
        //------------------头像
        if (empty($user['p50'])) {
            $user['icon50'] = __ROOT__ . "/data/image/user/50.jpg";
            $user['icon100'] = __ROOT__ . "/data/image/user/100.jpg";
            $user['icon150'] = __ROOT__ . "/data/image/user/150.jpg";
        }
        //是否为超级管理员
        $_SESSION['WEB_MASTER'] = strtolower(C("WEB_MASTER")) == strtolower($user['username']);
        $_SESSION = array_merge($_SESSION, $user);
        //---------------------修改登录IP与时间
        return $db->save(array(
            "uid" => $_SESSION['uid'],
            "logintime" => time(),
            "lastip" => ip_get_client()
        ));
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

    /**
     * 获得用户初始组rid
     */
    public function get_default_rid()
    {
        return M('role')->where('admin=0 and system=1')->order('creditslower ASC')->getField('rid');
    }
}