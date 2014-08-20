<?php
/**
 * 网站前台
 * Class IndexController
 * @author 向军 <houdunwangxj@gmail.com>
 */
class IndexController extends Controller
{
    //缓存目录
    private $cacheDir;
    private $model;
    private $category;
    private $mid;
    private $cid;
    private $aid;

    // 构造函数
    public function __init()
    {
        C(array('TPL_FIX'=>'.html'));
        //网站关闭
        if (!Q('session.admin') && !C("web_open")) {
            parent::display('siteClose');
            exit;
        }
        $this->cacheDir = 'temp/Content/' . substr(md5(__URL__), 0, 2);
        $this->model = S('model');
        $this->category = S('category');
        $this->mid = Q('mid', 0, 'intval');
        $this->cid = Q('cid', 0, 'intval');
        if ($this->mid and !isset($this->model[$this->mid])) {
            $this->_404();
        }
        if ($this->cid and !isset($this->category[$this->cid])) {
            $this->_404();
        }
    }

    //视图缓存检测
    protected function isCache($cachePath = null)
    {
        return parent::isCache($this->cacheDir);
    }

    // 界面显示
    protected function display($tplFile = null, $cacheTime = null, $cachePath = null, $stat = false, $contentType = "text/html", $charset = "", $show = true)
    {
        parent::display($tplFile, $cacheTime, $this->cacheDir);
    }

    //网站首页
    public function index()
    {
        $this->display('template/' . C('WEB_STYLE') . '/index.html', C('INDEX_CACHE_TIME'));
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
        if (!$this->isCache()) {
            $category = $this->category[$this->cid];
            //外部链接，直接跳转
            if ($category['cattype'] == 3) {
                go($category['cat_redirecturl']);
            } else {
                $Model = ContentViewModel::getInstance($category['mid']);
                $catid = getCategory($category['cid']);
                $category['content_num'] = $Model->where("category.cid IN(" . implode(',', $catid) . ")")->count();
                $this->assign("hdcms", $category);
                $this->display('template/' . C('WEB_STYLE') . '/' . $category['list_tpl'], C('CATEGORY_CACHE_TIME'));
            }
        } else {
            $this->display(null, C('CATEGORY_CACHE_TIME'));
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
                $this->success('收藏成功!','index');
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
        parent::display('404.html');
    }
}
