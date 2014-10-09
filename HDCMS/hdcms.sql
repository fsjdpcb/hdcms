/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50538
Source Host           : localhost:3306
Source Database       : hdcms

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2014-10-09 08:01:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hd_access
-- ----------------------------
DROP TABLE IF EXISTS `hd_access`;
CREATE TABLE `hd_access` (
  `rid` smallint(5) unsigned NOT NULL,
  `nid` smallint(5) unsigned NOT NULL,
  KEY `gid` (`rid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员权限分配表';

-- ----------------------------
-- Records of hd_access
-- ----------------------------

-- ----------------------------
-- Table structure for hd_addons
-- ----------------------------
DROP TABLE IF EXISTS `hd_addons`;
CREATE TABLE `hd_addons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL COMMENT '插件名或标识',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '中文名',
  `description` text COMMENT '插件描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `config` text COMMENT '配置',
  `author` varchar(40) DEFAULT '' COMMENT '作者',
  `version` varchar(20) DEFAULT '' COMMENT '版本号',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '安装时间',
  `has_adminlist` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否有后台列表',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=217 DEFAULT CHARSET=utf8 COMMENT='插件表';

-- ----------------------------
-- Records of hd_addons
-- ----------------------------
INSERT INTO `hd_addons` VALUES ('204', 'Backup', '数据备份', '数据备份还原插件', '1', 'a:0:{}', '后盾网向军', '1.0', '1412773789', '1');
INSERT INTO `hd_addons` VALUES ('178', 'Link', '友情链接', '友情链接', '1', 'a:0:{}', '后盾网向军', '1.0', '1408988196', '1');
INSERT INTO `hd_addons` VALUES ('179', 'Navigation', '导航菜单', '导航菜单', '1', 'a:0:{}', '后盾网向军', '1.0', '1408988221', '1');
INSERT INTO `hd_addons` VALUES ('197', 'Comment', '评论', '评论', '1', 'a:0:{}', '后盾网向军', '1.0', '1409763498', '1');
INSERT INTO `hd_addons` VALUES ('190', 'FieldReplace', '数据库内容替换', '数据库内容替换', '1', 'a:0:{}', '后盾网向军', '1.0', '1409580307', '1');
INSERT INTO `hd_addons` VALUES ('193', 'Search', '前台搜索', '前台搜索', '1', 'a:0:{}', '后盾网向军', '1.0', '1409598497', '0');
INSERT INTO `hd_addons` VALUES ('205', 'CustomForm', '自定义表单', '自定义表单', '1', 'a:0:{}', '后盾网向军', '1.0', '1412773870', '1');
INSERT INTO `hd_addons` VALUES ('210', 'Advertising', '广告位', '广告位', '1', 'a:0:{}', '后盾网向军', '1.0', '1412795895', '1');
INSERT INTO `hd_addons` VALUES ('216', 'Crontab', '计划任务', '计划任务', '1', 'a:0:{}', '后盾向军', '1.0', '1412812780', '1');

-- ----------------------------
-- Table structure for hd_addon_advertising_ad
-- ----------------------------
DROP TABLE IF EXISTS `hd_addon_advertising_ad`;
CREATE TABLE `hd_addon_advertising_ad` (
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='广告';

-- ----------------------------
-- Records of hd_addon_advertising_ad
-- ----------------------------

-- ----------------------------
-- Table structure for hd_addon_advertising_postion
-- ----------------------------
DROP TABLE IF EXISTS `hd_addon_advertising_postion`;
CREATE TABLE `hd_addon_advertising_postion` (
  `posid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `posname` varchar(255) DEFAULT NULL COMMENT '广告位名称',
  PRIMARY KEY (`posid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='广告位';

-- ----------------------------
-- Records of hd_addon_advertising_postion
-- ----------------------------
INSERT INTO `hd_addon_advertising_postion` VALUES ('3', '首页广告');

-- ----------------------------
-- Table structure for hd_addon_comment
-- ----------------------------
DROP TABLE IF EXISTS `hd_addon_comment`;
CREATE TABLE `hd_addon_comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论ID',
  `userid` int(10) unsigned DEFAULT NULL COMMENT '用户ID',
  `username` char(50) DEFAULT NULL COMMENT '用户名',
  `comment_status` tinyint(1) DEFAULT NULL COMMENT '评论状态',
  `content` text COMMENT '评论内容',
  `create_time` int(11) DEFAULT NULL,
  `reply` tinyint(1) DEFAULT NULL COMMENT '是否为回复',
  `ip` char(15) DEFAULT NULL COMMENT '用户IP地址',
  `direction` tinyint(1) DEFAULT '0' COMMENT '评论方向{0:无方向,1:正文,2:反方,3:中立}',
  `mid` smallint(5) unsigned DEFAULT NULL,
  `cid` smallint(5) unsigned DEFAULT NULL,
  `aid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `mid_cid_aid` (`mid`,`cid`,`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_addon_comment
-- ----------------------------

-- ----------------------------
-- Table structure for hd_addon_crontab
-- ----------------------------
DROP TABLE IF EXISTS `hd_addon_crontab`;
CREATE TABLE `hd_addon_crontab` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '任务名称',
  `classname` varchar(255) DEFAULT NULL COMMENT '执行类名称',
  `username` char(50) DEFAULT NULL COMMENT '管理员帐号',
  `mday` tinyint(4) DEFAULT NULL,
  `hours` tinyint(4) DEFAULT NULL,
  `minutes` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='计划任务';

-- ----------------------------
-- Records of hd_addon_crontab
-- ----------------------------
INSERT INTO `hd_addon_crontab` VALUES ('1', '更新文章', 'AutoSendArticle', 'admin', '0', '0', '10');
INSERT INTO `hd_addon_crontab` VALUES ('2', '生成首页静态', 'CreateIndexHtml', 'admin', '0', '0', '10');

-- ----------------------------
-- Table structure for hd_addon_crontab_log
-- ----------------------------
DROP TABLE IF EXISTS `hd_addon_crontab_log`;
CREATE TABLE `hd_addon_crontab_log` (
  `lid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL COMMENT '计划任务id',
  `runtime` int(11) DEFAULT NULL COMMENT '执行时间',
  PRIMARY KEY (`lid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_addon_crontab_log
-- ----------------------------
INSERT INTO `hd_addon_crontab_log` VALUES ('34', '2', '1412812818');

-- ----------------------------
-- Table structure for hd_addon_custom_form_data
-- ----------------------------
DROP TABLE IF EXISTS `hd_addon_custom_form_data`;
CREATE TABLE `hd_addon_custom_form_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data` mediumtext COMMENT '表单数据',
  `addtime` int(10) DEFAULT NULL COMMENT '提交时间',
  `gid` int(11) DEFAULT NULL COMMENT '表单组id',
  `uid` int(11) unsigned DEFAULT NULL COMMENT '会员id',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='自定义字段数据';

-- ----------------------------
-- Records of hd_addon_custom_form_data
-- ----------------------------

-- ----------------------------
-- Table structure for hd_addon_custom_form_field
-- ----------------------------
DROP TABLE IF EXISTS `hd_addon_custom_form_field`;
CREATE TABLE `hd_addon_custom_form_field` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统配置';

-- ----------------------------
-- Records of hd_addon_custom_form_field
-- ----------------------------

-- ----------------------------
-- Table structure for hd_addon_custom_form_group
-- ----------------------------
DROP TABLE IF EXISTS `hd_addon_custom_form_group`;
CREATE TABLE `hd_addon_custom_form_group` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gname` varchar(255) DEFAULT NULL,
  `send_mail` tinyint(1) DEFAULT NULL COMMENT '向表单提交者发送邮件（取第一个邮箱字段）',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='自定义字段配置组';

-- ----------------------------
-- Records of hd_addon_custom_form_group
-- ----------------------------

-- ----------------------------
-- Table structure for hd_addon_link
-- ----------------------------
DROP TABLE IF EXISTS `hd_addon_link`;
CREATE TABLE `hd_addon_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `webname` char(100) NOT NULL DEFAULT '' COMMENT '网站名称',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '网址',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT '网站logo',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `qq` char(15) NOT NULL DEFAULT '' COMMENT '站长qq',
  `comment` text NOT NULL COMMENT '网站介绍',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 ',
  `list_order` int(11) NOT NULL DEFAULT '100' COMMENT '排序 ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='友情链接';

-- ----------------------------
-- Records of hd_addon_link
-- ----------------------------

-- ----------------------------
-- Table structure for hd_addon_navigation
-- ----------------------------
DROP TABLE IF EXISTS `hd_addon_navigation`;
CREATE TABLE `hd_addon_navigation` (
  `nid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` char(30) NOT NULL DEFAULT '菜单名称' COMMENT '菜单名',
  `target` enum('_self','_blank') NOT NULL DEFAULT '_self' COMMENT '打开方式',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1 显示 0 不显示',
  `list_order` mediumint(100) NOT NULL DEFAULT '100' COMMENT '排序',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='网站前台导航';

-- ----------------------------
-- Records of hd_addon_navigation
-- ----------------------------

-- ----------------------------
-- Table structure for hd_category
-- ----------------------------
DROP TABLE IF EXISTS `hd_category`;
CREATE TABLE `hd_category` (
  `cid` mediumint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目ID',
  `pid` mediumint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父级ID',
  `catname` char(30) NOT NULL DEFAULT '' COMMENT '栏目名称',
  `catimage` varchar(200) DEFAULT NULL COMMENT '栏目图片',
  `catdir` varchar(255) DEFAULT NULL,
  `cat_keyworks` varchar(255) DEFAULT '' COMMENT '栏目关键字',
  `cat_description` varchar(255) DEFAULT '' COMMENT '栏目描述',
  `index_tpl` varchar(200) DEFAULT '' COMMENT '封面模板',
  `list_tpl` varchar(200) DEFAULT '' COMMENT '列表页模板',
  `arc_tpl` varchar(200) DEFAULT '' COMMENT '内容页模板',
  `cat_html_url` varchar(200) DEFAULT '' COMMENT '栏目页URL规则\n\n',
  `arc_html_url` varchar(200) DEFAULT '' COMMENT '内容页URL规则',
  `mid` smallint(6) NOT NULL DEFAULT '0' COMMENT '模型ID',
  `cattype` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 栏目,2 封面,3 外部链接,4 单文章',
  `arc_url_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '文章访问方式 1 静态访问 2 动态访问',
  `cat_url_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '栏目访问方式 1 静态访问 2 动态访问',
  `cat_redirecturl` varchar(100) NOT NULL DEFAULT '' COMMENT '跳转url',
  `catorder` smallint(5) unsigned NOT NULL DEFAULT '100' COMMENT '栏目排序',
  `cat_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'channel标签调用时是否显示',
  `cat_seo_title` char(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `cat_seo_description` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO描述',
  `add_reward` smallint(5) NOT NULL DEFAULT '0' COMMENT '搞稿奖励',
  `show_credits` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '查看积分',
  `repeat_charge_day` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT '重复收费天数',
  `allow_user_set_credits` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许会员投稿设置积分 1 允许 0 不允许',
  `member_send_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '会员投稿状态 1 审核 2 未审核',
  `priv_child` tinyint(1) DEFAULT '0' COMMENT '应用到子栏目',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
-- Records of hd_category
-- ----------------------------
INSERT INTO `hd_category` VALUES ('1', '0', '案例', 'upload/content/2014/09/23/58091411405414.jpg', 'case', '', '提交案例，可以让更多的人知道你的网站!', 'anli_index.html', 'anli_list.html', 'anli_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '2', '2', '2', '', '100', '1', '提交案例', '', '1', '0', '1', '1', '0', '1');
INSERT INTO `hd_category` VALUES ('2', '0', '模板', '', 'template', '', '所有模板免费使用，可以用在任何商业用途！', 'moban_index.html', 'moban_list.html', 'moban_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '2', '2', '2', '2', '', '100', '1', '提交模板', '', '1', '0', '1', '1', '0', '0');
INSERT INTO `hd_category` VALUES ('3', '0', '扩展', '', 'addon', '', '所在插件与模块均免费使用！', 'cajian_index.html', 'cajian_list.html', 'cajian_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '2', '2', '2', '2', '', '100', '1', '', '', '1', '0', '1', '1', '0', '0');
INSERT INTO `hd_category` VALUES ('4', '0', 'CMS帮助', '', 'hdcms', '', '使用交流，问题求助社区', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '2', '2', '2', '', '100', '1', '', '', '1', '0', '1', '1', '0', '0');
INSERT INTO `hd_category` VALUES ('6', '4', '标签使用', '', 'help/tag', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '2', '1', '', '', '1', '0', '1', '1', '0', '0');
INSERT INTO `hd_category` VALUES ('7', '4', '安装使用', '', 'help/setup', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '1', '1', '', '', '1', '0', '1', '1', '0', '0');
INSERT INTO `hd_category` VALUES ('8', '4', '模块插件', '', 'help/addon', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '3', '1', '', '', '1', '0', '1', '1', '0', '0');
INSERT INTO `hd_category` VALUES ('9', '0', '框架帮助', 'upload/26751412774521.jpg', 'hdphp', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '2', '2', '2', '', '100', '1', '', '', '1', '0', '1', '1', '0', '0');
INSERT INTO `hd_category` VALUES ('10', '9', '模板标签', '', 'hdphp/tag', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '2', '1', '', '', '1', '0', '1', '1', '0', '0');
INSERT INTO `hd_category` VALUES ('11', '9', '起步知识', '', 'hdphp/base', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '1', '1', '', '', '1', '0', '1', '1', '0', '0');
INSERT INTO `hd_category` VALUES ('12', '9', '数据模型', '', 'hdphp/model', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '100', '1', '', '', '1', '0', '1', '1', '0', '0');
INSERT INTO `hd_category` VALUES ('13', '3', '模块', '', 'addon/module', '', '所有模块免费使用！', 'cajian_index.html', 'cajian_list.html', 'cajian_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '2', '1', '2', '2', '', '100', '1', '提交模块', '', '1', '0', '1', '1', '0', '0');
INSERT INTO `hd_category` VALUES ('14', '3', '插件', '', 'addon/plugin', '', '所有插件免费使用！', 'cajian_index.html', 'cajian_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '2', '1', '2', '2', '', '100', '1', '提交插件', '', '1', '0', '1', '1', '0', '0');
INSERT INTO `hd_category` VALUES ('15', '1', '企业网站', '', 'case/qiyewangzhan', '', '提交案例，可以让更多的人知道你的网站!', 'anli_index.html', 'anli_list.html', 'anli_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '100', '1', '提交案例', '', '0', '10', '1', '1', '1', '0');
INSERT INTO `hd_category` VALUES ('16', '1', '行业门户', '', 'case/xingyemenhu', '', '提交案例，可以让更多的人知道你的网站!', 'anli_index.html', 'anli_list.html', 'anli_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '100', '1', '提交案例', '', '0', '0', '1', '1', '0', '0');
INSERT INTO `hd_category` VALUES ('17', '2', '企业网站', '', 'template/qiyewangzhan', '', '', 'moban_index.html', 'moban_list.html', 'moban_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '2', '1', '2', '2', '', '100', '1', '', '', '0', '0', '1', '1', '0', '0');
INSERT INTO `hd_category` VALUES ('18', '2', '行业门户', '', 'template/xingyemenhu', '', '', 'moban_index.html', 'moban_list.html', 'moban_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '2', '1', '2', '2', '', '100', '1', '', '', '0', '0', '1', '1', '0', '0');
INSERT INTO `hd_category` VALUES ('19', '0', '下载', '', 'download', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '100', '0', '', '', '0', '0', '1', '1', '0', '0');

-- ----------------------------
-- Table structure for hd_category_access
-- ----------------------------
DROP TABLE IF EXISTS `hd_category_access`;
CREATE TABLE `hd_category_access` (
  `rid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `mid` smallint(1) NOT NULL DEFAULT '0' COMMENT '模型mid',
  `content` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许访问 1 允许 0 不允许',
  `add` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许投稿(添加) 1允许 0 不允许',
  `edit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许更新 1允许 0 不允许',
  `del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许删除 1允许 0 不允许',
  `order` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许排序 1允许 0 不允许',
  `move` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许移动 1允许 0 不允许',
  `audit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许审核栏目文章 1 允许 0 不允许',
  `admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为管理员权限 1 管理员 2 前台用户'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目权限表';

-- ----------------------------
-- Records of hd_category_access
-- ----------------------------

-- ----------------------------
-- Table structure for hd_config
-- ----------------------------
DROP TABLE IF EXISTS `hd_config`;
CREATE TABLE `hd_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cgid` mediumint(9) DEFAULT NULL COMMENT '配置组ID',
  `name` varchar(45) NOT NULL DEFAULT '' COMMENT '配置名称\n',
  `value` text NOT NULL COMMENT '配置值',
  `title` char(30) NOT NULL DEFAULT '',
  `show_type` enum('text','radio','textarea','select','group') DEFAULT 'text',
  `info` text COMMENT '参数',
  `message` varchar(255) DEFAULT NULL COMMENT '提示',
  `order_list` smallint(6) unsigned DEFAULT '100' COMMENT '排序',
  `status` tinyint(4) DEFAULT '1' COMMENT '总配置模块显示  如模板风格就不显示 1显示 0 不显示',
  `system` tinyint(1) DEFAULT '0' COMMENT '系统字段',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COMMENT='系统配置';

-- ----------------------------
-- Records of hd_config
-- ----------------------------
INSERT INTO `hd_config` VALUES ('1', '1', 'WEBNAME', 'HDCMS内容管理系统', '网站名称', 'text', '后盾网', '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('2', '1', 'ICP', '京ICP备12048441号-3', 'ICP备案号', 'text', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('3', '6', 'HTML_PATH', 'h', '静态html目录', 'text', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('4', '1', 'COPYRIGHT', 'Copyright © 2012-2014  HDPHP&HDCMS来自后盾网 | 国内唯一一家教育机构推出的开源产品', '网站版权信息', 'text', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('5', '1', 'KEYWORDS', 'php培训,php实训,后盾网', '网站关键词', 'text', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('6', '1', 'DESCRIPTION', '后盾网顶尖PHP培训 内容全面 全程实战!业内顶级讲师亲自授课,千余课时独家视频教程免费下载,超百G原创视频资源,实力不容造假!010-64825057', '网站描述', 'textarea', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('7', '1', 'EMAIL', '2300071698@qq.com', '管理员邮箱', 'text', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('73', '3', 'DEFAULT_GROUP', '幼儿园', '默认会员组', 'group', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('9', '1', 'WEB_OPEN', '1', '网站开启', 'radio', '1|开启,0|关闭', '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('63', '2', 'UPLOAD_PATH', 'upload', '上传目录', 'text', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('20', '2', 'ALLOW_TYPE', 'jpg,jpeg,png,bmp,gif,zip,rar,doc', '允许上传文件类型', 'text', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('21', '2', 'ALLOW_SIZE', '10480000', '允许上传大小（字节）', 'text', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('22', '2', 'WATER_ON', '1', '图片文件加水印', 'radio', '1|加水印,0|不加水印', '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('64', '1', 'TEL', '010-64825057', '联系电话', 'text', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('41', '5', 'WATER_TEXT', 'houdunwang.com', '水印文字', 'text', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('42', '5', 'WATER_TEXT_SIZE', '16', '文字大小', 'text', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('43', '5', 'WATER_IMG', 'static/image/water.png', '水印图像', 'text', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('44', '5', 'WATER_PCT', '80', '水印图片透明度', 'text', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('45', '5', 'WATER_QUALITY', '90', '图片压缩比', 'text', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('46', '5', 'WATER_POS', '9', '水印位置', 'text', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('47', '6', 'DEL_CONTENT_MODEL', '0', '删除文章标记为未审核', 'radio', '1|审核,0|未审核', '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('67', '6', 'CREATE_INDEX_HTML', '1', '首页生成静态', 'radio', '1|生成,0|不生成', '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('48', '6', 'DOWN_REMOTE_PIC', '0', '下载远程图片', 'radio', '1|下载,0|不下载', '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('49', '6', 'AUTO_DESC', '1', '截取内容为摘要', 'radio', '1|是,0|否', '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('50', '6', 'AUTO_THUMB', '1', '提取内容图片为缩略图', 'radio', '1|是,0|否', '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('32', '3', 'MEMBER_OPEN', '1', '开启会员中心', 'radio', '1|开启,0|关闭', '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('11', '1', 'WEB_CLOSE_MESSAGE', '网站维护中，请稍候访问...', '网站关闭提示信息', 'text', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('12', '9', 'WEB_STYLE', 'default', '网站模板', 'text', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('33', '3', 'INIT_CREDITS', '100', '会员初始积分', 'text', null, '', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('53', '7', 'CACHE_INDEX', '0', '首页缓存时间', 'text', null, '单位秒，0为不缓存', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('54', '7', 'CACHE_CATEGORY', '0', '栏目缓存时间', 'text', null, '单位秒，0为不缓存', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('55', '7', 'CACHE_CONTENT', '0', '文章缓存时间', 'text', null, '单位秒，0为不缓存', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('57', '8', 'REWRITE_ENGINE', '0', '开启伪静态', 'radio', '1|开启,0|关闭', '1:服务器需要支持Rewrtie <br/>2:根目录下存在.htaccess文件', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('35', '4', 'EMAIL_USERNAME', 'hdcms@houdunwang.com', '邮箱用户名', 'text', null, '使用126或qq邮箱', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('36', '4', 'EMAIL_PASSWORD', 'admin521', '邮箱密码', 'text', null, '邮箱的密码', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('37', '4', 'EMAIL_HOST', 'smtp.exmail.qq.com', 'smtp地址', 'text', null, '如smtp.gmail.com', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('38', '4', 'EMAIL_PORT', '25', 'smtp端口', 'text', null, 'qq,126为25，gmail为465', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('39', '4', 'EMAIL_FROMNAME', '后盾网', '发送人', 'text', null, '发送人发件箱显示的用户名', '100', '1', '1');
INSERT INTO `hd_config` VALUES ('72', '4', 'EMAIL_FORMMAIL', 'hdcms@houdunwang.com', '发件人', 'text', null, '发送人发件箱显示的邮箱址址', '100', '1', '1');

-- ----------------------------
-- Table structure for hd_config_group
-- ----------------------------
DROP TABLE IF EXISTS `hd_config_group`;
CREATE TABLE `hd_config_group` (
  `cgid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cgname` char(100) DEFAULT NULL COMMENT '组名（英文）',
  `cgtitle` varchar(255) DEFAULT NULL COMMENT '组标题（中文）',
  `cgorder` mediumint(6) DEFAULT '100' COMMENT '组顺序',
  `isshow` tinyint(1) DEFAULT '1' COMMENT '显示',
  `system` tinyint(1) DEFAULT '0' COMMENT '系统组',
  PRIMARY KEY (`cgid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='配置组';

-- ----------------------------
-- Records of hd_config_group
-- ----------------------------
INSERT INTO `hd_config_group` VALUES ('1', 'site', '站点配置', '100', '1', '1');
INSERT INTO `hd_config_group` VALUES ('2', 'upload', '上传配置', '100', '1', '1');
INSERT INTO `hd_config_group` VALUES ('3', 'member', '会员配置', '100', '1', '1');
INSERT INTO `hd_config_group` VALUES ('4', 'email', '邮箱设置', '100', '0', '1');
INSERT INTO `hd_config_group` VALUES ('5', 'water', '水印设置', '100', '0', '1');
INSERT INTO `hd_config_group` VALUES ('6', 'content', '内容相关', '100', '1', '1');
INSERT INTO `hd_config_group` VALUES ('7', 'optimize', '性能优化', '100', '1', '1');
INSERT INTO `hd_config_group` VALUES ('8', 'rewrite', '伪静态', '100', '1', '1');
INSERT INTO `hd_config_group` VALUES ('9', 'template', '模板设置', '100', '0', '1');

-- ----------------------------
-- Table structure for hd_content
-- ----------------------------
DROP TABLE IF EXISTS `hd_content`;
CREATE TABLE `hd_content` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `uid` int(10) unsigned NOT NULL COMMENT '用户uid',
  `title` char(100) NOT NULL DEFAULT '' COMMENT '标题',
  `flag` set('热门','置顶','推荐','图片','精华','幻灯片','站长推荐') DEFAULT NULL,
  `new_window` tinyint(1) NOT NULL DEFAULT '0' COMMENT '新窗口打开',
  `seo_title` char(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `click` int(6) NOT NULL DEFAULT '0' COMMENT '点击数',
  `redirecturl` varchar(255) NOT NULL DEFAULT '' COMMENT '转向链接',
  `html_path` varchar(255) NOT NULL DEFAULT '' COMMENT '自定义生成的静态文件地址',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updatetime` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `color` char(7) NOT NULL DEFAULT '' COMMENT '标题颜色',
  `template` varchar(255) NOT NULL DEFAULT '' COMMENT '模板',
  `url_type` tinyint(80) NOT NULL DEFAULT '3' COMMENT '文章访问方式  1 静态访问  2 动态访问  3 继承栏目',
  `arc_sort` mediumint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  `content_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '文章状态  1 已审核 0 未审核 2 草稿',
  `readpoint` char(6) DEFAULT NULL COMMENT '阅读收费',
  `keywords` varchar(100) DEFAULT '' COMMENT '关键字',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `auto_send_time` int(11) DEFAULT '0' COMMENT '自动发表时间',
  PRIMARY KEY (`aid`),
  KEY `uid` (`uid`),
  KEY `cid` (`cid`),
  KEY `flag` (`flag`),
  KEY `content_status` (`content_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of hd_content
-- ----------------------------

-- ----------------------------
-- Table structure for hd_content_data
-- ----------------------------
DROP TABLE IF EXISTS `hd_content_data`;
CREATE TABLE `hd_content_data` (
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章主表ID',
  `content` mediumtext COMMENT '内容',
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章正文表';

-- ----------------------------
-- Records of hd_content_data
-- ----------------------------

-- ----------------------------
-- Table structure for hd_content_tag
-- ----------------------------
DROP TABLE IF EXISTS `hd_content_tag`;
CREATE TABLE `hd_content_tag` (
  `mid` smallint(6) NOT NULL COMMENT '模型mid',
  `cid` smallint(6) NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `aid` int(11) NOT NULL DEFAULT '0' COMMENT '文章aid',
  `tid` int(11) NOT NULL DEFAULT '0' COMMENT '标签id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='内容标签表';

-- ----------------------------
-- Records of hd_content_tag
-- ----------------------------

-- ----------------------------
-- Table structure for hd_download
-- ----------------------------
DROP TABLE IF EXISTS `hd_download`;
CREATE TABLE `hd_download` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `uid` int(10) unsigned NOT NULL COMMENT '用户uid',
  `title` char(100) NOT NULL DEFAULT '' COMMENT '标题',
  `flag` set('热门','置顶','推荐','图片','精华','幻灯片','站长推荐') DEFAULT NULL,
  `new_window` tinyint(1) NOT NULL DEFAULT '0' COMMENT '新窗口打开',
  `seo_title` char(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `click` int(6) NOT NULL DEFAULT '0' COMMENT '点击数',
  `redirecturl` varchar(255) NOT NULL DEFAULT '' COMMENT '转向链接',
  `html_path` varchar(255) NOT NULL DEFAULT '' COMMENT '自定义生成的静态文件地址',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updatetime` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `color` char(7) NOT NULL DEFAULT '' COMMENT '标题颜色',
  `template` varchar(255) NOT NULL DEFAULT '' COMMENT '模板',
  `url_type` tinyint(80) NOT NULL DEFAULT '3' COMMENT '文章访问方式  1 静态访问  2 动态访问  3 继承栏目',
  `arc_sort` mediumint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  `content_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '文章状态  1 已审核 0 未审核 2 草稿',
  `readpoint` char(6) DEFAULT NULL COMMENT '阅读收费',
  `keywords` varchar(100) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `files` mediumtext,
  `system` varchar(255) NOT NULL DEFAULT '',
  `language` char(250) NOT NULL DEFAULT '',
  `softtype` char(250) NOT NULL DEFAULT '',
  `version` varchar(255) NOT NULL DEFAULT '',
  `auto_send_time` int(11) DEFAULT '0' COMMENT '自动发表时间',
  PRIMARY KEY (`aid`),
  KEY `uid` (`uid`),
  KEY `cid` (`cid`),
  KEY `flag` (`flag`),
  KEY `content_status` (`content_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of hd_download
-- ----------------------------

-- ----------------------------
-- Table structure for hd_download_data
-- ----------------------------
DROP TABLE IF EXISTS `hd_download_data`;
CREATE TABLE `hd_download_data` (
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章主表ID',
  `content` text COMMENT '内容',
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章正文表';

-- ----------------------------
-- Records of hd_download_data
-- ----------------------------

-- ----------------------------
-- Table structure for hd_favorite
-- ----------------------------
DROP TABLE IF EXISTS `hd_favorite`;
CREATE TABLE `hd_favorite` (
  `fid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `mid` smallint(6) unsigned DEFAULT NULL,
  `cid` smallint(6) unsigned DEFAULT NULL,
  `aid` int(10) unsigned DEFAULT NULL,
  `title` char(200) DEFAULT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员文章收藏夹';

-- ----------------------------
-- Records of hd_favorite
-- ----------------------------

-- ----------------------------
-- Table structure for hd_field
-- ----------------------------
DROP TABLE IF EXISTS `hd_field`;
CREATE TABLE `hd_field` (
  `fid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1 正常 0 禁用',
  `field_type` varchar(255) NOT NULL DEFAULT '' COMMENT '字段类型 text|textarea|radio|checkbox|image|images|datetime|',
  `table_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '字段所在表 1 主表 2 副表',
  `table_name` varchar(255) NOT NULL DEFAULT '' COMMENT '所在表名',
  `field_name` varchar(255) NOT NULL DEFAULT '' COMMENT '字段name名称',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '字段标题 ',
  `tips` varchar(255) NOT NULL DEFAULT '' COMMENT '字段提示',
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 开启 0 关闭',
  `is_system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为系统字段',
  `fieldsort` mediumint(9) NOT NULL DEFAULT '100' COMMENT '字段排序',
  `set` text COMMENT '字段设置',
  `css` varchar(255) NOT NULL DEFAULT '' COMMENT 'CSS样式',
  `minlength` char(255) NOT NULL DEFAULT '' COMMENT '最小字数',
  `maxlength` char(255) NOT NULL DEFAULT '' COMMENT '最大字数',
  `validate` char(255) NOT NULL DEFAULT '' COMMENT '正则验证',
  `required` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否必须输入',
  `error` varchar(255) NOT NULL DEFAULT '' COMMENT '错误提示',
  `isunique` tinyint(1) NOT NULL DEFAULT '0' COMMENT '值唯一',
  `isbase` tinyint(1) NOT NULL DEFAULT '1' COMMENT '作为基本信息',
  `issearch` tinyint(1) NOT NULL DEFAULT '1' COMMENT '作为搜索条件',
  `isadd` tinyint(1) NOT NULL DEFAULT '1' COMMENT '在前台投稿中显示',
  PRIMARY KEY (`fid`),
  KEY `mid` (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=291 DEFAULT CHARSET=utf8 COMMENT='模型字段';

-- ----------------------------
-- Records of hd_field
-- ----------------------------
INSERT INTO `hd_field` VALUES ('104', '1', '1', 'input', '1', 'content', 'readpoint', '阅读收费', '金币', '1', '1', '106', 'a:3:{s:4:\"size\";s:3:\"100\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('103', '1', '1', 'box', '1', 'content', 'content_status', '状态', '', '1', '1', '113', 'a:3:{s:7:\"options\";s:29:\"1|发表,0|待审查,2|自动\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('101', '1', '1', 'content', '2', 'content_data', 'content', '正文', '', '1', '1', '100', '', '', '0', '', '', '0', '', '0', '1', '0', '1');
INSERT INTO `hd_field` VALUES ('102', '1', '1', 'number', '1', 'content', 'click', '点击数', '', '1', '1', '111', 'a:4:{s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('98', '1', '1', 'flag', '1', 'content', 'flag', '属性', '', '1', '1', '4', '', '', '0', '', '', '0', '', '0', '1', '1', '0');
INSERT INTO `hd_field` VALUES ('99', '1', '1', 'title', '1', 'content', 'title', '标题', '', '1', '1', '1', 'a:2:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";}', '', '0', '100', '', '1', '', '0', '1', '1', '1');
INSERT INTO `hd_field` VALUES ('100', '1', '1', 'tag', '1', 'content', 'tag', 'TAG', '', '1', '0', '101', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('96', '1', '1', 'thumb', '1', 'content', 'thumb', '缩略图', '', '1', '1', '3', 's:0:\"\";', '', '', '', '', '0', '', '0', '0', '1', '1');
INSERT INTO `hd_field` VALUES ('97', '1', '1', 'input', '1', 'content', 'html_path', 'html文件名', '', '1', '1', '107', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('94', '1', '1', 'cid', '1', 'content', 'cid', '栏目', '', '1', '1', '2', 's:0:\"\";', '', '1', '', '', '1', '请选择栏目', '0', '1', '0', '1');
INSERT INTO `hd_field` VALUES ('95', '1', '1', 'input', '1', 'content', 'seo_title', 'SEO标题', '', '1', '1', '5', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '', '', '', '0', '', '0', '1', '1', '0');
INSERT INTO `hd_field` VALUES ('92', '1', '1', 'datetime', '1', 'content', 'addtime', '添加时间', '', '1', '1', '105', 'a:1:{s:6:\"format\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('93', '1', '1', 'input', '1', 'content', 'redirecturl', '转向链接', '', '1', '1', '104', 'a:3:{s:4:\"size\";s:3:\"150\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '/^http:///', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('90', '1', '1', 'template', '1', 'content', 'template', '模板', '', '1', '1', '108', '', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('91', '1', '1', 'box', '1', 'content', 'url_type', '文章访问方式', '', '1', '1', '109', 'a:3:{s:7:\"options\";s:45:\"1|静态访问,2|动态访问 ,3|继承栏目\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"3\";}', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('89', '1', '1', 'number', '1', 'content', 'arc_sort', '排序', '', '1', '1', '110', 'a:5:{s:10:\"field_type\";s:9:\"mediumint\";s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('88', '1', '1', 'input', '1', 'content', 'keywords', '关键字', '', '1', '1', '102', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('87', '1', '1', 'textarea', '1', 'content', 'description', '描述', '', '1', '1', '103', 'a:3:{s:5:\"width\";s:3:\"500\";s:6:\"height\";s:3:\"100\";s:7:\"default\";s:0:\"\";}', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('139', '2', '1', 'flag', '1', 'download', 'flag', '属性', '', '1', '1', '4', '', '', '0', '', '', '0', '', '0', '1', '1', '0');
INSERT INTO `hd_field` VALUES ('140', '2', '1', 'title', '1', 'download', 'title', '标题', '', '1', '1', '1', 'a:2:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";}', '', '0', '100', '', '1', '', '0', '1', '1', '1');
INSERT INTO `hd_field` VALUES ('137', '2', '1', 'thumb', '1', 'download', 'thumb', '缩略图', '', '1', '1', '3', '', '', '0', '', '', '0', '', '0', '0', '0', '1');
INSERT INTO `hd_field` VALUES ('138', '2', '1', 'input', '1', 'download', 'html_path', 'html文件名', '', '1', '1', '108', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('135', '2', '1', 'cid', '1', 'download', 'cid', '栏目', '', '1', '1', '2', '', '', '0', '', '', '0', '', '0', '1', '0', '1');
INSERT INTO `hd_field` VALUES ('136', '2', '1', 'input', '1', 'download', 'seo_title', 'SEO标题', '', '1', '1', '5', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('133', '2', '1', 'datetime', '1', 'download', 'addtime', '添加时间', '', '1', '1', '106', 'a:1:{s:6:\"format\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('134', '2', '1', 'input', '1', 'download', 'redirecturl', '转向链接', '', '1', '1', '105', 'a:3:{s:4:\"size\";s:3:\"150\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '/^http:///', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('132', '2', '1', 'box', '1', 'download', 'url_type', '文章访问方式', '', '1', '1', '120', 'a:3:{s:7:\"options\";s:45:\"1|静态访问,2|动态访问 ,3|继承栏目\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"3\";}', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('131', '2', '1', 'template', '1', 'download', 'template', '模板', '', '1', '1', '109', '', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('130', '2', '1', 'number', '1', 'download', 'arc_sort', '排序', '', '1', '1', '121', 'a:5:{s:10:\"field_type\";s:9:\"mediumint\";s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('129', '2', '1', 'input', '1', 'download', 'keywords', '关键字', '', '1', '1', '102', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('128', '2', '1', 'textarea', '1', 'download', 'description', '描述', '', '1', '1', '103', 'a:3:{s:5:\"width\";s:3:\"500\";s:6:\"height\";s:3:\"100\";s:7:\"default\";s:0:\"\";}', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('141', '2', '1', 'tag', '1', 'download', 'tag', 'TAG', '', '1', '0', '101', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('142', '2', '1', 'content', '2', 'download_data', 'content', '正文', '', '1', '1', '100', '', '', '0', '', '', '0', '', '0', '1', '0', '1');
INSERT INTO `hd_field` VALUES ('143', '2', '1', 'number', '1', 'download', 'click', '点击数', '', '1', '1', '122', 'a:4:{s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('144', '2', '1', 'box', '1', 'download', 'content_status', '状态', '', '1', '1', '124', 'a:3:{s:7:\"options\";s:29:\"1|发表,0|待审查,2|自动\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('145', '2', '1', 'input', '1', 'download', 'readpoint', '阅读收费', '金币', '1', '1', '107', 'a:3:{s:4:\"size\";s:3:\"100\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('146', '2', '1', 'files', '1', 'download', 'files', '本地下载', '', '1', '0', '6', 'a:3:{s:10:\"allow_size\";s:1:\"2\";s:3:\"num\";s:2:\"10\";s:8:\"filetype\";s:15:\"zip,rar,doc,ppt\";}', '', '0', '', '', '1', '', '0', '1', '0', '1');
INSERT INTO `hd_field` VALUES ('150', '2', '1', 'box', '1', 'download', 'language', '软件语言', '', '1', '0', '7', 'a:3:{s:7:\"options\";s:117:\"英文|英文,简体中文|简体中文,繁体中文|繁体中文,多国语言|多国语言,其他语言|其他语言\";s:9:\"form_type\";s:6:\"select\";s:7:\"default\";s:6:\"英文\";}', '', '0', '', '', '0', '', '0', '1', '0', '1');
INSERT INTO `hd_field` VALUES ('148', '2', '1', 'input', '1', 'download', 'system', '软件平台', '', '1', '0', '8', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:21:\"Win2000/WinXP/Win2003\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '1');
INSERT INTO `hd_field` VALUES ('151', '2', '1', 'box', '1', 'download', 'softtype', '软件类型', '', '1', '0', '9', 'a:3:{s:7:\"options\";s:117:\"国产软件|国产软件,国外软件|国外软件,汉化补丁|汉化补丁,程序源码|程序源码,其他|其他\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:12:\"国产软件\";}', '', '0', '', '', '0', '', '0', '1', '0', '1');
INSERT INTO `hd_field` VALUES ('152', '2', '1', 'input', '1', 'download', 'version', '版本号', '', '1', '0', '10', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '1');
INSERT INTO `hd_field` VALUES ('153', '3', '1', 'textarea', '1', 'picture', 'description', '描述', '', '1', '1', '103', 'a:3:{s:5:\"width\";s:3:\"500\";s:6:\"height\";s:3:\"100\";s:7:\"default\";s:0:\"\";}', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('154', '3', '1', 'input', '1', 'picture', 'keywords', '关键字', '', '1', '1', '102', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('155', '3', '1', 'number', '1', 'picture', 'arc_sort', '排序', '', '1', '1', '111', 'a:5:{s:10:\"field_type\";s:9:\"mediumint\";s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('156', '3', '1', 'template', '1', 'picture', 'template', '模板', '', '1', '1', '109', '', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('157', '3', '1', 'box', '1', 'picture', 'url_type', '文章访问方式', '', '1', '1', '110', 'a:3:{s:7:\"options\";s:45:\"1|静态访问,2|动态访问 ,3|继承栏目\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"3\";}', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('158', '3', '1', 'datetime', '1', 'picture', 'addtime', '添加时间', '', '1', '1', '106', 'a:1:{s:6:\"format\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('159', '3', '1', 'input', '1', 'picture', 'redirecturl', '转向链接', '', '1', '1', '105', 'a:3:{s:4:\"size\";s:3:\"150\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '/^http:///', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('160', '3', '1', 'cid', '1', 'picture', 'cid', '栏目', '', '1', '1', '2', '', '', '0', '', '', '0', '', '0', '1', '0', '1');
INSERT INTO `hd_field` VALUES ('161', '3', '1', 'input', '1', 'picture', 'seo_title', 'SEO标题', '', '1', '1', '5', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('162', '3', '1', 'thumb', '1', 'picture', 'thumb', '缩略图', '', '1', '1', '3', '', '', '0', '', '', '0', '', '0', '0', '0', '1');
INSERT INTO `hd_field` VALUES ('163', '3', '1', 'input', '1', 'picture', 'html_path', 'html文件名', '', '1', '1', '108', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('164', '3', '1', 'flag', '1', 'picture', 'flag', '属性', '', '1', '1', '4', '', '', '0', '', '', '0', '', '0', '1', '1', '0');
INSERT INTO `hd_field` VALUES ('165', '3', '1', 'title', '1', 'picture', 'title', '标题', '', '1', '1', '1', 'a:2:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";}', '', '0', '100', '', '1', '', '0', '1', '1', '1');
INSERT INTO `hd_field` VALUES ('166', '3', '1', 'tag', '1', 'picture', 'tag', 'TAG', '', '1', '0', '101', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0');
INSERT INTO `hd_field` VALUES ('167', '3', '1', 'content', '2', 'picture_data', 'content', '正文', '', '1', '1', '100', '', '', '0', '', '', '0', '', '0', '1', '0', '1');
INSERT INTO `hd_field` VALUES ('168', '3', '1', 'number', '1', 'picture', 'click', '点击数', '', '1', '1', '112', 'a:4:{s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('169', '3', '1', 'box', '1', 'picture', 'content_status', '状态', '', '1', '1', '114', 'a:3:{s:7:\"options\";s:29:\"1|发表,0|待审查,2|自动\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('170', '3', '1', 'input', '1', 'picture', 'readpoint', '阅读收费', '金币', '1', '1', '107', 'a:3:{s:4:\"size\";s:3:\"100\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('171', '3', '1', 'images', '1', 'picture', 'pics', '组图', '', '1', '0', '6', 'a:2:{s:10:\"allow_size\";s:1:\"2\";s:3:\"num\";s:2:\"50\";}', '', '0', '', '', '0', '', '0', '1', '0', '1');
INSERT INTO `hd_field` VALUES ('212', '1', '1', 'datetime', '1', 'content', 'auto_send_time', '自动发表时间(状态为自动)', '', '1', '1', '112', 'a:1:{s:6:\"format\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('213', '2', '1', 'datetime', '1', 'download', 'auto_send_time', '自动发表时间(状态为自动)', '', '1', '1', '123', 'a:1:{s:6:\"format\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `hd_field` VALUES ('214', '3', '1', 'datetime', '1', 'picture', 'auto_send_time', '自动发表时间(状态为自动)', '', '1', '1', '113', 'a:1:{s:6:\"format\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for hd_hooks
-- ----------------------------
DROP TABLE IF EXISTS `hd_hooks`;
CREATE TABLE `hd_hooks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '钩子名称',
  `description` text NOT NULL COMMENT '描述',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '类型',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `addons` varchar(255) NOT NULL DEFAULT '' COMMENT '钩子挂载的插件 ''，''分割',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_hooks
-- ----------------------------
INSERT INTO `hd_hooks` VALUES ('17', 'pageHeader', '页面header钩子，一般用于加载插件CSS文件和代码', '1', '0', '');
INSERT INTO `hd_hooks` VALUES ('18', 'pageFooter', '页面footer钩子，一般用于加载插件JS文件和JS代码', '1', '0', '');
INSERT INTO `hd_hooks` VALUES ('19', 'APP_BEGIN', '应用开始', '1', '0', 'Crontab');
INSERT INTO `hd_hooks` VALUES ('20', 'content_edit_begin', '内容编辑前', '1', '0', '');
INSERT INTO `hd_hooks` VALUES ('21', 'content_edit_end', '内容编辑后', '1', '0', '');
INSERT INTO `hd_hooks` VALUES ('22', 'content_del', '内容删除后', '1', '0', '');
INSERT INTO `hd_hooks` VALUES ('23', 'content_add_begin', '内容添加前', '1', '0', '');
INSERT INTO `hd_hooks` VALUES ('24', 'content_add_end', '内容添加后', '1', '0', '');

-- ----------------------------
-- Table structure for hd_menu_favorite
-- ----------------------------
DROP TABLE IF EXISTS `hd_menu_favorite`;
CREATE TABLE `hd_menu_favorite` (
  `uid` smallint(5) unsigned NOT NULL,
  `nid` smallint(5) unsigned NOT NULL,
  KEY `gid` (`uid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员权限分配表';

-- ----------------------------
-- Records of hd_menu_favorite
-- ----------------------------
INSERT INTO `hd_menu_favorite` VALUES ('1', '12');
INSERT INTO `hd_menu_favorite` VALUES ('1', '8');
INSERT INTO `hd_menu_favorite` VALUES ('1', '4');
INSERT INTO `hd_menu_favorite` VALUES ('1', '16');

-- ----------------------------
-- Table structure for hd_model
-- ----------------------------
DROP TABLE IF EXISTS `hd_model`;
CREATE TABLE `hd_model` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `model_name` char(255) NOT NULL DEFAULT '' COMMENT '模型名称',
  `table_name` char(255) NOT NULL DEFAULT '' COMMENT '主表名',
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '禁用 1 开启 0 关闭',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '模型描述',
  `is_system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 系统模型  2 普通模型',
  `contribute` tinyint(1) NOT NULL DEFAULT '1' COMMENT '前台投稿',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='模型表';

-- ----------------------------
-- Records of hd_model
-- ----------------------------
INSERT INTO `hd_model` VALUES ('1', '普通文章', 'content', '1', '', '1', '1');
INSERT INTO `hd_model` VALUES ('2', '下载模型', 'download', '1', '下载模型', '1', '1');
INSERT INTO `hd_model` VALUES ('3', '图片模型', 'picture', '1', '图片模型', '1', '1');

-- ----------------------------
-- Table structure for hd_node
-- ----------------------------
DROP TABLE IF EXISTS `hd_node`;
CREATE TABLE `hd_node` (
  `nid` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` char(200) NOT NULL DEFAULT '' COMMENT '中文标题',
  `group` char(200) NOT NULL DEFAULT '',
  `module` char(200) NOT NULL DEFAULT '' COMMENT '应用',
  `controller` char(200) NOT NULL DEFAULT '' COMMENT '控制器',
  `action` char(200) NOT NULL DEFAULT '' COMMENT '方法',
  `param` char(255) NOT NULL DEFAULT '' COMMENT '参数',
  `comment` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1 显示 0 不显示',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '类型 1 权限控制菜单   2 普通菜单 ',
  `pid` mediumint(6) NOT NULL DEFAULT '0',
  `list_order` mediumint(6) NOT NULL DEFAULT '100' COMMENT '排序',
  `is_system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '系统菜单 1 是  0 不是',
  `favorite` tinyint(1) NOT NULL DEFAULT '0' COMMENT '后台常用菜单   1 是  0 不是',
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 COMMENT='节点表（后台菜单也使用）';

-- ----------------------------
-- Records of hd_node
-- ----------------------------
INSERT INTO `hd_node` VALUES ('1', '内容', '', 'Admin', '', '', '', '', '1', '2', '0', '2', '0', '0');
INSERT INTO `hd_node` VALUES ('2', '内容管理', '', 'Admin', '', '', '', '', '1', '1', '1', '10', '0', '0');
INSERT INTO `hd_node` VALUES ('3', '系统', '', 'Admin', '', '', '', '', '1', '1', '0', '10', '0', '0');
INSERT INTO `hd_node` VALUES ('4', '后台菜单管理', '', 'Admin', 'Node', 'index', '', '', '1', '1', '87', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('8', '栏目管理', '', 'Admin', 'Category', 'index', '', '', '1', '1', '2', '20', '0', '1');
INSERT INTO `hd_node` VALUES ('9', '模型管理', '', 'Admin', 'Model', 'index', '', '', '1', '1', '37', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('10', '推荐位', '', 'Admin', 'Flag', 'index', 'mid=1', '', '1', '1', '37', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('11', '基本配置', '', 'Admin', '', '', '', '', '1', '1', '3', '98', '0', '0');
INSERT INTO `hd_node` VALUES ('12', '文章列表', '', 'Admin', 'Content', 'index', '', '', '1', '1', '2', '10', '0', '1');
INSERT INTO `hd_node` VALUES ('13', '管理员设置', '', 'Admin', '', '', '', '', '1', '1', '3', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('14', '管理员管理', '', 'Admin', 'Administrator', 'index', '', '', '1', '1', '13', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('15', '角色管理', '', 'Admin', 'Role', 'index', '', '', '1', '1', '13', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('16', '网站配置', '', 'Admin', 'Config', 'webConfig', '', '', '1', '1', '11', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('17', '生成静态', '', 'Admin', '', '', '', '', '1', '1', '1', '11', '0', '0');
INSERT INTO `hd_node` VALUES ('18', '更新栏目页', '', 'Admin', 'Html', 'createCategory', '', '生成栏目页', '1', '1', '17', '102', '0', '0');
INSERT INTO `hd_node` VALUES ('19', '生成首页', '', 'Admin', 'Html', 'createIndex', '', '生成首页', '1', '1', '17', '101', '0', '1');
INSERT INTO `hd_node` VALUES ('20', '更新内容页', '', 'Admin', 'Html', 'createContent', '', '生成内容页', '1', '1', '17', '103', '0', '0');
INSERT INTO `hd_node` VALUES ('21', '修改密码', '', 'Admin', 'Personal', 'editPassword', '', '', '1', '1', '24', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('22', '修改个人信息', '', 'Admin', 'Personal', 'editInfo', '', '', '1', '1', '24', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('23', '我的面板', '', 'Admin', '', '', '', '', '1', '2', '0', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('24', '个人信息', '', 'Admin', '', '', '', '', '1', '1', '23', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('26', '会员', '', 'Admin', '', '', '', '', '1', '1', '0', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('27', '会员管理', '', 'Admin', '', '', '', '', '1', '1', '26', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('28', '会员管理', '', 'Admin', 'User', 'index', '', '', '1', '1', '27', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('29', '审核会员', '', 'Admin', 'User', 'index', 'user_status=0', '', '1', '1', '27', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('30', '会员组管理', '', 'Admin', '', '', '', '', '1', '1', '26', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('31', '管理会员组', '', 'Admin', 'Group', 'index', '', '', '1', '1', '30', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('32', '模板', '', 'Admin', '', '', '', '', '1', '1', '0', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('33', '模板管理', '', 'Admin', '', '', '', '', '1', '1', '32', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('34', '模板风格', '', 'Admin', 'TemplateStyle', 'styleList', '', '', '1', '1', '33', '90', '0', '0');
INSERT INTO `hd_node` VALUES ('35', '标签云', '', 'Admin', 'Tag', 'index', '', '', '1', '1', '37', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('37', '其他操作', '', 'Admin', '', '', '', '', '1', '1', '1', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('59', '附件管理', '', 'Admin', 'Attachment', 'index', '', '', '1', '1', '37', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('39', '扩展', '', 'Admin', '', '', '', '', '1', '1', '0', '1000', '0', '0');
INSERT INTO `hd_node` VALUES ('40', '插件管理', '', 'Admin', '', '', '', '', '1', '1', '39', '99', '0', '0');
INSERT INTO `hd_node` VALUES ('41', '插件管理', '', 'Admin', 'Addons', 'index', '', '', '1', '1', '40', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('42', '审核文章', '', 'Admin', 'ContentAudit', 'content', 'mid=1', '', '1', '1', '2', '11', '0', '1');
INSERT INTO `hd_node` VALUES ('49', '钓子管理', '', 'Admin', 'Hooks', 'index', '', '', '1', '1', '40', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('44', '添加栏目', '', 'Admin', 'Category', 'add', '', '', '0', '1', '2', '21', '0', '0');
INSERT INTO `hd_node` VALUES ('45', '删除栏目', '', 'Admin', 'Category', 'del', '', '', '0', '1', '2', '22', '0', '0');
INSERT INTO `hd_node` VALUES ('46', '修改栏目', '', 'Admin', 'Category', 'edit', '', '', '0', '1', '2', '23', '0', '0');
INSERT INTO `hd_node` VALUES ('47', '批量修改栏目', '', 'Admin', 'Category', 'BulkEdit', '', '', '0', '1', '2', '24', '0', '0');
INSERT INTO `hd_node` VALUES ('68', '水印设置', '', 'Admin', 'Config', 'water', '', '', '1', '1', '86', '90', '0', '0');
INSERT INTO `hd_node` VALUES ('50', '已装插件', '', 'Admin', '', '', '', '', '1', '1', '39', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('117', '数据备份', 'Addons', 'Backup', 'Admin', 'index', '', '插件Backup后台管理', '1', '1', '50', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('66', '友情链接', 'Addons', 'Link', 'Admin', 'index', '', '插件Link后台管理', '1', '1', '50', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('67', '导航菜单', 'Addons', 'Navigation', 'Admin', 'index', '', '插件Navigation后台管理', '1', '1', '50', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('69', '邮箱配置', '', 'Admin', 'Config', 'email', '', '', '1', '1', '86', '90', '0', '0');
INSERT INTO `hd_node` VALUES ('85', '评论', 'Addons', 'Comment', 'Admin', 'index', '', '插件Comment后台管理', '1', '1', '50', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('79', '数据库内容替换', 'Addons', 'FieldReplace', 'Admin', 'index', '', '插件FieldReplace后台管理', '1', '1', '50', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('86', '扩展配置', '', 'Admin', '', '', '', '', '1', '1', '3', '98', '0', '0');
INSERT INTO `hd_node` VALUES ('87', '后台菜单管理', '', 'Admin', '', '', '', '', '1', '1', '3', '98', '0', '0');
INSERT INTO `hd_node` VALUES ('112', '配置组', '', 'Admin', 'ConfigGroup', 'index', '', '配置组管理', '1', '1', '11', '99', '0', '0');
INSERT INTO `hd_node` VALUES ('118', '自定义表单', 'Addons', 'CustomForm', 'Admin', 'index', '', '插件CustomForm后台管理', '1', '1', '50', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('123', '广告位', 'Addons', 'Advertising', 'Admin', 'index', '', '插件Advertising后台管理', '1', '1', '50', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('129', '计划任务', 'Addons', 'Crontab', 'Admin', 'index', '', '插件Crontab后台管理', '1', '1', '50', '100', '0', '0');

-- ----------------------------
-- Table structure for hd_picture
-- ----------------------------
DROP TABLE IF EXISTS `hd_picture`;
CREATE TABLE `hd_picture` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `uid` int(10) unsigned NOT NULL COMMENT '用户uid',
  `title` char(100) NOT NULL DEFAULT '' COMMENT '标题',
  `flag` set('热门','置顶','推荐','图片','精华','幻灯片','站长推荐') DEFAULT NULL,
  `new_window` tinyint(1) NOT NULL DEFAULT '0' COMMENT '新窗口打开',
  `seo_title` char(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `click` int(6) NOT NULL DEFAULT '0' COMMENT '点击数',
  `redirecturl` varchar(255) NOT NULL DEFAULT '' COMMENT '转向链接',
  `html_path` varchar(255) NOT NULL DEFAULT '' COMMENT '自定义生成的静态文件地址',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updatetime` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `color` char(7) NOT NULL DEFAULT '' COMMENT '标题颜色',
  `template` varchar(255) NOT NULL DEFAULT '' COMMENT '模板',
  `url_type` tinyint(80) NOT NULL DEFAULT '3' COMMENT '文章访问方式  1 静态访问  2 动态访问  3 继承栏目',
  `arc_sort` mediumint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  `content_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '文章状态  1 已审核 0 未审核 2 草稿',
  `readpoint` char(6) DEFAULT NULL COMMENT '阅读收费',
  `keywords` varchar(100) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `pics` mediumtext,
  `auto_send_time` int(11) DEFAULT '0' COMMENT '自动发表时间',
  PRIMARY KEY (`aid`),
  KEY `uid` (`uid`),
  KEY `cid` (`cid`),
  KEY `flag` (`flag`),
  KEY `content_status` (`content_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of hd_picture
-- ----------------------------

-- ----------------------------
-- Table structure for hd_picture_data
-- ----------------------------
DROP TABLE IF EXISTS `hd_picture_data`;
CREATE TABLE `hd_picture_data` (
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章主表ID',
  `content` text COMMENT '内容',
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章正文表';

-- ----------------------------
-- Records of hd_picture_data
-- ----------------------------

-- ----------------------------
-- Table structure for hd_role
-- ----------------------------
DROP TABLE IF EXISTS `hd_role`;
CREATE TABLE `hd_role` (
  `rid` smallint(5) NOT NULL AUTO_INCREMENT,
  `rname` char(60) NOT NULL DEFAULT '',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '描述',
  `admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '管理组 1 是 0 不是',
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '系统角色',
  `creditslower` mediumint(9) NOT NULL DEFAULT '0' COMMENT '积分<=时为此会员组',
  `comment_state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '评论不需要审核  1 不需要  2 需要',
  `allowsendmessage` tinyint(1) NOT NULL DEFAULT '1' COMMENT '允许发短消息  1 允许  2 不允许',
  PRIMARY KEY (`rid`),
  KEY `gid` (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of hd_role
-- ----------------------------
INSERT INTO `hd_role` VALUES ('1', '超级管理员', '超级管理员', '1', '1', '10000', '1', '1');
INSERT INTO `hd_role` VALUES ('2', '编辑', '内容编辑', '1', '1', '10000', '1', '1');
INSERT INTO `hd_role` VALUES ('3', '发布人员', '发布人员', '1', '1', '10000', '1', '1');
INSERT INTO `hd_role` VALUES ('5', '幼儿园', '新手上路', '0', '1', '100', '1', '1');
INSERT INTO `hd_role` VALUES ('6', '小学生', '小学生', '0', '1', '250', '1', '1');
INSERT INTO `hd_role` VALUES ('7', '中学生', '中学生', '0', '1', '450', '1', '1');
INSERT INTO `hd_role` VALUES ('8', '高中生', '高中生', '0', '0', '700', '1', '1');
INSERT INTO `hd_role` VALUES ('9', '大学生', '大学生', '0', '0', '1050', '1', '1');
INSERT INTO `hd_role` VALUES ('10', '研究生', '研究生', '0', '0', '1450', '1', '1');
INSERT INTO `hd_role` VALUES ('11', '博士', '博士', '0', '0', '2000', '1', '1');
INSERT INTO `hd_role` VALUES ('4', '游客', '游客', '0', '1', '0', '0', '0');

-- ----------------------------
-- Table structure for hd_session
-- ----------------------------
DROP TABLE IF EXISTS `hd_session`;
CREATE TABLE `hd_session` (
  `sessid` char(32) NOT NULL DEFAULT '',
  `data` text,
  `atime` int(10) NOT NULL DEFAULT '0',
  `ip` char(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`sessid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='session会话表';

-- ----------------------------
-- Records of hd_session
-- ----------------------------

-- ----------------------------
-- Table structure for hd_tag
-- ----------------------------
DROP TABLE IF EXISTS `hd_tag`;
CREATE TABLE `hd_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(30) DEFAULT '' COMMENT 'tag字符',
  `total` mediumint(9) DEFAULT '1' COMMENT '次数',
  PRIMARY KEY (`tid`),
  UNIQUE KEY `name` (`tag`),
  KEY `total` (`total`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Tag标签表';

-- ----------------------------
-- Records of hd_tag
-- ----------------------------
INSERT INTO `hd_tag` VALUES ('1', '中国', '6');
INSERT INTO `hd_tag` VALUES ('2', '香港', '6');
INSERT INTO `hd_tag` VALUES ('3', '美国', '4');
INSERT INTO `hd_tag` VALUES ('4', '后盾网', '3');

-- ----------------------------
-- Table structure for hd_upload
-- ----------------------------
DROP TABLE IF EXISTS `hd_upload`;
CREATE TABLE `hd_upload` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `name` varchar(255) DEFAULT '' COMMENT '原文件名',
  `filename` varchar(100) NOT NULL DEFAULT '' COMMENT '文件名',
  `basename` varchar(100) NOT NULL DEFAULT '' COMMENT '有扩展名的文件名',
  `path` char(200) NOT NULL DEFAULT '' COMMENT '文件路径 ',
  `ext` varchar(45) NOT NULL DEFAULT '' COMMENT '扩展名',
  `image` tinyint(1) NOT NULL DEFAULT '1' COMMENT '图片',
  `size` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `uptime` int(10) NOT NULL DEFAULT '0' COMMENT '上传时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否使用 1 使用 0 未使用',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户uid',
  `mid` smallint(6) NOT NULL DEFAULT '0' COMMENT '模型mid',
  PRIMARY KEY (`id`),
  KEY `basename` (`basename`),
  KEY `id` (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='上传文件';

-- ----------------------------
-- Records of hd_upload
-- ----------------------------

-- ----------------------------
-- Table structure for hd_user
-- ----------------------------
DROP TABLE IF EXISTS `hd_user`;
CREATE TABLE `hd_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` char(30) NOT NULL DEFAULT '' COMMENT '昵称',
  `username` char(30) NOT NULL DEFAULT '',
  `password` char(40) NOT NULL DEFAULT '',
  `code` char(30) NOT NULL DEFAULT '' COMMENT '密码key',
  `email` char(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  `regtime` int(11) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `regip` char(255) NOT NULL DEFAULT '' COMMENT '注册IP',
  `lastip` char(15) NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `user_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1  正常  0 锁定',
  `lock_end_time` int(10) NOT NULL DEFAULT '0' COMMENT '锁定到期时间',
  `qq` char(20) NOT NULL DEFAULT '' COMMENT 'qq号码',
  `sex` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 男 2 女 3 保密',
  `credits` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '积分',
  `rid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  `signature` varchar(255) NOT NULL DEFAULT '' COMMENT '个性签名',
  `spec_num` mediumint(9) unsigned NOT NULL DEFAULT '0' COMMENT '空间访问数',
  `icon` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Records of hd_user
-- ----------------------------
INSERT INTO `hd_user` VALUES ('1', 'admin', 'admin', '3ba2c876f62818177bc23ddd0ca4157e', 'df4189db94', '2300071698@qq.com', '1412614136', '1412773751', '0.0.0.0', '0.0.0.0', '1', '0', '', '1', '10000', '1', '这家伙很懒什么也没有写...', '2', 'HDCMS/Static/image/user.png');

-- ----------------------------
-- Table structure for hd_user_credits
-- ----------------------------
DROP TABLE IF EXISTS `hd_user_credits`;
CREATE TABLE `hd_user_credits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` smallint(5) unsigned DEFAULT NULL,
  `aid` int(10) unsigned DEFAULT NULL,
  `mid` smallint(5) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '文章标题',
  `uid` int(10) unsigned DEFAULT NULL,
  `rectime` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员积分日志表';

-- ----------------------------
-- Records of hd_user_credits
-- ----------------------------

-- ----------------------------
-- Table structure for hd_user_guest
-- ----------------------------
DROP TABLE IF EXISTS `hd_user_guest`;
CREATE TABLE `hd_user_guest` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `space_uid` int(11) unsigned DEFAULT NULL COMMENT '主人uid',
  `guest_uid` int(11) unsigned DEFAULT NULL COMMENT '访问uid',
  `entertime` int(11) DEFAULT NULL COMMENT '访客时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='空间访客记录';

-- ----------------------------
-- Records of hd_user_guest
-- ----------------------------
