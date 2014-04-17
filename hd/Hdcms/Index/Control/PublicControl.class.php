<?php


/**
 * 公共继承类
 * Class PublicControl
 */
class PublicControl extends CommonControl
{
    //网站模板风格
    protected $_template;

    /**
     * 构造函数
     */
    public function __construct()
    {
        parent::__construct();
        //网站开启验证
        if (!$this->verification()) {
            $this->display("./data/Template/web_close.html");
            exit;
        }
        //模板风格路径
        $this->_template = "./template/" . C("WEB_STYLE") . '/';
        //分配模板目录URL
        defined("__TEMPLATE__") or define("__TEMPLATE__", __ROOT__ . "/template/" . C("WEB_STYLE"));
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
     * 获得缓存目录
     */
    protected function get_cache_path()
    {
        if ($cid = Q('cid', '', 'intval')) {
            $cachePath = CONTENT_CACHE_PATH . $cid . '/';
        } else {
            $cachePath = CONTENT_CACHE_PATH;
        }
        return $cachePath;
    }

    /**
     * 调用模板
     */
    protected function display($tplFile = null, $cacheTime = null, $cachePath = null, $stat = false, $contentType = "text/html", $charset = "", $show = true)
    {
        $tplFile = $this->_template . $tplFile;
        //验证模板文件
        if (is_file($tplFile)) {
            //设置缓存目录
            $cachePath = $this->get_cache_path();
            parent::display($tplFile, $cacheTime, $cachePath);
        } else {
            $this->tpl_file = $tplFile;
            parent::display('./hd/Common/Template/template_error.html');
            exit;
        }

    }
}
