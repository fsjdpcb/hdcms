<?php

/**
 * 字段组管理
 * Class FormGroupController
 * @author 后盾向军 <2300071698@qq.com>
 */
class FormGroupController extends AddonController
{
    private $db;

    public function __init()
    {
        $this->db = K('FormGroup');//模型
    }

    //字段组列表
    public function index()
    {
        $data = $this->db->all();
        $this->assign('data', $data);
        $this->display();
    }

    //添加组
    public function add()
    {
        if (IS_POST) {
            if ($this->db->addFormGroup()) {
                $this->success('添加成功');
            } else {
                $this->error($this->db->error);
            }
        } else {
            $this->display();
        }
    }

    //修改表单组
    public function edit()
    {
        if (IS_POST) {
            if ($this->db->editFormGroup()) {
                $this->success('修改成功');
            } else {
                $this->error($this->db->error);
            }
        } else {
            $this->field = $this->db->find(Q('id'));
            $this->display();
        }
    }
    //删除表单组
    public function del(){
        if ($this->db->delFormGroup()) {
            $this->success('删除成功');
        } else {
            $this->error($this->db->error);
        }
    }
}