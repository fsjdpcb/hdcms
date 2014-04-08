<?php

/**
 * 会员注册与登录处理模型
 * Class UserModel
 */
class UserModel extends Model
{
    public $table = "user";
    public $validate = array(
        //注册表单验证
        array('code', 'check_code', '验证码输入错误', 2, 1),
        array('username', 'nonull', '验证码输入错误', 2, 1),
        array('username', 'check_username', '帐号已经存在', 2, 1),
        array('password', 'nonull', '密码不能为空', 2, 1),
        array('password', 'confirm:passwordc', '两次密码不一致', 2, 1),
        array('email', 'email', '邮箱格式不正确', 2, 1),
        array('email', 'check_email', '邮箱已经存在', 2, 1),
    );

    //验证码验证
    public function check_code($name, $value, $msg, $arg)
    {
        if (strtoupper($value) != $_SESSION['code']) {
            return $msg;
        }
        return true;
    }

    //验证帐号
    public function check_username($name, $value, $msg, $arg)
    {
        if (M('user')->where("username='$value'")->find()) {
            return $msg;
        }
        return true;
    }

    //验证邮箱
    public function check_email($name, $value, $msg, $arg)
    {
        if (M('user')->where("email='$value'")->find()) {
            return $msg;
        }
        return true;
    }

    /**
     * 添加帐号
     */
    public function add_user()
    {
        if ($this->create()) {
            if (isset($_SESSION['admin'])) {
                unset($_SESSION['admin']);
            }
            $code = $this->get_user_code();
            $this->data['code'] = $code;
            $this->data['password'] = $this->get_user_password($_POST['password'], $code);
            $this->data['nickname'] = Q('nickname', $_POST['username']);
            $this->data['rid'] = $this->get_default_rid();
            $this->data['regtime'] = time();
            $this->data['logintime'] = time();
            $this->data['regip'] = ip_get_client();
            $this->data['lastip'] = ip_get_client();
            $this->data['credits'] = C('init_credits'); //初始积分
            if ($uid = $this->add()) {
                return $this->record_user($uid);
            } else {
                $this->error = '帐号注册失败';
            }
        }
    }

    /**
     * 用户登录
     */
    public function login()
    {
        $username = Q("post.username", NULL, 'htmlspecialchars,strip_tags,addslashes');
        //可以使用邮箱与帐号登录
        $user = $this->where("username='$username'")->find();
        if (empty($username)) {
            //-----------------------帐号与密码-----------------
            $this->error = '帐号不能为空';
        } else if (!$user) {
            //-----------------------帐号验证------------------------
            $this->error = "帐号不存在";
        } else if ($user['password'] != md5($_POST['password'] . $user['code'])) {
            //-----------------------密码验证------------------------
            $this->error = "密码输入错误";
        } else {
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
            $user['icon50'] = __ROOT__ . "/data/image/user/50.png";
            $user['icon100'] = __ROOT__ . "/data/image/user/100.png";
            $user['icon150'] = __ROOT__ . "/data/image/user/150.png";
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