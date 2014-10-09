<?php

/**
 * 链接菜单模块
 * Class NavigationControl
 */
class AdminController extends AddonAuthController
{
    private $db;

    public function __init()
    {
        $this->db = M("addon_link");
    }

    //链接列表
    public function index()
    {
        $this->assign('data', $this->db->order('list_order ASC')->all());
        $this->display();
    }

    //添加链接
    public function add()
    {
        if (IS_POST) {
            $upload = new Upload();
            $path = $upload->upload('logo');
            if ($path) {
                $_POST['logo'] = __ROOT__ . '/' . $path[0]['path'];
            }
            if ($this->db->add()) {
                $this->success('添加链接成功！', 'index');
            }
        } else {
            $this->display();
        }
    }

    //修改链接
    public function edit()
    {
        if (IS_POST) {
            $upload = new Upload();
            $path = $upload->upload('logo');
            if ($path) {
                $_POST['logo'] = __ROOT__ . '/' . $path[0]['path'];
            }
            if ($this->db->save()) {
                $this->success('修改成功！', 'index');
            }
        } else {
            $nid = Q('id', 0, 'intval');
            $this->assign('field', $this->db->find($nid));
            $this->display();
        }
    }

    //删除链接
    public function del()
    {
        $id = Q('id');
        $data = $this->db->find($id);
        if (is_file($data['logo'])) {
            @unlink($data['logo']);
        }
        if ($this->db->del($id)) {
            $this->success('删除链接成功');
        }
    }

    //更新排序
    public function updateOrder()
    {
        $menu_order = Q("post.list_order");
        if ($menu_order) {
            foreach ($menu_order as $nid => $order) {
                //排序
                $order = intval($order);
                $this->db->save(array(
                    "id" => $nid,
                    "list_order" => $order
                ));
            }
        }
        $this->success('更改排序成功');
    }
}