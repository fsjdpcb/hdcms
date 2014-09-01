<?php

/**
 * Comment 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class AdminController extends AddonController
{

    private $db;

    public function __init()
    {
        $this->db = M('addon_comment');
    }

    public function index()
    {
        $count = $this->db->count();
        $page = new Page($count, 10);
        $data = $this->db->limit($page->limit())->order("comment_id DESC")->all();
        $this->assign('data', $data);
        $this->assign('page', $page->show());
        $this->display();
    }

    public function del()
    {
        $comment_id = Q('comment_id', 0, 'intval');
        if ($this->db->del($comment_id)) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }
}