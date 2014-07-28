<?php

/**
 * 栏目管理模块
 * Class CategoryController
 * @author 向军 <houdunwangxj@gmail.com>
 */
class CategoryController extends AuthController
{
    private $category, $model, $db, $cid, $mid;

    //构造函数
    public function __init()
    {
        $this->category = F("category", false, CACHE_DATA_PATH);
        $this->model = F("model", false, CACHE_DATA_PATH);
        $this->db = K('Category');
        $this->cid = Q('cid', null, 'intval');
        $this->mid = Q('mid', null, 'intval');
    }

    /**
     * 显示栏目列表
     */
    public function index()
    {
        $this->assign("category", $this->category);
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
            if ($this->db->addCategory()) {
                $this->success('添加栏目成功');
            } else {
                $this->error($this->db->error);
            }
        } else {
            //获取角色数据，以后台和前台用户区分
            $roles = F('role', false, CACHE_DATA_PATH);
            $roleData = array('admin' => array(), 'user' => array());
            foreach ($roles as $role) {
                if ($role['admin'] == 1) {
                    $roleData['admin'][] = $role;
                } else {
                    $roleData['user'][] = $role;
                }
            }
            $this->assign('model', $this->model);
            $this->assign('category', $this->category);
            $this->assign('roleData', $roleData);
            $this->display();
        }
    }

    //修改栏目到表
    public function edit()
    {
        if (IS_POST) {
            if ($this->db->editCategory()) {
                $this->success('修改栏目成功');
            } else {
                $this->error($this->db->error);
            }
        } else {
            if (!$this->cid || !isset($this->category[$this->cid])) {
                $this->error('cid不存在');
            }
            $cache = $this->category;
            $category = $cache[$this->cid];
            foreach ($cache as $n => $cat) {
                $selected = $disabled = "";
                //父栏目select状态
                $selected = $category['pid'] == $cat['cid'] ? 'selected=""' : '';
                //子栏目disabled
                $disabled = Data::isChild($this->category, $cat['cid'], $this->cid) ? 'disabled=""' : '';
                //当前栏目不可选
                if ($this->cid == $cat['cid']) {
                    $disabled = 'disabled="disabled"';
                }
                $cache[$n]['selected'] = $selected;
                $cache[$n]['disabled'] = $disabled;
            }
            $categoryAccess = $this->db->getCategoryAccess($this->cid);
            //分配角色权限
            $this->assign('access', $categoryAccess);
            $this->assign('field', $category);
            $this->assign('category', $cache);
            $this->display();
        }
    }

    //更新栏目排序
    public function updateOrder()
    {
        $CategoryModel = K("Category");
        if ($CategoryModel->updateOrder())
            $this->success('更改排序成功');
    }

    //更新栏目缓存
    public function updateCache()
    {
        $categoryModel = K('Category');
        if ($categoryModel->updateCache()) {
            $this->success('更新缓存成功');
        } else {
            $this->error($categoryModel->error);
        }
    }

    //删除栏目
    public function del()
    {
        if ($this->db->delCategory($this->cid)) {
            $this->success('删除栏目成功');
        } else {
            $this->error($this->db->error);
        }
    }

    //批量编辑栏目
    public function BulkEdit()
    {
        if (Q('post.BulkEdit')) {
            foreach ($_POST['cat'] as $data) {
                $this->db->save($data);
            }
            $this->db->updateCache();
            $this->success('修改成功');
        } else {
            $cid = explode('|', Q('cids'));
            $data = $this->db->where(array('cid'=>$cid))->all();
            $this->assign('data', $data);
            $this->display();
        }
    }

}
