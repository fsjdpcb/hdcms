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
    public function addRole()
    {
        if (empty($_POST['rname'])) {
            $this->error = '角色名不能为空';
        }
        if ($this->where(array('rname' => $_POST['rname']))->find()) {
            $this->error = '角色已经存在';
            return false;
        }
        if ($this->add()) {
            return $this->updateCache();
        }
    }

    //添加角色
    public function editRole()
    {
        if (empty($_POST['rname'])) {
            $this->error = '角色名不能为空';
        }
        if ($this->where("rname='{$_POST['rname']}' AND rid!={$_POST['rid']}")->find()) {
            $this->error = '角色已经存在';
            return false;
        }
        if ($this->save()) {
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
        $member_role = $this->where('admin=0')->all();
        $admin_role = $this->where('admin=1')->all();
        S('role', $role, 0);
        S('admin_role', $admin_role, 0);
        S('member_role', $member_role, 0);
        return true;
    }

}
