<?php

/**
 * 菜单管理(权限节点)
 * Class MenuModel
 * @author hdxj <houdunwangxj@gmail.com>
 */
class NodeModel extends Model
{
    //添加节点
    public function addNode()
    {
        if ($this->create()) {
            $this->add();
            return $this->updateCache();
        }
    }

    //修改节点
    public function editNode()
    {
        if ($this->create()) {
            $this->save();
            return $this->updateCache();
        }
    }

    //删除节点
    public function delNode()
    {
        $nid = Q("nid");
        $state = $this->where(array("pid" => $nid))->find();
        if (!$state) {
            $this->del($nid);
            return $this->updateCache();
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
        return F("node", $node, CACHE_DATA_PATH);
    }
}