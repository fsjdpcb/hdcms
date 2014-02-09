<?php

/**
 * 友情链接前台
 * Class IndexControl
 */
class IndexControl extends CommonControl
{
    //模型
    private $_db;

    //构造函数
    public function __init()
    {
        $this->_db = K('Link');
    }

    /**
     * 友情链接列表
     */
    public function index()
    {
        $field = $this->_db->table('link_config')->find();
        $field['comment'] = preg_replace('@\r\n@', '<br/>', $field['comment']);
        $this->hdcms = $field;
        //友链分类
        $this->type = $this->_db->table('link_type')->all();
        $this->display('template/plug/link.html');
    }

    /**
     * 添加友情链接
     */
    public function add()
    {
        if (IS_POST) {
            if ($this->_db->add_link()) {
                $this->success('申请链接成功', U('index',array('g'=>'Plugin')));
            } else {
                $this->error($this->_db->error, U('index',array('g'=>'Plugin')));
            }
        }
    }
}