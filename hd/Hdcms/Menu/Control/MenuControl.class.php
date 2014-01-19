<?php

/**
 * 后台菜单管理模块
 * Class MenuControl
 * @author hdxj <houdunwangxj@gmail.com>
 */
class MenuControl extends AuthControl
{
    //模型
    protected $_db;

    public function __init()
    {
        parent::__init();
        //获得模型实例
        $this->_db = K("Menu");
    }

    //获得子菜单
    public function get_child_menu()
    {
        $nid = Q("get.nid", NULL, "intval");
        $menu = $this->_db->get_child_menu($nid);
        $html = "";
        $html .= "<div class='nid_$nid'>";
        foreach ($menu as $t) {
            $html .= "<dl><dt>" . $t['title'] . "</dt>";
            if ($t['_data']) {
                foreach ($t['_data'] as $d) {
                    $url = __ROOT__ . "/index.php?a=" . $d['app'] . "&c=" . $d['control'] . "&m=" . $d['method'];
                    $html .= "<dd><a nid='" . $d["nid"] . "' href='javascript:;'
                    onclick='get_content(this," . $d["nid"] . ")' url='" . $url . "'>"
                        . $d['title'] . "</a></dd>";
                }
            }
            $html .= "</dl>";
        }
        $html .= "</div>";
        $this->ajax($html, 'text');
    }

    //设置常用菜单
    public function set_favorite()
    {
        if (IS_POST) {
            if ($this->_db->set_favorite()) {
                $this->ajax(array('state' => 1, 'message' => '修改成功,请按F5刷新后台','timeout'=>3));
            }
        } else {
            //查找所有2级菜单
            $menu = $this->_db->join(NULL)->where("level=2")->order("list_order DESC")->all();
            foreach ($menu as $n => $m) {
                $s_menu = $this->_db->join(NULL)->where(array("pid" => $m['nid']))->order("list_order DESC")->all();
                //如果子菜单全选，二级菜单为选中状态
                $menu_state = true;
                foreach ($s_menu as $k => $v) {
                    //是否为常用菜单
                    $checked = $v['favorite'] == 1 ? ' checked="checked" ' : '';
                    $s_menu[$k]['html'] = "<label><input type='checkbox' name='nid[]' value='{$v['nid']}' {$checked}/> {$v['title']}</label>";
                    //顶级菜单状态
                    if (empty($checked)) $menu_state = false;
                }
                $checked=  $menu_state?' checked="checked" ':'';
                $menu[$n]['data'] = $s_menu;
                $menu[$n]['html'] = "<label><input type='checkbox' $checked/> {$m['title']}</label>";
            }
            $this->menu = $menu;
            $this->display();
        }
    }
}