<?php

/**
 * 内容模型管理模块
 * Class ModelControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class ModelControl extends AuthControl
{
    //模型对象
    private $_db;
    //模型id
    private $_mid;
    //模型缓存
    private $_model;

    /**
     * 显示模型列表
     */
    public function __init()
    {
        parent::__init();
        $this->_db = K("Model");
        $this->_mid = Q("request.mid");
        $this->_model = cache("model", false);

    }

    /**
     * 模型列表
     */
    public function index()
    {
        $this->model = $this->_model;
        $this->display();
    }

    /**
     * 添加模型时Ajax验证模型是否存在
     */
    public function check_model()
    {
        $_db = M("model");
        if (isset($_POST['tablename'])) {
            if (!$_db->find("tablename='{$_POST['tablename']}'")) {
                $this->ajax(1);
            }
        }
    }

    /**
     * 更新缓存
     */
    public function update_cache()
    {
        if ($this->_db->update_cache()) {
            $this->_ajax(1,'更新缓存成功');
        }
    }

    /**
     * 删除模型
     */
    public function del()
    {
        if ($this->_db->del_model()) {
            $this->_ajax(1,'删除模型成功');
        } else {
            $this->_ajax(1,$this->_db->error);
        }
    }

    /**
     * 添加模型
     */
    public function add()
    {
        if (IS_POST) {
            if ($this->_db->add_model()) {
                $this->_ajax(1,'添加模型成功');
            }else{
                $this->_ajax(0,$this->_db->error);
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
            if ($this->_db->edit_model()) {
                $this->_ajax(1,'修改模型成功');
            }
        } else {
            $this->field = $this->_db->find($this->_mid);
            $this->display();
        }
    }

    //验证模型名是否存在
    public function check_model_name()
    {
        $model_name = Q("post.model_name");
        if ($this->_mid) {
            //编辑时验证模型名
            if (!$this->_db->find(array("model_name" => $model_name, "mid" => array("neq" => $this->_mid)))) {
                $this->ajax(1);
            }
        } else {
            //添加时验证模型名
            if (!$this->_db->find(array("model_name" => $model_name))) {
                $this->ajax(1);
            }
        }
        $this->ajax(0);
    }

    //验证模型表名是否已经存在
    public function check_table_name()
    {
        if (!$this->_db->isTable(Q('post.tablename'))) {
            $this->ajax(1);
        }
        $this->ajax(0);
    }


}