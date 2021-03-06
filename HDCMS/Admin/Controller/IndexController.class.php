<?php

/**
 * 后台首页
 * Class IndexControl
 * @category Admin
 * @author 向军 <houdunwangxj@gmail.com>
 */
class IndexController extends AuthController
{
    //构造函数
    public function __init()
    {
    }


    //后台首页
    public function index()
    {
        //获得顶级菜单
        if ($_SESSION['user']['web_master'] || $_SESSION['user']['rid'] == 1) {
            $nodeData = S('node');
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
			WHERE n.show=1 and n.pid=0 AND (n.type=2 OR a.rid=" . $_SESSION['user']['rid'] . ')';
            $topMenu = $model->query($sql);
        }
        //当前用户常用菜单
        $favoriteMenu = S('user_menu' . $_SESSION['user']['uid']);
        if (!empty($favoriteMenu)) {
            foreach ($favoriteMenu as $n => $f) {
                $g = empty($f['group']) ? '' : 'g=' . $f['group'] . '&';
                $favoriteMenu[$n]['url'] = __ROOT__ . '/index.php?' . $g . "m={$f['module']}&c={$f['controller']}&a={$f['action']}&nid={$f['nid']}";
            }
        }
        $this->assign('top_menu', $topMenu);
        $this->assign('favorite_menu', $favoriteMenu);
        $this->display();
    }

    //点击顶部菜单时获得左侧子菜单
    public function getChildMenu()
    {
        $pid = Q('pid', 0, 'intval');
        //超级管理员获得所有菜单
        if ($_SESSION['user']['web_master'] || $_SESSION['user']['rid'] == 1) {
            $MenuData = S('node');
        } else {
            $nodeModel = V('node');
            $nodeModel->view = array(
                'access' => array('_type' => 'RIGHT'),
                'node' => array('_on' => '__node__.nid=__access__.nid'),
            );
            //获得当前角色权限
            $MenuData = $nodeModel->where("access.rid={$_SESSION['user']['rid']} OR type=2")->order("list_order ASC ")->all();
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
                if ($linkMenu['group']) {
                    $url = __ROOT__ . "/index.php?g=" . $linkMenu['group'] . "&m=" . $linkMenu['module'] . "&c=" . $linkMenu['controller'] . "&a=" . $linkMenu['action'] . $param;
                } else {
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
        //客户端版本验证(本地不验证)
        if (mt_rand(1,10)==1 && function_exists('curl_init') && !preg_match('@localhost|127.0.0.1|192.168.@', __ROOT__)){
            $curl = curl_init();
            $version = C('HDCMS_VERSION');
            // 设置URL和相应的选项
            curl_setopt($curl, CURLOPT_URL, 'http://www.hdphp.com/version.php?version=' . $version.'&web='.__ROOT__);
            curl_setopt($curl, CURLOPT_HEADER, 0);
            //超时时间
            curl_setopt($curl, CURLOPT_TIMEOUT, 10);
            //结果保存在字符串中
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($curl);
            curl_close($curl);
            $json = unserialize($data);
            if ($json && $json['status'] == 'haveUpdate') {
                $this->assign('updateMessage', $json['message']);
            } else {
                $this->assign('updateMessage', 0);
            }
        }
        //首次登录时更新缓存
        $this->display();
        if (!S('model')) {
            $_POST['action'] = 'all';
            go(U('Cache/index', array('action' => 'Config')));
        }
    }

    //设置常用菜单
    public function setFavorite()
    {
        if (IS_POST) {
            $post = $_POST;
            //删除旧的收藏
            $favoriteModel = M('menu_favorite');
            $favoriteModel->del(array('uid' => $_SESSION['user']['uid']));
            if (!empty($_POST['nid'])) {
                foreach ($post['nid'] as $nid) {
                    $favoriteModel->add(array('uid' => $_SESSION['user']['uid'], 'nid' => $nid));
                }
            }
            $pre = C("DB_PREFIX");
            //更新缓存
            $sql = "SELECT * FROM {$pre}menu_favorite AS m JOIN {$pre}node AS n ON m.nid=n.nid WHERE uid=" . $_SESSION['user']['uid'];
            $favoriteMenu = M()->query($sql);
            S('user_menu' . $_SESSION['user']['uid'], $favoriteMenu);
            $this->success('设置成功');
        } else {
            $nodeModel = M('node');
            $pre = C('DB_PREFIX');
            if ($_SESSION['user']['web_master'] || $_SESSION['user']['rid'] == 1) {
                $sql = "SELECT n.nid,n.pid,m.uid,n.title FROM {$pre}node AS n  LEFT JOIN
							 (SELECT * FROM {$pre}menu_favorite WHERE uid={$_SESSION['user']['uid']}) AS m ON n.nid = m.nid WHERE n.show=1";
            } else {
                $sql = "SELECT n.nid,n.pid,m.uid,n.title FROM {$pre}node AS n  LEFT JOIN  {$pre}access AS a ON n.nid=a.nid LEFT JOIN
							 (SELECT * FROM {$pre}menu_favorite WHERE uid={$_SESSION['user']['uid']}) AS m ON n.nid = m.nid
							 WHERE n.type=2 OR (n.show=1 AND m.nid is not null)";
            }
            $nodeData = $nodeModel->query($sql);
            $nodeData = Data::channelLevel($nodeData, 0, "", "nid");
            $this->assign('data', $nodeData);
            $this->display();
        }
    }
}
