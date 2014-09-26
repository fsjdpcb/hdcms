<?php

/**
 * 栏目权限
 * Class CategoryAccessModel
 * @author 后盾向军<houdunwangxj@gmail.com>
 */
class CategoryAccessModel extends Model
{
    public $table = 'category_access';

    /**
     * 验证栏目权限,站长与超管理不验证
     * @param $cid 栏目cid
     * @param $rid 角色rid
     * @param $action 验证动作
     * @return boolean
     */
    public function checkAccess($cid, $rid, $action)
    {
        //站长与超级管理员不验证
        if ($rid == 1) {
            return true;
        } else {
            $map['cid'] = $cid;
            $access = $this->where($map)->getField('rid,`add`,`edit`,`del`,`content`');
            if (empty($access)) {
                return true;
            } else {
                return isset($access[$rid]) && $access[$rid][$action];
            }
        }
    }
}