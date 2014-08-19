<?php

/**
 * 管理员管理模块
 * Class AdministratorControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class AdministratorController extends AuthController
{
    private $db;

    public function __init()
    {
        $this->db = K("User");
        if ($_SESSION['username'] != C('WEB_MASTER')) {
            $this->error('没有操作权限');
        }
    }

    //管理员列表
    public function index()
    {
        $data = $this->db->order("uid ASC")->where("admin=1")->all();
        $this->assign('data', $data);
        $this->display();
    }

    //验证用户是否存在(添加管理员时验证)
    public function checkUsername()
    {
        echo $this->db->find("username='{$_POST['username']}'") ? 0 : 1;
        exit;
    }

    //验证邮箱
    public function checkEmail()
    {
        $email = Q("post.email");
        if ($uid = Q('uid')) {
            $this->db->where("uid<>$uid");
        }
        echo $this->db->find("email='$email'") ? 0 : 1;
        exit;
    }

    //删除管理员
    public function del()
    {
        $uid = Q("POST.uid", 0, "intval");
        if ($this->db->delUser($uid)) {
            $this->success('删除成功');
        }
    }
    //添加管理员
    public function add()
    {
        if (IS_POST) {
            $_POST['user_state'] = 1;
            if ($this->db->addUser($_POST)) {
                $this->success("添加成功！");
            } else {
                $this->error($this->db->error);
            }
        } else {
            $this->role = M("role")->where('admin=1')->order("rid DESC")->all();
            $this->display();
        }
    }

    //修改管理员
    public function edit()
    {
        if (IS_POST) {
            $uid = Q('uid', 0, 'intval');
            $_POST['uid'] = $uid;
            if ($this->db->editUser($_POST)) {
                $this->success("修改成功！");
            } else {
                $this->error($this->db->error);
            }
        } else {
            $uid = Q("request.uid", null, "intval");
            if ($uid) {
                //会员信息
                $this->field = $this->db->find($uid);
                $this->role = $this->db->table("role")->where('admin=1')->order("user.rid DESC")->all();
                $this->display();
            }
        }
    }

}
