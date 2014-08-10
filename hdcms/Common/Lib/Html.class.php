<?php

/**
 * 静态生成
 * @author hdxj <houdunwangxj@gmail.com>
 */
class Html extends Controller
{
    //首页
    public function index()
    {
        if (C('CREATE_INDEX_HTML') == 1) {
            $template = 'template/' . C('WEB_STYLE') . '/index.html';
            return $this->createHtml('index', './', $template);
        }
        return true;
    }

    //内容页
    public function content($data)
    {
        $categoryCache = F('category', false, CACHE_DATA_PATH);
        if (!$data['arc_url_type'] == 2) {
            return true;
        }
        //模板文件
        $template = 'template/'.C('WEB_STYLE').'/'.$data['arc_tpl'];
        //HTML存放根目录
        $html_path = C("HTML_PATH") ? C("HTML_PATH") . '/' : '';
        //栏目定义的内容页生成静态规则
        $_s = array('{catdir}', '{y}', '{m}', '{d}', '{aid}');
        $time = getdate($data['addtime']);
        $_r = array($data['catdir'], $time['year'], $time['mon'], $time['mday'], $data['aid']);
        $htmlFile = $html_path . str_replace($_s, $_r, $data['arc_html_url']);
        $_REQUEST['mid'] = $data['mid'];
        $_REQUEST['cid'] = $data['cid'];
        $_REQUEST['aid'] = $data['aid'];
        $this->assign('hdcms', $data);
        return $this->createHtml(basename($htmlFile), dirname($htmlFile) . '/', $template);
    }

    //栏目页
    public function category($cid, $page = 1)
    {
        $categoryCache = F('category', false, CACHE_DATA_PATH);
        $cat = $categoryCache[$cid];
        $GLOBALS['totalPage'] = 0;
        if ($cat['cat_url_type'] == 2 || $cat['cattype'] == 3) {
            return true;
        }
        //单文章
        if ($cat['cattype'] == 4) {
            $Model = ContentViewModel::getInstance($cat['mid']);
            $result = $Model->where("cid={$cat['cid']}")->find();
            if ($result) {
                $Content = new Content($cat['mid']);
                $data = $Content->find($result['aid']);
                return $this->content($data);
            }
        } else {
            //普通栏目与封面栏目
            $htmlDir = C("HTML_PATH") ? C("HTML_PATH") . '/' : '';
            $_REQUEST['page'] = $_GET['page'] = $page;
            $_REQUEST['mid'] = $cat['mid'];
            $_REQUEST['cid'] = $cat['cid'];
            $Model = ContentViewModel::getInstance($cat['mid']);
            $cat['content_num'] = $Model->where("category.cid ={$cat['cid']}")->count();
            $htmlFile = $htmlDir . str_replace(array('{catdir}', '{cid}', '{page}'), array($cat['catdir'], $cat['cid'], $page), $cat['cat_html_url']);
            $this->assign("hdcms", $cat);
            $this->createHtml(basename($htmlFile), dirname($htmlFile) . '/', $cat['template']);
            //第1页时复制index.html
            if ($page == 1) {
                copy($htmlFile, dirname($htmlFile) . '/index.html');
            }
            return true;
        }
    }

    //生成栏目分页列表
    public function relation_category($cid)
    {
        $cache = F('category',false,CACHE_DATA_PATH);
        $cat = $cache[$cid];
        if ($cat['cat_url_type'] == 2 || $cat['cattype'] == 3) {
            return true;
        }
        unset($GLOBALS['totalPage']);
        $d = $page = 1;
        do {
            $this->category($cid, $page);
            $d++;
            $page++;
            $totalPage = $GLOBALS['totalPage'];
        } while ($d <= $totalPage && $d < 10);
        return true;
    }
}
