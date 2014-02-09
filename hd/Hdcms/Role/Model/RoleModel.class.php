<?php

/**
 * 角色模型
 * Class RoleModel
 * @author hdxj <houdunwangxj@gmail.com>
 */
class RoleModel extends RelationModel
{
    //操作表
    public $table = 'role';
    //多表关联
    public $join = array(
        "access" => array(
            "type" => HAS_MANY,
            "foreign_key" => "rid",
            "parent_key" => "rid"
        )
    );

    /**
     * 删除角色
     */
    public function del_role()
    {
        $rid = Q('rid', null, 'intval');
        //删除角色
        if ($this->del($rid)) {
            //当前角色用户更改为0,即无后台管理权限
            M('user')->where("rid=$rid")->save(array('rid' => 0));
            return true;
        }
    }
}