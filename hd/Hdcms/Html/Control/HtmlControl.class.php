<?php
import("PublicControl","hd.Hdcms.Index.Control");
import("IndexControl","hd.Hdcms.Index.Control");
import("SingleControl","hd.Hdcms.Index.Control");
import("CategoryControl","hd.Hdcms.Index.Control");
import("ArticleControl","hd.Hdcms.Index.Control");

import("ContentModel","hd.Hdcms.Index.Model");
import("ContentViewModel","hd.Hdcms.Index.Model");

/**
 * 静态处理模块
 * Class HtmlControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class HtmlControl extends AuthControl
{
    //模型缓存
    private $_model;
    //栏目缓存
    private $_category;
	//HTML存放根目录
	private $_html_path;

    public function __init()
    {
        //模型缓存
        $this->_model = cache("model");
        //栏目缓存
        $this->_category = cache("category");
		//HTML存放根目录
		$this->_html_path = C("HTML_PATH")?C("HTML_PATH").'/':'';
    }

    //向客户端发送生成静态状态信息
    public function message($message, $url = NULL)
    {
        if ($url) {
            $message .= " <script>
                    window.setTimeout(function(){location.href='" . $url . "'},500)</script>";
        }
        $this->url = $url;
        $this->message = $message;
        $this->display("message");
        exit;
    }

    //一键更新
    public function make_all()
    {
        if (!isset($_SESSION['make_all'])) {
            $_SESSION['make_all'] = array("index" => false, "category" => false, "content" => false);
        }
        //生成首页
        if (isset($_SESSION['make_all']['index'])) {
            $this->create_index();
        }
        //生成栏目页
        if (isset($_SESSION['make_all']['category'])) {
            $this->make_category();
        }
        //生成内容页
        if (isset($_SESSION['make_all']['content'])) {
            $this->make_content();
        }
        unset($_SESSION['make_all']);
        $this->message("全站静态更新完毕", null);
    }

    /**
     * 更新全站静态
     */
    public function create_all_html()
    {
        unset($_SESSION['make_all']);
        $this->make_all();
    }

    /**
	 * 一键生成配置页
	 */
    public function create_all()
    {
        $this->display();
    }

    //生成首页
    public function create_index()
    {
        if (IS_POST or isset($_SESSION['make_all']['index'])) {
        	//首页使用pagelist标签时
        	Page::$staticUrl = __WEB__.'?a=Index&c=Index&m=index&page={page}';
            if (Html::make("IndexControl", "index", array("_html" => "index.html"))) {
                //设置一键生成跳转地址
                if (isset($_SESSION['make_all']['index'])) {
                    $url = U("make_all");
                    unset($_SESSION['make_all']['index']);
                }
                $html = "<div style='font-size:14px;'>首页更新成功 <a href='./index.html' target='_blank'>浏览</a></div>";
                $this->message($html, $url);
            }
        } else {
            $this->display();
        }
    }

    //生成栏目静态规则配置
    public function create_category()
    {
        session("category_html_config", NULL);
        $this->category = json_encode($this->_category);
        $this->model = $this->_model;
        $this->display();
    }

    //生成栏目
    public function make_category()
    {
        //栏目生成静态配置
        $config = session("category_html_config");
        //首次操作：1 创建session配置  2 生成所有栏目首页
        if (is_null($config)) {
            $db = M("category");
            $mid = Q("post.mid", 0, "intval");
            //一键生成时的情况，更新所有栏目
            if (isset($_SESSION['make_all']['category'])) {
                $category = $db->field("cid,mid,catname,cattype,catdir,cat_html_url")->where('cattype<>3')->all();
            } else if (count($_POST['cid']) == 1 and $_POST['cid'][0] == 0) { //没有选择栏目
                //不限模型时
                if ($mid === 0) {
                    $category = $db->field("cid,mid,catname,cattype,catdir,cat_html_url")->where('cattype<>3')->all();
                } else { //指定模型的所有栏目
                    $category = $db->field("cid,mid,catname,cattype,catdir,cat_html_url")->where("mid=$mid AND cattype<>3")->all();
                }
            } else {
                //指定具体栏目
                $category = $db->field("cid,mid,catname,cattype,catdir,cat_html_url")->in($_POST['cid'])->where('cattype<>3')->all();
            }
            //不存在生成的栏目时
            if (is_null($category)) {
                //一键生成时的跳转地址
                if (isset($_SESSION['make_all']['category'])) {
                    $url = U("make_all");
                } else {
                    $url = null;
                }
                unset($_SESSION['make_all']['category']);
                unset($_SESSION['category_html_config']);
                $this->message("没有任何栏目需要生成!", $url);
            } else {
                $config = array();
                //生成所有栏目首页
                foreach ($category as $cat) {
                    $cat['_html'] = $this->_html_path . $cat['catdir'] . '/index.html';
                    //为Index/Index/IndexControl提交参数
                    $_REQUEST['mid'] = $cat['mid'];
					$_REQUEST['cid'] = $cat['cid'];
					//生成单文章
					if($cat['cattype']==4){
						Html::make("SingleControl", "show", $cat);
					}else{
						//html文件存放根目录
	                    Page::$staticUrl = __ROOT__ . '/' . $this->_html_path . str_replace(
	                            array('{catdir}', '{cid}'),
	                            array($cat['catdir'], $cat['cid']),
	                            $cat['cat_html_url']);
	                    Html::make("CategoryControl", "category", $cat);
	                    //去掉页数为0时栏目
	                    if (!Page::$staticTotalPage) continue;
	                    $cat['total_page'] = Page::$staticTotalPage;
	                    //即将更新的页数，用于计算完成百分比
	                    $cat['self_page'] = 1;
	                    //每次生成几页
	                    $cat['row'] = Q("post.step_row", 10, "intval");
	                    $config[$cat['cid']] = $cat;
					}
                }
                //如果所有栏目生成完毕结束静态创建
                if (empty($config)) {
                    if (isset($_SESSION['make_all']['category'])) {
                        $url = U("make_all");
                    } else {
                        $url = null;
                    }
                    unset($_SESSION['make_all']['category']);
                    unset($_SESSION['category_html_config']);
                    $this->message("所有栏目生成完毕", $url);
                }
                //储存配置到session
                session("category_html_config", $config);
                $this->message("栏目静态初始化完成...", __METH__);
            }
        }
        //初始化完成后，生成静态
        $config = & $_SESSION['category_html_config'];
        if (empty($config)) {
            if (isset($_SESSION['make_all']['category'])) {
                $url = U("make_all");
            } else {
                $url = null;
            }
            unset($_SESSION['make_all']['category']);
            unset($_SESSION['category_html_config']);
            $this->message("所有栏目生成完毕", $url);
        } else {
            foreach ($config as $n => $cat) {
                for ($i = 0; $i < $cat['row']; $i++) {
                    $_GET['page'] = $config[$n]['self_page'];
                    //即将更新的页数，用于计算完成百分比
                    $config[$n]['self_page']++;
                    //为Index/Index/IndexControl提交参数
                    $_REQUEST['mid'] = $cat['mid'];
					$_REQUEST['cid'] = $cat['cid'];
                    $cat['_html'] = $this->_html_path . str_replace(
                            array('{catdir}', '{cid}', '{page}'),
                            array($cat['catdir'], $cat['cid'], $_GET['page']),
                            $cat['cat_html_url']);
                    //设置分页静态变量
                    Page::$staticUrl = __ROOT__ . '/' . $this->_html_path . str_replace(
                            array('{catdir}', '{cid}'),
                            array($cat['catdir'], $cat['cid']),
                            $cat['cat_html_url']);
                    Html::make("CategoryControl", "category", $cat);
                    //如果页数为0表示生成完毕，删除配置文件中的这个栏目
                    if ($config[$n]['total_page'] < $config[$n]['self_page']) {
                        unset($config[$n]);
                        $this->message("栏目{$cat['catname']}生成完毕", __METH__);
                    }
                }
                //本次$cat['row']页生成完毕，执行下一轮静态生成
                $this->message("生成栏目{$cat['catname']}的下" . ($cat['total_page'] - $cat['self_page']) . "页,
                            共有{$config[$n]['total_page']}页
                            (<font color='red'>" . floor($config[$n]['self_page'] / $config[$n]['total_page'] * 100) . "%</font>)", __METH__);
            }
        }
    }


    //生成内容页静态
    public function make_content()
    {
        //栏目生成静态配置
        $config = session("content_html_config");
        //首次操作：1 创建session配置  2 生栏目所有栏目首页
        if (is_null($config)) {
            $db = M("category");
            $mid = Q("post.mid", 0, "intval");
            //没有选择栏目
            if (isset($_SESSION['make_all']['content'])) {
                //一键生成
                $category = $db->field("cid,mid,catname,catdir,arc_html_url")->all();
            } else if (count($_POST['cid']) == 1 and $_POST['cid'][0] == 0) {
                //没有选择栏目
                if ($mid === 0) {
                    //不限模型时
                    $category = $db->field("cid,mid,catname,catdir,arc_html_url")->all();
                } else {
                    //指定模型的所有栏目
                    $category = $db->field("cid,mid,catname,catdir,arc_html_url")->where("mid=$mid")->all();
                }
            } else {
                //指定具体栏目
                $category = $db->field("cid,mid,catname,catdir,arc_html_url")->in($_POST['cid'])->all();
            }
            //没有要操作的栏目
            if (is_null($category)) {
                if (isset($_SESSION['make_all']['content'])) {
                    $url = U("make_all");
                } else {
                    $url = NUll;
                }
                //一键生成全站关于文章
                unset($_SESSION['make_all']['content']);
                unset($_SESSION['content_html_config']);
                $this->message("没有任何内容需要生成!", $url);
            } else {
                $config = array();
                foreach ($category as $cat) {
                    //当前栏目表
                    $table = $this->_model[$cat['mid']]['table_name'];
                    //设置条件
                    $cat['where'] = C("DB_PREFIX") . $table . ".cid=" . $cat['cid'];
                    $cat['order'] = '';
                    $cat['limit'] = '';
                    //需要更新的总条数
                    $cat['total_row'] = 0;
                    //已经更新的条数
                    $cat['old_total'] = 0;
                    $type = Q("post.type", "all");
                    switch ($type) {
                        case "all":
                            break;
                        case "new":
                            $cat['order'] = "addtime desc";
                            $cat['total_row'] = $_POST['total_row'];
                            break;
                        case "time":
                            $cat['where'] .= " AND addtime>" . strtotime($_POST['start_time']) . " AND addtime<" . strtotime($_POST['end_time']);
                            break;
                        case "id":
                            $cat['where'] .= " AND aid>" . $_POST['start_id'] . " AND aid<" . $_POST['end_id'];
                            break;
                    }
                    //每次生成几条记录
                    $cat['row'] = Q("post.step_row", 20, "intval");
                    //去除没有文章的栏目
                    $db = M($table);
                    $count = $db->where($cat['where'])->order($cat['order'])->count();
                    //没有要生成的文章
                    if (!$count) {
                        continue;
                    }
                    //操作类型不为new时设置需要更新的总条数
                    if (empty($cat['total_row']))
                        $cat['total_row'] = $count;
                    //保存生成静态的配置
                    $config[$cat['cid']] = $cat;
                }
                //储存配置到session
                session("content_html_config", $config);
                $this->message("内容静态初始化完成...", __METH__);
            }
        }
        $config = & $_SESSION['content_html_config'];
        if (empty($config)) {
            //一键生成时，结束文章静态生成，跳转到一键生成方法
            if (isset($_SESSION['make_all']['content'])) {
                $url = U("make_all");
            } else {
                $url = null;
            }
            unset($_SESSION['make_all']['content']);
            unset($_SESSION['content_html_config']);
            $this->message("所有文章生成完毕", $url);
        } else {
            foreach ($config as $n => $cat) {
                //如果设置更新最新的N条时，检测是否已经更新完毕
                if ($cat['old_total'] >= $cat['total_row']) {
                    unset($config[$n]);
                    $this->message("栏目{$cat['catname']}生成完毕", __METH__);
                }
                //当前栏目表
                $table = $this->_model[$cat['mid']]['table_name'];
                //获得本次更新数据
                $db = M($table);
                $content = $db->field("aid,addtime,html_path")->where($cat['where'])->order($cat['order'])->limit($cat['old_total'], $cat['row'])->all();
                //没有数据可更新时
                if (!$content) {
                    unset($config[$n]);
                    $this->message("栏目{$cat['catname']}生成完毕", __METH__);
                }
                //增加已经更新的记录
                $config[$n]['old_total'] += count($content);
                foreach ($content as $con) {
                    $field = $cat;
                    $field['aid'] = $con['aid'];
                    $field['addtime'] = $con['addtime'];
                    $field['html_path'] = $con['html_path'];
                    $field['_html'] = Url::get_content_html($field);
                    //生成静态IndexControl中的content方法需要这2个变量
                    $_REQUEST['mid'] = $cat['mid'];
                    $_REQUEST['cid'] = $cat['cid'];
                    $_REQUEST['aid'] = $con['aid'];
                    Html::make("ArticleControl", "show", $field);
                }
                //本次$cat['row']页生成完毕，执行下一轮静态生成
                $this->message("{$cat['catname']}共有{$cat['total_row']}条记录-
                                已经更新{$config[$n]['old_total']}条
                                (<font color='red'>" . floor($config[$n]['old_total'] / $cat['total_row'] * 100) . "%</font>)", __METH__);
            }
        }
    }

    //生成内容页静态规则配置
    public function create_content()
    {
        session("content_html_config", NULL);
        $this->category = json_encode($this->_category);
        $this->model = $this->_model;
        $this->display();
    }

}