<?php

/**
 * ContentKeywords 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class AdminController extends AddonController
{
    private $db;

    public function __init()
    {
        $this->db = M('addon_content_keywords');
    }

    public function index()
    {
        $data = $this->db->all();
        $this->assign('data', $data);
        $this->display();
    }

    //添加关键词
    public function add()
    {
        if (IS_POST) {
            if ($this->db->add()) {
                $this->success('添加成功', 'index');
            } else {
                $this->error('添加失败');
            }
        } else {
            $this->display();
        }
    }

    //修改
    public function edit()
    {
        if (IS_POST) {
            if ($this->db->save()) {
                $this->success('修改成功', 'index');
            } else {
                $this->error('修改失败');
            }
        } else {
            $field = $this->db->find(Q('id'));
            $this->assign('field', $field);
            $this->display();
        }
    }

    //删除关键词
    public function del()
    {
        $this->db->del(Q('id'));
        $this->success('操作成功');
    }
}