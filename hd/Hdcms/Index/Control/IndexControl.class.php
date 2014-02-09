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
        $tpl = $this->_template . 'index.html';
        if (is_file($tpl)) {
            $this->display($tpl);
        }
    }
}