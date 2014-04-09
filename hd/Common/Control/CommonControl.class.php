<?php

/**
 * 公共控制器
 * Class CommonControl
 * @author hdxj <houdunwangxj@gmail.com>
 */
class CommonControl extends Control
{
    //表前缀
    protected $_db_prefix;
    //用户uid
    protected $_uid;
    //用户名
    protected $_username;

    //构造函数
    public function __construct()
    {
        //判断浏览器
        if (!$this->check_browser()) {
            $this->display('hd/Common/Template/check_browser.html');
            exit;
        }
        parent::__construct();
        $this->_db_prefix = C("DB_PREFIX");
        $this->_uid = session("uid");
        $this->_username = session('username');
    }
    /**
     * 浏览器检测
     * @return bool
     */
    public function check_browser()
    {
        $browser = browser_info();
        if (strstr($browser, 'msie')) {
            if (intval(substr($browser, 4)) < 9) {
                return false;
            }
        }
        return true;
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

    /**
     * 会员通过弹窗Ajax登录
     */
    public function ajax_login()
    {
        if (IS_POST) {
            if ($this->_db->user_login()) {
                $this->ajax('success');
            } else {
                $this->ajax($this->_db->error);
            }
        } else {
            $this->display();
        }
    }
}