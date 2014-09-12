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
        C(array('TPL_FIX' => '.html'));
        //网站关闭
        if (!Q('session.admin') && !C("web_open")) {
            parent::display('siteClose');
            exit;
        }
        $this->cacheDir = TEMP_PATH . 'Content/' . substr(md5(__URL__), 0, 2);
        $this->model = S('model');
        $this->category = S('category');
        $this->mid = Q('mid', null, 'intval');
        $this->cid = Q('cid', null, 'intval');
        $this->aid = Q('aid', 0, 'intval');
        if ($this->mid && !isset($this->model[$this->mid])) {
            $this->_404();
        }
        if ($this->cid && !isset($this->category[$this->cid])) {
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
        $this->display('Template/' . C('WEB_STYLE') . '/index.html', C('INDEX_CACHE_TIME'));
    }

    //内容页
    public function content()
    {
        $aid = Q('aid', 0, 'intval');
        if (!$aid) {
            $this->_404();
        }
        //验证阅读权限
        if (!Q('session.admin')) {
            $categoryAccessModel = M("category_access");
            $access = $categoryAccessModel->where(array('cid' => $this->cid, 'admin' => 0))->find();
            //栏目设置前台权限时验证
            if ($access) {
                //没有登录或没有权限
                if (!session('uid') || !isset($access[$_SESSION['rid']]) || !$access[$_SESSION['rid']]['show']) {
                    $this->error('没有访问权限');
                }
            }
        }
        $ContentModel = ContentViewModel::getInstance($this->mid);
        $field = $ContentModel->getOne($aid);
        if ($field['content_status'] == 0) {
            $this->error('文章正在审核中');
        }
        if (!$this->isCache()) {
            if ($field) {
                $this->assign('hdcms', $field);
                $tplFile = empty($field['template']) ? $this->category[$this->cid]['arc_tpl'] : $field['template'];
                $this->display('Template/' . C('WEB_STYLE') . '/' . $tplFile, C('CONTENT_CACHE_TIME'));
                EXIT;
            }
        } else {
            $this->display(null, C('CONTENT_CACHE_TIME'));
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
                $tplFile = $category['cattype'] == 2 ? $category['index_tpl'] : $category['list_tpl'];
                $this->display('Template/' . C('WEB_STYLE') . '/' . $tplFile, C('CATEGORY_CACHE_TIME'));
            }
        } else {
            $this->display(null, C('CATEGORY_CACHE_TIME'));
        }
    }

    //获得点击数
    public function getClick()
    {
        $ContentModel = ContentViewModel::getInstance($this->mid);
        $ContentModel->inc('click', 'aid=' . $this->aid, 1);
        $click = $ContentModel->where(array($ContentModel->table . '.aid' => $this->aid))->getField('click');
        echo "document.write({$click});";
        exit;
    }

    //404页面
    public function _404()
    {
        //寻找走失儿童404页面
        parent::display('404.html');
        exit;
    }
}
