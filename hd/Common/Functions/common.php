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