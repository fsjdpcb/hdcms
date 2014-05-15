<?php

/**
 * 公共控制器
 * Class CommonControl
 * @author hdxj <houdunwangxj@gmail.com>
 */
class CommonControl extends Control {
	public function __construct() {
		defined("IN_ADMIN") 			or define("IN_ADMIN", isset($_SESSION['uid']) && $_SESSION['admin'] == 1);
		defined("ROOT_URL") 			or define('ROOT_URL',__ROOT__);
		defined("WEB_URL") 				or define('WEB_URL',__WEB__);
		defined("CONTROL_URL") 	or define('CONTROL_URL',__CONTROL__);
		parent::__construct();
	}

	/**
	 * 成功
	 * @param string $msg 提示内容
	 * @param string $url 跳转URL
	 * @param int $time 跳转时间
	 * @param null $tpl 模板文件
	 */
	protected function success($msg = '操作成功', $url = NULL, $time = 2, $tpl = null) {
		if (IS_AJAX) {
			$this -> _ajax(1, $msg);
		} else {
			parent::success($msg, $url, $time, $tpl);
		}
	}

	/**
	 * 错误输出
	 * @param string $msg 提示内容
	 * @param string $url 跳转URL
	 * @param int $time 跳转时间
	 * @param null $tpl 模板文件
	 */
	protected function error($msg = '出错了', $url = NULL, $time = 2, $tpl = null) {
		if (IS_AJAX) {
			$this -> _ajax(0, $msg);
		} else {
			parent::error($msg, $url, $time, $tpl);
		}
	}

	/**
	 * Ajax异步
	 * @param $state
	 * @param $message
	 * @param $data
	 */
	protected function _ajax($state, $message, $data = array()) {
		$this -> ajax(array('state' => $state, 'message' => $message, 'data' => $data));
	}

}
