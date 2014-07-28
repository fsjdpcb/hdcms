<?php

/**
 * 权限节点管理
 * Class NodeControl
 * @author hdxj <houdunwangxj@gmail.com>
 */
class NodeController extends AuthController
{
    //模型
    private $db;
    //节点树
    private $node;

    public function __init()
    {
        //获得模型实例
        $this->db = K("Node");
        $this->node = F("node",false,CACHE_DATA_PATH);
    }

    //节点列表
    public function index()
    {
        $this->assign('node', $this->node);
        $this->display();
    }

    //添加节点
    public function add()
    {
        if (IS_POST) {
            if ($this->db->addNode()) {
                $this->success('添加节点成功');
            }
        } else {
            //配置菜单列表
            $this->assign('node', $this->node);
            $this->display();
        }
    }

    //删除节点
    public function del()
    {
        if ($this->db->delNode()) {
            $this->success('删除节点成功');
        } else {
            $this->error($this->db->error);
        }
    }

    //修改节点
    public function edit()
    {
        if (IS_POST) {
            if ($this->db->editNode()) {
                $this->success('修改节点成功');
            }
        } else {
            $nid = Q('nid');
            $this->field = $this->node[$nid];
            foreach ($this->node as $id => $node) {
                $this->node[$id]['disabled'] = Data::isChild($this->node, $id, $nid, 'nid') ? ' disabled="disabled" ' : '';
            }
            $this->assign('node', $this->node);
            $this->display();
        }
    }

    //更改菜单排序
    public function update_order()
    {
        $menu_order = Q("post.list_order");
        foreach ($menu_order as $nid => $order) {
            //排序
            $order = intval($order);
            $this->db->save(array(
                "nid" => $nid,
                "list_order" => $order
            ));
        }
        $this->success('更改排序成功');
    }

    //更新缓存
    public function update_cache()
    {
        if ($this->db->updateCache()) {
            $this->success('更新缓存成功');
        }
    }
}















