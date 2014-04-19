<?php

/**
 * 单页面
 * Class SingleControl
 */
class SingleControl extends PublicControl
{
    //构造函数
    public function __init()
    {
        parent::__init();
    }

    //单文章显示内容
    public function single()
    {
        $aid = Q('aid', NULL, 'intval');
        if ($aid) {
            $field = M('content_single')->find($aid);
            $tpl = str_replace('{style}', './template/' . C("WEB_STYLE"), $field['template']);
            if (is_file($tpl)) {
                $this->hdcms = $field;
                $this->display('template/' . C('WEB_STYLE') . '/' .$tpl);
            }
        }

    }
}
