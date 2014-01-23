<?php

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

    //构造函数
    public function __init()
    {
        parent::__init();
        //网站开启验证
        $this->verification();
        //----------------------设置变量----------------------
        $this->_model = F("model");
        $this->_category = F("category");
        $this->_cid = Q("cid", null, "intval");
        $this->_aid = Q("aid", null, "intval");
        if ($this->_cid) {
            $this->_mid = $this->_category[$this->_cid]['mid'];
            $this->_table = $this->_model[$this->_mid]['table_name'];
        }
        //模板风格路径
        $this->_template = "./template/" . C("WEB_STYLE") . '/';
        //分配模板目录URL
        defined("__TEMPLATE__") or define("__TEMPLATE__", __ROOT__ . "/template/" . C("WEB_STYLE"));
    }


    /**
     * 验证网站是否关闭
     */
    private function verification()
    {
        /**
         * 以下情况会进行验证
         * 1. 非管理员
         * 2. 网站没有关闭
         */
        if (!session('admin') && C("web_open") == 0) {
            $this->display("./data/Template/web_close");
            exit;
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
}
