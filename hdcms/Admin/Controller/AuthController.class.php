<?php

/**
 * 访问权限验证
 * Class AuthController
 */
class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        header('Cache-control: private, must-revalidate');
        //验证后台登录权限
        if (!$this->checkAdminAccess()) {
            $this->error("没有操作权限");
        }
    }

    //后台权限验证
    protected function checkAdminAccess()
    {
        //没登录或普通用户
        IS_ADMIN or go("Login/login");
        //超级管理员不限制
        if (IS_SUPER_ADMIN) return true;
        //普通管理员权限控制
        $nodeModel = M("node");
        $nodeModel->where = array("MODULE" => MODULE, "control" => CONTROLLER, "action" => ACTION, 'type' => 1);
        $node = $nodeModel->field("nid")->find();
        //node不存在的节点自动通过验证
        if (is_null($node)) {
            return true;
        } else {
            return M('access')->where(array("nid" => $node['nid'], "rid" => session("rid")))->find();
        }
    }
}
