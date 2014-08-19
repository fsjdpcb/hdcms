<?php

/**
 * 网站前台
 * Class IndexController
 * @author 向军 <houdunwangxj@gmail.com>
 */
class IndexController extends Controller
{
    //缓存目录
    public $cacheDir;

    // 构造函数
    public function __init()
    {
        C('TPL_FIX', '.html');
        //网站开启验证
        if (Q('session.admin') && !C("web_open")) {
            parent::display('siteClose');
            exit;
        }
        define("__TEMPLATE__", __ROOT__ . "/template/" . C("WEB_STYLE"));
        $this->cacheDir = 'temp/Content/' . ACTION . '/' . substr(md5(__URL__), 0, 3);
    }

    //视图缓存检测
    protected function isCache($cachePath = null)
    {
        return parent::isCache($this->cacheDir);
    }

    // 界面显示
    protected function display($tplFile = null, $cacheTime = null, $cachePath = null, $stat = false, $contentType = "text/html", $charset = "", $show = true)
    {
        $cacheDir = $this->cacheDir;
        parent::display($tplFile, $cacheTime, $cacheDir);
    }

    //网站首页
    public function index()
    {
        C('TPL_FIX', '');
        $CacheTime = C('CACHE_INDEX') >= 1 ? C('CACHE_INDEX') : -1;
        $this->display('template/' . C('WEB_STYLE') . '/index.html', $CacheTime);
    }

    //内容页
    public function content()
    {
        $mid = Q('mid', 1, 'intval');
        $cid = Q('cid', 0, 'intval');
        $aid = Q('aid', 0, 'intval');
        $categoryCache = F('category', false, CACHE_DATA_PATH);
        $modelCache = F('model', false, CACHE_DATA_PATH);
        if (!isset($modelCache[$mid]) || !isset($categoryCache[$cid]) || !$aid) {
            _404();
        }
        //验证阅读权限
        if (!IS_ADMIN) {
            $categoryAccessModel = M("category_access");
            $access = $categoryAccessModel->where(array('cid' => $cid, 'admin' => 0))->getField('rid,`show`');
            //栏目设置前台权限时验证
            if ($access) {
                //没有登录或没有权限
                if (!IS_LOGIN || !isset($access[$_SESSION['rid']]) || !$access[$_SESSION['rid']]['show']) {
                    $this->error('没有访问权限');
                }
            }
        }
        $CacheTime = C('CACHE_CONTENT') >= 1 ? C('CACHE_CONTENT') : -1;
        if (!$this->isCache()) {
            $ContentModel = ContentViewModel::getInstance($mid);
            $field = $ContentModel->getOne($aid);
            if ($field) {
                $this->assign('hdcms', $field);
                C('TPL_FIX', '');
                $this->display('template/' . C('WEB_STYLE') . '/' . $categoryCache[$cid]['arc_tpl'], $CacheTime);
                EXIT;
            } else {
                //文章不存在
                $this->_404();
            }
        } else {
            $this->display(null, $CacheTime);
        }
    }

    //栏目列表
    public function category()
    {
        $mid = Q('mid', 0, 'intval');
        $cid = Q('cid', 0, 'intval');
        $categoryCache = F('category', false, CACHE_DATA_PATH);
        $modelCache = F('model', false, CACHE_DATA_PATH);
        if (!isset($modelCache[$mid]) || !isset($categoryCache[$cid])) {
            _404();
        }
        $cacheTime = C('CACHE_CATEGORY') >= 1 ? C('CACHE_CATEGORY') : null;
        if (!$this->isCache()) {
            $category = $categoryCache[$cid];
            //外部链接，直接跳转
            if ($category['cattype'] == 3) {
                go($category['cat_redirecturl']);
            } else {
                $Model = ContentViewModel::getInstance($category['mid']);
                $catid = getCategory($category['cid']);
                $category['content_num'] = $Model->where("category.cid IN(" . implode(',', $catid) . ")")->count();
                $category['comment_num'] = intval(M('comment')->where('cid IN(' . implode(',', $catid) . ')')->count());
                $this->assign("hdcms", $category);
                C('TPL_FIX', '');
                $this->display('template/' . C('WEB_STYLE') . '/' . $category['list_tpl'], $cacheTime);
            }
        } else {
            $this->display(null, $cacheTime);
        }
    }

    //加入收藏
    public function addFavorite()
    {
        if (!session("uid")) {
            $this->error('请登录后操作');
        } else {
            $db = M('favorite');
            $data = array();
            $data['uid'] = $_SESSION['uid'];
            $data['mid'] = intval($_POST['mid']);
            $data['cid'] = intval($_POST['cid']);
            $data['aid'] = intval($_POST['aid']);
            if ($db->where($data)->find()) {
                $this->error('已经收藏过');
            } else {
                $db->add($data);
                $this->success('收藏成功!');
            }
        }
    }

    //获得点击数
    public function getClick()
    {
        $mid = Q('mid', 0, 'intval');
        $aid = Q('aid', 0, 'intval');
        $modelCache = F('model', false, CACHE_DATA_PATH);
        $Model = M($modelCache[$mid]['table_name']);
        $result = $Model->find($aid);
        $Model->save(array('aid' => $result['aid'], 'click' => $result['click'] + 1));
        echo "document.write({$result['click']});";
        exit;
    }

    //404页面
    public function _404()
    {
        //寻找走失儿童404页面
        $this->display('404.html');
    }
}
