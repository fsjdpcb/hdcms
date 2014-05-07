<?php

/**
 * 文章管理
 * Class ContentControl
 */
class ContentControl extends MemberAuthControl {
	//栏目缓存
	private $_category;
	//模型缓存
	private $_model;
	//模型mid
	private $_mid;
	//栏目cid
	private $_cid;

	//构造函数
	public function __init() {
		$this -> _model = cache("model", false);
		$this -> _category = cache("category", false);
		$this -> _mid = Q('mid', null, 'intval');
		$this -> _cid = Q("cid", NULL, "intval");
		$this -> _aid = Q("aid", NULL, "intval");

		if (!isset($this -> _model[$this -> _mid])) {
			$this -> error("模型不存在！");
		}
		if ($this -> _cid && !isset($this -> _category[$this -> _cid])) {
			$this -> error("栏目不存在！");
		}
	}

	//文章列表
	public function index() {
		$ContentModel = ContentViewModel::getInstance($this -> _mid);
		$where = "uid=" . $_SESSION['uid'];
		$page = new Page($ContentModel -> join('category') -> where($where) -> count(), 15);
		$data = $ContentModel -> join('category') -> where($where) -> limit($page -> limit()) -> order(array("arc_sort" => "ASC", 'aid' => "DESC")) -> all();
		$this -> assign('data', $data);
		$this -> display();
	}

	//发表文章前选择栏目
	public function selectCategory() {
		$this -> assign("category", cache('category'));
		$this -> display();
	}

	/**
	 * 发表文章
	 */
	public function add() {
		if (IS_POST) {
			$ContentModel = new Content($this -> _mid);
			if ($ContentModel -> add($_POST)) {
				$this -> success('发表成功！');
			} else {
				$this -> error($ContentModel -> error);
			}
		} else {
			//获取分配字段
			$form = K('ContentForm');
			$this -> form = $form -> get();
			//分配验证规则
			$this -> formValidate = $form -> formValidate;
			$this -> display();
		}
	}

	//修改文章
	public function edit() {
		$aid = Q('aid', 0, 'intval');
		if (!$aid) {
			$this -> error('文章不存在');
		}
		$ContentModel = new Content($this -> _mid);
		$result = $ContentModel -> find($aid);
		if ($result['uid'] != $_SESSION['uid']) {
			$this -> error('没有修改权限');
		}
		if (IS_POST) {
			if ($ContentModel -> edit($_POST)) {
				$this -> success('发表成功！');
			} else {
				$this -> error($ContentModel -> error);
			}
		} else {
			$aid = Q('aid', 0, 'intval');
			if (!$aid) {
				$this -> error('参数错误');
			}
			$ContentModel = ContentModel::getInstance($this -> _mid);
			$editData = $ContentModel -> find($aid);
			//获取分配字段
			$form = K('ContentForm');
			$this -> assign('form', $form -> get($editData));
			//分配验证规则
			$this -> assign('formValidate', $form -> formValidate);
			$this -> assign('editData', $editData);
			$this -> display('edit.php');
		}
	}

	/**
	 * 删除文章
	 */
	public function del() {
		$aid = Q('aid', 0, 'intval');
		if (!$aid) {
			$this -> error('文章不存在');
		}
		$ContentModel = new Content($this -> _mid);
		$result = $ContentModel -> find($aid);
		if ($result['uid'] != $_SESSION['uid']) {
			$this -> error('没有删除权限');
		}
		if ($ContentModel -> del($aid)) {
			$this -> success('删除成功');
		} else {
			$this -> error('aid参数错误');
		}
	}

}
