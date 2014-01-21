<?php

class SingleModel extends Model
{
    //表
    public $table = 'content_single';
    //自动完成
    public $auto = array(
        array('addtime', 'time', 'function', 2, 1),
        array('updatetime', 'get_update_time', 'method', 2, 3),
        array('uid', 'get_uid', 'method', 2, 1)
    );

    //添加内容时获得发布者id
    protected function get_uid()
    {
        return session('uid');
    }

    //修改时间处理
    protected function get_update_time($v)
    {
        return empty($v) ? time() : strtotime($v);
    }

    /**
     * 添加内容
     */
    public function add_content()
    {
        if ($this->create()) {
            return $this->add();
        }
    }

    /**
     * 修改内容
     */
    public function edit_content()
    {
        if ($this->create()) {
            return $this->save();
        }
    }

}