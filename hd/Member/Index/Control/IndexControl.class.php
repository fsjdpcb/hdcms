<?php

/**
 * 会员中心
 * Class HomeControl
 */
class IndexControl extends CommonControl
{

    /**
     * 会员中心首页
     */
    public function index()
    {
        if (isset($_SESSION['uid'])) {
            go(U('Dynamic/Dynamic/index', array('g' => "Member")));
        }else{
            go(U('Login/Login/index', array('g' => "Member")));
        }
    }
}