<?php

/**
 * 栏目管理模型
 * Class CategoryModel
 * @author hdxj <houdunwangxj@gamil.com>
 */
class CategoryModel extends RelationModel
{
    //表
    public $table = "category";
    //模型缓存
    private $_model;
    //栏目缓存
    private $_category;
    //自动完成
    public $auto = array();
    //自动验证
    public $validate = array(
        array('catname', 'nonull', '栏目名称不能为空', 1, 3),
    );

    //构造函数
    public function __init()
    {
        $this->_category = F("category", false, CATEGORY_CACHE_PATH);
        $this->_model = F("model", false, MODEL_CACHE_PATH);
    }

    /**
     * 添加栏目
     */
    public function add_category()
    {
        if ($this->create()) {
            return $this->add();
        }
    }

    /**
     * 修改栏目
     */
    public function edit_category()
    {
        if ($this->create()) {
            return $this->save();
        }
    }

    /**
     * 更新栏目排序
     */
    public function update_order()
    {
        $list_order = Q("post.list_order");
        foreach ($list_order as $cid => $order) {
            $cid = intval($cid);
            $order = intval($order);
            $data = array("cid" => $cid, "catorder" => $order);
            $this->save($data);
        }
        //重建缓存
        return $this->update_cache();
    }

    //更新栏目缓存
    public function update_cache()
    {
        $category = $this->join()->order("catorder ASC,cid DESC")->all();
        if (!empty($category)) {
            foreach ($category as $n => $v) {
                $v["disabled"] = '';
                if ($v["cattype"] != 1) {
                    $v["disabled"] = 'disabled="disabled"';
                }
            }
        }
        $category = Data::tree($category, "catname", "cid", "pid");
        $data = array();
        $type = array(1 => '栏目', 2 => '封面', 3 => '外链');
        foreach ($category as $n => $v) {
            $v['_type_name'] = $type[$v['cattype']];
            $data[$v['cid']] = $v;
        }
        return F("category", $data, CATEGORY_CACHE_PATH);
    }

    //删除栏目
    public function del_category()
    {
        $cid = Q("cid", NULL, 'intval');
        $db = K("Content");
        //删除栏目文章
        if ($db->where("cid=$cid")->del()) {
            //删除栏目
            if ($this->del($cid)) {
                return true;
            }
        }
        return false;
    }

    public function __after_delete($data)
    {
        $this->update_cache();
    }

    public function __after_insert($data)
    {
        $this->update_cache();
    }

    public function __after_update($data)
    {
        $this->update_cache();
    }
}