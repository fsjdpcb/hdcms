<?php

class UserControl extends MemberAuthControl
{
    public $_db;

    //构造函数
    public function __init()
    {
        $this->_db = K("User");
    }

    /**
     * 修改昵称
     */
    public function edit_nickname()
    {
        $this->_db->edit_nickname();
        $this->_ajax(1, '修改昵称成功!');
    }

    /**
     * 修改用户资料
     */
    public function edit()
    {
        $this->field = M('user')->find(session("uid"));
        $this->display();
    }

    /**
     * 编辑基本信息（个性签名，个性域名）
     */
    public function edit_message()
    {
        $_POST['description'] = mb_substr($_POST['description'], 0, 20, 'utf-8');
        //修改资料
        if ($this->_db->where("uid=" . session('uid'))->save()) {
            $_SESSION['domain'] = $_POST['domain'];
            $_SESSION['description'] = $_POST['description'];
            $this->_ajax(1, '修改成功!');
        }
    }

    /**
     * 验证个性域名
     */
    public function check_domain()
    {
        $domain = $_POST['domain'];
        $user = $this->_db->where("uid<>{$_SESSION['uid']} AND domain='{$domain}'")->find();
        if (!$user) {
            $this->ajax(1);
        } else {
            $this->ajax(0);
        }
    }

    /**
     * 修改密码时，异步验证原密码
     */
    public function check_password()
    {
        $password = $_POST['password'];
        $user = $this->_db->find(session('uid'));
        if (md5($password . $user['code']) == $user['password']) {
            $this->ajax(1);
        } else {
            $this->ajax(0);
        }
    }

    /**
     * 修改密码
     */
    public function edit_password()
    {
        if (empty($_POST['password'])) {
            $this->_ajax(0, '密码不能为空');
        } else {
            $code = $this->_db->get_user_code();
            $data = array(
                'uid' => $_SESSION['uid'],
                'password' => md5($_POST['password'] . $code),
                'code' => $code
            );
            if ($this->_db->save($data)) {
                $this->_ajax(1, '修改密码成功');
            } else {
                $this->_ajax(0, '修改失败');
            }
        }
    }

    /**
     * 设置头像
     */
    public function set_face()
    {
        //关闭水印
        C('WATER_ON', false);
        //头像文件
        $dir= 'upload/user/' . max(ceil($_SESSION['uid'] / 500), 1).'/';
        $file =$dir.$_SESSION['uid'].'_250.png';
        $d = getimagesize($file);
        switch ($d[2]) {
            case 1:
                $func = 'imagecreatefromgif';
                break;
            case 2:
                $func = 'imagecreatefromjpeg';
                break;
            case 3:
                $func = 'imagecreatefrompng';
                break;
        }
        $dst = imagecreatetruecolor(250, 250);
        $res = $func($file);
        imagecopyresized($dst, $res, 0, 0, $_POST['x1'], $_POST['y1'], 250, 250, $_POST['w'], $_POST['h']);
        imagepng($dst, $file);
        $data = array(
            50 => $dir . $_SESSION['uid'] . '_50.png',
            100 => $dir . $_SESSION['uid'] . '_100.png' ,
            150 => $dir . $_SESSION['uid'] . '_150.png',
        );
        $img = new Image();
        foreach ($data as $size => $f) {
            $img->thumb($file, $f, $size, $size, 6);
        }
        $data = array(
            'icon50' => $dir . $_SESSION['uid'] . '_50.png',
            'icon100' => $dir . $_SESSION['uid'] . '_100.png' ,
            'icon150' => $dir . $_SESSION['uid'] . '_150.png',
        );
        $data['user_uid']=$_SESSION['uid'];
        if (M("user_icon")->replace($data)) {
            $_SESSION = array_merge($_SESSION, $data);
            $this->_ajax(1, '修改成功');
        }exit;
    }

    /**
     * 上传头像
     */
    public function upload_face()
    {
        //关闭水印
        C('WATER_ON', false);
        $dir = 'upload/user/' . max(ceil($_SESSION['uid'] / 500), 1).'/';
        $upload = new Upload($dir);
        $file = $upload->upload();
        if (empty($file)) {
            $this->_ajax(0, '上传失败！文件不能超过2Mb');
        } else {
            $file = $file[0]['path'];
            $newFile = $dir . $_SESSION['uid'] . '_250.png';
            rename($file,$newFile);
            $img = new Image();
            $img->thumb($newFile, $newFile, 250, 250, 6);
            $this->_ajax(1, array('url' => __ROOT__ . '/' . $newFile, 'path' => $newFile));
        }
    }
}