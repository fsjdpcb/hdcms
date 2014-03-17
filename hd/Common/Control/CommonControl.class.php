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
        $user = M('user')->find($uid);
        unset($user['password']);
        unset($user['code']);
        $_SESSION = array_merge($_SESSION, $user);
        //是否为超级管理员
        $_SESSION['WEB_MASTER'] = C("WEB_MASTER") == $user['username'];
        $_SESSION['gname'] = M('group')->where("gid={$user['gid']}")->getField('gname');
        $_SESSION['rname'] = M('role')->where("rid={$user['rid']}")->getField('rname');
        $_SESSION['favicon'] = empty($user['favicon']) ? __ROOT__ . "/data/image/favicon/favicon" : __ROOT__ . '/' . $user['favicon'];
        //获得角色信息
        $stat = array("stat" => 1, "msg" => "正在登录...");
        //修改登录IP与时间
        $this->db->save(array(
            "uid" => $user['uid'],
            "logintime" => time(),
            "ip" => ip_get_client()
        ));
    }

}