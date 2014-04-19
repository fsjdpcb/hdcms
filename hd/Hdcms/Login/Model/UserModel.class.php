<?php

/**
 * 后台管理员登录处理模型
 * Class UserModel
 */
class UserModel extends ViewModel
{
    public $table = "user";
    public $view = array(
        'role' => array(
            'type' => INNER_JOIN,
            'on' => 'user.rid=role.rid'
        )
    );

    /**
     * 记录用户登录信息
     * @param $uid 用户id
     */
    public function record_user($uid)
    {
        $db = M("user");
        $sql = "SELECT * FROM " . C("DB_PREFIX") . "user_icon AS c RIGHT JOIN " . C("DB_PREFIX") . "user AS u
                ON u.uid=c.user_uid
                JOIN " . C('DB_PREFIX') . "role AS r ON u.rid = r.rid WHERE u.uid=$uid";
        $user = current($db->query($sql));
        setcookie('login', $user['password'], 0, '/');
        unset($user['password']);
        unset($user['code']);
        unset($user['user_uid']);
        //是否为超级管理员
        $_SESSION['WEB_MASTER'] = strtolower(C("WEB_MASTER")) == strtolower($user['username']);
        $_SESSION = array_merge($_SESSION, $user);

        //---------------------修改登录IP与时间
        return $db->save(array(
            "uid" => $_SESSION['uid'],
            "logintime" => time(),
            "lastip" => ip_get_client()
        ));
    }

}