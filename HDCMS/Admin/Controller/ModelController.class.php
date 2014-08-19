<?php

/**
 * 内容模型管理模块
 * Class ModelControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class ModelController extends AuthController
{
    private $db, $model, $mid;

    //构造函数
    public function __init()
    {
        $this->db = K('Model');
        $this->model = S('model');
        $this->mid = Q('mid', 0, 'intval');
    }

    //模型列表
    public function index()
    {
        $this->assign('model', $this->model);
        $this->display();
    }

    //更新缓存
    public function updateCache()
    {
        if ($this->db->updateCache()) {
            $this->success('更新缓存成功');
        } else {
            $this->error($this->db->error);
        }
    }

    /**
     * 删除模型
     */
    public function del()
    {
        if ($this->db->delModel()) {
            $this->success('删除模型成功');
        } else {
            $this->error($this->db->error);
        }
    }

    //添加模型
    public function add()
    {
        if (IS_POST) {
            if ($this->db->addModel()) {
                $this->success('添加模型成功');
            } else {
                $this->error($this->db->error);
            }
        } else {
            $this->display();
        }
    }

    /**
     * 编辑模型
     */
    public function edit()
    {
        if (IS_POST) {
            //异步提交返回信息
            if ($this->db->editModel()) {
                $this->success('修改模型成功');
            } else {
                $this->error($this->db->error);
            }
        } else {
            $this->assign('field', $this->model[$this->mid]);
            $this->display();
        }
    }

    //Ajax验证模型名是否存在
    public function checkModelName()
    {
        $Model = M('model');
        if ($this->mid) {
            //编辑时验证模型名
            if (!$Model->find(array("model_name" => $_POST['model_name'], "mid" => array("neq" => $this->mid)))) {
                $this->ajax(1);
            }
        } else {
            //添加时验证模型名
            if (!$Model->find(array("model_name" => $_POST['model_name']))) {
                $this->ajax(1);
            }
        }
    }

    //Ajax验证模型表名是否已经存在
    public function checkTableName()
    {
        $Model = M('model');
        if (!$Model->tableExists($_POST['table_name'])) {
            $this->ajax(1);
        }
    }
}
