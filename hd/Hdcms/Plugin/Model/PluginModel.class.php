<?php

/**
 * 插件管理
 * Class PluginModel
 */
class PluginModel extends Model
{
    //节点菜单表
    public $table = 'plugin';

    /**
     * 获得所有插件
     */
    public function get_all_plugin()
    {
        $dir = Dir::tree('hd/Plugin');
        $plug = array();
        foreach ($dir as $d) {
            //插件应用名
            $app = $d['name'];
            //插件配置
            $conf = require "hd/Plugin/$app/Config/config.php";
            $conf['app'] = $app;
            //转为小写，方便视图调用
            $conf = array_change_key_case_d($conf);
            $plug[$d['name']] = $conf;
            //是否安装
            $state = $this->where("app='$app'")->find();
            if ($state) {
                $plug[$d['name']]['state'] =
                    "<font color='green'>已安装</font>
<a href='" . __WEB__ . "?a=Plugin&c=Install&m=uninstall&plug=$app' style='color:green'>
<u>卸载</u>
</a>";
            } else {
                $plug[$d['name']]['state'] =
                    "未安装
    <a href='" . __WEB__ . "?a=Plugin&c=Install&m=install&plug=$app'>
<u>安装</u>
</a>";
            }
        }
        return $plug;
    }

    /**
     * 安装插件
     * @param $plugin_name 插件名称(即插件应用目录名)
     */
    public function install_plugin($plugin_name)
    {
        //创建表
        if (M()->runSql(file_get_contents('hd/Plugin/' . $plugin_name . '/Data/install.sql'))) {
            $data = require 'hd/Plugin/' . $plugin_name . '/Config/config.php';
            $data = array_change_key_case_d($data);
            $data['app'] = $plugin_name; //应用名
            $data['install_time'] = date("Y-m-d"); //安装时间
            //添加菜单
            if ($this->add($data)) {
                $data = array(
                    'title' => $data['name'], //节点名称
                    'app_group' => 'Plugin', //应用组
                    'app' => $plugin_name, //应用名称
                    'control' => 'Manage', //默认控制器
                    'method' => 'index', //默认方法
                    'state' => 1, //状态
                    'pid' => 94, //父级菜单id(正在使用)
                    'plugin' => 1, //是否为插件
                    'type' => 2, //普通菜单
                );
                return $this->table('node')->add($data);
            }
        }
    }

    /**
     * 卸载插件
     * @param $plugin_name 插件名称(即插件应用目录名)
     */
    public function uninstall_plugin($plugin_name)
    {
        //删除表
        if (M()->runSql(file_get_contents("hd/Plugin/{$plugin_name}/Data/uninstall.sql"))) {
            //删除插件信息
            $this->del("app='$plugin_name'");
            //删除插件菜单信息
            return $this->table('node')->where(array('app_group' => 'Plugin', 'app' => $plugin_name))->del();
        }
    }
}