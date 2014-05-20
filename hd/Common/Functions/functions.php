<?php
if (!defined("HDPHP_PATH"))
	exit ;

/**
 * HDCMS缓存函数
 * @param String $name 缓存KEY
 * @param bool $value 删除缓存
 * @return bool
 */
function cache($name, $value = false, $CachePath = 'data/cache/Data') {
	if ($value === false) {
		return F($name, false, $CachePath);
	} else {
		return F($name, $value, $CachePath);
	}
}

function getCategory($cid) {
	$categoryCache = cache('category');
	$catData = Data::channelList($categoryCache, $cid);
	$cids = array();
	if (!empty($catData)) {
		foreach ($catData as $cat) {
			$cids[] = $cat['cid'];
		}
	}
	$cids[] = $cid;
	return $cids;
}

//获得栏目url（主要用于模型标签使用）
function getCategoryUrl($field) {
	return Url::getCategoryUrl($field);
}

//添加会员动态
function addDynamic($uid, $conent) {
	K('UserDynamic') -> addDynamic($uid, $conent);
}

//发送系统信息
function addSystemMessage($uid, $message) {
	K('SystemMessage') -> addSystemMessage($uid, $message);
}
