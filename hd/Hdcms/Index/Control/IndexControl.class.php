<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class IndexControl extends PublicControl
{
    //构造函数
    public function __init()
    {
        parent::__init();
    }

    //网站首页
    public function index()
    {
        $this->display($this->_template . 'index.html');
    }
}

?>