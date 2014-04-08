<?php

/**
 * 会员文章管理
 * 主要用于Select操作
 * Class ContentModel
 */
class ContentViewModel extends ViewModel
{
    //表
    public $table;
    //副表
    protected $_stable;
    //模型mid
    protected $_mid;
    //栏目id
    protected $_cid;
    //文章id
    protected $_aid;
    //模型缓存
    protected $_model;
    //栏目缓存
    protected $_category;

    /**
     * 构造函数
     * $options=array('mid'=>模型mid)
     */
    public function __init($options)
    {
        //----------------缓存数据
        $this->_category = F("category");
        $this->_model = F("model");
        $this->_mid = isset($options['mid']) ? intval($options['mid']) : Q('mid', 1, 'intval');
        $this->_cid = Q('cid', null, 'intval');
        $this->_aid = Q('aid', null, 'intval');
        //主表
        $this->table = $this->_model[$this->_mid]['table_name'];
        //副表
        $this->_stable = $this->table . '_data';
        //表关联
        $this->view = array(
            //栏目表
            'category' => array(
                'type' => INNER_JOIN,
                'on' => $this->table . '.cid=category.cid'
            )
        );
        //副表关联
        $this->view [$this->_stable] = array(
            'type' => INNER_JOIN,
            'on' => $this->table . ".aid={$this->table}_data.aid"
        );
    }
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
