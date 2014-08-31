<?php

/**
 * 会员中心首页
 * Class IndexController
 */
class IndexController extends AuthController
{

    public function index()
    {
        //获取收藏夹文章
        $data = $this->getFavoritesAricle();
        $this->assign($data);
        $this->display();
    }

    //获取收藏夹文章
    public function getFavoritesAricle()
    {
        $ContentModel = ContentViewModel::getInstance(1);
        $where = [];
        $page = new Page($ContentModel->where($where)->count(), 6);
        $data = $ContentModel->where($where)->limit($page->limit())->order('arc_sort ASC,addtime DESC')->all();
        return array('data'=>$data,'page'=>$page->show());
    }
}