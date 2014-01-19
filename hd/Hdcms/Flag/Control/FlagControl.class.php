<?php

/**
 * 内容属性管理
 * Class ContentControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class FlagControl extends AuthControl
{
    //模型
    protected $_db;

    public function __init()
    {
        parent::__init();
        $this->_db = K("Flag");
    }

    //属性列表
    public function index()
    {
        $flag = $this->_db->all();
        $this->flag = $flag;
        $this->display();
    }

    //删除属性
    public function del()
    {
        if ($this->_db->del_flag()) {
            $this->ajax(array('state' => 1, 'message' => '删除成功'));
        }
    }

    //修改属性
    public function edit()
    {
        if ($this->_db->edit_flag()) {
            $this->ajax(array('state' => 1, 'message' => '修改成功'));
        }
    }

    //添加属性
    public function add()
    {
        if (IS_POST) {
            if ($this->_db->add_flag()) {
                $this->ajax(array('state' => 1, 'message' => '添加成功'));
            }
        } else {
            $this->display();
        }
    }
}