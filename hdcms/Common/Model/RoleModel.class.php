<?php

/**
 * 角色
 * Class RoleModel
 * @author hdxj <houdunwangxj@gmail.com>
 */
class RoleModel extends Model
{
    public $table = 'role';

    //添加角色
    public function addRole($data)
    {
        if (empty($data['rname'])) {
            $this->error = '角色名不能为空';
        }
        if ($this->where(array('rname' => $data['rname']))->find()) {
            $this->error = '角色已经存在';
            return false;
        }
        if ($this->add($data)) {
            return $this->updateCache();
        }
    }

    //添加角色
    public function editRole($data)
    {
        if (empty($data['rname'])) {
            $this->error = '角色名不能为空';
        }
        if ($this->where("rname='{$data['rname']}' AND rid!={$data['rid']}")->find()) {
            $this->error = '角色已经存在';
            return false;
        }
        if ($this->save($data)) {
            return $this->updateCache();
        }
    }

    //删除用户
    public function delRole($rid)
    {
        $this->del($rid);
        M("user")->where(array('rid' => $rid))->save(array('rid' => 4));
        return $this->updateCache();
    }

    //更新缓存
    public function updateCache()
    {
        $role = $this->all();
        if (F('role', $role, CACHE_DATA_PATH)) {
            return true;
        } else {
            $this->error = '缓存更新失败';
            return true;
        }
    }

}
