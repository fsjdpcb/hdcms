<?php
//用户User视图模型
import('UserModel', 'hd/Hdcms/User/Model');

/**
 * 会员登录
 * Class LoginControl
 */
class RegControl extends MemberAuthControl
{
    //模型
    private $_db;

    //构造函数
    public function __init()
    {
        //实例模型对象
        $this->_db = K("User");
    }


    //注册
    public function reg()
    {
        if (IS_POST) {
            $func = "strip_tags,trim";
            $username = Q("username", null, $func);
            $password = Q("password", null, $func);
            $nickname = Q("nickname", null, $func);
            $email = Q("email", null, $func);
            $error = array();
            //验证帐号
            if (empty($username)) $error['username'] = '帐号不能为空';
            if ($this->_db->where("username='$username'")->find()) {
                $error['username'] = '帐号已经存在';
            }
            //验证密码
            if (empty($password)) $error['password'] = '密码不能为空';
            //验证邮箱
            if (empty($email)) $error['email'] = '邮箱不能为空';
            if ($this->_db->where("email='$email'")->find()) {
                $error['email'] = '邮箱已经存在';
            }
            //存在错误时返回客户端
            if (!empty($error)) {
                $this->error = json_encode($error);
                $this->display();
            } else {
                //密码加密key
                $code = substr(md5(mt_rand() . time() . 'houdunwang'), 0, 8);
                $data['username'] = $username;
                $data['code'] = $code;
                $data['password'] = md5($code . $password);
                $data['nickname'] = $nickname;
                $data['email'] = $email;
                $data['logintime'] = time();
                $data['state'] = C('member_verify'); //1 开通帐号 0 需要审核
                $data['favicon'] = 'data/image/favicon/favicon'; //头像
                if ($uid = $this->_db->add_user($data)) {
                    $data = $this->_db->field('uid,rid,is_system,allowpost,allowpostverify,allowsendmessage,
                    username,nickname,email,ip,sex,favicon,credits,message,gname')->find($uid);
                    $_SESSION = array_merge($_SESSION, $data);
                } else {
                    $this->error('页面发生错误');
                }
            }
        } else {
            $this->display();
        }
    }

}


































