<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class IndexControl extends PublicControl
{

    //网站首页
    public function index()
    {
        $this->display('template/' . C('WEB_STYLE') . '/index.html',  C('cache_index'));
    }
}