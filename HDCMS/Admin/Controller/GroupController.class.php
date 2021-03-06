<?php

/**
 * 会员组管理
 * Class GroupControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class GroupController extends AuthController
{
    //角色缓存
    private $role;
    //模型
    private $db;

    //构造函数
    public function __init()
    {
        $this->role = S('role');
        $this->db = K('Role');
    }

    //角色列表
    public function index()
    {
        $this->assign('data', M('role')->where('admin=0')->order('rid ASC')->all());
        $this->display();
    }

    /**
     * 添加角色
     */
    public function add()
    {
        if (IS_POST) {
            if ($aid = $this->db->addRole()) {
                $this->success('添加角色成功！');
            }
        } else {
            $this->display();
        }
    }

    //更新缓存
    public function updateCache()
    {
        if ($this->db->updateCache()) {
            $this->success('缓存更新成功');
        } else {
            $this->error($this->db->error);
        }
    }

    //验证角色是否存在
    public function checkRole()
    {
        $model = M('role');
        //角色名称
        $rname = Q('rname', NULL, 'trim');
        //角色ID（编辑角色时验证）
        $rid = Q('rid', NULL, 'intval');
        if ($rid) {
            $model->where(array('rid'=>array('NEQ',$rid)));
        }
        //编辑角色时验证
        $stat = $model->where("rname ='$rname'")->find() ? 0 : 1;
        $this->ajax($stat);
    }

    //编辑角色
    public function edit()
    {
        if (IS_POST) {
            if ($this->db->editRole($_POST)) {
                $this->success('修改角色成功！');
            } else {
                $this->error($this->db->error);
            }
        } else {
            $rid = Q('rid', 0, 'intval');
            if ($rid) {
                $this->assign('field', M('role')->find($rid));
                $this->display();
            }
        }
    }

    //删除角色
    public function del()
    {
        $rid = Q('rid', 0, 'intval');
        if ($rid) {
            //用户组关联表
            $this->db->delRole($rid);
            $this->success('删除角色成功！');
        }
    }
}