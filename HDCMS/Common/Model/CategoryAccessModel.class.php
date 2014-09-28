<?php

/**
 * 栏目权限
 * Class CategoryAccessModel
 * @author 后盾向军<houdunwangxj@gmail.com>
 */
class CategoryAccessModel extends Model
{
    //操作表
    public $table = 'category_access';
    //栏目缓存
    private $category;
    //栏目权限缓存
    private $categoryAccess;

    //构造函数
    public function __init()
    {
        $this->category = S('category');
        $this->categoryAccess = S('categoryAccess');
    }

    /**
     * 验证栏目权限,站长与超管理不验证
     * @param $cid 栏目cid
     * @param $rid 角色rid
     * @param $action 验证动作
     * @return boolean
     */
    public function checkAccess($cid, $rid, $action)
    {
        //封面栏目与外链接栏目不允许发表
        if (!isset($this->category[$cid])) {
            $this->error = '栏目不存在';
            return false;
        } else if ($rid == 1) { //超级管理员不限
            return true;
        } else {
            $access = $this->getCategoryAccess($cid);
            if (empty($access)) {
                return true;
            } else if (isset($access[$rid]) && $access[$rid][$action]) {
                return true;
            } else {
                $this->error = '没有操作权限';
                return false;
            }
        }
    }

    //获得指定栏目所有权限
    public function getCategoryAccess($cid)
    {
        $access = array();
        foreach ($this->categoryAccess as $a) {
            if ($a['cid'] == $cid)
                $access[$a['rid']] = $a;
        }
        return $access;
    }

    //更新栏目权限
    public function updateCache()
    {
        $access = $this->all();
        return S('categoryAccess', $access ? $access : array());
    }
}