<?php

/**
 * 前台使用的公共控制器
 * Class PublicController
 */
class CommonController extends Controller
{
    //缓存目录
    public $cacheDir;

    // 构造函数
    public function __init()
    {
        //网站开启验证
        if (!IS_ADMIN && !C("web_open")) {
            parent::display('siteClose');
            exit;
        }
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

}
