<?php

/**
 * 文章审核
 * Class ContentControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class ContentAuditController extends AuthController
{
    //模型缓存
    private $model;
    //模型mid
    private $mid;
    //栏目cid
    private $cid;

    //构造函数
    public function __init()
    {
        $this->model = S("model");
        $this->mid = Q('mid', 0, 'intval');
        if (!isset($this->model[$this->mid])) {
            $this->error("模型不存在！");
        }
    }

    //文章列表
    public function content()
    {
        $Model = ContentViewModel::getInstance($this->mid);
        $count = $Model->where('content_status=0')->count();
        $page = new Page($count, 15);
        $data = $Model->where('content_status=0')->limit($page->limit())->order('updatetime DESC')->all();
        $this->assign('data', $data);
        $this->assign('mid', $this->mid);
        $this->assign('model', $this->model);
        $this->assign('page', $page->show());
        $this->display();
    }

    //删除文章
    public function del()
    {
        $aids = Q("request.aid");
        if (!empty($aids)) {
            if (!is_array($aids)) {
                $aids = array($aids);
            }
            $Model = new Content($this->mid);
            foreach ($aids as $aid) {
                $Model->del($aid);
            }
            $this->success('删除成功');
        } else {
            $this->error('参数错误');
        }
    }

    //审核或取消审核
    public function audit()
    {
        $Model = ContentViewModel::getInstance($this->mid);
        //1 审核  0 取消审核
        $status = Q("status", 1, "intval");
        //文章id
        $aids = Q("post.aid");
        foreach ($aids as $aid) {
            $Model->save(array("aid" => $aid, "content_status" => $status));
        }
        $this->success('操作成功！', U('content', array('mid' => $this->mid)));
    }
}