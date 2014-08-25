<?php

/**
 * Link 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class LinkAddon extends Addon
{

    //插件信息
    public $info = array(
        'name' => 'Link',
        'title' => '友情链接',
        'description' => '友情链接',
        'status' => 1,
        'author' => '后盾网向军',
        'version' => '1.0',
        'has_adminlist' => 1,
    );

    //安装
    public function install()
    {
        $db = M();
        if(!$db->exe("DROP TABLE IF EXISTS `".C('DB_PREFIX')."addon_link`"))return false;
        if(!$db->exe("CREATE TABLE `".C('DB_PREFIX')."addon_link` (
          `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
          `webname` char(100) NOT NULL DEFAULT '' COMMENT '网站名称',
          `url` varchar(255) NOT NULL DEFAULT '' COMMENT '网址',
          `logo` varchar(255) NOT NULL DEFAULT '' COMMENT '网站logo',
          `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
          `qq` char(15) NOT NULL DEFAULT '' COMMENT '站长qq',
          `comment` text NOT NULL COMMENT '网站介绍',
          `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 ',
          `list_order` int NOT NULL DEFAULT '100' COMMENT '排序 ',
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='友情链接'"))return false;
        return true;
    }

    //卸载
    public function uninstall()
    {
        return M()->exe("DROP TABLE IF EXISTS `".C('DB_PREFIX')."addon_link`");
    }
}