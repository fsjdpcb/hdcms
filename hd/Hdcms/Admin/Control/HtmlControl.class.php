<?php
require_cache('hd/Hdcms/Index/Control/IndexControl.class.php');
/**
 * 静态处理模块
 * Class HtmlControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class HtmlControl extends AuthControl {
	//模型缓存
	private $_model;
	//栏目缓存
	private $_category;

	public function __init() {
		//模型缓存
		$this -> _model = cache("model");
		//栏目缓存
		$this -> _category = cache("category");

	}

	//生成首页
	public function create_index() {
		if (IS_POST) {
			$Html = new Html();
			if ($Html -> createIndex()) {
				$this -> success('首页生成完毕');
			} else {
				$this -> error($Html -> error);
			}
		} else {
			$this -> display();
		}
	}

}
