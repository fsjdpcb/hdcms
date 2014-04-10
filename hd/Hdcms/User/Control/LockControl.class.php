<?php

class LockControl extends AuthControl
{
    //用户uid
    protected $_uid;
    private $_db;

    public function __init()
    {
        $this->_uid = Q("request.uid", null, 'intval');
        if (!$this->_uid) {
            $this->error('用户不存在');
        }
        $this->_db = M('user');
    }

    /**
     * 锁定用户
     */
    public function lock()
    {
        if (IS_POST) {
            //修改信息
            $this->_db->save();
            //---如果设置禁止IP，向表hd_user_deny_ip添加记录
            if (!empty($_POST['deny_ip'])) {
                M('user_deny_ip')->replace(array('ip' => $_POST['deny_ip']));
            }
            $this->_ajax(1, '操作成功');
        } else {
            $this->field = $this->_db->find($this->_uid);
            $this->display();
        }
    }
}