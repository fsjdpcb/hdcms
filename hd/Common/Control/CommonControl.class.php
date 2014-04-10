<?php

/**
 * 公共控制器
 * Class CommonControl
 * @author hdxj <houdunwangxj@gmail.com>
 */
class CommonControl extends Control
{

    //构造函数
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Ajax异步
     * @param $state
     * @param $message
     * @param $data
     */
    protected function _ajax($state, $message, $data = array())
    {
        $this->ajax(array('state' => $state, 'message' => $message, 'data' => $data));
    }

    /**
     * keditor 编辑器图片上传处理方法
     */
    public function keditor_upload()
    {
        import('UploadControl', 'hd.Hdcms.Upload.Control');
        O('UploadControl', __FUNCTION__);
    }

    /**
     * Ueditor 编辑器图片上传处理方法
     */
    public function ueditor_upload()
    {
        import('UploadControl', 'hd.Hdcms.Upload.Control');
        O('UploadControl', __FUNCTION__);
    }

    /**
     * Uploadify上传文件处理
     */
    public function hd_uploadify()
    {
        import('UploadControl', 'hd.Hdcms.Upload.Control');
        O('UploadControl', __FUNCTION__);
    }
}