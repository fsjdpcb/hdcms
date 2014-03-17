<?php
//导入后台视图模型
import('ContentModel', 'hd/Hdcms/Content/Model');

/**
 * 会员文章管理
 * Class ContentModel
 */
class MemberContentModel extends ContentModel
{
    /**
     * 获得会员文章
     */
    public function get_content()
    {
        $count = $this->join(null)->where("uid=" . session('uid'))->count();
        $page = new Page($count, 10);
        $data = $this->limit($page->limit())->order('updatetime DESC')->all();
        return array(
            'page' => $page->show(),
            'date' => $data
        );
    }
}
