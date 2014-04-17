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
            $this->data['password'] = md5($_POST['password'] . $code);
            $this->data['nickname'] = Q('nickname', $_POST['username']);
            $this->data['rid'] = C('default_member_group');
            $this->data['regtime'] = time();
            $this->data['logintime'] = time();
            $this->data['regip'] = ip_get_client();
            $this->data['lastip'] = ip_get_client();
            $this->data['credits'] = C('init_credits'); //初始积分
            $this->data['domain'] = date('ymdhis').mt_rand(1,10000); //个性域名
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
        $pre = C('DB_PREFIX');
        $username = Q("post.username", NULL, 'htmlspecialchars,strip_tags,addslashes');
        if (empty($username)) {
            //-----------------------帐号-----------------
            $this->error = '帐号不能为空';
            return false;
        }
        //可以使用邮箱与帐号登录
        $sql = "SELECT * FROM " . $pre . "user_icon AS c
                JOIN " . $pre . "user AS u ON u.uid=c.user_uid
                JOIN " . $pre . "role AS r ON u.rid = r.rid
                WHERE username='$username' OR email='$username'";
        $user = M()->query($sql);
        if(!empty($user)){
            $user=$user[0];
        }
        if (!$user) {
            //-----------------------帐号验证------------------------
            $this->error = "帐号不存在";
        } else if ($user['password'] != md5($_POST['password'] . $user['code'])) {
            //-----------------------密码验证------------------------
            $this->error = "密码输入错误";
        } else {
            //是否锁定（限制时间）
            if (time() < $user['lock_end_time']) {
                $_SESSION['lock'] = true;
            }
            //验证IP是否锁定
            if (M('user_deny_ip')->where("ip='{$user['lastip']}'")->find()) {
                $_SESSION['lock'] = true;
            }
            //前台会员根据积分修改角色
            if (empty($user['admin'])) {
                $sql = "SELECT rid FROM {$pre}role WHERE admin=0 AND creditslower<=" . $user['credits'] . " ORDER BY creditslower DESC LIMIT 1";
                $role = $this->query($sql);
                $role = $role[0];
                if ($role['rid'] != $user['rid']) {
                    $this->save(array('uid' => $user['uid'], 'rid' => $role['rid']));
                }
            }
            return $this->record_user($user['uid']);
        }
    }

    /**
     * 记录用户登录信息
     * @param $uid 用户id
     * @return boolean
     */
    public function record_user($uid)
    {
        $pre = C('DB_PREFIX');
        $db = M("user");
        $sql = "SELECT * FROM " . $pre . "user_icon AS c
                JOIN " . $pre . "user AS u ON u.uid=c.user_uid
                JOIN " . $pre . "role AS r ON u.rid = r.rid
                WHERE u.uid=$uid";
        $user = current($db->query($sql));
        setcookie('login',$user['password'],0,'/');
        unset($user['password']);
        unset($user['code']);
        unset($user['user_uid']);
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
}