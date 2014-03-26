<?php
//导入后台视图模型
import('ContentViewModel', 'hd/Hdcms/Content/Model');

/**
 * 会员文章管理
 * 主要用于Select操作
 * Class ContentModel
 */
class MemberContentViewModel extends ContentViewModel
{
    /**
     * 获得会员文章
     */
    public function get_content()
    {
        $count = $this->join(null)->where("uid=" . session('uid'))->count();
        $page = new Page($count, 6);
        $data = $this->limit($page->limit())->where($this->tableFull.".uid=" . session('uid'))->order('updatetime DESC')->all();
        return array(
            'page' => $page->show(),
            'data' => $data
        );
    }
}
