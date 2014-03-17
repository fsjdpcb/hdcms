<?php
if (!defined("HDPHP_PATH")) exit;


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

/**
 * 获取用户密码加密key
 * @return string
 */
function get_user_code()
{
    return substr(md5(C("AUTH_KEY") . mt_rand() . time() . C('AUTH_KEY')), 0, 10);
}

/**
 * 获得用户密码
 * @param $password 密码
 * @param $code 加密key
 * @return string 储存到数据库中的密码
 */
function get_user_password($password, $code)
{
    return md5($password . $code);
}