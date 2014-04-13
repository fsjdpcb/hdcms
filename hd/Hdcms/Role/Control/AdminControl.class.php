<?php
import("User.Model.UserModel");

/**
 * 管理员管理模块
 * Class AdminControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class AdminControl extends AuthControl
{
    private $_db;

    public function __construct()
    {
        $this->_db = K("Admin");
    }

    //管理员列表
    public function index()
    {
        $rid = Q("get.rid", NULL, "intval");
        if ($rid) {
            $this->_db->where("rid=$rid");
        }
        $this->admin = $this->_db->where('admin=1')->where("username<>'" . C("WEB_MASTER") . "'")->all();
        $this->display();
    }

    //验证用户是否存在
    public function check_username()
    {
        $username = Q("post.username");
        echo $this->_db->join()->find("username='$username'") ? 0 : 1;
        exit;
    }

    //验证邮箱
    public function check_email()
    {
        $email = Q("post.email");
        if ($uid = Q('uid')) {
            $this->_db->where("uid<>$uid");
        }
        echo $this->_db->join()->find("email='$email'") ? 0 : 1;
        exit;
    }

    //删除管理员
    public function del()
    {
        $uid = Q("POST.uid", null, "intval");
        if ($uid) {
            if ($this->_db->del_user()) {
                $this->_ajax(1, '删除成功');
            }
        }
    }

    //添加管理员
    public function add()
    {
        if (IS_POST) {
            if ($this->_db->add_user()) {
                $this->_ajax(1, "添加管理员成功！");
            } else {
                $this->_ajax(0, $this->_db->error);
            }
        } else {
            $this->role = $this->_db->table("role")->where('admin=1')->order("rid DESC")->all();
            $this->display();
        }
    }

    /**
     * 修改管理员
     */
    public function edit()
    {
        if (IS_POST) {
            if ($this->_db->edit_user()) {
                $this->_ajax(1, "修改管理员成功！");
            } else {
                $this->_ajax(0, $this->_db->error);
            }
        } else {
            $uid = Q("request.uid", null, "intval");
            if ($uid) {
                //会员信息
                $this->field = $this->_db->find($uid);
                $this->role = $this->_db->table("role")->where('admin=1')->order("rid DESC")->all();
                $this->display();
            }
        }
    }
}
