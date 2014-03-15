<?php
//视图缓存目录
define("CONTENT_CACHE_PATH", 'data/Cache/Content');

/**
 * 公共继承类
 * Class PublicControl
 */
class PublicControl extends CommonControl
{
    //模型
    protected $_db;
    //网站模板风格
    protected $_template;
    //模型mid
    protected $_mid;
    //栏目id
    protected $_cid;
    //文章id
    protected $_aid;
    //文章主表
    protected $_table;
    //模型缓存
    protected $_model;
    //栏目缓存
    protected $_category;

    /**
     * 构造函数
     * @param int $cid 栏目cid
     * @param int $aid 文章aid
     */
    public function __construct($cid = null, $aid = null)
    {
        parent::__construct();
        //网站开启验证
        if (!$this->verification()) {
            $this->display("./data/Template/web_close");
            exit;
        } else {
            //----------------------设置变量----------------------
            $this->_model = F("model");
            $this->_category = F("category");
            $this->_cid = $cid ? $cid : Q("cid", null, "intval");
            $this->_aid = $aid ? $aid : Q("aid", null, "intval");
            if ($this->_cid) {
                $this->_mid = $this->_category[$this->_cid]['mid'];
                $this->_table = $this->_model[$this->_mid]['table_name'];
            }
            //模板风格路径
            $this->_template = "./template/" . C("WEB_STYLE") . '/';
            //分配模板目录URL
            defined("__TEMPLATE__") or define("__TEMPLATE__", __ROOT__ . "/template/" . C("WEB_STYLE"));
        }
    }


    /**
     * 验证网站是否开启
     */
    private function verification()
    {
        /**
         * 以下情况会进行验证
         * 1. 非管理员
         * 2. 网站没有关闭
         */
        if (session('admin') || C("web_open") == 1) {
            return true;
        }
    }

    /**
     * js调用
     */
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

    /**
     * 模板文件不存在
     */
    protected function template_error($tpl_file)
    {
        $this->tpl = $tpl_file;
        $this->display('./hd/Common/Template/template_error.html');
    }

    /**
     * 调用模板
     */
    protected function display($tplFile = null, $cacheTime = null, $cachePath = null, $stat = false, $contentType = "text/html", $charset = "", $show = true)
    {
        $cachePath = CONTENT_CACHE_PATH;
        parent::display($tplFile,$cacheTime,$cachePath);

    }
}
