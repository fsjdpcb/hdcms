<?php

/**
 * 导航菜单模块
 * Class NavigationControl
 */
class AdminController extends AuthController
{
    private $db;

    public function __init()
    {
        $this->db = M("addon_navigation");
    }

    //导航列表
    public function index()
    {
        $this->assign('navigation', $this->db->order('list_order ASC')->all());
        $this->display();
    }

    //添加导航
    public function add()
    {
        if (IS_POST) {
            if ($this->db->add()) {
                $this->success('添加导航成功！');
            }
        } else {
            $this->display();
        }
    }

    //修改导航
    public function edit()
    {
        if (IS_POST) {
            if ($this->db->save()) {
                $this->success('修改成功！');
            }
        } else {
            $nid = Q('nid', 0, 'intval');
            $this->assign('field', $this->db->find('nid=' . $nid));
            $this->display();
        }
    }

    //删除导航
    public function del()
    {
        if ($this->db->del(Q('nid'))) {
            $this->success('删除导航成功');
        }
    }

    //更新排序
    public function update_order()
    {
        $menu_order = Q("post.list_order");
        if ($menu_order) {
            foreach ($menu_order as $nid => $order) {
                //排序
                $order = intval($order);
                $this->db->save(array(
                    "nid" => $nid,
                    "list_order" => $order
                ));
            }
        }
        $this->success('更改排序成功');
    }
}