<?php
if (!defined("HDPHP_PATH")) exit;
/**
 * 获得用户密码
 * @param string $password 密码
 * @param null $code 加密因子
 * @return array
 */
function user_password($password, $code = null)
{
    if (is_null($code)) {
        $code = md5(C("AUTH_KEY") . mt_rand() . time());
    }
    $password = md5(trim($password) . $code);
    return array('password' => $password, 'code' => $code);
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
        $son_category = Data::channelList(F('category'), intval($id));
        if ($son_category) {
            foreach ($son_category as $c) {
                $data[] = $c['cid'];
            }
        }
    }
    return $data;
}