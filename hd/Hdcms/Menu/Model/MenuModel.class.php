<?php

/**
 * 菜单管理
 * Class MenuModel
 * @author hdxj <houdunwangxj@gmail.com>
 */
class MenuModel extends ViewModel
{
    public $table = "node";
    //角色rid
    public $rid;
    //关联权限表
    public $view = array(
        'access' => array(
            'type' => INNER_JOIN,
            "on" => "node.nid=access.nid",
        )
    );

    //构造函数
    public function __init()
    {
        $this->rid = session("rid");

    }

    //获得顶级菜单
    public function get_top_menu()
    {
        $menu = $this->get_all_menu();
        $data = array();
        foreach ($menu as $m) {
            if ($m['pid'] == 0) {
                $data[] = $m;
            }
        }
        return $data;
    }

    //获得常用菜单
    public function get_favorite_menu()
    {
        $menu = $this->get_all_menu();
        $data = array();
        foreach ($menu as $m) {
            if ($m['favorite'] == 1) {
                $data[] = $m;
            }
        }
        return $data;
    }

    //获得后台左侧子菜单
    public function get_child_menu($nid)
    {
        $menu = $this->get_all_menu();
        return Data::channelLevel($menu, $nid, "", "nid");
    }

    //根据角色获得菜单,超级管理员返回所有菜单
    private function get_all_menu()
    {
        //超级管理员获得所有菜单
        if (session("WEB_MASTER")) {
            $data = $this->join(NULL)->where("state=1")->order(array("list_order" => "ASC", 'nid' => 'DESC'))->all();
        } else {
            //所有菜单数据
            $data = $this
                ->where(C('DB_PREFIX') . "access.rid=" . $this->rid . " AND state=1")
                ->order(array("list_order" => "DESC"))->all();
        }
        return $data;
    }

    /**
     * 设置常用菜单
     */
    public function set_favorite()
    {
        //去掉所有常用的菜单状态
        $this->where("1=1")->update(array("favorite" => 0));
        //有修改时设置菜单
        if ($data = Q('post.nid', NULL, '')) {
            foreach ($data as $nid) {
                $this->save(array("nid" => $nid, "favorite" => 1));
            }
        }
        return true;
    }
}























