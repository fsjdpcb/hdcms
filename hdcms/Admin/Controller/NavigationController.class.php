<?php

/**
 * 导航菜单模块
 * Class NavigationControl
 */
class NavigationController extends AuthController
{
    //操作模型
    private $db;
    //导航缓存
    private $navigation;

    public function __init()
    {
        $this->db = K("Navigation");
        $this->navigation = F('navigation', false, CACHE_DATA_PATH);
    }

    //导航列表
    public function index()
    {
        $this->assign('navigation', $this->navigation);
        $this->display();
    }

    //添加导航
    public function add()
    {
        if (IS_POST) {
            if ($this->db->add_nav()) {
                $this->success('添加导航成功！');
            }
        } else {
            $this->assign('navigation', $this->navigation);
            $this->display();
        }
    }

    //修改导航
    public function edit()
    {
        if (IS_POST) {
            if ($this->db->edit_nav()) {
                $this->ajax(array('state' => 1, 'message' => '修改导航成功！'));
            }
        } else {
            $this->nav = $this->navigation;
            $field = $this->navigation[Q('nid')];
            //替换链接中的{__ROOT__}变量
            $field['url'] = str_replace('{__ROOT__}', __ROOT__, $field['url']);
            $this->field = $field;
            $this->display();
        }
    }

    //删除导航
    public function del()
    {
        if ($this->db->delNavigation()) {
            $this->success('删除导航成功');
        } else {
            $this->error($this->db->error);
        }
    }

    //更新排序
    public function update_order()
    {
        if ($this->db->update_order()) {
            $this->success('更改排序成功');
        }
    }

    //更新缓存
    public function update_cache()
    {
        if ($this->db->update_cache()) {
            $this->success('缓存更新成功！');
        }
    }
}