<?php

/**
 * 菜单管理(权限节点)
 * Class MenuModel
 * @author hdxj <houdunwangxj@gmail.com>
 */
class NodeModel extends Model
{
    /**
     * 添加节点
     */
    public function add_node()
    {
        if ($this->create()) {
            return $this->add();
        }
    }

    /**
     * 修改节点
     */
    public function edit_node()
    {
        if ($this->create()) {
            return $this->save();
        }
    }

    /**
     * 删除节点
     */
    public function del_node()
    {
        $nid = Q("nid");
        $state = $this->where(array("pid" => $nid))->find();
        if (!$state) {
            return $this->del($nid);
        } else {
            $this->error = '请删除子菜单';
            return false;
        }
    }

    //更新缓存
    public function updateCache()
    {
        $data = $this->order(array("list_order" => "ASC", 'nid' => 'ASC'))->all();
        $node = Data::tree($data, "title", "nid", "pid");
        return F("node", $node,CACHE_DATA_PATH);
    }

    function __after_insert($data)
    {
        $this->updateCache($data);
    }

    function __after_update($data)
    {
        $this->updateCache($data);
    }

    function __after_delete($data)
    {
        $this->updateCache($data);
    }

}