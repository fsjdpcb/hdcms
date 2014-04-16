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
    //模型mid
    protected $_mid;
    //模型缓存
    protected $_model;
    //栏目缓存
    protected $_category;

    /**
     * 构造函数
     * $options=array('mid'=>模型mid)
     */
    public function __init()
    {
        //----------------缓存数据
        $this->_category = F("category");
        $this->_model = F("model");
        $this->_mid = Q('mid', null, 'intval');
        //主表
        $this->table = $this->_model[$this->_mid]['table_name'];
        //表关联
        $this->view = array(
            //栏目表
            'category' => array(
                'type' => INNER_JOIN,
                'on' => $this->table . '.cid=category.cid'
            ),
            //用户表
            'user'=>array(
            	'type'=>INNER_JOIN,
            	'on'=>$this->table.'.uid=user.uid'
            )
        );
    }
    /**
     * 获得会员文章
     */
    public function get_content()
    {
        $count = $this->where($this->tableFull.".uid=" . $_SESSION['uid'])->count();
        $page = new Page($count, 6);
        $data = $this->limit($page->limit())->where($this->tableFull.".uid=" . $_SESSION['uid'])->order('updatetime DESC')->all();
        return array(
            'page' => $page->show(),
            'data' => $data
        );
    }
}
