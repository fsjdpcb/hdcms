<?php

/**
 * 访问权限验证
 * Class AuthControl
 */
class AuthControl extends CommonControl {
	public function __construct() {
		parent::__construct();
		header('Cache-control: private, must-revalidate');
		//未登录会员
		if (!session('uid')) {
			echo "<script>top.location.href='?a=Admin&c=Login&m=login'</script>";
			exit ;
		}
		//站长与超级管理员放行
		if (session("WEB_MASTER") || IN_ADMIN) {
			return true;
		}else if (!$this -> checkAdminAccess()) {
			$this -> error("没有操作权限");
		}
	}

	//后台权限验证
	protected function checkAdminAccess() {
		$db = M("node");
		$db -> where = array("app" => APP, "control" => CONTROL, "method" => METHOD, 'type' => 1);
		$node = $db -> field("nid") -> find();
		//node不存在的节点自动通过验证
		if (is_null($node)) {
			return true;
		} else {
			$db -> table("access");
			$db -> where = array("nid" => $node['nid'], "rid" => session("rid"));
			return $db -> find();
		}
	}
}
