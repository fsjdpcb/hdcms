<?php

/**
 * 栏目选择页面
 * Class ContentControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class IndexControl extends AuthControl
{
    //栏目缓存
    private $_category;

    public function __init()
    {
        $this->_category = cache('category');
    }

    /**
     * 栏目选择
     */
    public function index()
    {
        $this->display();
    }

    /**
     * 异步获得目录树，内容左侧目录列表
     */
    public function ajax_category_ztree()
    {
        $category = array();
        foreach ($this->_category as $n => $cat) {
            $data = array();
            //过滤掉外部链接栏目
            if ($cat['cattype'] != 3) {
            	
                //单文章栏目
                if ($cat['cattype'] == 4) {
                    $url = U('Single/Content/edit', array('cid' => $cat['cid']));
                } else {
                    $url = U('Content/content', array('mid' => $cat['mid'],'cid' => $cat['cid'],'state' => 1));
                }
                $data['id'] = $cat['cid'];
                $data['pId'] = $cat['pid'];
                $data['url'] = $url;
                $data['target'] = 'content';
                $data['open'] = true;
                $data['name'] = $cat['catname'] ;
                $category[] = $data;
            }
        }
        $this->ajax($category);
    }
    //欢迎页
    public function welcome()
    {
        $this->display();
    }
}