<?php

/**
 * 插件父级控制器
 * Class AddonController
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class AddonController extends Controller
{
    public function __construct()
    {
        $this->setAddonConfig();
        parent::construct();
        if (method_exists($this, '__init')) {
            $this->__init();
        }
    }

    //设置插件配置项
    public function setAddonConfig()
    {
        $obj = K('Addons')->getAddonObj(MODULE);
        if (!$obj) {
            $this->error('插件不存在');
        }
        $config = $obj->getConfig();
        C('addon', $config);
    }
}