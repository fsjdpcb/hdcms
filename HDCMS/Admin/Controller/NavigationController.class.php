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
        $this->navigation = S('navigation');
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
                $this->success('修改成功！');
            }
        } else {
            $nid = Q('nid', 0, 'intval');
            foreach ($this->navigation as $id => $nav) {
                $disabled = $selected = '';
                if (Data::isChild($this->navigation, $nav['nid'],$nid,'nid') || $id==$nid) {
                    $disabled = 'disabled=""';
                }
                if ($this->navigation[$nid]['pid'] ==$nav['nid']) {
                    $selected = 'selected="selected"';
                }
                $this->navigation[$id]['disabled'] = $disabled;
                $this->navigation[$id]['selected'] = $selected;
            }
            $this->assign('navigation', $this->navigation);
            $this->assign('field', $this->navigation[$nid]);
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