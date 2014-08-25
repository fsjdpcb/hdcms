<?php

/**
 * Navigation 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class NavigationAddon extends Addon
{

    //插件信息
    public $info = array(
        'name' => 'Navigation',
        'title' => '导航菜单',
        'description' => '导航菜单',
        'status' => 1,
        'author' => '后盾网向军',
        'version' => '1.0',
        'has_adminlist' => 1,
    );

    //安装
    public function install()
    {
        $db = M();
        if (!$db->exe("DROP TABLE IF EXISTS `" . C('DB_PREFIX') . "addon_navigation`")) return false;
        if (!$db->exe("CREATE TABLE `" . C('DB_PREFIX') . "addon_navigation` (
  `nid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` char(30) NOT NULL DEFAULT '菜单名称' COMMENT '菜单名',
  `target` enum('_self','_blank') NOT NULL DEFAULT '_self' COMMENT '打开方式',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1 显示 0 不显示',
  `list_order` mediumint(100) NOT NULL DEFAULT '100' COMMENT '排序',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='网站前台导航'")
        ) return false;
        return true;
    }

    //卸载
    public function uninstall()
    {
        $db = M();
        return $db->exe("DROP TABLE IF EXISTS `" . C('DB_PREFIX') . "addon_navigation`");
    }
}