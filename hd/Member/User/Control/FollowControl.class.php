<?php

/**
 * 前台用户关注处理类
 * Class UserControl
 */
class FollowControl extends CommonControl
{
    public function follow()
    {
        $uid = Q('uid', null, 'intval');
        if ($uid) {
            $db = M('user_follow');
            $result = $db->where("uid={$uid} AND fans_uid={$_SESSION['uid']}")->find();
            if ($result) {
                //取消关注
                $db->where("uid={$uid} AND fans_uid={$_SESSION['uid']}")->del();
                $this->_ajax(1, array('message' => '取消关注成功', 'follow' => '关注'));
            } else {
                if ($db->add(array( 'uid' => $uid, 'fans_uid' => $_SESSION['uid'] ))) {
                    if($db->where("uid={$_SESSION['uid']} AND fans_uid={$uid}")->find()){
                        $this->_ajax(1, array('message' => '关注成功', 'follow' => '互相关注'));
                    }else{
                        $this->_ajax(1, array('message' => '关注成功', 'follow' => '已关注'));
                    }
                } else {
                    $this->_ajax(0, '操作失败');
                }
            }
        } else {
            $this->_ajax(0, '参数错误');
        }
    }
}