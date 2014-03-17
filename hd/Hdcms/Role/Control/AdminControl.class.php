<?php
import("User.Model.UserModel");

/**
 * 管理员管理模块
 * Class AdminControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class AdminControl extends AuthControl
{
    public $_db;

    public function __construct()
    {
        $this->_db = K("User");
    }

    //管理员列表
    public function index()
    {
        $rid = Q("get.rid", NULL, "intval");
        if ($rid) {
            $this->_db->where("rid=$rid");
        }
        $this->admin = $this->_db->join("role")->all();
        $this->display();
    }

    //验证用户是否存在
    public function check_admin()
    {
        $username = Q("post.username", NULL, "trim");
        if (is_null($username) || !$this->_db->join()->where("status=1")->find("username='$username'")) {
            $this->ajax(0);
        } else {
            $this->ajax(1);
        }
    }

    //删除管理员
    public function del()
    {
        $uid = Q("POST.uid", null, "intval");
        if ($uid) {
            //用户组关联表
            if ($this->_db->save(array("uid" => $uid, "rid" => 0))) {
                $this->ajax(1);
            }
        }
    }

    //添加管理员
    public function add()
    {
        if (IS_POST) {
            if (!empty($_POST['password'])) {
                $code = get_user_code();
                $_POST['code'] = $code;
                $_POST['password'] = get_user_password($_POST['password'], $code);
            }
            if ($this->_db->join(NULL)->replace()) {
                $this->_ajax(1, "添加管理员成功！");
            }
        } else {
            $role = $this->_db->table("role")->all();
            $this->assign("role", $role);
            $this->display();
        }
    }

    /**
     * 修改管理员
     */
    public function edit()
    {
        if (IS_POST) {
            if (!empty($_POST['password'])) {
                $code = get_user_code();
                $_POST['code'] = $code;
                $_POST['password'] = get_user_password($_POST['password'], $code);
            }
            $this->_db->join(null)->save();
            $this->_ajax(1, "修改管理员成功！");
        } else {
            $uid = Q("request.uid", null, "intval");
            if ($uid) {
                //会员信息
                $field = $this->_db->find($uid);
                //所有角色
                $role = $this->_db->table("role")->all();
                foreach ($role as $n => $r) {
                    $role[$n]["selected"] = "";
                    if ($r['rid'] == $field['rid']) {
                        $role[$n]["selected"] = "selected='selected'";
                    }
                }
                $this->assign("field", $field);
                $this->assign("role", $role);
                $this->display();
            }
        }
    }
}
