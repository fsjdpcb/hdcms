<?php

/**
 * 栏目管理模块
 * Class CategoryControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class CategoryControl extends AuthControl
{
    //模型
    private $_db;
    //栏目cid
    private $_cid;
    //栏目缓存
    private $_category;
    //模型缓存
    private $_model;

    //构造函数
    public function __construct()
    {
        parent::__construct();
        $this->_category = F("category", false);
        $this->_model = F("model", false);
        $this->_db = K("Category");
        $this->_cid = Q("request.cid", null, "intval");
        if ($this->_cid && !isset($this->_category[$this->_cid])) {
            $this->error("栏目不存在！");
        }
    }

    /**
     * 显示栏目列表
     */
    public function index()
    {
        $this->category = $this->_category;
        //添加模型名称
        $this->display();
    }

    //将栏目名称转拼音做为静态目录
    public function dir_to_pinyin()
    {
        $dir = String::pinyin(Q("catname"));
        echo $dir?$dir:Q('catname');
        exit;
    }

    //添加栏目到表
    public function add()
    {
        //添加栏目
        if (IS_POST) {
            if ($this->_db->add_category()) {
                $this->ajax(array('state' => 1, 'message' => '添加栏目成功'));
            }
        } else {
            $this->category = $this->_category;
            $this->model = $this->_model;
            $this->display();
        }
    }

    //修改栏目到表
    public function edit()
    {
        if (IS_POST) {
            if ($this->_db->edit_category()) {
                $this->ajax(array('state' => 1, 'message' => '修改栏目成功'));
            }
        } else {
            //当前栏目信息
            $field = $this->_db->find($this->_cid);
            $category = $this->_category;
            foreach ($category as $n => $v) {
                //父栏目select状态
                $selected = $field['pid'] == $v['cid'] ? 'selected="selected"' : '';
                //子栏目disabled
                $disabled = Data::isChild($category, $v['cid'], $this->_cid) ? 'disabled="disabled"' : '';
                //当前栏目不可选
                if ($this->_cid == $v['cid'])
                    $disabled = 'disabled="disabled"';
                $category[$n]['selected'] = $selected;
                $category[$n]['disabled'] = $disabled;
            }
            $this->field = $field;
            $this->category = $category;
            $this->display();
        }
    }

    //更新栏目排序
    public function update_order()
    {
        if ($this->_db->update_order())
            $this->ajax(array('state' => 1, 'message' => '更改排序成功'));
    }

    /**
     * 更新栏目缓存
     */
    public function update_cache()
    {
        if ($this->_db->update_cache())
            $this->ajax(array('state' => 1, 'message' => '更新缓存成功'));
    }

    //删除栏目
    public function del_category()
    {
        //存在子栏目不允许删除
        if ($this->_db->find("pid=" . $this->_cid)) {
            $this->ajax(array('state' => 0, 'message' => '请先删除子栏目'));
        }
        //存在文章不允许删除
        if ($this->_db->del_category()) {
            $this->ajax(array('state' => 1, 'message' => '删除栏目成功'));
        }
    }
}