<?php

/**
 * 批量编辑
 * Class CategoryControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class BatchEditControl extends AuthControl {
	//模型
	private $_db;
	//栏目cid
	private $_cid;
	//栏目缓存
	private $_category;
	//模型缓存
	private $_model;

	//构造函数
	public function __init() {
		$this -> _category = cache("category", false);
		$this -> _model = cache("model", false);
		$this -> _db = K("Category");
	}

	/**
	 * 批量编辑
	 */
	public function show() {
		$cid = $_POST['cid'];
		$data = $this -> _db -> where($cid) -> all();
		if ($data) {
			$this -> data = $data;
			$this -> display();
		}
	}

	/**
	 * 批量修改栏目表
	 */
	function edit() {
		$db = M('category');
		foreach ($_POST['cat'] as $data) {
			$db -> save($data);
		}
		//更新缓存
		$this->_db->update_cache();
		$this->_ajax(1,'修改成功');
	}

}
