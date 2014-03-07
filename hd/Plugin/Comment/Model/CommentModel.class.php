<?php

/**
 * 评论管理模型
 * Class CategoryModel
 * @author hdxj <houdunwangxj@gamil.com>
 */
class CommentModel extends ViewModel
{
    //栏目表
    public $table = "comment";
    //模型id
    private $_mid;
    //文章id
    private $_aid;
    //栏目id
    private $_cid;
    //关联表
    public $view = array(
        "user" => array(
            "type" => INNER_JOIN,
            "on" => "user.username=comment.from_username"
        )
    );
    //自动验证
    public $validate = array(
        array('content', 'check_content', '评论内容不能为空', 2, 3)
    );
    //自动完成
    public $auto = array(
        array('pid', 'intval', 'function', 2, 3),
        array('mid', 'intval', 'function', 2, 3),
        array('cid', 'intval', 'function', 2, 3),
        array('aid', 'intval', 'function', 2, 3),
        array('uid', 'auto_get_username', 'method', 2, 3),
        array('pubtime', 'time', 'function', 2, 3),
        array('ip', 'auto_get_ip', 'method', 2, 3),
        array('status', 'auto_status', 'method', 2, 3),
        array('content', 'intval', 'method', 2, 3)
    );

    //评论与回复内容验证
    public function check_content($name, $value, $msg, $arg)
    {
        return empty($value) ? $msg : true;
    }

    //评论与回复内容自动完成处理
    public function auto_content($v)
    {
        return htmlspecialchars(strip_tags(trim($v)));
    }
    //自动获取用户名
    public function auto_status($v)
    {
        return C('COMMENT_STATUS');
    }
    //自动获取用户名
    public function auto_get_username($v)
    {
        return session("uid");
    }
    //自动获取IP
    public function auto_get_ip($v)
    {
        return ip_get_client();
    }
    //构造函数
    public function __construct()
    {
        parent::__construct();
        $this->_mid = Q("mid", NULL, "intval");
        $this->_cid = Q("cid", NULL, "intval");
        $this->_aid = Q("aid", NULL, "intval");
    }
    //--------------------------------------------------------------------------------------

    //验证
    private function _check()
    {
        if (!$this->_mid || !$this->_cid || !$this->_aid || empty($_POST['content']) || !$this->create()) {
            $this->error('参数错误');
            return false;
        }
        return true;
    }

    /**
     * 发表评论
     */
    public function add_comment()
    {
        //验证参数
        if (!$this->_check()) return false;
        return $this->add();
    }
}





























