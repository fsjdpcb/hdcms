<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class IndexControl extends PublicControl {
	//网站首页
	public function index() {
		$CacheTime = C('CACHE_INDEX') >= 1 ? C('CACHE_INDEX') : null;
		$this -> display('template/' . C('WEB_STYLE') . '/index.html', $CacheTime);
	}

	//内容页
	public function content() {
		$CacheTime = C('CACHE_CONTENT') >= 1 ? C('CACHE_CONTENT') : null;
		if (!$this -> isCache()) {
			$mid = Q('mid', 0, 'intval');
			$cid = Q('cid', 0, 'intval');
			$aid = Q('aid', 0, 'intval');
			if (!$mid || !$cid || !$aid) {
				_404();
			} else {
				$ContentModel = new Content($mid);
				$field = $ContentModel -> find($aid);
				if ($field) {
					$field['time'] = date("Y/m/d", $field['addtime']);
					$field['date_before'] = date_before($field['addtime']);
					$field['commentnum'] = M("comment") -> where("cid=" . $cid . " AND aid=" . $aid) -> count();
					$field['caturl'] = Url::getCategoryUrl($field);
					$this -> assign('hdcms', $field);
					$this -> display($field['template'], $CacheTime);
				}
			}
		} else {
			$this -> display(null,$CacheTime);
		}
	}

	//栏目列表
	public function category() {
		$cachetime = C('CACHE_CATEGORY') >= 1 ? C('CACHE_CATEGORY') : null;
		if (!$this -> isCache()) {
			$mid = Q('mid', 0, 'intval');
			$cid = Q('cid', 0, 'intval');
			if (!$mid || !$cid) {
				_404();
			}
			$categoryCache = cache('category');
			if (!isset($categoryCache[$cid])) {
				$this -> error('栏目不存在', __ROOT__);
			}
			if ($cid) {
				$category = $categoryCache[$cid];
				//外部链接，直接跳转
				if ($category['cattype'] == 3) {
					go($category['cat_redirecturl']);
				} else {
					$Model = ContentViewModel::getInstance($mid);
					$where = C('DB_PREFIX') . 'category.cid=' . $cid . " OR pid=" . $cid;
					$category['content_num'] = $Model -> join('category') -> where($where) -> count();
					$childCategory = Data::channelList($categoryCache, $cid);
					$catWhere = array('cid' => array());
					if (!empty($childCategory)) {
						foreach ($childCategory as $cat) {
							$catWhere['cid'][] = $cat['cid'];
						}
					}
					$catWhere['cid'][] = $cid;
					$category['comment_num'] = intval( M('comment') -> where($catWhere) -> sum());
					//栏目模板
					switch ($category['cattype']) {
						case 1 :
							//普通栏目
							$tpl = $category['list_tpl'];
							break;
						case 2 :
							//封面栏目
							$tpl = $category['index_tpl'];
							break;
					}
					$tpl = 'template/' . C("WEB_STYLE") . '/' . $tpl;
					$this -> assign("hdcms", $category);
					$this -> display($tpl,$cachetime);
				}
			}
		}else{
			$this -> display(null,$cachetime);
		}
	}
	//404页面
	public function _404(){
		$this->display('template/system/404.html');
	}
	//加入收藏
	public function addFavorite() {
		if (!session("uid")) {
			$this -> error('请登录后操作');
		} else {
			$db = M('favorite');
			$data = array();
			$data['uid'] = $_SESSION['uid'];
			$data['mid'] = intval($_POST['mid']);
			$data['cid'] = intval($_POST['cid']);
			$data['aid'] = intval($_POST['aid']);
			if ($db -> where($data) -> find()) {
				$this -> error('已经收藏过');
			} else {
				$db -> add($data);
				$this -> success('收藏成功!');
			}
		}
	}

}
