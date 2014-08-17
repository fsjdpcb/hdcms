<?php

/**
 * 插件基类
 * Class Addon
 */
class Addon
{
    protected $addonName; //插件名
    protected $addonPath; //插件目录
    public function __construct()
    {
        $this->addonName = $this->getAddonName();
        $this->addonPath = APP_ADDON_PATH . $this->addonName;
    }

    //获得配置项
    public function getConfig()
    {
        $config = array();
        if ($data = M('addons')->where(array('name' => $this->addonName))->find()) {
            $config = unserialize($data['config']);
        }
        if (empty($data)) {
            $configFile = $this->addonPath . '/config.php';
            if (is_file($configFile)) {
                $data = require $configFile;
                $config = array();
                foreach ($data as $name => $v) {
                    $config[$name] = $v['value'];
                }
            }
        }
        return $config;
    }

    //获得插件名
    final public function getAddonName()
    {
        $class = get_class($this);
        return substr($class, 0, strrpos($class, 'Addon'));
    }
}