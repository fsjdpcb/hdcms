<?php

/**
 * 内容视图模型
 * Class ContentViewModel
 */
class ContentViewModel extends ViewModel
{
    //表
    public $table;
    //副表
    private $_stable;
    //模型mid
    private $_mid;
    //栏目id
    private $_cid;
    //文章id
    private $_aid;
    //模型缓存
    private $_model;
    //栏目缓存
    private $_category;

    /**
     * 构造函数
     * @param $param 参数 array('cid'=>栏目cid','mid'=>'模型mid')
     */
    public function __init($param)
    {
        //----------------缓存数据
        $this->_category = F("category");
        $this->_model = F("model");
        $this->_cid = isset($param['cid']) ? $param['cid'] : Q('cid', null, 'intval');
        if (isset($param['mid'])) {
            $this->_mid = $param['mid'];
        } else if ($this->_cid) {
            //如果指定栏目cid，根据栏目cid设置模型
            $this->_mid = $this->_category[$this->_cid]['mid'];
        } else {
            $this->_mid = 1;
        }
        //主表
        $this->table = $this->_model[$this->_mid]['table_name'];
        //副表
        if ($this->_model[$this->_mid]['type'] == 1)
            $this->_stable = $this->table . '_data';
        //表关联
        $this->view = array(
            //栏目表
            "category" => array(
                "type" => INNER_JOIN,
                "on" => $this->table . ".cid=category.cid"
            )
        );
        //副表关联
        if ($this->_stable) {
            $this->view [$this->_stable] = array(
                "type" => INNER_JOIN,
                "on" => $this->table . ".aid={$this->table}_data.aid"
            );
        }
    }
}