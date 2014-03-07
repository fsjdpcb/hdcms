<?php

/**
 * 会员中心权限控制
 * Class MemberAuthControl
 */
class MemberAuthControl extends CommonControl
{
    public function __construct()
    {
        define("__TEMPLATE__", __TPL__ . '/mini/' . CONTROL);
        parent::__construct();
        //会员中心是否关闭
        if (C("member_open") == 0 && !isset($_SESSION['rid'])) {
            $this->display("./data/Template/close_member");
            exit;
        } else if (CONTROL == 'Login') {

        } else if (!isset($_SESSION['uid'])) {
            go("Login/login");
        }
    }



    //重写父类display方法
    public function display($tplFile = NULL, $cacheTime = NULL, $cachePath = NULL, $stat = false, $contentType = 'text/html', $charset = '', $show = true)
    {
        $tplFile = TPL_PATH . 'mini/' . CONTROL . '/' . METHOD . '.php';
        parent::display($tplFile);
    }

}