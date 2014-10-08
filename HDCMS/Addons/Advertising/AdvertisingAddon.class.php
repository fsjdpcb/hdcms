<?php
/**
 * Advertising 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class AdvertisingAddon extends Addon
{

    //插件信息
    public $info = array(
        'name' => 'Advertising',
        'title' => '广告位',
        'description' => '广告位',
        'status' => 1,
        'author' => '后盾网向军',
        'version' => '1.0',
        'has_adminlist' => 1,
    );

    //安装
    public function install()
    {
        $db_prefix=C('DB_PREFIX');
        if (!M()->exe("DROP TABLE IF EXISTS `" . $db_prefix . "addon_advertising_postion`")) return false;
        $status= M()->exe("CREATE TABLE `" .$db_prefix. "addon_advertising_postion` (
 `posid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `posname` varchar(255) DEFAULT NULL COMMENT '广告位名称',
  PRIMARY KEY (`posid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='广告位'");
        if(!$status)return false;
        if (!M()->exe("DROP TABLE IF EXISTS `" . $db_prefix . "addon_advertising_ad`")) return false;
        $status= M()->exe("CREATE TABLE `" .$db_prefix. "addon_advertising_ad` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adtitle` varchar(255) DEFAULT NULL COMMENT '广告名称',
  `posid` int(11) unsigned DEFAULT NULL COMMENT '广告位posid',
  `data` mediumtext COMMENT '广告数据 图片+URL',
  `show_type` tinyint(4) DEFAULT '1' COMMENT '广告类型：1 图片  2 轮换',
  `start_time` int(11) DEFAULT '0' COMMENT '开始时间',
  `end_time` int(11) DEFAULT '0' COMMENT '结束时间',
  `status` tinyint(1) DEFAULT '1' COMMENT '广告状态',
  `ad_width` char(10) DEFAULT '600' COMMENT '广告宽度',
  `ad_height` char(10) DEFAULT '300' COMMENT '广告高度',
  `action_time` tinyint(4) DEFAULT '3' COMMENT '轮换广告变化时间，单位秒',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='广告'");
        if(!$status)return false;
        return true;
    }

    //卸载
    public function uninstall()
    {
        $db_prefix=C('DB_PREFIX');
        if (!M()->exe("DROP TABLE IF EXISTS `" . $db_prefix . "addon_advertising_postion`")) return false;
        if (!M()->exe("DROP TABLE IF EXISTS `" . $db_prefix . "addon_advertising_ad`")) return false;
        return true;
    }}