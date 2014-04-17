<?php

/**
 * 文章审核处理模型
 * Class ContentViewModel
 */
class AuditModel extends ViewModel
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
    public function __init($options)
    {
        //----------------缓存数据
        $this->_category = cache("category");
        $this->_model = cache("model");
        $this->_mid = isset($options['mid']) ? intval($options['mid']) : Q('mid', 1, 'intval');
        //主表
        $this->table = $this->_model[$this->_mid]['table_name'];
        //表关联
        $this->view = array(
            //栏目表
            'category' => array(
                'type' => INNER_JOIN,
                'on' => $this->table . '.cid=category.cid'
            ),
            "user" => array(
                'type' => INNER_JOIN,
                'on' => $this->table . '.uid=user.uid'
            )
        );
    }

}