<?php

/**
 * Class CommonControl
 * 发表评论
 */
class CommentControl extends CommonControl
{
    //模型
    private $_db;
    //栏目cid
    private $_cid;
    //文章aid
    private $_aid;

    //构造函数
    public function __init()
    {
        $this->_db = K("Comment");
        $this->_cid = Q('cid', null, 'intval');
        $this->_aid = Q('cid', null, 'intval');
        //栏目与文章aid必须存在
        if(!$this->cid || !$this->_aid){
            exit;
        }
    }

    //显示评论列表
    public function show()
    {
        $comment = $this->_db->get_comment()
        if($comment){
            $this->
        }
    }

    public function add()
    {

    }
}






















