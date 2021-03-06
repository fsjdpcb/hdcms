<?php

/**
 * Search 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class IndexController extends AddonController
{
    private $mid;

    public function __init()
    {
        $this->mid = Q('mid', 1, 'intval');
    }

    public function index()
    {
        if ($wd = Q('post.wd')) {
            go(U('index', array('wd' => $wd)));
        }
        $data = array();
        if (!$search_history = cookie('search_history')) {
            $search_history = array();
        }
        if ($wd = Q('get.wd')) {
            $ContentModel = ContentViewModel::getInstance($this->mid);
            $where[] = "category.mid=" . $this->mid;
            //按Tag搜索
            if (Q('type') == 'tag') {
                //当前Tag文章aid
                if ($aids = K("ContentTag")->getContentAid($this->mid, $wd)) {
                    $where[] = $ContentModel->table . '.aid IN(' . implode(',', $aids) . ')';
                }

            } else {
                //按文章标签搜索
                $where[] = " title like '%$wd%'";
            }
            //搜索时间
            if ($time = Q('get.time')) {
                switch ($time) {
                    case 'day':
                        $where[] = 'addtime>' . (time() - 3600 * 24);
                        break;
                    case 'week':
                        $where[] = 'addtime>' . (time() - 3600 * 24 * 7);
                        break;
                    case 'month':
                        $where[] = 'addtime>' . (time() - 3600 * 24 * 7 * 30);
                        break;
                    case 'year':
                        $where[] = 'addtime>' . (time() - 3600 * 24 * 7 * 30 * 12);
                        break;
                }
            }

            $page = new Page($ContentModel->where($where)->count(), 10);
            $data = $ContentModel->where($where)->limit($page->limit())->order('arc_sort ASC,addtime DESC')->all();
            array_unshift($search_history, $wd);
            $search_history = array_unique($search_history);
            $search_history = array_slice($search_history, 0, 8);
            cookie('search_history', $search_history);
        }
        $this->assign('data', $data);
        $this->assign('search_history', ($search_history));
        $this->assign('model', S('model')); //模型
        $this->assign('search_word', cookie('search_word'));
        $this->display();
    }
}