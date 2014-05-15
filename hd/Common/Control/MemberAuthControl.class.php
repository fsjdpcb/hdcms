<?php

/**
 * 会员中心权限控制
 * Class MemberAuthControl
 */
class MemberAuthControl extends CommonControl {
	//构造函数
	public function __construct() {
		parent::__construct();
		//会员中心是否关闭
		if (C("member_open") == 0 && !IN_ADMIN) {
			$this -> display("template/system/Member/close.php");
			exit ;
		}
		//未登录
		if (!session('uid')) {
			go(U("Member/Login/login"));
		}
		//邮箱验证
		if (session('uid') && C('MEMBER_EMAIL_VALIDATE') && session('user_state') == 0) {
			$this -> emailValidate();
		}
		//锁定用户
		if (isset($_SESSION['lock']) && $_SESSION['lock']) {
			$this -> error('您已被锁定，无法进行操作', __WEB__);
		}
	}
	//验证邮箱
	public function emailValidate(){
		$this->display(TPL_PATH.'Login/email_validate.php');
		exit;
	}
}
