<?php
/**
 * 公共控制器
 * Class CommonControl
 * @author hdxj <houdunwangxj@gmail.com>
 */
class CommonControl extends Control
{

    public function __init()
    {
        session("history", Q("server.HTTP_REFERER"));
    }

}