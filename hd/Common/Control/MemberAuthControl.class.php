<?php

/**
 * 会员中心权限控制
 * Class MemberAuthControl
 */
class MemberAuthControl extends CommonControl
{
    public function __construct()
    {
        parent::__construct();
        //会员中心是否关闭
        if (C("member_open") == 0 && !isset($_SESSION['rid'])) {
            $this->display("./data/Template/close_member");
            exit;
        } else if (!session('uid')) {
            go(U("Login/Login/login", array('g' => 'Member')));
        }
        //消息数
        $this->message_count = M('user_message')->where('state=0 AND to_uid='.$_SESSION['uid'])->count();
    }

}