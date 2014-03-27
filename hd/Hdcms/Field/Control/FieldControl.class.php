<?php

/**
 * 模型字段管理
 * Class ModelControl
 */
class FieldControl extends AuthControl
{
    //模型mid
    private $_mid;
    //模型缓存
    private $_model;
    //字段缓存
    private $_field;
    //模型对象
    private $_db;
    //字段fid
    private $_fid;

    //构造函数
    public function __init()
    {
        //模型mid
        $this->_mid = Q("mid", null, "intval");
        //验证模型mid
        if (!$this->_mid) {
            $this->error("模型不存在！");
        }
        //模型缓存
        $this->_model = F("model");
        //字段缓存
        $this->_field = F($this->_mid, false, FIELD_CACHE_PATH);
        //字段fid
        $this->_fid = Q("fid", null, "intval");
        //模型对象
        $this->_db = K("Field");
    }

    /**
     * 字段列表
     */
    public function index()
    {
        $this->field= $this->_field;
        $this->display();
    }

    /**
     * 更新字段排序
     */
    public function updateFieldSort()
    {
        $orders = Q("post.fieldsort");
        if ($orders) {
            $db = K("Field");
            foreach ($orders as $k => $v) {
                $db->save(array("fid" => $k, "fieldsort" => $v));
            }
            $db->updateCache(intval($_GET['mid']));
            $this->ajax(1, "text");
        }
    }

    /**
     * 添加字段
     */
    public function add()
    {
        if (IS_POST) {
            if ($this->_db->add_field()) {
                $this->ajax(array('state' => 1, 'message' => '添加字段成功'));
            }
        } else {
            $this->model = $this->_model[$this->_mid];
            $this->display();
        }
    }
    //修改字段
    public function edit()
    {
        if (IS_POST) {
            if ($this->_db->create() && $this->_db->save()) {
                $this->_ajax(1, '修改成功');
            }
        } else {
            if ($this->_fid) {
                $field = $this->_field[$this->_fid];
                /**
                 * 设置validation的默认值
                 * 在js的field_check表单验证函数中validation不能为空,所以validation不能为空
                 * 在编辑时如果validation=="''"时，表单显示空
                 */
                $this->field= $field;
                $this->display();
            }
        }
    }
    //验证字段是否已经存在
    public function field_is_exists()
    {
        $state = $this->_db->check_field_exists()?0:1;
        $this->ajax($state);
    }

    //选择字段类型模板
    public function get_field_tpl()
    {
        //模板类型如add edit
        $tplDir = Q("post.tpl_type");
        //字段类型如input textarea
        $field = Q("post.field_type");
        $this->display(TPL_PATH . "Form/{$tplDir}/" . $field);
    }

    /**
     * 删除字段
     */
    public function del()
    {
        if ($this->_fid) {
            if ($this->_db->del_field())
                $this->ajax(array('state' => 1, 'message' => '字段删除成功'));
        }
    }



    //更新字段缓存
    public function update_cache()
    {
        $this->_db->update_cache();
        $this->ajax(array('state' => 1, 'message' => '更新缓存成功'));
    }
}