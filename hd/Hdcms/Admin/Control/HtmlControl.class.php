<?php
/**
 * HTML静态处理模块
 * Class HtmlControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class HtmlControl extends AuthControl {
	//生成首页
	public function create_index() {
		if (IS_POST) {
			$HtmlControl = new Html();
			if ($HtmlControl -> createIndex()) {
				$this -> success('生成完毕...');
			}
		} else {
			$this -> display();
		}
	}

}
