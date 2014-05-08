<?php
if (!defined("IN_ADMIN") || IN_ADMIN)
	exit ;
final class Html extends Control {
	//HTML存放根目录
	private $htmlDir;
	public $error;
	public function __construct() {
		//HTML存放根目录
		$this -> htmlDir = C("HTML_PATH") ? C("HTML_PATH") . '/' : '';
	}

	//生成首页
	public function createIndex() {echo 333;
		$this -> display('template/' . C('WEB_STYLE') . '/index.html');
	}

}
