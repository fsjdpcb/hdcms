<?php
if (!defined("HDPHP_PATH")) exit;
/**
 * 验证栏目权限
 * @param int $cid 栏目cid
 * @param string @action 动作 [add,edit,del,order,move,audit]
 * @return boolean
 */
function check_category_access($cid, $action)
{
    $category = cache('category');
    $action = strtolower($action);
    $cat = $category[$cid];
    if (!in_array($action, array('show', 'add', 'edit', 'del', 'order', 'move', 'audit'))) {
        return true;
    }else if (empty($_SESSION['rid'])) {
        return false;
    } else if ($_SESSION['rid'] == 1 || $_SESSION['WEB_MASTER']) {
        //管理员,站长或栏目没有设置权限控制时验证通过
        return true;
    } else if ($_SESSION['admin'] == 1 && empty($cat['access']['admin'])) {
        //后台管理员，当没有设置管理员权限时默认为权限通过
        return true;
    } else if ($_SESSION['admin'] == 0 && empty($cat['access']['user'])) {
        //前台面会员，当没有设置前台会员权限时默认为权限通过
        return true;
    } else {
        $roleType = $_SESSION['admin'] == 1?'admin':'user';
        $access = $cat['access'][$roleType];
        $rid = $_SESSION['rid'];
        if (!isset($access[$rid])) return false;
        switch ($action) {
            case 'add':
                if ($access[$rid]['add'] == 0)
                    return false;
                break;
            case 'edit':
                if ($access[$rid]['edit'] == 0)
                    return false;
                break;
            case 'del':
                if ($access[$rid]['del'] == 0)
                    return false;
                break;
            case 'order':
                if ($access[$rid]['order'] == 0)
                    return false;
                break;
            case 'move':
                if ($access[$rid]['move'] == 0)
                    return false;
                break;
            case 'audit':
                if ($access[$rid]['audit'] == 0)
                    return false;
                //审核
                break;
        }
        return true;
    }
}

/**
 * HDCMS缓存函数
 * @param String $name 缓存KEY
 * @param bool $value 删除缓存
 * @return bool
 */
function cache($name, $value = false)
{
    return F($name, $value, 'data/Cache/Data');
}

/**
 * 获取指定栏目的所有子栏目（包含栏目本身）
 * @param $cid 栏目cid
 * @return array
 */
function get_son_category($cid)
{
    $data = array();
    $cid = explode(',', $cid);
    foreach ($cid as $id) {
        $data[] = $id;
        $son_category = Data::channelList(cache('category'), intval($id));
        if ($son_category) {
            foreach ($son_category as $c) {
                $data[] = $c['cid'];
            }
        }
    }
    return $data;
}

/**
 * 获得用户头像
 * @param $uid
 * @param $size 50|100|150 头像尺寸
 * @return string
 */
function get_user_icon($uid, $size = 50)
{
    $dir = 'upload/user/' . max(ceil($uid / 500), 1);
    return __ROOT__ . '/' . $dir . '/' . $uid . '_' . $size . '.png';
}

