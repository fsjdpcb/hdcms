<?php

/**
 * 单页面处理
 * Class SingleControl
 */
class SingleControl extends AuthControl
{
    //模型
    protected $_db;

    //构造函数
    public function __init()
    {
        parent::__init();
        $this->_db = K('Single');
    }

    /**
     * 显示列表
     */
    public function index()
    {
        $count = $this->_db->count();
        $page = new Page($count, C('admin_list_row'));
        $this->page = $page->show();
        $this->data = $this->_db->order('aid DESC')->limit($page->limit())->all();
        $this->display();
    }

    /**
     * 添加文章
     */
    public function add()
    {
        if (IS_POST) {
            if ($this->_db->add_content()) {
                $this->ajax(array('state' => 1, 'message' => '发表成功！'));
            }
        } else {
            $this->display();
        }
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
            $aid = Q("aid", null, "intval");
            if ($aid) {
                $field = $this->_db->find($aid);
                $field['thumb_img'] = empty($field['thumb']) || !is_file($field['thumb']) ? __ROOT__ . '/hd/static/img/upload-pic.png' : __ROOT__ . '/' . $field['thumb'];
                $this->field=$field;
                $this->display();
            }
        }
    }
}