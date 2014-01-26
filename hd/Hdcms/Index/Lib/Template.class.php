<?php

/**
 * 栏目与文章模板文件
 * Class Template
 */
final class Template
{

    /**
     * 获得栏目模板文件
     * @param int $cid 栏目cid
     * @return bool|mixed
     */
    static public function get_category_tpl($cid)
    {
        $category = F("category");
        switch ($category[$cid]['cattype']) {
            case 1:
                //普通栏目
                return str_replace('{style}', 'template/' . C("WEB_STYLE"), $category[$cid]['list_tpl']);
                break;
            case 2:
                //封面栏目
                return str_replace('{style}', 'template/' . C("WEB_STYLE"), $category[$cid]['index_tpl']);
        }
    }

    /**
     * 获得内容页模板
     * @param $aid 文章aid
     * @param null $cid 栏目cid
     * @return mixed
     */
    static public function get_content_tpl($aid, $cid = null)
    {
        if (CONTROL == 'Single') {
            //单页面
            $template = M('content_single')->where("aid=$aid")->getField('template');
            if (!empty($template)) {
                return str_replace('{style}', 'template/' . C("WEB_STYLE"), $template);
            }
        } else {
            //普通文章
            $db = K("ContentView", array('cid' => $cid));
            $content = $db->join("category")->find($aid);
            $tpl = empty($content['template']) ? $content['arc_tpl'] : $content['template'];
            if (!empty($tpl)) {
                return str_replace('{style}', './template/' . C("WEB_STYLE"), $tpl);
            }
        }
    }

}