<?php

/**
 * 后台首页
 * Class IndexControl
 * @category Admin
 * @author 向军 <houdunwangxj@gmail.com>
 */
class IndexController extends AuthController
{
    //后台首页
    public function index()
    {
        //获得顶级菜单
        if (IS_SUPER_ADMIN) {
            $nodeData = F('node', false,CACHE_DATA_PATH);
            $topMenu = array();
            if ($nodeData) {
                foreach ($nodeData as $node) {
                    if ($node['pid'] == 0) {
                        $topMenu[] = $node;
                    }
                }
            }
        } else {
            $model = M();
            $pre = C('DB_PREFIX');
            $sql = "SELECT n.nid,n.title FROM {$pre}access AS a RIGHT JOIN {$pre}node AS n  ON n.nid=a.nid
			WHERE n.show=1 and n.pid=0 AND (n.type=2 OR a.rid=" . $_SESSION['rid'] . ')';
            $topMenu = $model->query($sql);
        }
        //当前用户常用菜单
        $favoriteMenu = F($_SESSION['uid'], false,CACHE_MENU_PATH);
        $this->assign('top_menu', $topMenu);
        $this->assign('favorite_menu', $favoriteMenu);
        $this->display();
    }

    //点击顶部菜单时获得左侧子菜单
    public function getChildMenu()
    {
        $pid = Q('pid', 0, 'intval');
        //超级管理员获得所有菜单
        if (IS_SUPER_ADMIN) {
            $MenuData = F('node',false,CACHE_DATA_PATH);
        } else {
            $nodeModel = V('node');
            $nodeModel->view=array(
                'access' => array('_type' => 'RIGHT'),
                'node' => array('_on' => '__node__.nid=__access__.nid'),
            );
            //获得当前角色权限
            $MenuData = $nodeModel->where("access.rid={$_SESSION['rid']} OR type=2")->order(array("list_order" => "ASC"))->all();
        }
        //去掉隐藏的菜单
        $showMenuData = array();
        foreach ($MenuData as $menu) {
            if ($menu['show'] == 1) {
                $showMenuData[] = $menu;
            }
        }
        $childMenuData = Data::channelLevel($showMenuData, $pid, '', 'nid');
        $html = "<div class='nid_$pid'>";
        foreach ($childMenuData as $menu) {
            $html .= "<dl><dt>" . $menu['title'] . "</dt>";
            foreach ($menu['_data'] as $linkMenu) {
                    $param = $linkMenu['param'] ? '&' . $linkMenu['param'] : '';
                    if($linkMenu['app']){
                        $url = __ROOT__ . "/index.php?app=".$linkMenu['app']."&m=" . $linkMenu['module'] . "&c=" . $linkMenu['controller'] . "&a=" . $linkMenu['action'] . $param;
                    }else{
                        $url = __ROOT__ . "/index.php?m=" . $linkMenu['module'] . "&c=" . $linkMenu['controller'] . "&a=" . $linkMenu['action'] . $param;
                    }
                    $html .= "<dd><a nid='" . $linkMenu["nid"] . "' href='javascript:;'
                    onclick='get_content(this," . $linkMenu["nid"] . ")' url='" . $url . "'>" . $linkMenu['title'] . "</a></dd>";
                }
            $html .= "</dl>";
        }
        $html .= "</div>";
        $this->ajax($html, 'text');
    }

    //欢迎页
    public function welcome()
    {
        $this->display();
    }

    //设置常用菜单
    public function setFavorite()
    {
        if (IS_POST) {
            $post = $_POST;
            //删除旧的收藏
            $favoriteModel = M('menu_favorite');
            $favoriteModel->del(array('uid' => $_SESSION['uid']));
            if (!empty($_POST['nid'])) {
                foreach ($post['nid'] as $nid) {
                    $favoriteModel->add(array('uid' => $_SESSION['uid'], 'nid' => $nid));
                }
            }
            $pre = C("DB_PREFIX");
            //更新缓存
            $sql = "SELECT * FROM {$pre}menu_favorite AS m JOIN {$pre}node AS n ON m.nid=n.nid WHERE uid=" . $_SESSION['uid'];
            $favoriteMenu = M()->query($sql);
            F($_SESSION['uid'], $favoriteMenu, CACHE_MENU_PATH);
            $this->success('设置成功');
        } else {
            $nodeModel = M('node');
            $pre = C('DB_PREFIX');
            if (session("WEB_MASTER") || session("rid") == 1) {
                $sql = "SELECT n.nid,n.pid,m.uid,n.title FROM {$pre}node AS n  LEFT JOIN
							 (SELECT * FROM {$pre}menu_favorite WHERE uid={$_SESSION['uid']}) AS m ON n.nid = m.nid WHERE n.show=1";
            } else {
                $sql = "SELECT n.nid,n.pid,m.uid,n.title FROM {$pre}node AS n  LEFT JOIN  {$pre}access AS a ON n.nid=a.nid LEFT JOIN
							 (SELECT * FROM {$pre}menu_favorite WHERE uid={$_SESSION['uid']}) AS m ON n.nid = m.nid 
							 WHERE n.type=2 OR (n.show=1 AND m.nid is not null)";
            }
            $nodeData = $nodeModel->query($sql);
            $nodeData = Data::channelLevel($nodeData, 0, "", "nid");
            $this->assign('data', $nodeData);
            $this->display();
        }
    }
}
