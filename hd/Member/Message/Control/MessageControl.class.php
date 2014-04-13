<?php

class MessageControl extends CommonControl
{
    //发送信息
    public function send()
    {
        $to_uid = Q('to_uid', null, 'intval');
        if (!isset($_SESSION['uid'])) {
            $this->_ajax(0, '请登录后操作');
        } else if ($to_uid == $_SESSION['uid']) {
            $this->_ajax(0, '不能给自己发信息！');
        } else if (!$to_uid) {
            $this->_ajax(0, '参数错误');
        } else {
            $data = array(
                'from_uid' => $_SESSION['uid'],
                'to_uid' => $to_uid,
                'content' => Q('content'),
                'sendtime' => time()
            );
            $db = M('user_message');
            if ($db->add($data)) {
                $this->_ajax(1, '发送成功');
            } else {
                $this->_ajax(0, '信息发送失败！');
            }
        }
    }

}