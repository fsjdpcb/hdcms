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
     * 用户登录后储存登录信息至session
     */
    protected function session_save_user($uid)
    {
        $user = M('user')->find($uid);
        $_SESSION = array_merge($_SESSION, $user);
    }


}