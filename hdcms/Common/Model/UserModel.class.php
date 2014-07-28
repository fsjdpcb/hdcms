<?php

/**
 * 用户管理模型
 * Class UserModel
 */
class UserModel extends ViewModel
{
    public $table = "user";
    public $view = array(
        "user" => array("_type" => 'INNER'),
        "role" => array("_on" => "user.rid=role.rid")
    );

    /**
     * 删除用户
     * @param int $uid 用户uid
     * @return mixed
     */
    public function delUser($uid)
    {
        return $this->del($uid);
    }

    /**
     * 修改用户
     */
    public function editUser($data)
    {
        //修改密码
        if (isset($data['password'])) {
            $data['code'] = $this->getUserCode();
            $data['password'] = md5($data['password'] . $data['code']);
        }
        return $this->save($data);
    }

    /**
     * 添加帐号
     */
    public function addUser($data)
    {
        if (empty($data['username'])) {
            $this->error = '用户名不能为空';
            return false;
        }
        if (empty($data['password'])) {
            $this->error = '密码不能为空';
            return false;
        }
        $code = $this->getUserCode();
        $data['code'] = $code;
        $data['password'] = md5($data['password'] . $data['code']);
        $data['nickname'] = $data['username'];
        $data['regtime'] = time();
        $data['logintime'] = time();
        $data['regip'] = ip_get_client();
        $data['lastip'] = ip_get_client();
        $data['credits'] = C('init_credits');
        //设置用户头像
        if ($uid = $this->add($data)) {
            //空间id
            return M('user')->save(array('uid' => $uid, 'domain' => "hd{$uid}"));
        } else {
            $this->error = '帐号注册失败';
            return false;
        }
    }

    /**
     * 获取用户密码加密key
     * @return string
     */
    public function getUserCode()
    {
        return substr(md5(C("AUTH_KEY") . mt_rand(1, 1000) . time() . C('AUTH_KEY')), 0, 10);
    }

    /**
     * 验证用户密码是否正确
     * @param $uid
     * @param $password
     * @return bool
     */
    public function checkUserPassword($uid, $password)
    {
        $data = $this->find($uid);
        if (md5($password . $data['code']) != $data['password']) {
            return false;
        } else {
            return true;
        }

    }

}