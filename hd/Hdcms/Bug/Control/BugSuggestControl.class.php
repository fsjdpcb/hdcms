<?php

/**
 * HDCMS系统反馈管理
 * 只供后盾网官方使用
 * Class BugControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class BugSuggestControl extends Control
{
    //模型
    public $_db;
    //角色rid
    public $rid;

    public function __init()
    {
        $this->_db = K("BugSuggest");
    }

    //反馈建议
    public function suggest()
    {
        if ($this->_db->add_suggest()) {
            $this->success(":) 您的建议我们已经收到，谢谢！");
        } else {
            $this->error(":( 服务器异常，请稍候再试");
        }
    }
}

?>