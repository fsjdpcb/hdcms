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
        //验证个性域名
        $domain = Q('post.domain');
        if ($domain && $this->_db->where("uid<>" . session('uid') . " AND domain='$domain'")->find()) {
            $this->_ajax(0, '个性域名已经注册，请更换');
        }
        //修改资料
        if ($this->_db->where("uid=" . session('uid'))->save()) {
            $this->_ajax(1, '修改成功!');
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

    /**
     * 设置头像
     */
    public function set_face()
    {
        //关闭水印
        C('WATER_ON',false);
        //头像文件
        $file = $_POST['img_face'];
        $dst = imagecreatetruecolor(150, 150);
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
        $res = $func($file);
        imagecopyresized($dst, $res, 0, 0, $_POST['x1'], $_POST['y1'], 150, 150, $_POST['w'], $_POST['h']);
        $func = str_replace('/', '', $d['mime']);
        $func($dst, $file);
        $info = pathinfo($file);
        $face_file = array(
            50 => $info['dirname'] . '/' . $_SESSION['uid'] . '_50.' . $info['extension'],
            100 => $info['dirname'] . '/' . $_SESSION['uid'] . '_100.' . $info['extension'],
            150 => $info['dirname'] . '/' . $_SESSION['uid'] . '_150.' . $info['extension'],
        );
        $img = new Image();
        foreach ($face_file as $size => $f) {
            $img->thumb($file, $f, $size, $size, 6);
        }
        $db = M("user_icon");

        unlink($file);
        if ($file = $db->where('user_uid=' . $_SESSION['uid'])->find()) {
            is_file($file['icon50']) and unlink($file['icon50']);
            is_file($file['icon100']) and unlink($file['icon100']);
            is_file($file['icon150']) and unlink($file['icon150']);
        }
        $data = array(
            'user_uid'=>$_SESSION['uid'],
            'icon50' => $info['dirname'] . '/' . $_SESSION['uid'] . '_50.' . $info['extension'],
            'icon100' => $info['dirname'] . '/' . $_SESSION['uid'] . '_100.' . $info['extension'],
            'icon150' => $info['dirname'] . '/' . $_SESSION['uid'] . '_150.' . $info['extension'],
        );
        if ($db->where('user_uid=' . $_SESSION['uid'])->replace($data)) {
            $_SESSION = array_merge($_SESSION, $data);
            $this->_ajax(1, '修改成功');
        }
    }

    /**
     * 上传头像
     */
    public function upload_face()
    {
        //关闭水印
        C('WATER_ON',false);
        $upload = new Upload('upload/user/' . date("Y/m/d"));
        $file = $upload->upload();
        if (empty($file)) {
            $this->_ajax(0, '上传失败！文件不能超过2Mb');
        } else {
            $file = $file[0]['path'];
            $img = new Image();
            $img->thumb($file, $file, 250, 250, 6);
            //存入表
            M('upload')->add(array('path' => $file, 'state' => 0,'uid'=>$_SESSION['uid']));
            $this->_ajax(1, array('url' => __ROOT__ . '/' . $file, 'path' => $file));
        }
    }
}