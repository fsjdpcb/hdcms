<?php

/**
 * 粉丝与关注
 * Class FollowControl
 */
class FollowControl extends MemberAuthControl
{
    /**
     * 粉丝
     */
    public function fans()
    {
        $db = V('user_follow');
        $db->view = array(
            'user' => array(
                'type' => INNER_JOIN,
                'on' => 'user.uid=user_follow.fans_uid'
            )
        );
        $pre = C("DB_PREFIX");
        $count = $db->where($pre . "user_follow.uid=" . $_SESSION['uid'])->count();
        $page = new Page($count, 9);
        $this->page = $page->show();
        $data = $db->limit($page->limit())->where($pre . "user_follow.uid=" . $_SESSION['uid'])->all();
        foreach ($data as $n => $d) {
            //我是否关注对方
            $r = $db->join()->where("fans_uid=" . $_SESSION['uid'] . " AND uid={$d['uid']}")->find();
            if ($r) {
                $follow = '互相关注';
            } else {
                $follow = '已关注';
            }
            $data[$n]['follow']=$follow;
        }
        $this->data = $data;
        $this->display();
    }

    /**
     * 关注
     */
    public function follow()
    {
        $db = V('user_follow');
        $db->view = array(
            'user' => array(
                'type' => INNER_JOIN,
                'on' => 'user.uid=user_follow.uid'
            )
        );
        $pre = C("DB_PREFIX");
        $count = $db->where($pre . "user_follow.fans_uid=" . $_SESSION['uid'])->count();
        $page = new Page($count, 9);
        $this->page = $page->show();
        $data = $db->limit($page->limit())->where($pre . "user_follow.fans_uid=" . $_SESSION['uid'])->all();
        foreach ($data as $n => $d) {
            //对方是否关注我
            $r = $db->join()->where("uid=" . $_SESSION['uid'] . " AND fans_uid={$d['uid']}")->find();
            if ($r) {
                $follow = '互相关注';
            } else {
                $follow = '已关注';
            }
            $data[$n]['follow']=$follow;
        }
        $this->data = $data;
        $this->display();
    }

}