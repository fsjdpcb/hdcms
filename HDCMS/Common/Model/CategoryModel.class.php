<?php

/**
 * 栏目管理模型
 * Class CategoryModel
 * @author hdxj <houdunwangxj@gamil.com>
 */
class CategoryModel extends ViewModel
{
    //表
    public $table = "category";
    //模型缓存
    private $model;
    private $mid;
    private $cid;
    //栏目缓存
    private $category;
    //栏目类型
    private $categoryType = array(1 => '栏目', 2 => '封面', 3 => '外链', 4 => '单文章');
    //多表关联
    public $view = array(
        'category' => array('_type' => 'INNER'),
        'model' => array('_on' => 'category.mid=model.mid')
    );
    //自动验证
    public $validate = array(
        array('catname', 'nonull', '栏目名称不能为空', 2, 3),
        array('catname', 'maxlen:30', '栏目名不能超过30个字', 2, 3),
        array('mid', 'nonull', '模型mid不能为空', 2, 3),
        array('mid', 'CheckMid', '模型不存在', 2, 3),
        array('catdir', 'nonull', '静态目录不能为空', 2, 3)
    );

    //验证模型mid值
    public function CheckMid($name, $mid, $msg, $arg)
    {
        return M('model')->find($mid) ? true : $msg;
    }

    //构造函数
    public function __init()
    {
        $this->category = S("category");
        $this->model = S("model");
        $this->cid = Q('cid', 0, 'intval');
        $this->mid = Q('mid', 0, 'intval');
    }

    // 添加栏目
    public function addCategory()
    {
        if ($this->create()) {
            $cid = $this->add();
            if ($cid) {
                //设置权限
                $this->setCategoryAccess($this->mid, $cid, $_POST['access']);
                //更新缓存
                $this->updateCache();
                //更新静态
                $this->createHtml($cid);
                return true;
            } else {
                $this->error = '栏目添加失败';
                return false;
            }
        }
    }

    //更新栏目静态
    public function createHtml($cid)
    {
        $html = new Html();
        //生成首页
        $html->index();
        //生成当前栏目
        $html->relation_category($cid);
        //更新父级栏目
        $parentCategory = Data::parentChannel(S('category'), $cid);
        if (!empty($parentCategory)) {
            foreach ($parentCategory as $cat) {
                $html->relation_category($cat['cid']);
            }
        }
        return true;
    }

    //设置栏目权限
    private function setCategoryAccess($mid, $cid, $access)
    {
        if (empty($access)) return;
        $model = M('category_access');
        //删除栏目原有权限信息
        $model->del(array('cid' => $this->cid));
        foreach ($_POST['access'] as $access) {
            if (count($access) == 2) continue;
            $a['mid'] = $mid;
            $a['cid'] = $cid;
            $model->add($access);
        }
        return true;
    }

    //修改栏目
    public function editCategory()
    {
        if (!M('category')->find($this->cid)) {
            $this->error = '栏目不存在';
            return false;
        }
        if ($this->create()) {
            if ($this->save()) {
                $this->setCategoryAccess($this->mid, $this->cid, $_POST['access']);
                $this->updateCache();
                $this->createHtml($this->cid);
                return true;
            } else {
                $this->error = '修改栏目失败';
                return false;
            }
        }
    }

    /**
     * 更新栏目排序
     */
    public function updateOrder()
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
        return $this->updateCache();
    }

    //删除栏目
    public function delCategory($cid)
    {
        if (!$cid || !isset($this->category[$cid])) {
            $this->error = 'cid参数错误';
            return false;
        }
        //如果存在子栏目不进行删除
        if (M('category')->where(array('pid' => $cid))->find()) {
            $this->error = '请先删除子栏目';
            return false;
        }
        $ContentModel = ContentModel::getInstance($this->category[$cid]['mid']);
        $ContentModel->where(array('cid' => $cid))->del();
        //删除栏目权限
        M("category_access")->where("cid=$cid")->del();
        //删除栏目
        if ($this->del($cid)) {
            $html = new Html();
            //生成首页
            $html->index();
            //更新父级栏目
            $parentCategory = Data::parentChannel(S('category'), $cid);
            if (!empty($parentCategory)) {
                foreach ($parentCategory as $cat) {
                    $html->relation_category($cat['cid']);
                }
            }
            //更新缓存
            $this->updateCache();
            return true;
        } else {
            $this->error = '删除失败';
            return false;
        }
    }

    //获得栏目前后台角色权限
    public function getCategoryAccess($cid)
    {
        $pre = C("DB_PREFIX");
        $db = M("category_access");
        $sql = "SELECT a.cid,r.rid,r.rname,r.admin,a.add,a.del,a.edit,a.show,a.move,a.audit,a.order FROM
					{$pre}role AS r  LEFT JOIN (SELECT * FROM {$pre}category_access  WHERE cid=$cid) AS a
               	 	ON r.rid = a.rid";
        $accessData = $db->query($sql);
        $categoryAccess = array('admin' => array(), 'user' => array());
        foreach ($accessData as $access) {
            if ($access['admin'] == 1) {
                $categoryAccess['admin'][] = $access;
            } else {
                $categoryAccess['user'][] = $access;
            }
        }
        return $categoryAccess;
    }

    //更新栏目缓存
    public function updateCache()
    {
        $data = $this->order("catorder ASC,cid ASC")->all();
        //缓存数据
        $cache = array();
        if ($data) {
            $data = Data::tree($data, "catname", "cid", "pid");
            foreach ($data as $cat) {
                //封面与链接栏目添加disabled属性
                $cat["disabled"] = $cat["cattype"] != 1 ? 'disabled=""' : '';
                $cat['cat_type_name'] = $this->categoryType[$cat['cattype']];
                //栏目模板
                switch ($cat['cattype']) {
                    case 1 : //普通栏目
                        $cat['template'] = 'template/' . C("WEB_STYLE") . '/' . $cat['list_tpl'];
                        break;
                    case 2 : //封面栏目
                        $cat['template'] = 'template/' . C("WEB_STYLE") . '/' . $cat['index_tpl'];
                        break;
                }
                $cache[$cat['cid']] = $cat;
            }
        }
        if (S("category", $cache, 0)) {
            return true;
        } else {
            $this->error = '栏目缓存更新失败';
            return false;
        }
    }
}
