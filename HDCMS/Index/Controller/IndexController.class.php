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
        if(C('CACHE_INDEX') == 0) C('CACHE_INDEX',-1);
        $this->display('Template/' . C('WEB_STYLE') . '/index.html', C('CACHE_INDEX'));
    }

    //内容页
    public function content()
    {
        $aid = Q('aid', 0, 'intval');
        //参数错误
        $aid or $this->_404();
        //验证阅读权限
        if (!K("CategoryAccess")->checkAccess($this->cid, $_SESSION['user']['rid'], 'content')) {
            $this->error('没有访问权限');
        }
        //读取文章
        $ContentModel = ContentViewModel::getInstance($this->mid);
        $field = $ContentModel->getOne($aid);
        if (!$field) {
            $this->error('文章不存在');
        }
        //扣除阅读金币
        $this->deductPoints($field);
        //文章没审核时超管不限
        if ($_SESSION['user']['rid'] != 1 && $field['content_status'] == 0) {
            $this->error('文章正在审核中');
        }
        //0与-1为不缓存
        if(C('CACHE_CONTENT') == 0)C('CACHE_CONTENT',-1);
        if (C('CACHE_CONTENT') == -1 || !$this->isCache()) {
            $this->assign('hdcms', $field);
            $tplFile = empty($field['template']) ? $this->category[$this->cid]['arc_tpl'] : $field['template'];
            $this->display('Template/' . C('WEB_STYLE') . '/' . $tplFile, C('CACHE_CONTENT'));
        } else {
            $this->display(null, C('CACHE_CONTENT'));
        }
    }

    /**
     * 扣除阅读积分
     * @param $field 文章数据
     */
    private function deductPoints($field)
    {
        $readPoint = $field['readpoint'] == '' ? intval($field['show_credits']) : intval($field['readpoint']);
        //需要阅读积分
        if ($readPoint > 0) {
            //验证会员登录状态
            if ($_SESSION['user']['uid'] == 0) {
                $this->error('请登录后查看', 'Member/Login/login');
            } else if ($_SESSION['user']['credits'] < $readPoint) {
                //积分不足
                $this->error('积分不足');
            } else {
                //没到扣除时间，不扣除
                $map['cid'] = array('EQ', $this->cid);
                $map['aid'] = array('EQ', $this->aid);
                $map['rectime'] = array('GT', time() - $field['repeat_charge_day'] * 3600 * 24);
                if (!M('user_credits')->where($map)->find()) {
                    //扣除阅读积分
                    $_SESSION['user']['credits'] -= $readPoint;
                    //积分表记录
                    M('user_credits')->add(array('uid' => $_SESSION['user']['uid'],'rectime'=>time(), 'mid' => $this->mid, 'cid' => $this->cid, 'aid' => $this->aid, 'title' => $field['title']));
                }
            }
        }

    }

    //栏目列表
    public function category()
    {
        //0与-1为不缓存
        if(C('CACHE_CATEGORY') == 0) C('CACHE_CATEGORY',-1);
        if (C('CACHE_CATEGORY') == 0 || !$this->isCache()) {
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
                $this->display('Template/' . C('WEB_STYLE') . '/' . $tplFile, C('CACHE_CATEGORY'));
            }
        } else {
            $this->display(null, C('CACHE_CATEGORY'));
        }
    }

    //获得点击数
    public function getClick()
    {
        $ContentModel = ContentViewModel::getInstance($this->mid);
        $ContentModel->relation($ContentModel->table)->inc('click', 'aid=' . $this->aid, 1);
        $click = $ContentModel->relation($ContentModel->table)->where(array('aid' => $this->aid))->getField('click');
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
