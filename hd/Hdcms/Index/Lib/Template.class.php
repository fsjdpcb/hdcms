<?php
import('ArticleModel', 'hd.Hdcms.Index.Model');

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
                return $category[$cid]['list_tpl'];
            case 2:
                //封面栏目
                return $category[$cid]['index_tpl'];
            case 3:
                //单页面栏目
                $result = M('content_single')->where("cid=$cid")->find();
                //单页面文章指定模板时使用指定的否则使用栏目单页面模板
                return $result['template'] ? $result['template'] : $category[$cid]['single_tpl'];
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
        //普通文章
        $db = K("Article", array('cid' => $cid));
        $content = $db->join("category")->find($aid);
        return empty($content['template']) ? $content['arc_tpl'] : $content['template'];
    }

}