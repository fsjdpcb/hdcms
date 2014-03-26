<?php

class UserControl extends MemberAuthControl
{
    public $_db;

    //构造函数
    public function __init()
    {
        $this->_db = K("User");
    }

    /**
     * 修改昵称
     */
    public function edit_nickname()
    {
        $this->_db->edit_nickname();
        $this->_ajax(1, '修改昵称成功!');
    }
}