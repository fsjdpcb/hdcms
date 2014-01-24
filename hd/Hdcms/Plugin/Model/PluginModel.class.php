<?php

/**
 * 插件管理
 * Class PluginModel
 */
class PluginModel extends Model
{
    //节点菜单表
    public $table = 'node';

    /**
     * 获得所有插件
     */
    public function get_all_plugin(){
        $plugin=Dir::tree('hd/Plugin');
        p($plugin);
    }

}