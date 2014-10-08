<?php

/**
 * CustomForm 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class AdminController extends AddonController
{
    private $db;

    public function __init()
    {
        $this->db = K('Data');//模型
    }

    //字段组列表
    public function index()
    {
        //获得表单组
        $group = M('addon_custom_form_group')->all();
        $this->assign('group',$group);
        $data = $this->db->getForm();
        $this->assign('data', $data);
        $this->display();
    }

    //显示表单内容
    public function showForm()
    {
        $id = Q('id', 0, 'intval');
        if (!$id) $this->error('参数错误');
        $field = $this->db->get();
        $data = $this->db->find($id);
        $this->assign('data', $data);
        $this->assign('field', $field);
        $this->display();
    }

    //审核文档
    public function audit()
    {
        if ($this->db->save()) {
            $this->success('操作成功', 'index');
        } else {
            $this->error('操作失败');
        }
    }

    //删除会员表单
    public function del()
    {
        $id = Q('id', 0, 'intval');
        if (!$id) $this->error('参数错误');
        if ($this->db->del($id)) {
            $this->success('删除成功', 'index');
        } else {
            $this->error('操作失败');
        }
    }
}























