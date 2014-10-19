<?php

/**
 * Comment 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class IndexController extends AddonController
{
    public $db;
    public $mid;
    public $cid;
    public $aid;
    public $model;
    public $category;

    public function __init()
    {
        $this->db = M('addon_comment');
        $this->mid = Q('mid', 0, 'intval');
        $this->cid = Q('cid', 0, 'intval');
        $this->aid = Q('aid', 0, 'intval');
        $this->model = S('model');
        $this->category = S('category');
        if (!isset($this->model[$this->mid]) || !isset($this->category[$this->cid])) {
            $this->error('页面不存在');
        }
    }

    public function index()
    {
        $map = "mid={$this->mid} and aid={$this->aid}";
        $count = $this->db->where($map)->count();
        $page = new Page($count, 10);
        $data = $this->db->limit($page->limit())->where($map)->order('comment_id DESC')->all();
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->assign('page', $page->show());
        $this->display();
    }

    //发表评论
    public function addComment()
    {
        //没有登录并且没有开启游客评论
        if (!IS_LOGIN && !C('ADDON.TOURISTS_COMMENT')) {
            $this->error('登陆用户才可发表评论。');
        }
        //----------完善数据
        $_POST['userid'] = $_SESSION['user']['uid'];
        $_POST['username'] = $_SESSION['user']['username'];
        $_POST['comment_status'] = 1;
        $_POST['create_time'] = time();
        $_POST['ip'] = ip_get_client();
        $_POST['content'] = Q('post.content');
        if (empty($_POST['content'])) {
            $this->error('评论内容不能为空');
        }
        //-----------回复处理
        if ($comment_id = Q('get.comment_id', 0, 'intval')) {
            $data = $this->db->find($comment_id);
            if ($data['reply']) { //回复另一个回复
                $_POST['content'] = '<div class="comment-content">' . $data['content'] . '</div>' . $_POST['content'];
                $replace ='<span class="comment-info">' . $data['username'] . ' 于 ' . date('Y-m-d H:i:s', $data['create_time']) .'发布</span>';
                $_POST['content'] = str_replace('<span></span>',$replace , $_POST['content']);
            } else { //回复评论
                $_POST['content'] = '<div class="comment-content"><span class="comment-info">' . $data['username'] . ' 于 ' . date('Y-m-d H:i:s', $data['create_time']) .
                    '发布</span>' . $data['content'] . '</div><span></span>' . $_POST['content'];
            }
            $_POST['reply'] = 1;
        }
        if ($this->db->create()) {
            if ($this->db->add()) {
                $this->success('发表成功');
            } else {
                $this->error($this->db->error);
            }
        } else {
            $this->error($this->db->error);
        }
    }
}