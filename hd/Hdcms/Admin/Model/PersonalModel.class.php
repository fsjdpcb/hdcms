<?php

//管理员个人信息管理
class PersonalModel extends Model
{
    //操作表
    public $table = 'user';
    //关闭关联
    public $join = array();
    //自动完成
    public $auto = array(
        array('new_password', 'md5', 'function', 1, 3),
    );
    //字段映射
    public $map = array(
        'new_password' => 'password'
    );
    //自动验证
    public $validate = array(
        array('old_password', 'nonull', '旧密码不能为空', 1, 3),
        array('new_password', 'nonull', '密码不能为空', 1, 3),
        array('c_password', 'nonull', '确认密码不能为空', 1, 3),
    );

    //构造函数
    public function __init()
    {
    }

    /**
     * 修改管理员信息
     */
    public function edit_info()
    {
        if ($this->create()) {
            //只针对当前用户
            $this->where = 'uid=' . session('uid');
            return $this->save();
        }
    }

    /**
     * 修改密码
     */
    public function edit_password()
    {
        if ($this->create()) {
            //只针对当前用户
            $this->where = 'uid=' . session('uid');
            return $this->save();
        }
    }

}