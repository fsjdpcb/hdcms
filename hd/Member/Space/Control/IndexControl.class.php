<?php

/**
 * 空间列表
 * Class IndexControl
 */
class IndexControl extends Control
{

    //会员空间
    public function index()
    {
        $u = Q("u");
        $user = M("user")->where("uid='$u' OR domain='$u'")->find();
        //---------------------------检测用户
        if (!$user) {
            $this->error('用户不存在');
        }
        //---------------------------获得昵称
        $icon = M('user_icon')->where("user_uid={$user['uid']}")->getField('icon150');
        if (!$icon) {
            $icon = 'data/image/user/150.png';
        }
        $user['icon'] = __ROOT__ . '/' . $icon;
        //---------------------------获得文章列表
        $where = 'uid=' . $user['uid'] . ' AND state=1 ';
        $db = M('content');
        $count = $db->where($where)->count();
        $page = new Page($count, 10);
        $data = $db->where($where)->limit($page->limit())->all();
        $this->data = $data;
        $this->page = $page->show();
        $this->user = $user;
        //------------------------------获得访问数据
        $this->get_guest($user['uid']);
        $this->display();
    }

    /**
     * 获得访客数据
     * @param $uid 空间用户uid
     */
    private function get_guest($uid)
    {
        $db = M('user_guest');
        //记录访客数据
        if (isset($_SESSION['uid']) && $uid != $_SESSION['uid']) {
            $db->where('guest_uid=' . $_SESSION['uid'])->del();
            $db->add(array('guest_uid' => $_SESSION['uid'], 'uid' => $uid));
        }
        //获得访客数据
        $pre = C('DB_PREFIX');
        $sql = "SELECT guest_uid,nickname,icon50 FROM {$pre}user AS u
                JOIN {$pre}user_guest AS ug ON u.uid=ug.guest_uid
                LEFT JOIN {$pre}user_icon AS ui ON ug.guest_uid = ui.user_uid LIMIT 20";
        $guest = $db->query($sql);
        if ($guest) {
            foreach ($guest as $n => $d) {
                $d['icon'] = empty($d['icon50']) ? __ROOT__ . '/data/image/user/150.png' : $d['icon50'];
                $u = empty($d['domain']) ? $d['guest_uid'] : $d['domain'];
                $d['url'] = __ROOT__ . '/index.php?' . $u;
                unset($d['icon50']);
                $guest[$n] = $d;
            }
        }
        $this->guest = $guest;
    }
}