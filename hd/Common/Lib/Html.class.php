<?php
if (!defined("IN_ADMIN") || !IN_ADMIN)
	exit ;
final class Html extends Control {
	//HTML存放根目录
	private $htmlDir;
	public $error;
	public function __construct() {
		//HTML存放根目录
		$this -> htmlDir = C("HTML_PATH") ? C("HTML_PATH") . '/' : '';
		defined("__TEMPLATE__") or define("__TEMPLATE__", __ROOT__ . "/template/" . C("WEB_STYLE"));
	}

	//生成首页
	public function createIndex() {
		$this -> fetch('template/' . C('WEB_STYLE') . '/index.html');
	}

}
