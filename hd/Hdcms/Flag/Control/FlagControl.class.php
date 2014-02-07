<?php

/**
 * 内容属性管理
 * Class ContentControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class FlagControl extends AuthControl
{
    //模型
    private $_db;
    //属性缓存
    private $_flag;

    public function __init()
    {
        parent::__init();
        $this->_db = K("Flag");
        $this->_flag = F('flag');
    }

    //属性列表
    public function index()
    {
        $this->flag = $this->_flag;
        $this->display();
    }

    //删除属性
    public function del()
    {
        if ($this->_db->del_flag()) {
            $this->_ajax(1, '删除成功');
        }
    }

    //修改属性
    public function edit()
    {
        if ($this->_db->edit_flag()) {
            $this->_ajax(1, '修改成功');
        }
    }

    //添加属性
    public function add()
    {
        if (IS_POST) {
            if ($this->_db->add_flag()) {
                $this->_ajax(1, '添加成功');
            }
        } else {
            $this->display();
        }
    }

    /**
     * 更新缓存
     */
    public function update_cache()
    {
        if ($this->_db->update_cache()) {
            $this->_ajax(1, '缓存更新成功');
        }
    }
}