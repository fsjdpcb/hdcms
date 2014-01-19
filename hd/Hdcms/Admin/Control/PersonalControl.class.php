<?php

/**
 * 管理员个人信息管理模块
 * Class AdminControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class PersonalControl extends AuthControl
{
    //操作模型
    private $_db;
    //构造函数
    public function __construct()
    {
        $this->_db = K('Personal');
    }

    /**
     * 编辑个人信息
     */
    public function edit_info()
    {
        if (IS_POST) {
            if ($this->_db->edit_info()) {
                $this->ajax(array('state' => 1, 'message' => '修改个人资料成功'));
            }
        } else {
            $this->user = $this->_db->find(session('uid'));
            $this->display();
        }
    }

    /**
     * 修改密码
     */
    public function edit_password()
    {
        if (IS_POST) {
            if ($this->_db->edit_password()) {
                $this->ajax(array('state' => 1, 'message' => '修改修改密码成功'));
            }
        } else {
            $this->user = $this->_db->join(NULL)->find(session('uid'));
            $this->display();
        }
    }

    /**
     * 修改密码操作时Ajax验证密码
     */
    public function check_password()
    {
        $this->_db->where = 'uid=' . session('uid');
        $this->_db->where = array('password'=>Q('old_password', '', 'md5'));
        if ($this->_db->join(NULL)->find()) {
            $this->ajax(1);
        }
    }
}
