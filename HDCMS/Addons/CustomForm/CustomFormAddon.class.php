<?php

/**
 * CustomForm 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class CustomFormAddon extends Addon
{

    //插件信息
    public $info = array(
        'name' => 'CustomForm',
        'title' => '自定义表单',
        'description' => '自定义表单',
        'status' => 1,
        'author' => '后盾网向军',
        'version' => '1.0',
        'has_adminlist' => 1,
    );

    //安装
    public function install()
    {
        $db_prefix = C('DB_PREFIX');
        if (!M()->exe("DROP TABLE IF EXISTS `" . $db_prefix . "addon_custom_form_data`")) return false;
        $status = M()->exe("CREATE TABLE `" . $db_prefix . "addon_custom_form_data` (
           `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
          `data` mediumtext COMMENT '表单数据',
          `addtime` int(10) DEFAULT NULL COMMENT '提交时间',
          `gid` int(11) DEFAULT NULL COMMENT '表单组id',
          `uid` int(11) unsigned DEFAULT NULL COMMENT '会员id',
          `status` tinyint(1) DEFAULT '0' COMMENT '状态',
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='自定义字段数据'");
        if (!$status) return false;

        if (!M()->exe("DROP TABLE IF EXISTS `" . $db_prefix . "addon_custom_form_field`")) return false;
        $status = M()->exe("CREATE TABLE `" . $db_prefix . "addon_custom_form_field` (
          `fid` int(10) unsigned NOT NULL AUTO_INCREMENT,
          `gid` mediumint(9) DEFAULT NULL COMMENT '字段组ID',
          `name` varchar(45) DEFAULT '' COMMENT '配置名称',
          `value` text COMMENT '配置值',
          `title` char(30) DEFAULT '',
          `show_type` enum('text','radio','textarea','select','email') DEFAULT 'text' COMMENT '显示类型',
          `info` text COMMENT '参数',
          `message` varchar(255) DEFAULT NULL COMMENT '提示',
          `order_list` smallint(6) unsigned DEFAULT '100' COMMENT '排序',
          `status` tinyint(4) DEFAULT '1' COMMENT '总配置模块显示  如模板风格就不显示 1显示 0 不显示',
          `isrequired` tinyint(1) DEFAULT '0' COMMENT '必须输入',
          PRIMARY KEY (`fid`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统配置'");
        if (!$status) return false;

        if (!M()->exe("DROP TABLE IF EXISTS `" . $db_prefix . "addon_custom_form_group`")) return false;
        $status = M()->exe("CREATE TABLE `" . $db_prefix . "addon_custom_form_group` (
           `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
          `gname` varchar(255) DEFAULT NULL,
          `send_mail` tinyint(1) DEFAULT NULL COMMENT '向表单提交者发送邮件（取第一个邮箱字段）',
          PRIMARY KEY (`gid`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='自定义字段配置组'");
        if (!$status) return false;
        return true;
    }

    //卸载
    public function uninstall()
    {
        $db_prefix = C('DB_PREFIX');
        if (!M()->exe("DROP TABLE IF EXISTS `" . $db_prefix . "addon_custom_form_data`")) return false;
        if (!M()->exe("DROP TABLE IF EXISTS `" . $db_prefix . "addon_custom_form_field`")) return false;
        if (!M()->exe("DROP TABLE IF EXISTS `" . $db_prefix . "addon_custom_form_group`")) return false;
        return true;
    }
}