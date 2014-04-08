<?php

/**
 * 栏目列表
 * Class IndexControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class CategoryControl extends PublicControl
{
    //模型
    protected $_db;

    //模型mid
    protected $_mid;
    //栏目id
    protected $_cid;
    //文章主表
    protected $_table;
    //模型缓存
    protected $_model;
    //栏目缓存
    protected $_category;

    //构造函数
    public function __init()
    {
        //----------------------设置变量----------------------
        $this->_model = F("model");
        $this->_category = F("category");
        $this->_mid = Q('mid', null, 'intval');
        $this->_cid = Q("cid", null, "intval");
        $this->_db = K('Category');
        if (!$this->_cid ||
            !$this->_model[$this->_category[$this->_cid]['mid']]
        ) {
            _404('参数错误');
        }

    }

    //显示栏目列表
    public function category()
    {
        if ($this->_cid) {
            //当前操作栏目
            $category = $this->_category[$this->_cid];
            //外部链接，直接跳转
            if ($category['cattype'] == 3) {
                go($category['cat_redirecturl']);
            } else {
                $field = M("category")->find($this->_cid);
                $this->assign("hdcms", $field);
                $tpl = Template::get_category_tpl($this->_cid);
                $this->display($tpl, C('cache_category'));
            }
        }
    }
}