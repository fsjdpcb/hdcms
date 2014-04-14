<?php

/**
 * 评论模型
 * Class CommentModel
 */
class CommentModel extends ViewModel
{
    public $table = 'comment';
    public $_cid;
    public $_aid;
    public $auto = array(
        //添加评论时间
        array('pubtime', 'time', 'function', 2, 1),
        //评论uid
        array('uid', '_get_uid', 'method', 2, 3),
        //评论状态
        array('comment_state', '_get_comment_state', 'method', 2, 3)
    );

    //根据配置文件设置评论状态
    public function _get_comment_state()
    {
        return $_SESSION['comment_state'];
    }

    //获得完成用户uid
    public function _get_uid()
    {
        return session('uid');
    }

    //构造函数
    public function __init()
    {
        $this->_cid = Q('cid', null, 'intval');
        $this->_aid = Q('aid', null, 'intval');
    }

    //表关联
    public $view = array(
        //用户表
        'user' => array(
            'type' => INNER_JOIN,
            'on' => 'comment.uid=user.uid'
        ),
        //头像
        "user_icon" => array(
            'type' => LEFT_JOIN,
            'on' => 'comment.uid=user_icon.user_uid'
        )
    );

    /**
     * 获得评论列表
     */
    public function get_comment()
    {
        $where = "comment_state=1 AND cid=" . $this->_cid . " AND aid=" . $this->_aid;
        $count = $this->join()->where($where)->where("pid=0 ")->count();
        $page = new Page($count, 15);
        $data = array();
        if ($count) {
            //获得1级回复的id
            $result = $this->where($where)->where("pid=0 ")->limit($page->limit())->order("comment_id desc")->getField('comment_id', true);
            $comment_id = implode(',', $result);
            $data = $this->where("comment_state=1 AND (comment_id IN ($comment_id) OR reply_comment_id IN ($comment_id))")
                    ->order("comment_id ASC")->all();
            //设置头像(没有头像的用户使用默认头像)
            $data = $this->set_icon($data);
        }
        //获得多层
        $data = Data::channelLevel($data, 0, '', 'comment_id');
        return array('page' => $page->show(), 'data' => $data);
    }


    /**
     * 设置头像
     * @param mixed $data
     * @return mixed
     */
    private function set_icon($data)
    {
        if (empty($data)) return array();
        foreach ($data as $n => $d) {
            $data[$n]['icon50'] = $d['icon50'] ? $d['icon50'] : __ROOT__ . "/data/image/user/50-gray.png";
        }
        return $data;
    }

    /**
     * 发表评论
     */
    public function add_comment()
    {
        if ($this->create()) {
            return $this->add();
        }
    }

    /**
     * 获得一条评论
     * @param $comment_id
     * @return mixed
     */
    public function get_one($comment_id)
    {
        $field = $this->find($comment_id);
        //设置头像
        $field['icon50'] = $field['icon50'] ? $field['icon50'] : __ROOT__ . "/data/image/user/50-gray.png";
        return $field;
    }
}