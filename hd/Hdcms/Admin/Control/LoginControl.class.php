<?php

/**
 * 登录处理模块
 * Class LoginControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class LoginControl extends Control {

	/**
	 * 登录页面显示验证码
	 * @access public
	 */
	public function code() {
		C(array("CODE_BG_COLOR" => "#ffffff", "CODE_LEN" => 4, "CODE_FONT_SIZE" => 20, "CODE_WIDTH" => 120, "CODE_HEIGHT" => 35, ));
		$code = new Code();
		$code -> show();
	}

	/**
	 * 用户登录处理
	 * @access public
	 */
	public function Login() {
		if (intval(Q('session.admin'))) {
			go(__APP__);
			exit ;
		}
		if (IS_POST) {
			$code = Q('code', '', 'strtoupper');
			if ($code != $_SESSION['code']) {
				$this -> assign('error', '验证码错误');
				$this -> display();
				exit ;
			}
			$userModel = M("user");
			$username = Q("post.username", NULL, 'htmlspecialchars,strip_tags,addslashes');
			$userInfo = $userModel -> where("username='$username' || email='$username'") -> find();
			if (empty($userInfo)) {
				$this -> assign('error', '帐号不存在');
				$this -> display();
				exit ;
			}
			$password = md5($_POST['password'] . $userInfo['code']);
			if ($userInfo['password'] != $password) {
				$this -> assign('error', '密码错误');
				$this -> display();
				exit ;
			}
			//记录用户登录信息
			$sql = "SELECT * FROM " . C("DB_PREFIX") . "user AS u
                JOIN " . C('DB_PREFIX') . "role AS r ON u.rid = r.rid WHERE u.uid=" . $userInfo['uid'];
			$userData = $userModel -> query($sql);
			if (empty($userData)) {
				$this -> error = '登录失败';
				$this -> display();
				exit ;
			} else {
				$user = $userData[0];
				setcookie('login', 1, 0, '/');
				unset($user['password']);
				unset($user['code']);
				//是否为超级管理员
				$_SESSION['WEB_MASTER'] = strtolower(C("WEB_MASTER")) == strtolower($user['username']);
				$_SESSION = array_merge($_SESSION, $user);
				//---------------------修改登录IP与时间
				$userModel -> save(array("uid" => $_SESSION['uid'], "logintime" => time(), "lastip" => ip_get_client()));
				go(__URL__);
			}
		} else {
			$this -> display();
		}
	}

	/**
	 * 退出
	 */
	public function out() {
		//清空SESSION
		session_unset();
		session_destroy();
		setcookie('login', '', 1, '/');
		echo "<script>
            window.top.location.href='" . U("login") . "';
        </script>";
		exit ;
	}

}
