<?php

/**
 * 收藏夹管理
 * Class FavoriteController
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class FavoriteController extends AuthController
{
    private $db;
    private $category;
    private $model;
    private $mid;
    private $cid;
    private $aid;

    public function __init()
    {
        $this->db = M('favorite');
        $this->model = S('model');
        $this->category = S('category');
        $this->mid = Q('mid', 0, 'intval');
        $this->cid = Q('cid', 0, 'intval');
        $this->aid = Q('aid', 0, 'intval');
        if (!$this->mid || !isset($this->model[$this->mid])) {
            $this->error('文章不存在');
        }
        if (!$this->cid || !isset($this->category[$this->cid])) {
            $this->error('文章不存在');
        }
        if (!$this->aid) {
            $this->error('文章不存在');
        }
    }

    //加入收藏夹
    public function add()
    {
        $ContentModel = ContentViewModel::getInstance($this->mid);
        $content = $ContentModel->where($ContentModel->table.'.aid='.$this->aid)->find();
        $data['mid'] = $this->mid;
        $data['cid'] = $this->cid;
        $data['aid'] = $this->aid;
        $data['user_id'] = $_SESSION['user']['uid'];
        $data['title'] = $content['title'];
        $url = U('Index/Index/content', array('mid' => $this->mid, 'cid' => $this->cid, 'aid' => $this->aid));
        if ($this->db->where(array('mid' => array('EQ', $this->mid), 'aid' => array('EQ', $this->aid)))->find()) {
            $this->error('文章已经收藏', $url);
        }
        if ($this->db->add($data)) {
            $this->success('收藏成功');
        } else {
            $this->error('收藏失败。。。');
        }
    }
}