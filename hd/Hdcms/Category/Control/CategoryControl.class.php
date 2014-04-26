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
    public function __init()
    {
        $this->_category = cache("category", false);
        $this->_model = cache("model", false);
        $this->_db = K("Category");
        $this->_cid = Q("cid", null, "intval");
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
        echo $dir ? $dir : Q('catname');
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
            //获得角色
            $this->role_admin = M('role')->join()->where('admin=1 AND rid<>1')->all();
            $this->role_user = M('role')->join()->where('admin=0')->all();
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
            //分配角色权限
            $this->role_admin = $this->_db->get_access_list($this->_cid, 1);
            //普通用户组
            $this->role_user = $this->_db->get_access_list($this->_cid, 0);
            $this->display();
        }
    }

    //更新栏目排序
    public function update_order()
    {
        if ($this->_db->update_order())
            $this->_ajax(1, '更改排序成功');
    }

    /**
     * 更新栏目缓存
     */
    public function update_cache()
    {
        if ($this->_db->update_cache())
            $this->_ajax(1, '更新缓存成功');
    }

    //删除栏目
    public function del()
    {
        //存在子栏目不允许删除
        if ($this->_db->find("pid=" . $this->_cid)) {
            $this->_ajax(0, '请先删除子栏目');
        }
        //存在文章不允许删除
        if ($this->_db->del_category()) {
            $this->_ajax(1, '删除栏目成功');
        }
    }
}































