<?php
if (!defined("HDPHP_PATH")) exit;

/**
 * HDCMS缓存函数
 * @param String $name 缓存KEY
 * @param bool $value 删除缓存
 * @param string $path 缓存目录
 * @return bool
 */
function cache($name, $value = false){
	return F($name,$value,'data/Cache/Data');
}
/**
 * 获取指定栏目的所有子栏目（包含栏目本身）
 * @param $cid 栏目cid
 * @return array
 */
function get_son_category($cid)
{
    $data = array();
    $cid = explode(',', $cid);
    foreach ($cid as $id) {
        $data[] = $id;
        $son_category = Data::channelList(cache('category'), intval($id));
        if ($son_category) {
            foreach ($son_category as $c) {
                $data[] = $c['cid'];
            }
        }
    }
    return $data;
}

/**
 * 获得用户头像
 * @param $uid
 * @param $size 50|100|150 头像尺寸
 * @return string
 */
function get_user_icon($uid, $size = 50)
{
    $dir = 'upload/user/' . max(ceil($uid / 500), 1);
    return __ROOT__ . '/' . $dir . '/' . $uid . '_' . $size . '.png';
}

