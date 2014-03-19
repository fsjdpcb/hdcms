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
        $this->_db = K('User');
    }

    /**
     * 编辑个人信息
     */
    public function edit_info()
    {
        if (IS_POST) {
            if ($this->_db->join()->where("uid=" . session('uid'))->save()) {
                $this->_ajax(1, '修改个人资料成功');
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
            $_POST['code'] = $this->_db->get_user_code();
            $_POST['password'] = $this->_db->get_user_password($_POST['new_password'], $_POST['code']);
            $_POST['uid'] = session('uid');
            if ($this->_db->join()->save()) {
                $this->_ajax(1, '修改修改密码成功');
            }
        } else {
            $this->user = $this->_db->join()->find(session('uid'));
            $this->display();
        }
    }

    /**
     * 修改密码操作时Ajax验证密码
     */
    public function check_password()
    {
        $user = $this->_db->join()->find(session('uid'));
        $this->_db->where('uid=' . session('uid'));
        $password = $this->_db->get_user_password($_POST['old_password'], $user['code']);
        $this->_db->join()->where("password='$password'");
        if ($this->_db->join()->find()) {
            $this->ajax(1);
        }
        exit;
    }
}
