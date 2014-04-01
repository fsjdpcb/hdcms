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
    //菜单（节点）
    private $_menu;

    public function __init()
    {
        parent::__init();
        //获得模型实例
        $this->_db = K("Menu");
        $this->_menu = F('node');
    }

    /**
     * 更新菜单时获得所有子菜单id
     * hd/Hdcms/Hdcms/js/menu.js update_menu()方法使用
     */
    public function get_child_menu_id()
    {
        //父级菜单(顶级菜单)
        $pid = Q('pid', null, 'intval');
        $data = Data::channelList($this->_menu, $pid, '', 'nid', 'pid');
        //子菜单
        $sid = array();
        if (is_array($data)) {
            foreach ($data as $d) {
                $sid[] = $d['nid'];
            }
        }
        $this->ajax($sid);
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
                    $param = $d['param'] ? '&' . $d['param'] : '';
                    $url = __ROOT__ . "/index.php?g=" . $d['app_group'] . "&a=" . $d['app'] . "&c=" . $d['control'] . "&m=" . $d['method'] . $param;
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
                $this->ajax(array('state' => 1, 'message' => '修改成功,请按F5刷新后台', 'timeout' => 3));
            }
        } else {
            //查找所有2级菜单
            $menu = array();
            foreach ($this->_menu as $nid => $m) {
                if ($m['_level'] == 2) {
                    //子菜单
                    $s_menu = $this->_db->join(NULL)->where(array("pid" => $nid))->order("list_order ASC")->all();
                    if ($s_menu) {
                        //如果子菜单全选，二级菜单为选中状态
                        foreach ($s_menu as $k => $v) {
                            //常用菜单判断
                            $checked = $v['favorite'] == 1 ? ' checked="checked" ' : '';
                            $s_menu[$k]['html'] = "<label><input type='checkbox' name='nid[]' value='{$v['nid']}' {$checked}/> {$v['title']}</label>";
                        }
                        $menu[$nid]['data'] = $s_menu;
                        $menu[$nid]['html'] = "<label><input type='checkbox'/> {$m['title']}</label>";
                    }
                }
            }
            $this->menu = $menu;
            $this->display();
        }
    }
}