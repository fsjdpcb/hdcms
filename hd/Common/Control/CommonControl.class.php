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
        //消息数
        $this->message_count = M('user_message')->where('state=0 AND to_uid=' . $_SESSION['uid'])->count();
    }

    /**
     * 记录会员动态
     * @param $content
     */
    protected function add_dynamic($content)
    {
        $addtime=time();
        $content="<a href='".__ROOT__."?".$_SESSION['domain']."'><img src='".__ROOT__."/".session('icon50')."'
                            onmouseover='user.show(this,".session('uid').")'/></a> ".
            "<a href='".__ROOT__."?".$_SESSION['domain']."'>".session('nickname') . "</a> ".$content;
        M('user_dynamic')->add(array('uid' => $_SESSION['uid'], 'content' => $content, 'addtime' => $addtime));
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