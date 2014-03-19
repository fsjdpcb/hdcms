<?php

/**
 * 会员组管理
 * Class GroupControl
 */
class GroupControl extends AuthControl
{
    private $_db;

    public function __init()
    {
        $this->_db = K('Role');
    }

    /**
     * 会员组列表
     */
    public function index()
    {
        $this->data = $this->_db->where('admin=0')->all();
        $this->display();
    }

    /**
     * 修改会员组
     */
    public function edit()
    {
        if (IS_POST) {
            $this->_db->save();
            $this->_ajax(1, '修改成功');
        } else {
            $this->field = $this->_db->find(Q('rid'));
            $this->display();
        }
    }

    /**
     * 添加会员组
     */
    public function add()
    {
        if (IS_POST) {
            $this->_db->add();
            $this->_ajax(1, '添加成功');
        } else {
            $this->display();
        }
    }

    /**
     * 验证会员组
     */
    public function check_rname()
    {
        $rname = Q('rname');
        //编辑时
        if ($rid = Q("rid")) {
            $this->_db->where("rid<>$rid");
        }
        echo $this->_db->where("rname='$rname'")->find() ? 0 : 1;
        exit;
    }

    /**
     * 删除用户组
     */
    public function del()
    {
        $rid = Q("rid");
        if ($rid) {
            $default_rid = O('CommonUserModel', 'get_default_rid');
            //改变会员组
            $this->_db->table('user')->where("rid=$rid")->save(array('rid' => $default_rid));
            $this->_db->del($rid);
            $this->_ajax(1, '删除成功');
        }
    }
}