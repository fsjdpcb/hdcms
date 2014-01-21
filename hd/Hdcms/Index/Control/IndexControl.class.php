<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class IndexControl extends CommonControl
{
    private $_db;
    //网站模板风格
    private $_template;
    //栏目id
    private $_cid;
    //文章id
    public $_aid;
    //文章主表
    private $_table;
    //模型缓存
    private $_model;
    //栏目缓存
    private $_category;

    public function __construct()
    {
        parent::__init();
        $this->check_web_stat();
        $this->_model = F("model");
        $this->_category = F("category");
        //模板风格路径
        $this->_template = "./template/" . C("WEB_STYLE") . '/';
        //分配模板目录URL
        defined("__TEMPLATE__") or define("__TEMPLATE__", __ROOT__ . "/template/" . C("WEB_STYLE"));
        $this->_cid = Q("cid", null, "intval");
        $this->_aid = Q("aid", null, "intval");
        if ($this->_cid) {
            $this->_table = $this->_model[$this->_category[$this->_cid]['mid']]['tablename'];
        }
    }

    //网站是否关闭
    private function check_web_stat()
    {
        if (C("web_open") == 0 && !isset($_SESSION['rid'])) {
            $this->display("./data/Template/web_close");
            exit;
        }
    }

    //网站首页
    public function index()
    {
        $this->display($this->_template . 'index.html');
    }

    //内容页
    public function content()
    {
        if ($this->_aid) {
            import('Content.Model.ContentViewModel');
            $db = new ContentViewModel();
            $field = $db->where($db->tableFull . ".aid=" . $this->_aid)->find();
            if ($field) {
                $field['caturl'] = U("category", array("cid" => $field['cid']));
                $field['source'] = empty($field['source']) ? C("WEBNAME") : $field['source'];
                $this->hdcms=$field;
                $tpl = get_content_tpl($this->_aid);
                if (is_file($tpl))
                    $this->display($tpl);
            }
        }
    }

    //显示栏目列表
    public function category()
    {
        if ($this->_cid) {
            //当前操作栏目
            $category = $this->_category[$this->_cid];
            //外部链接，直接跳转
            if ($category['cattype'] == 3) {
                go($category['cat_redirecturl']);
            } else {
                $field = M("category")->find($this->_cid);
                $this->assign("hdcms", $field);
                $tpl = get_category_tpl($this->_cid);
                if (is_file($tpl))
                    $this->display($tpl);
            }
        }
    }

    //修改文章点击次数
    public function updateClick()
    {
        $model = M("model")->find($this->_get("mid", "intval"));
        $table = $model['tablename'];
        $aid = $this->_get("aid", "intval");
        $data = array(
            "aid" => $aid,
            "click" => "click+1"
        );
        $db = M($table);
        $db->inc("click", "aid=$aid", 1);
        $field = $db->find($aid);
        echo "document.write({$field['click']})";
        exit;
    }

    //修改点击数
    public function get_click()
    {
        $aid = Q("aid", NULL, "intval");
        $this->_db = K("Content");
        $this->_db->join(NULL)->inc("click", "aid=$aid", 1);
        $field = $this->_db->JOIN(NULL)->find($aid);
        echo "document.write({$field['click']})";
        exit;
    }

    //js调用
    public function js()
    {
        $id = Q("get.id", NULL, "intval");
        if ($id) {
            $file = JS_CACHE_PATH . "{$id}.php";
            ob_start();
            require $file;
            $con = ob_get_clean();
            echo "document.write('" . addslashes(str_replace("\n", "", $con)) . "')";
            exit;
        }
    }
}

?>