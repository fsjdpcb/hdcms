<?php

/**
 * 评论插件
 * Class CommentControl
 */
class CommentControl extends CommonControl
{
    //评论模型
    private $_db;

    //构造函数
    public function __init()
    {
        $this->_db = K("Comment");
    }

    /**
     * 发表评论
     */
    public function add()
    {
        if ($this->_db->add_comment()) {
            $this->_ajax(1, '发表成功');
        } else {
            $this->_ajax(0, $this->_db->error);
        }
    }

    /**
     * 加载评论
     */
    public function load_comment()
    {
        $start = Q('start', 'intval', 0);
        //如果登录用户，包含自己的信息
        $where_current_user = $this->_uid ? " OR from_username='{$this->_username}'" : '';
        //每次加载数
        $end = C('COMMENT_ROWS');
        $data = $this->_db->where("pid=0 AND (comment_state=1 $where_current_user)")
            ->order('comment_id DESC')->limit($start, $end)->all();
//        p($data);
        if (empty($data)) {
            exit;
        }
        $_comment = array();
        foreach ($data as $n => $v) {
            $where = "pid={$v['comment_id']} AND (comment_state=1 $where_current_user)";
            //回复处理
            $v['_reply'] = $this->_db->where($where)->all();
            $_comment[] = $v;
        }
        $this->comment = $_comment;
        $this->display('comment');
        exit;
    }
}

























