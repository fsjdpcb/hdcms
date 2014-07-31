<?php

/**
 * 会员中心权限控制
 * Class MemberAuthControl
 */
class MemberAuthController extends Controller
{
    //构造函数
    public function __construct()
    {
        parent::__construct();
        if (!$this->checkAccess()) {
            $this->error("没有操作权限");
        }
        //消息数
        $message_count = M("user_message")->where(array('to_uid' => $_SESSION['uid'], 'user_message_state' => 0))->count();
        $this->assign('message_count', $message_count);
        //信息信息
        $systemmessage_count = M("system_message")->where(array('uid' => $_SESSION['uid'], 'state' => 0))->count();
        $this->assign('systemmessage_count', $systemmessage_count);
    }

    //验证
    public function checkAccess()
    {return true;
        //未登录
        if (!IS_LOGIN) {
            go(U("Member/Login/login"));
        }
        //锁定
        if (IS_LOCK) {
            $this->error('帐号已锁定...','Index/Index/index');
        }
        //管理员
        if (IS_ADMIN) {
            return true;
        }
        //会员中心关闭
        if (C("MEMBER_OPEN") == 0) {
            $this->display("hdcms/Member/View/public/member_close.html");
            exit;
        }
        //邮箱验证
        if (C('MEMBER_EMAIL_VALIDATE') && !USER_STATUS) {
            go(U('Member/Email/VaifyMail'));
        }
        return true;
    }

}
