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
        $this->_category = F("category", false);
        $this->_model = F("model", false);
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
     * 设置栏目权限
     * @param $cid 栏目cid
     * @return bool
     */
    public function set_category_access($cid)
    {
        $db = M("category_access");
        //获得栏目mid
        $mid =$db->table('category')->where("cid=$cid")->getField('mid');
        //删除原有权限配置
        $db->where("cid=$cid")->del();
        //设置管理员权限
        $access = $_POST["access"];
        if (empty($access)) {
            return true;
        } else {
            foreach ($access as $a) {
                //没有选择权限，只有rid的数据，不进行操作
                if (count($a) <= 1) continue;
                //添加cid,mid等数据字段
                $a['cid'] = $cid;
                $a['mid'] = $mid;
                $db->add($a);
            }
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
        $category = $this->join()->order("catorder ASC,cid ASC")->all();
        if (!empty($category)) {
            foreach ($category as $n => $v) {
                //封面与链接栏目添加disabled属性
                $v["disabled"] = $v["cattype"] != 1 ? 'disabled="disabled"' : '';
            }
        }
        $category = Data::tree($category, "catname", "cid", "pid");
        $data = array();
        $type = array(1 => '栏目', 2 => '封面', 3 => '外链');
        foreach ($category as $n => $v) {
            $v['_type_name'] = $type[$v['cattype']];
            $data[$v['cid']] = $v;
            $data[$v['cid']]['model_name'] = $this->table('model')->where("mid={$v['mid']}")->getField('model_name');
        }
        return F("category", $data);
    }

    //删除栏目
    public function del_category()
    {
        $cid = Q("cid", NULL, 'intval');
        import('Content.Model.ContentModel');
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
        $this->set_category_access($data);
    }

    public function __after_update($data)
    {
        $this->update_cache();
        $this->set_category_access(Q('cid'));
    }
}