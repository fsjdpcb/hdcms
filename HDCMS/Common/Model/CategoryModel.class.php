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
    //生成静态对象
    private $html;
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
        array('mid', 'nonull', '模型选择错误', 2, 3),
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
        $this->html = new Html();
    }

    /**
     * 添加栏目
     * @return bool
     */
    public function addCategory()
    {
        if ($this->create()) {
            $cid = $this->add();
            if ($cid) {
                //设置权限
                $this->setCategoryAccess($this->mid, $cid, $_POST['access']);
                //更新缓存
                $this->updateCache();
                //更新栏目
                $this->html->all_category();
                return true;
            } else {
                $this->error = '栏目添加失败';
                return false;
            }
        }
    }

    /**
     * 设置栏目权限
     * @param $mid
     * @param $cid
     * @param $access
     * @return bool
     */
    private function setCategoryAccess($mid, $cid, $access)
    {
        $model = M('category_access');
        //删除栏目原有权限信息
        $model->del(array('cid' => $this->cid));
        foreach ($access as $a) {
            if (count($a) == 2) continue;
            $a['mid'] = $mid;
            $a['cid'] = $cid;
            $model->add($a);
        }
        //编辑栏目时，如果选择应用到子栏目时设置子栏目权限
        if ($this->cid && $_POST['priv_child']) {
            //获得所有子栏目
            $childCategory = Data::channelList(M('category')->all(), $this->cid); //获得所有子栏目
            //存在子栏目时设置权限
            if ($childCategory) {
                //获得父栏目权限
                $access = $model->where("cid={$this->cid}")->all();
                //子栏目继承父栏目权限
                foreach ($childCategory as $scat) {
                    //删除子栏目原有权限
                    $map['cid'] = $scat['cid'];
                    $model->where($map)->del();
                    if ($access) {
                        foreach ($access as $data) {
                            $data['cid'] = $scat['cid'];
                            $model->add($data);
                        }
                    }
                }
            }
        }
        return true;
    }

    /**
     * 修改栏目
     * @return bool
     */
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
                //更新栏目
                $this->html->all_category();
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
        //更新栏目
        $this->html->all_category();
        //重建缓存
        return $this->updateCache();
    }

    /**
     * 删除栏目
     * @param $cid
     * @return bool
     */
    public function delCategory($cid)
    {
        if (!$cid || !isset($this->category[$cid])) {
            $this->error = 'cid参数错误';
            return false;
        }
        //获得子栏目
        $category = Data::channelList($this->category, $cid);
        $category[]['cid'] = $cid;
        foreach ($category as $cat) {
            //删除栏目文章
            $ContentModel = ContentModel::getInstance($this->category[$cat['cid']]['mid']);
            $ContentModel->where("cid=" . $cat['cid'])->del();
            //删除栏目权限
            M("category_access")->where("cid=" . $cat['cid'])->del();
            //删除栏目
            $this->del($cat['cid']);
        }
        //生成所有栏目
        $this->html->all_category();
        //生成首页
        $this->html->index();
        //更新缓存
        return $this->updateCache();
    }

    /**
     * 获得栏目前后台角色权限
     * @param $cid
     * @return array
     */
    public function getCategoryAccess($cid)
    {
        $pre = C("DB_PREFIX");
        $db = M("category_access");
        $sql = "SELECT a.cid,r.rid,r.rname,r.admin,a.add,a.del,a.edit,a.content,a.move,a.audit,a.order FROM
					{$pre}role AS r  LEFT JOIN (SELECT * FROM {$pre}category_access  WHERE cid=$cid) AS a
               	 	ON r.rid = a.rid ORDER BY r.rid ASC";
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
                //栏目图片
                $cat['catimage'] = $cat['catimage'] ? __ROOT__ . '/' . $cat['catimage'] : '';
                $cache[$cat['cid']] = $cat;
            }
        }
        if (S("category", $cache)) {
            //设置栏目权限缓存
            K("CategoryAccess")->updateCache();
            return true;
        } else {
            $this->error = '栏目缓存更新失败';
            return false;
        }
    }
}