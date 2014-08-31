<?php

/**
 * 个人空间
 * Class SpaceController
 */
class SpaceController extends Controller
{
    private $uid;

    public function __init()
    {
        $this->uid = Q('uid', 0, 'intval');
        if (empty($this->uid)) {
            $this->error('会员不存在');
        }
    }

    //空间首页
    public function index()
    {
        $user = M('user')->find($this->uid);
        $this->assign('user', $user);
        //记录访客信息
        $this->assign('guest', $this->RecordGuest());
        //文章
        $ContentModel = ContentViewModel::getInstance(1);
        $where[] = 'user.uid=' . $this->uid;
        $page = new Page($ContentModel->where($where)->count(), 10);
        $data = $ContentModel->where($where)->limit($page->limit())->order('arc_sort ASC,addtime DESC')->all();
        $this->assign('data', $data);
        $this->assign('page', $page->show());
        $this->display();
    }

    //记录访客信息
    private function RecordGuest()
    {
        $db = M('user_guest');
        //记录
        if (isset($_SESSION['user'])) {
            $guest = array(
                'space_uid' => $this->uid,
                'guest_uid' => $_SESSION['user']['uid'],
                'entertime' => time()
            );
            $db->add($guest);
        }
        $user = $db->field('uid,nickname,username,icon')->join('__user__ u JOIN __user_guest__ g ON u.uid=g.guest_uid')->group('u.uid')->all();
        return $user;
    }
}