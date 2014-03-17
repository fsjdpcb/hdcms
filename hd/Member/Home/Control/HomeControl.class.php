<?php

/**
 * 会员中心模块
 * Class HomeControl
 */
class HomeControl extends MemberAuthControl
{
    //构造函数
    public function __init()
    {

    }

    /**
     * 会员中心首页
     */
    public function index()
    {
        //跳转到文章管理
        go(U('Content/index', array('g' => "Member")));
    }
}