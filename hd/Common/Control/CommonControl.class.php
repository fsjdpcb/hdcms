<?php

/**
 * 公共控制器
 * Class CommonControl
 * @author hdxj <houdunwangxj@gmail.com>
 */
class CommonControl extends Control
{
    //表前缀
    protected $_db_prefix;
    //用户uid
    protected $_uid;
    //用户名
    protected $_username;

    //构造函数
    public function __construct()
    {
        parent::__construct();
        $this->_db_prefix = C("DB_PREFIX");
        $this->_uid = session("uid");
        $this->_username = session('username');
    }

    /**
     * Ajax异步
     * @param $state
     * @param $message
     */
    protected function _ajax($state, $message)
    {
        $this->ajax(array('state' => $state, 'message' => $message));
    }

    /**
     * 记录用户登录信息
     * @param $uid 用户id
     */
    protected function record_user($uid)
    {
        $db = M("user");
        $sql = "SELECT * FROM " . C("DB_PREFIX") . "user_icon AS c RIGHT JOIN " . C("DB_PREFIX") . "user AS u
                ON u.uid=c.user_uid
                JOIN " . C('DB_PREFIX') . "role AS r ON u.rid = r.rid WHERE u.rid=$uid";
        $user = current($db->query($sql));
        p($user);
        //------------------头像
        if (empty($user['p50'])) {
            $user['icon50'] = __ROOT__ . "/data/image/favicon/50.jpg";
            $user['icon100'] = __ROOT__ . "/data/image/favicon/100.jpg";
            $user['icon150'] = __ROOT__ . "/data/image/favicon/150.jpg";
        }
        //是否为超级管理员
        $_SESSION['WEB_MASTER'] = strtolower(C("WEB_MASTER")) == strtolower($user['username']);
        $_SESSION = array_merge($_SESSION, $user);
        //---------------------修改登录IP与时间
        $db->save(array(
            "uid" => $_SESSION['uid'],
            "logintime" => time(),
            "lastip" => ip_get_client()
        ));
    }

    /**
     * 获取用户密码加密key
     * @return string
     */
    protected function get_user_code()
    {
        return substr(md5(C("AUTH_KEY") . mt_rand() . time() . C('AUTH_KEY')), 0, 10);
    }

    /**
     * 获得用户密码
     * @param $password 密码
     * @param $code 加密key
     * @return string 储存到数据库中的密码
     */
    protected function get_user_password($password, $code)
    {
        return md5($password . $code);
    }

    /**
     * 获得用户初始组rid
     */
    protected function get_default_rid()
    {
        M('role')->where('admin=0')->order('creditslower ASC')->getField('rid');
    }
}