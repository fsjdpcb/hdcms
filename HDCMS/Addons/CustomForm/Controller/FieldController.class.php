<?php

/**
 * 字段管理
 * Class FieldController
 * @author 后盾向军 <2300071698@qq.com>
 */
class FieldController extends AddonController
{
    private $db;

    public function __init()
    {
        $this->db = K('FormField');//模型
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
            if ($this->db->addField()) {
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
            if ($this->db->editField()) {
                $this->success('修改成功');
            } else {
                $this->error($this->db->error);
            }
        } else {
            $this->field = $this->db->find(Q('fid'));
            $this->display();
        }
    }
    //删除表单组
    public function del(){
        if ($this->db->delField()) {
            $this->success('删除成功');
        } else {
            $this->error($this->db->error);
        }
    }
}