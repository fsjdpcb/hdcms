<?php

/**
 * 单页面处理
 * Class SingleControl
 */
class ContentControl extends AuthControl
{
    //模型
    protected $_db;
    //栏目cid
    protected $_cid;

    //构造函数
    public function __init()
    {
        parent::__init();
        $this->_db = K('Single');
        $this->_cid = Q('cid', NULL, 'intval');
    }

    /**
     * 修改文章
     */
    public function edit()
    {
        if (IS_POST) {
            if ($this->_db->edit_content()) {
                $this->ajax(array('state' => 1, 'message' => '修改文章成功'));
            }
        } else {
            if ($this->_cid) {
                $field = $this->_db->where("cid={$this->_cid}")->find();
                //新增数据时无数据，初始$field为数组
                if (!is_array($field)) $field = array();
                //栏目cid
                $field['cid'] = $this->_cid;
                //缩略图
                $field['thumb_img'] = empty($field['thumb']) || !is_file($field['thumb']) ?
                    __ROOT__ . '/hd/static/img/upload-pic.png' : __ROOT__ . '/' . $field['thumb'];
                //新增时数据为空，设置字段默认值
                if (!isset($field['aid'])) {
                    //点击数
                    $field['click'] = 0;
                    //发布时间
                    $field['updatetime'] = time();
                    //来源
                    $field['source'] = C('WEBNAME');
                }
                $this->field = $field;
                $this->display();
            }
        }
    }
}