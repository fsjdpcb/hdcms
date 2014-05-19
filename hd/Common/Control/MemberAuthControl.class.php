<?php

/**
 * 会员中心权限控制
 * Class MemberAuthControl
 */
class MemberAuthControl extends CommonControl {
	//构造函数
	public function __construct() {
		parent::__construct();
		if (!$this -> checkAccess()) {
			$this -> error("没有操作权限");
		}
		//消息数
		$message_count = M("user_message") -> where(array('to_uid' => $_SESSION['uid'], 'user_message_state' => 0)) -> count();
		$this -> assign('message_count', $message_count);
	}

	//验证
	public function checkAccess() {
		//未登录
		if (!IS_LOGIN) {
			go(U("Member/Login/login"));
		}
		//管理员
		if (WEB_MASTER || IN_ADMIN) {
			return true;
		}
		//会员中心关闭
		if (C("MEMBER_OPEN") == 0) {
			$this -> display("template/system/member_close.php");
			exit ;
		}
		//邮箱验证
		if (C('MEMBER_EMAIL_VALIDATE') && $_SESSION['user_state'] == 0) {
			go(U('Member/Email/VaifyMail'));
		}
		return true;
	}

	//记录会员动态
	public function saveDynamic($content) {
		$Model = M('user_dynamic');
		$data = array('uid' => $_SESSION['uid'], 'addtime' => time(), 'content' => $content);
		$Model -> add($data);
	}

}
