<?php

/**
 * 配置组管理
 * Class ConfigGroupController
 * @author 后盾向军 <2300071698@qq.com>
 */
class ConfigGroupController extends AuthController
{
    private $db;

    public function __init()
    {
        $this->db = K('ConfigGroup');
    }

    //配置组列表
    public function index()
    {
        //获取组列表
        $data = $this->db->getGroup(1);
        $this->assign('data', $data);
        $this->display();
    }

    //添加组
    public function add()
    {
        if (IS_POST) {
            if ($this->db->addConfigGroup()) {
                $this->success('添加成功');
            } else {
                $this->error($this->db->error);
            }
        } else {
            $this->display();
        }
    }

    //修改组
    public function edit()
    {
        if (IS_POST) {
            if ($this->db->editConfigGroup()) {
                $this->success('修改成功');
            } else {
                $this->error($this->db->error);
            }
        } else {
            $field = $this->db->getCgName();
            if (!$field) {
                $this->error($this->db->error);
            } else {
                $this->assign("field", $field);
                $this->display();
            }
        }
    }

    //删除配置组
    public function del()
    {
        if ($this->db->delConfigGroup()) {
            $this->success('删除成功');
        } else {
            $this->error($this->db->error);
        }
    }

    //验证组是否存在
    public function check_cgname()
    {
        //组名称
        $cgname = Q('cgname');
        //编辑时排除当前配置组
        if ($cgid = Q('cgid')) {
            $map['cgid'] = array('NEQ', $cgid);
        }
        $map['cgname'] = array('EQ', $cgname);
        echo $this->db->where($map)->find() ? 0 : 1;
        exit;
    }

    //验证组标题
    public function check_cgtitle()
    {
        //组名称
        $cgtitle = Q('cgtitle');
        //编辑时排除当前配置组
        if ($cgid = Q('cgid')) {
            $map['cgid'] = array('NEQ', $cgid);
        }
        $map['cgtitle'] = array('EQ', $cgtitle);
        echo $this->db->where($map)->find() ? 0 : 1;
        exit;
    }
}