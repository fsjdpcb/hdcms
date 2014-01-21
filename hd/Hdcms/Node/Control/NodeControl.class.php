<?php

/**
 * 权限节点管理
 * Class NodeControl
 * @author hdxj <houdunwangxj@gmail.com>
 */
class NodeControl extends AuthControl
{
    //模型
    private $_db;
    //节点树
    private $_node;

    public function __init()
    {
        parent::__init();
        //获得模型实例
        $this->_db = K("Node");
        $this->_node = F("node");
    }

    //节点列表
    public function index()
    {
        $this->node = $this->_node;
        $this->display();
    }

    //添加节点
    public function add()
    {
        if (IS_POST) {
            if ($this->_db->add_node()) {
                $this->ajax(array('state' => 1, 'message' => '添加节点成功'));
            }
        } else {
            //配置菜单列表
            $this->node = $this->_node;
            $this->display();
        }
    }

    //删除节点
    public function del()
    {
        if ($this->_db->del_node()) {
            $this->ajax(array('state' => 1, 'message' => '删除节点成功'));
        } else {
            $this->ajax(array('state' => 0, 'message' => $this->_db->error));
        }
    }

    //修改节点
    public function edit()
    {
        if (IS_POST) {
            if($this->_db->edit_node()){
                $this->ajax(array('state' => 1, 'message' => '修改节点成功'));
            }
        } else {
            $nid=Q('nid');
            $this->field = $this->_node[$nid];
            foreach($this->_node as $id=>$node){
                $this->_node[$id]['disabled']=Data::isChild($this->_node,$id,$nid,'nid')?' disabled="disabled" ':'';
            }
            $this->node = $this->_node;
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
            $this->_db->save(array(
                "nid" => $nid,
                "list_order" => $order
            ));
        }
        $this->ajax(array('state'=>1,'message'=>'更改排序成功'));
    }

    //更新缓存
    public function update_cache()
    {
        if ($this->_db->update_cache()) {
            $this->ajax(array('state' => 1, 'message' => '更新缓存成功'));
        }
    }
}















