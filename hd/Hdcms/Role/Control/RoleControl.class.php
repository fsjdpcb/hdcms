<?php

/**
 * 后台RBAC角色管理
 * Class RoleControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class RoleControl extends AuthControl
{
    //模型
    private $_db;
    //角色rid
    private $_rid;

    //构造函数
    public function __init()
    {
        $this->_db = K('Role');
        $this->_rid = Q('request.rid', null, 'intval');
    }

    public function index()
    {
        $this->role = $this->_db->join()->where('admin=1')->all();
        $this->display();
    }

    /**
     * 添加角色
     */
    public function add()
    {
        if (IS_POST) {
            if ($this->_db->create()) {
                if ($aid = $this->_db->add()) {
                    $this->_ajax(1, '添加角色成功！');
                }
            }
        } else {
            $this->display();
        }
    }

    /**
     * 验证角色是否存在
     */
    public function check_role()
    {
        //角色名称
        $rname = Q('rname', NULL, 'trim');
        //角色ID（编辑角色时验证）
        $rid = Q('rid', NULL, 'intval');
        if ($rid) {
           $this->_db->join()->where("rid <>$rid");
        }
        //编辑角色时验证
        $stat = $this->_db->join()->where("rname ='$rname'")->find() ? 0 : 1;
        $this->ajax($stat);
    }

    /**
     * 编辑角色
     */
    public function edit()
    {
        if (Q('post.rid')) {
            M('role')->save();
            $this->_ajax(1, '修改角色成功！');
        } else {
            $this->assign('field', M('role')->find($this->_rid));
            $this->display();
        }
    }

    /**
     * 删除角色
     */
    public function del()
    {
        $rid = Q('rid', null, 'intval');
        if ($rid) {
            //用户组关联表
            $this->_db->del($rid);
            $this->_ajax(1, '删除角色成功！');
        }
    }
}