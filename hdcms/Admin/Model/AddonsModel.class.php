<?php

/**
 * 插件模型
 * Class AddonModel
 */
class AddonsModel extends Model
{
    public $table = 'addons';
    private $id;
    private $name; //插件名

    //构造函数
    public function __init()
    {
        $this->id = Q('id', 0, 'intval'); //插件id
        $this->name = Q('name', ''); //插件名
    }

    //验证插件唯一性
    public function addonUniqueCheck($name, $value, $msg, $arg)
    {
        $name = Q('name', '');
        if ($this->where(array('name' => $name))->find()) {
            return $msg;
        } else if (is_dir(APP_ADDON_PATH . $name)) {
            return $msg;
        } else {
            return true;
        }
    }

    //插件列表
    public function getAddonList()
    {
        //取得模块目录名称
        $dirs = array_map('basename', glob(APP_ADDON_PATH . '*', GLOB_ONLYDIR));
        if (empty($dirs)) {
            return false;
        }
        $addons = array();
        $addonList = $this->where(array('name' => $dirs))->all();
        if ($addonList != null) {
            foreach ($addonList as $addon) {
                $addon['install'] = 1;
                $addon['config'] = unserialize($addon['config']);
                $addons[$addon['name']] = $addon;
            }
        }
        foreach ($dirs as $d) {
            $addonObj = $this->getAddonObj($d); //获得插件对象
            if (!$addonObj) continue;
            //没有安装插件
            if (!isset($addons[$d])) {
                $addon = $addonObj->info;
                unset($addon['status']);
                $addon['install'] = 0;
                $addon['config'] = $addonObj->getConfig(); //获得插件配置
                $addons[$d] = $addon;
            }
        }
        int_to_string($addons, array('status' => array(0 => '禁用', 1 => '启用', null => '未安装')));
        return $addons;
    }

    /**
     * 获得插件对象
     * @param $addon 插件名
     * @return mixed;
     */
    public function getAddonObj($addon)
    {
        $classFile = APP_ADDON_PATH . $addon . '/' . $addon . 'Addon.class.php';
        if (!is_file($classFile)) return false;
        require_cache($classFile);
        $class = $addon . 'Addon'; //类名
        if (!class_exists($class)) {
            return false;
        }
        return new $class;
    }

    //安装插件
    public function installAddon()
    {
        $addon = Q('addon');
        if (!$addon) {
            $this->error = '参数错误';
        }
        if ($this->where(array('name' => $addon))->find()) {
            $this->error = '插件已经安装过';
            return false;
        }
        //获得插件对象
        $addonObj = $this->getAddonObj($addon);
        if (!$addonObj) {
            $this->error = '获取插件对象失败';
            return false;
        }
        $info = $addonObj->info;
        if (!$info) {
            $this->error = '获取插件信息失败';
            return false;
        }
        $data = $info;
        if (!$addonObj->install()) {
            $this->error = '执行插件预安装失败';
            return false;
        }
        $data['create_time'] = time(); //安装时间
        $data['config'] = serialize($addonObj->getConfig());
        if ($this->create($data)) {
            if (!$this->add()) {
                $this->error = '写入数据失败';
                return false;
            }
            $hooksModel = K('hooks');
            if (!$hooksModel->updateHooks($addon)) {
                $this->error = '更新钩子失败';
                return false;
            }
            //有后台菜单时，更新后台菜单
            if ($info['has_adminlist']) {
                $this->addAdminMenu($addon);
            }
            //更新缓存
            $this->updateAddonCache();
        }
        return true;
    }

    //卸载插件
    public function uninstallAddon()
    {
        $addon = Q('addon');
        if (!$addon) {
            $this->error = '参数错误';
        }
        if (!$this->where(array('name' => $addon))->find()) {
            $this->error = '插件不存在';
            return false;
        }
        //获得插件对象
        $addonObj = $this->getAddonObj($addon);
        if (!$addonObj) {
            $this->error = '获取插件对象失败';
            return false;
        }
        if (!$addonObj->uninstall()) {
            $this->error = '执行插件预卸载失败';
            return false;
        }
        //删除Hook表记录
        if (!K('Hooks')->removeHooks($addon)) {
            $this->error = '移除钩子失败';
            return false;
        }
        //删除Addon表记录
        if (!$this->where(array('name' => $addon))->del()) {
            $this->error = '删除插件失败';
            return false;
        }
        //有后台菜单时，更新后台菜单
        $this->delAdminMenu($addon);
        //更新缓存
        $this->updateAddonCache();
        return true;
    }

    //添加后台菜单
    public function addAdminMenu($addon_name)
    {
        $addon = $this->where(array('name' => $addon_name))->find();
        $node = array(
            'pid' => 50,
            'title' => $addon['title'],
            'app' => 'Addon',
            'module' => $addon_name,
            'controller' => 'Index',
            'action' => 'index',
            'param' => '',
            'comment' => '插件' . $addon_name . '后台管理',
            'state' => '1',
            'type' => '1',
        );
        return M('node')->add($node);
    }

    //删除插件菜单
    public function delAdminMenu($addon_name)
    {
        return M('node')->where(array('module' => $addon_name, 'app' => 'addons'))->del();
    }

    //更新缓存
    public function updateAddonCache()
    {
        $addonsList = M('addons')->all();
        $addons = array();
        if ($addonsList) {
            foreach ($addonsList as $addon) {
                $addons[$addon['name']] = $addon;
                $addons['config'] = unserialize($addon['config']);
            }
        }
        return S('addons', $addons);
    }
}