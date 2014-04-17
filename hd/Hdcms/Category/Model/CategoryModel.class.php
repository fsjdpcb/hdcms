<?php

/**
 * 栏目管理模型
 * Class CategoryModel
 * @author hdxj <houdunwangxj@gamil.com>
 */
class CategoryModel extends Model
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
        $this->_category = cache("category", false);
        $this->_model = cache("model", false);
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
     * 设置栏目权限(添加与修改栏目后动态执行)
     * @param $cid 栏目cid
     * @return bool
     */
    public function __set_category_access($cid)
    {
        $db = M("category_access");
        //获得栏目mid
        $mid = $db->table('category')->where("cid=$cid")->getField('mid');
        //删除原有权限配置
        $db->where("cid=$cid")->del();
        //设置管理员权限
    	foreach ($_POST["access"] as $a) {
    		if(count($a)==2)continue;
  			//没有选择权限，只有rid的数据，不进行操作
    		//添加cid,mid等数据字段
  			$a['cid'] = $cid;
     		$a['mid'] = $mid;
     		$db->add($a);
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
        $db = M('category');
        foreach ($list_order as $cid => $order) {
            $cid = intval($cid);
            $order = intval($order);
            $data = array("cid" => $cid, "catorder" => $order);
            $db->save($data);
        }
        //重建缓存
        return $this->update_cache();
    }

    //更新栏目缓存
    public function update_cache()
    {
        $db = V('category');
        $db->view=array(
        	'model'=>array(
        		'type'=>INNER_JOIN,
        		'on'=>'category.mid=model.mid'
        	)
        );
        $category = $db->order("catorder ASC,cid ASC")->all();
        if (!empty($category)) {
            foreach ($category as $n => $v) {
                //封面与链接栏目添加disabled属性
                $v["disabled"] = $v["cattype"] != 1 ? 'disabled="disabled"' : '';
            }
        }
        $category = Data::tree($category, "catname", "cid", "pid");
        $data = array();
        $type = array(1 => '栏目', 2 => '封面', 3 => '外链', 4 => '单文章');
        foreach ($category as $n => $v) {
            $v['_type_name'] = $type[$v['cattype']];
            $data[$v['cid']] = $v;
            //权限记录
            $result= $db->table('category_access')->where("cid={$v['cid']}")->all();
            $access = array('admin'=>array(),'user'=>array());
            if (!is_null($result)) { 
                foreach ($result as $i => $a) {
                	if($a['admin']==1){
                    	$access['admin'][$a['rid']] = $a;
                 	}else{
                 		$access['user'][$a['rid']]=$a;
                 	}
                }
            }
            //普通用户权限
            $data[$v['cid']]['access'] = $access;
        }
        //获得栏目权限信息

        return cache("category", $data);
    }

    //删除栏目
    public function del_category()
    {
        $cid = Q("cid", NULL, 'intval');
        //删除单文章
        M('content_single')->where("cid=$cid")->del();
        //删除普通文章
        import('Content.Model.ContentModel');
        K("Content")->where("cid=$cid")->del();
        //删除栏目权限
        M("category_access")->where("cid=$cid")->del();
        //删除栏目
        return $this->del($cid);
    }

    /**
     * 修改栏目时获得管理员与会员的权限信息(后台操作）
     * 用于获得管理员或前台会员权限
     * @param null $cid 栏目cid
     * @param null $roleType 角色类型  1 管理员  0 前台用户
     * @param null $rid 角色id($admin有值才有效)
     */
    public function get_access_list($cid, $roleType)
    {
        //表前缀
        $pre = C("DB_PREFIX");
        $db = M("category_access");
        $field = 'a.cid,r.rid,r.rname,r.admin,a.add,a.del,a.edit,a.show,a.move,a.audit,a.order';
		//获得后台或前台角色rid
        $rids = M('role')->where("admin=$roleType")->getField('rid',true);
        $sql = "SELECT $field FROM  {$pre}role AS r  LEFT JOIN (SELECT * FROM {$pre}category_access  WHERE cid=$cid) AS a
                ON r.rid = a.rid
                WHERE r.rid IN (" . implode(",", $rids) . ") AND r.rid<>1";
        return $db->query($sql);
    }

    public function __after_delete($data)
    {
        $this->update_cache();
    }

    public function __after_insert($data)
    {
        $this->__set_category_access($data);
        $this->update_cache();
    }

    public function __after_update($data)
    {
        $this->__set_category_access(Q('cid'));
        $this->update_cache();
    }
}