<?php

/**
 * 公共控制器
 * Class CommonControl
 * @author hdxj <houdunwangxj@gmail.com>
 */
class CommonControl extends Control
{
    //构造函数
    public function __construct()
    {
        parent::__construct();
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


}