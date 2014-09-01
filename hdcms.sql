/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50617
 Source Host           : 127.0.0.1
 Source Database       : hdcms

 Target Server Type    : MySQL
 Target Server Version : 50617
 File Encoding         : utf-8

 Date: 09/02/2014 02:49:49 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `hd_access`
-- ----------------------------
DROP TABLE IF EXISTS `hd_access`;
CREATE TABLE `hd_access` (
  `rid` smallint(5) unsigned NOT NULL,
  `nid` smallint(5) unsigned NOT NULL,
  KEY `gid` (`rid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员权限分配表';

-- ----------------------------
--  Table structure for `hd_addon_comment`
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
--  Table structure for `hd_addon_link`
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
--  Table structure for `hd_addon_navigation`
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
--  Table structure for `hd_addons`
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
) ENGINE=MyISAM AUTO_INCREMENT=193 DEFAULT CHARSET=utf8 COMMENT='插件表';

-- ----------------------------
--  Records of `hd_addons`
-- ----------------------------
BEGIN;
INSERT INTO `hd_addons` VALUES ('189', 'Backup', '数据备份', '数据备份还原插件', '1', 'a:0:{}', '后盾网向军', '1.0', '1409578221', '1'), ('178', 'Link', '友情链接', '友情链接', '1', 'a:0:{}', '后盾网向军', '1.0', '1408988196', '1'), ('179', 'Navigation', '导航菜单', '导航菜单', '1', 'a:0:{}', '后盾网向军', '1.0', '1408988221', '1'), ('192', 'Comment', '评论', '评论', '1', 'a:0:{}', '后盾网向军', '1.0', '1409595872', '1'), ('190', 'FieldReplace', '数据库内容替换', '数据库内容替换', '1', 'a:0:{}', '后盾网向军', '1.0', '1409580307', '1'), ('191', 'Search', '前台搜索', '前台搜索', '1', 'a:0:{}', '后盾网向军', '1.0', '1409580312', '1');
COMMIT;

-- ----------------------------
--  Table structure for `hd_category`
-- ----------------------------
DROP TABLE IF EXISTS `hd_category`;
CREATE TABLE `hd_category` (
  `cid` mediumint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目ID',
  `pid` mediumint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父级ID',
  `catname` char(30) NOT NULL DEFAULT '' COMMENT '栏目名称',
  `catdir` varchar(255) DEFAULT NULL,
  `cat_keyworks` varchar(255) NOT NULL DEFAULT '' COMMENT '栏目关键字',
  `cat_description` varchar(255) NOT NULL DEFAULT '' COMMENT '栏目描述',
  `index_tpl` varchar(200) NOT NULL DEFAULT '' COMMENT '封面模板',
  `list_tpl` varchar(200) NOT NULL DEFAULT '' COMMENT '列表页模板',
  `arc_tpl` varchar(200) NOT NULL DEFAULT '' COMMENT '内容页模板',
  `cat_html_url` varchar(200) NOT NULL DEFAULT '' COMMENT '栏目页URL规则\n\n',
  `arc_html_url` varchar(200) NOT NULL DEFAULT '' COMMENT '内容页URL规则',
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
  `member_send_state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '会员投稿状态 1 审核 2 未审核',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
--  Records of `hd_category`
-- ----------------------------
BEGIN;
INSERT INTO `hd_category` VALUES ('1', '0', '案例展示', 'case', '', '提交案例，可以让更多的人知道你的网站!', 'image_index.html', 'image_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '2', '2', '2', '', '100', '1', '提交案例', '', '1', '0', '1', '1', '0'), ('2', '0', '模板下载', 'template', '', '所有模板免费使用，可以用在任何商业用途！', 'article_index.html', 'image_list.html', 'download_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '2', '2', '2', '2', '', '100', '1', '提交模板', '', '1', '0', '1', '1', '1'), ('3', '0', '模块插件', 'addon', '', '所在插件与模块均免费使用！', 'download_index.html', 'download_list.html', 'download_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '2', '2', '2', '2', '', '100', '1', '', '', '1', '0', '1', '1', '1'), ('4', '0', 'CMS帮助', 'hdcms', '', '使用交流，问题求助社区', 'article_index.html', 'cms_help_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '100', '1', '', '', '1', '0', '1', '1', '1'), ('5', '0', '论坛求助', 'luntan', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '3', '2', '2', 'http://bbs.houdunwang.com', '1001', '1', '', '', '1', '0', '1', '1', '1'), ('6', '4', '标签使用', 'help/tag', '', '', 'article_index.html', 'cms_help_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '2', '1', '', '', '1', '0', '1', '1', '1'), ('7', '4', '安装使用', 'help/setup', '', '', 'article_index.html', 'cms_help_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '1', '1', '', '', '1', '0', '1', '1', '1'), ('8', '4', '模块插件', 'help/addon', '', '', 'article_index.html', 'cms_help_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '3', '1', '', '', '1', '0', '1', '1', '1'), ('9', '0', '框架帮助', 'hdphp', '', '', 'article_index.html', 'hdphp_help_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '100', '1', '', '', '1', '0', '1', '1', '1'), ('12', '9', '模板标签', 'hdphp/tag', '', '', 'article_index.html', 'hdphp_help_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '2', '1', '', '', '1', '0', '1', '1', '1'), ('11', '9', '起步知识', 'hdphp/base', '', '', 'article_index.html', 'hdphp_help_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '1', '1', '', '', '1', '0', '1', '1', '1'), ('13', '9', '数据模型', 'hdphp/model', '', '', 'article_index.html', 'hdphp_help_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '100', '1', '', '', '1', '0', '1', '1', '1'), ('14', '3', '模块', 'addon/module', '', '所有模块免费使用！', 'article_index.html', 'download_list.html', 'download_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '2', '1', '2', '2', '', '100', '1', '提交模块', '', '1', '0', '1', '1', '1'), ('15', '3', '插件', 'addon/plugin', '', '所有插件免费使用！', 'article_index.html', 'download_list.html', 'download_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '2', '1', '2', '2', '', '100', '1', '提交插件', '', '1', '0', '1', '1', '1'), ('51', '1', '企业网站', 'case/qiyewangzhan', '', '提交案例，可以让更多的人知道你的网站!', 'article_index.html', 'image_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '100', '1', '提交案例', '', '0', '0', '1', '1', '1'), ('52', '1', '行业门户', 'case/xingyemenhu', '', '提交案例，可以让更多的人知道你的网站!', 'article_index.html', 'image_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '100', '1', '提交案例', '', '0', '0', '1', '1', '1'), ('53', '2', '企业网站', 'template/qiyewangzhan', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '100', '1', '', '', '0', '0', '1', '1', '1'), ('54', '2', '行业门户', 'template/xingyemenhu', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '2', '1', '2', '2', '', '100', '1', '', '', '0', '0', '1', '1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `hd_category_access`
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
--  Table structure for `hd_config`
-- ----------------------------
DROP TABLE IF EXISTS `hd_config`;
CREATE TABLE `hd_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '' COMMENT '配置名称\n',
  `value` text NOT NULL COMMENT '配置值',
  `type` enum('site','upload','member','email','water','content','optimize','rewrite','custom','template') NOT NULL DEFAULT 'site' COMMENT '配置类型\n1 站点配置\n2 性能设置\n3 上传配置\n4 交互设置\n5 会员设置',
  `title` char(30) NOT NULL DEFAULT '',
  `show_type` enum('text','radio','textarea','group','password','waterpos') DEFAULT 'text',
  `message` varchar(255) DEFAULT NULL COMMENT '提示',
  `order_list` smallint(6) unsigned DEFAULT '100' COMMENT '排序',
  `status` tinyint(4) DEFAULT '1' COMMENT '总配置模块显示  如模板风格就不显示 1显示 0 不显示',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COMMENT='系统配置';

-- ----------------------------
--  Records of `hd_config`
-- ----------------------------
BEGIN;
INSERT INTO `hd_config` VALUES ('1', 'WEBNAME', 'HDCMS内容管理系统', 'site', '网站名称', 'text', null, '1', '1'), ('2', 'ICP', '京ICP备12048441号-3', 'site', 'ICP备案号', 'text', null, '7', '1'), ('3', 'HTML_PATH', 'h', 'content', '静态html目录', 'text', null, '2', '1'), ('4', 'COPYRIGHT', 'Copyright © 2012-2014  HDPHP&HDCMS来自后盾网 | 国内唯一一家教育机构推出的开源产品', 'site', '网站版权信息', 'text', null, '6', '1'), ('5', 'KEYWORDS', 'php培训,php实训,后盾网', 'site', '网站关键词', 'text', null, '4', '1'), ('6', 'DESCRIPTION', '后盾网顶尖PHP培训 内容全面 全程实战!业内顶级讲师亲自授课,千余课时独家视频教程免费下载,超百G原创视频资源,实力不容造假!010-64825057', 'site', '网站描述', 'text', null, '5', '1'), ('7', 'EMAIL', 'houdunwangxj@gmail.com', 'site', '管理员邮箱', 'text', null, '8', '1'), ('73', 'DEFAULT_GROUP', '4', 'member', '默认会员组', 'group', null, '100', '1'), ('9', 'WEB_OPEN', '1', 'site', '网站开启', 'radio', null, '2', '1'), ('63', 'UPLOAD_PATH', 'upload', 'upload', '上传目录', 'text', null, '100', '1'), ('20', 'ALLOW_TYPE', 'jpg,jpeg,png,bmp,gif,zip,rar,doc', 'upload', '允许上传文件类型', 'text', null, '100', '1'), ('21', 'ALLOW_SIZE', '10480000', 'upload', '允许上传大小（字节）', 'text', null, '100', '1'), ('22', 'WATER_ON', '1', 'upload', '图片文件加水印', 'radio', null, '100', '1'), ('64', 'TEL', '010-64825057', 'site', '联系电话', 'text', null, '9', '1'), ('41', 'WATER_TEXT', 'houdunwang.com', 'water', '水印文字', 'text', null, '100', '1'), ('42', 'WATER_TEXT_SIZE', '16', 'water', '文字大小', 'text', null, '100', '1'), ('43', 'WATER_IMG', 'static/image/water.png', 'water', '水印图像', 'text', null, '100', '1'), ('44', 'WATER_PCT', '80', 'water', '水印图片透明度', 'text', null, '100', '1'), ('45', 'WATER_QUALITY', '90', 'water', '图片压缩比', 'text', null, '100', '1'), ('46', 'WATER_POS', '9', 'water', '水印位置', 'waterpos', null, '100', '1'), ('47', 'DEL_CONTENT_MODEL', '0', 'content', '删除文章标记为未审核', 'radio', null, '4', '1'), ('67', 'CREATE_INDEX_HTML', '0', 'content', '首页生成静态', 'radio', null, '1', '1'), ('48', 'DOWN_REMOTE_PIC', '0', 'content', '下载远程图片', 'radio', null, '5', '1'), ('49', 'AUTO_DESC', '1', 'content', '截取内容为摘要', 'radio', null, '6', '1'), ('50', 'AUTO_THUMB', '1', 'content', '提取内容图片为缩略图', 'radio', null, '7', '1'), ('32', 'MEMBER_OPEN', '1', 'member', '开启会员中心', 'radio', null, '1', '1'), ('11', 'WEB_CLOSE_MESSAGE', '网站维护中，请稍候访问...', 'site', '网站关闭提示信息', 'text', null, '3', '1'), ('12', 'WEB_STYLE', 'default', 'template', '网站模板', 'text', null, '100', '1'), ('33', 'INIT_CREDITS', '100', 'member', '会员初始积分', 'text', null, '2', '1'), ('53', 'CACHE_INDEX', '0', 'optimize', '首页缓存时间', 'text', '单位秒，0为不缓存', '100', '1'), ('54', 'CACHE_CATEGORY', '0', 'optimize', '栏目缓存时间', 'text', '单位秒，0为不缓存', '100', '1'), ('55', 'CACHE_CONTENT', '0', 'optimize', '文章缓存时间', 'text', '单位秒，0为不缓存', '100', '1'), ('57', 'REWRITE_ENGINE', '0', 'rewrite', '开启伪静态', 'radio', '1:服务器需要支持Rewrtie <br/>2:根目录下存在.htaccess文件', '100', '1'), ('35', 'EMAIL_USERNAME', 'hdcms@houdunwang.com', 'email', '邮箱用户名', 'text', '使用126或qq邮箱', '3', '1'), ('36', 'EMAIL_PASSWORD', 'admin521', 'email', '邮箱密码', 'password', '邮箱的密码', '4', '1'), ('37', 'EMAIL_HOST', 'smtp.exmail.qq.com', 'email', 'smtp地址', 'text', '如smtp.gmail.com', '100', '1'), ('38', 'EMAIL_PORT', '25', 'email', 'smtp端口', 'text', 'qq,126为25，gmail为465', '100', '1'), ('39', 'EMAIL_FROMNAME', '后盾网', 'email', '发送人', 'text', '发送人发件箱显示的用户名', '100', '1'), ('72', 'EMAIL_FORMMAIL', 'hdcms@houdunwang.com', 'email', '发件人', 'text', '发送人发件箱显示的邮箱址址', '1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `hd_content`
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
  `content_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '文章状态  1 已审核 0 未审核',
  `readpoint` smallint(6) DEFAULT NULL COMMENT '阅读收费',
  `keywords` varchar(100) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`aid`),
  KEY `uid` (`uid`),
  KEY `cid` (`cid`),
  KEY `flag` (`flag`),
  KEY `content_status` (`content_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
--  Table structure for `hd_content_data`
-- ----------------------------
DROP TABLE IF EXISTS `hd_content_data`;
CREATE TABLE `hd_content_data` (
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章主表ID',
  `content` text COMMENT '内容',
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章正文表';

-- ----------------------------
--  Table structure for `hd_content_tag`
-- ----------------------------
DROP TABLE IF EXISTS `hd_content_tag`;
CREATE TABLE `hd_content_tag` (
  `mid` smallint(6) NOT NULL COMMENT '模型mid',
  `cid` smallint(6) NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `aid` int(11) NOT NULL DEFAULT '0' COMMENT '文章aid',
  `tid` int(11) NOT NULL DEFAULT '0' COMMENT '标签id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='内容标签表';

-- ----------------------------
--  Table structure for `hd_download`
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
  `content_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '文章状态  1 已审核 0 未审核',
  `readpoint` smallint(6) DEFAULT NULL COMMENT '阅读收费',
  `keywords` varchar(100) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `files` mediumtext,
  `system` varchar(255) NOT NULL DEFAULT '',
  `language` char(250) NOT NULL DEFAULT '',
  `softtype` char(250) NOT NULL DEFAULT '',
  `version` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`aid`),
  KEY `uid` (`uid`),
  KEY `cid` (`cid`),
  KEY `flag` (`flag`),
  KEY `content_status` (`content_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
--  Table structure for `hd_download_data`
-- ----------------------------
DROP TABLE IF EXISTS `hd_download_data`;
CREATE TABLE `hd_download_data` (
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章主表ID',
  `content` text COMMENT '内容',
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章正文表';

-- ----------------------------
--  Table structure for `hd_favorite`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_field`
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
) ENGINE=MyISAM AUTO_INCREMENT=172 DEFAULT CHARSET=utf8 COMMENT='模型字段';

-- ----------------------------
--  Records of `hd_field`
-- ----------------------------
BEGIN;
INSERT INTO `hd_field` VALUES ('104', '1', '1', 'input', '1', 'content', 'readpoint', '阅读收费', '金币', '1', '1', '106', 'a:3:{s:4:\"size\";s:3:\"100\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('103', '1', '1', 'box', '1', 'content', 'content_status', '状态', '', '1', '1', '112', 'a:3:{s:7:\"options\";s:26:\"1|审核通过,0|待审查\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('101', '1', '1', 'content', '2', 'content_data', 'content', '正文', '', '1', '1', '100', '', '', '0', '', '', '0', '', '0', '1', '0', '1'), ('102', '1', '1', 'number', '1', 'content', 'click', '点击数', '', '1', '1', '111', 'a:4:{s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('98', '1', '1', 'flag', '1', 'content', 'flag', '属性', '', '1', '1', '4', '', '', '0', '', '', '0', '', '0', '1', '1', '0'), ('99', '1', '1', 'title', '1', 'content', 'title', '标题', '', '1', '1', '1', 'a:2:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";}', '', '0', '100', '', '1', '', '0', '1', '1', '1'), ('100', '1', '1', 'input', '1', 'content', 'tag', 'TAG', '', '1', '0', '101', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('96', '1', '1', 'thumb', '1', 'content', 'thumb', '缩略图', '', '1', '1', '3', 's:0:\"\";', '', '', '', '', '0', '', '0', '0', '1', '1'), ('97', '1', '1', 'input', '1', 'content', 'html_path', 'html文件名', '', '1', '1', '107', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('94', '1', '1', 'cid', '1', 'content', 'cid', '栏目', '', '1', '1', '2', 's:0:\"\";', '', '1', '', '', '1', '请选择栏目', '0', '1', '0', '1'), ('95', '1', '1', 'input', '1', 'content', 'seo_title', 'SEO标题', '', '1', '1', '5', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '', '', '', '0', '', '0', '1', '1', '0'), ('92', '1', '1', 'datetime', '1', 'content', 'addtime', '添加时间', '', '1', '1', '105', 'a:1:{s:6:\"format\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('93', '1', '1', 'input', '1', 'content', 'redirecturl', '转向链接', '', '1', '1', '104', 'a:3:{s:4:\"size\";s:3:\"150\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '/^http:///', '0', '', '0', '0', '0', '0'), ('90', '1', '1', 'template', '1', 'content', 'template', '模板', '', '1', '1', '108', '', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('91', '1', '1', 'box', '1', 'content', 'url_type', '文章访问方式', '', '1', '1', '109', 'a:3:{s:7:\"options\";s:45:\"1|静态访问,2|动态访问 ,3|继承栏目\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"3\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('89', '1', '1', 'number', '1', 'content', 'arc_sort', '排序', '', '1', '1', '110', 'a:5:{s:10:\"field_type\";s:9:\"mediumint\";s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('88', '1', '1', 'input', '1', 'content', 'keywords', '关键字', '', '1', '1', '102', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('87', '1', '1', 'textarea', '1', 'content', 'description', '描述', '', '1', '1', '103', 'a:3:{s:5:\"width\";s:3:\"500\";s:6:\"height\";s:3:\"100\";s:7:\"default\";s:0:\"\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('139', '2', '1', 'flag', '1', 'download', 'flag', '属性', '', '1', '1', '4', '', '', '0', '', '', '0', '', '0', '1', '1', '0'), ('140', '2', '1', 'title', '1', 'download', 'title', '标题', '', '1', '1', '1', 'a:2:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";}', '', '0', '100', '', '1', '', '0', '1', '1', '1'), ('137', '2', '1', 'thumb', '1', 'download', 'thumb', '缩略图', '', '1', '1', '3', '', '', '0', '', '', '0', '', '0', '0', '0', '1'), ('138', '2', '1', 'input', '1', 'download', 'html_path', 'html文件名', '', '1', '1', '108', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('135', '2', '1', 'cid', '1', 'download', 'cid', '栏目', '', '1', '1', '2', '', '', '0', '', '', '0', '', '0', '1', '0', '1'), ('136', '2', '1', 'input', '1', 'download', 'seo_title', 'SEO标题', '', '1', '1', '5', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('133', '2', '1', 'datetime', '1', 'download', 'addtime', '添加时间', '', '1', '1', '106', 'a:1:{s:6:\"format\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('134', '2', '1', 'input', '1', 'download', 'redirecturl', '转向链接', '', '1', '1', '105', 'a:3:{s:4:\"size\";s:3:\"150\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '/^http:///', '0', '', '0', '0', '0', '0'), ('132', '2', '1', 'box', '1', 'download', 'url_type', '文章访问方式', '', '1', '1', '120', 'a:3:{s:7:\"options\";s:45:\"1|静态访问,2|动态访问 ,3|继承栏目\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"3\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('131', '2', '1', 'template', '1', 'download', 'template', '模板', '', '1', '1', '109', '', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('130', '2', '1', 'number', '1', 'download', 'arc_sort', '排序', '', '1', '1', '121', 'a:5:{s:10:\"field_type\";s:9:\"mediumint\";s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('129', '2', '1', 'input', '1', 'download', 'keywords', '关键字', '', '1', '1', '102', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('128', '2', '1', 'textarea', '1', 'download', 'description', '描述', '', '1', '1', '103', 'a:3:{s:5:\"width\";s:3:\"500\";s:6:\"height\";s:3:\"100\";s:7:\"default\";s:0:\"\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('141', '2', '1', 'input', '1', 'download', 'tag', 'TAG', '', '1', '0', '101', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('142', '2', '1', 'content', '2', 'download_data', 'content', '正文', '', '1', '1', '100', '', '', '0', '', '', '0', '', '0', '1', '0', '1'), ('143', '2', '1', 'number', '1', 'download', 'click', '点击数', '', '1', '1', '122', 'a:4:{s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('144', '2', '1', 'box', '1', 'download', 'content_status', '状态', '', '1', '1', '123', 'a:3:{s:7:\"options\";s:26:\"1|审核通过,0|待审查\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('145', '2', '1', 'input', '1', 'download', 'readpoint', '阅读收费', '金币', '1', '1', '107', 'a:3:{s:4:\"size\";s:3:\"100\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('146', '2', '1', 'files', '1', 'download', 'files', '本地下载', '', '1', '0', '6', 'a:3:{s:10:\"allow_size\";s:1:\"2\";s:3:\"num\";s:2:\"10\";s:8:\"filetype\";s:15:\"zip,rar,doc,ppt\";}', '', '0', '', '', '1', '', '0', '1', '0', '1'), ('150', '2', '1', 'box', '1', 'download', 'language', '软件语言', '', '1', '0', '7', 'a:3:{s:7:\"options\";s:117:\"英文|英文,简体中文|简体中文,繁体中文|繁体中文,多国语言|多国语言,其他语言|其他语言\";s:9:\"form_type\";s:6:\"select\";s:7:\"default\";s:6:\"英文\";}', '', '0', '', '', '0', '', '0', '1', '0', '1'), ('148', '2', '1', 'input', '1', 'download', 'system', '软件平台', '', '1', '0', '8', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:21:\"Win2000/WinXP/Win2003\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '1'), ('151', '2', '1', 'box', '1', 'download', 'softtype', '软件类型', '', '1', '0', '9', 'a:3:{s:7:\"options\";s:117:\"国产软件|国产软件,国外软件|国外软件,汉化补丁|汉化补丁,程序源码|程序源码,其他|其他\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:12:\"国产软件\";}', '', '0', '', '', '0', '', '0', '1', '0', '1'), ('152', '2', '1', 'input', '1', 'download', 'version', '版本号', '', '1', '0', '10', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '1'), ('153', '3', '1', 'textarea', '1', 'picture', 'description', '描述', '', '1', '1', '103', 'a:3:{s:5:\"width\";s:3:\"500\";s:6:\"height\";s:3:\"100\";s:7:\"default\";s:0:\"\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('154', '3', '1', 'input', '1', 'picture', 'keywords', '关键字', '', '1', '1', '102', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('155', '3', '1', 'number', '1', 'picture', 'arc_sort', '排序', '', '1', '1', '111', 'a:5:{s:10:\"field_type\";s:9:\"mediumint\";s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('156', '3', '1', 'template', '1', 'picture', 'template', '模板', '', '1', '1', '109', '', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('157', '3', '1', 'box', '1', 'picture', 'url_type', '文章访问方式', '', '1', '1', '110', 'a:3:{s:7:\"options\";s:45:\"1|静态访问,2|动态访问 ,3|继承栏目\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"3\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('158', '3', '1', 'datetime', '1', 'picture', 'addtime', '添加时间', '', '1', '1', '106', 'a:1:{s:6:\"format\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('159', '3', '1', 'input', '1', 'picture', 'redirecturl', '转向链接', '', '1', '1', '105', 'a:3:{s:4:\"size\";s:3:\"150\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '/^http:///', '0', '', '0', '0', '0', '0'), ('160', '3', '1', 'cid', '1', 'picture', 'cid', '栏目', '', '1', '1', '2', '', '', '0', '', '', '0', '', '0', '1', '0', '1'), ('161', '3', '1', 'input', '1', 'picture', 'seo_title', 'SEO标题', '', '1', '1', '5', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('162', '3', '1', 'thumb', '1', 'picture', 'thumb', '缩略图', '', '1', '1', '3', '', '', '0', '', '', '0', '', '0', '0', '0', '1'), ('163', '3', '1', 'input', '1', 'picture', 'html_path', 'html文件名', '', '1', '1', '108', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('164', '3', '1', 'flag', '1', 'picture', 'flag', '属性', '', '1', '1', '4', '', '', '0', '', '', '0', '', '0', '1', '1', '0'), ('165', '3', '1', 'title', '1', 'picture', 'title', '标题', '', '1', '1', '1', 'a:2:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";}', '', '0', '100', '', '1', '', '0', '1', '1', '1'), ('166', '3', '1', 'input', '1', 'picture', 'tag', 'TAG', '', '1', '0', '101', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('167', '3', '1', 'content', '2', 'picture_data', 'content', '正文', '', '1', '1', '100', '', '', '0', '', '', '0', '', '0', '1', '0', '1'), ('168', '3', '1', 'number', '1', 'picture', 'click', '点击数', '', '1', '1', '112', 'a:4:{s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('169', '3', '1', 'box', '1', 'picture', 'content_status', '状态', '', '1', '1', '113', 'a:3:{s:7:\"options\";s:26:\"1|审核通过,0|待审查\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('170', '3', '1', 'input', '1', 'picture', 'readpoint', '阅读收费', '金币', '1', '1', '107', 'a:3:{s:4:\"size\";s:3:\"100\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('171', '3', '1', 'images', '1', 'picture', 'pics', '组图', '', '1', '0', '6', 'a:2:{s:10:\"allow_size\";s:1:\"2\";s:3:\"num\";s:2:\"50\";}', '', '0', '', '', '0', '', '0', '1', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `hd_hooks`
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
--  Records of `hd_hooks`
-- ----------------------------
BEGIN;
INSERT INTO `hd_hooks` VALUES ('17', 'pageHeader', '页面header钩子，一般用于加载插件CSS文件和代码', '1', '0', ''), ('18', 'pageFooter', '页面footer钩子，一般用于加载插件JS文件和JS代码', '1', '0', ''), ('19', 'APP_BEGIN', '应用开始', '1', '0', ''), ('20', 'conent_edit_begin', '内容编辑前', '1', '0', 'Example'), ('21', 'content_edit_end', '内容编辑后', '1', '0', 'Example'), ('22', 'content_del', '内容删除后', '1', '0', 'Example'), ('23', 'content_add_begin', '内容添加前', '1', '0', 'Example'), ('24', 'content_add_end', '内容添加后', '1', '0', '');
COMMIT;

-- ----------------------------
--  Table structure for `hd_menu_favorite`
-- ----------------------------
DROP TABLE IF EXISTS `hd_menu_favorite`;
CREATE TABLE `hd_menu_favorite` (
  `uid` smallint(5) unsigned NOT NULL,
  `nid` smallint(5) unsigned NOT NULL,
  KEY `gid` (`uid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员权限分配表';

-- ----------------------------
--  Records of `hd_menu_favorite`
-- ----------------------------
BEGIN;
INSERT INTO `hd_menu_favorite` VALUES ('0', '57'), ('0', '16'), ('0', '12'), ('0', '8'), ('0', '8'), ('0', '12'), ('0', '16'), ('0', '57'), ('1', '78'), ('1', '16'), ('1', '8'), ('1', '12');
COMMIT;

-- ----------------------------
--  Table structure for `hd_model`
-- ----------------------------
DROP TABLE IF EXISTS `hd_model`;
CREATE TABLE `hd_model` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `model_name` char(255) NOT NULL DEFAULT '' COMMENT '模型名称',
  `table_name` char(255) NOT NULL DEFAULT '' COMMENT '主表名',
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '禁用 1 开启 0 关闭',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '模型描述',
  `is_system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 系统模型  2 普通模型',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='模型表';

-- ----------------------------
--  Records of `hd_model`
-- ----------------------------
BEGIN;
INSERT INTO `hd_model` VALUES ('1', '普通文章', 'content', '1', '', '1'), ('2', '下载模型', 'download', '1', '下载模型', '0'), ('3', '图片模型', 'picture', '1', '图片模型', '0');
COMMIT;

-- ----------------------------
--  Table structure for `hd_node`
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
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COMMENT='节点表（后台菜单也使用）';

-- ----------------------------
--  Records of `hd_node`
-- ----------------------------
BEGIN;
INSERT INTO `hd_node` VALUES ('1', '内容', '', 'Admin', '', '', '', '', '1', '2', '0', '2', '0', '0'), ('2', '内容管理', '', 'Admin', '', '', '', '', '1', '1', '1', '10', '0', '0'), ('3', '系统', '', 'Admin', '', '', '', '', '1', '1', '0', '10', '0', '0'), ('4', '后台菜单管理', '', 'Admin', 'Node', 'index', '', '', '1', '1', '11', '100', '0', '0'), ('8', '栏目管理', '', 'Admin', 'Category', 'index', '', '', '1', '1', '2', '20', '0', '1'), ('9', '模型管理', '', 'Admin', 'Model', 'index', '', '', '1', '1', '37', '100', '0', '0'), ('10', '推荐位', '', 'Admin', 'Flag', 'index', 'mid=1', '', '1', '1', '37', '100', '0', '0'), ('11', '系统设置', '', 'Admin', '', '', '', '', '1', '1', '3', '98', '0', '0'), ('12', '文章列表', '', 'Admin', 'Content', 'index', '', '', '1', '1', '2', '10', '0', '1'), ('13', '管理员设置', '', 'Admin', '', '', '', '', '1', '1', '3', '100', '0', '0'), ('14', '管理员管理', '', 'Admin', 'Administrator', 'index', '', '', '1', '1', '13', '100', '0', '0'), ('15', '角色管理', '', 'Admin', 'Role', 'index', '', '', '1', '1', '13', '100', '0', '0'), ('16', '网站配置', '', 'Admin', 'Config', 'edit', '', '', '1', '1', '11', '90', '0', '0'), ('17', '生成静态', '', 'Admin', '', '', '', '', '1', '1', '1', '11', '0', '0'), ('18', '批量更新栏目页', '', 'Admin', 'Html', 'createCategory', '', '生成栏目页', '1', '1', '17', '102', '0', '0'), ('19', '生成首页', '', 'Admin', 'Html', 'createIndex', '', '生成首页', '1', '1', '17', '101', '0', '1'), ('20', '批量更新内容页', '', 'Admin', 'Html', 'createContent', '', '生成内容页', '1', '1', '17', '103', '0', '0'), ('21', '修改密码', '', 'Admin', 'Personal', 'editPassword', '', '', '1', '1', '24', '100', '0', '0'), ('22', '修改个人信息', '', 'Admin', 'Personal', 'editInfo', '', '', '1', '1', '24', '100', '0', '0'), ('23', '我的面板', '', 'Admin', '', '', '', '', '1', '2', '0', '100', '0', '0'), ('24', '个人信息', '', 'Admin', '', '', '', '', '1', '1', '23', '100', '0', '0'), ('26', '会员', '', 'Admin', '', '', '', '', '1', '1', '0', '100', '0', '0'), ('27', '会员管理', '', 'Admin', '', '', '', '', '1', '1', '26', '100', '0', '0'), ('28', '会员管理', '', 'Admin', 'User', 'index', '', '', '1', '1', '27', '100', '0', '0'), ('29', '审核会员', '', 'Admin', 'User', 'index', 'user_status=0', '', '1', '1', '27', '100', '0', '0'), ('30', '会员组管理', '', 'Admin', '', '', '', '', '1', '1', '26', '100', '0', '0'), ('31', '管理会员组', '', 'Admin', 'Group', 'index', '', '', '1', '1', '30', '100', '0', '0'), ('32', '模板', '', 'Admin', '', '', '', '', '1', '1', '0', '100', '0', '0'), ('33', '模板管理', '', 'Admin', '', '', '', '', '1', '1', '32', '100', '0', '0'), ('34', '模板风格', '', 'Admin', 'TemplateStyle', 'styleList', '', '', '1', '1', '33', '90', '0', '0'), ('35', '标签云', '', 'Admin', 'Tag', 'index', '', '', '1', '1', '37', '100', '0', '0'), ('37', '其他操作', '', 'Admin', '', '', '', '', '1', '1', '1', '100', '0', '0'), ('59', '附件管理', '', 'Admin', 'Attachment', 'index', '', '', '1', '1', '37', '100', '0', '0'), ('39', '扩展', '', 'Admin', '', '', '', '', '1', '1', '0', '1000', '0', '0'), ('40', '插件管理', '', 'Admin', '', '', '', '', '1', '1', '39', '99', '0', '0'), ('41', '插件管理', '', 'Admin', 'Addons', 'index', '', '', '1', '1', '40', '100', '0', '0'), ('42', '审核文章', '', 'Admin', 'ContentAudit', 'content', 'mid=1', '', '1', '1', '2', '11', '0', '1'), ('49', '钓子管理', '', 'Admin', 'Hooks', 'index', '', '', '1', '1', '40', '100', '0', '0'), ('44', '添加栏目', '', 'Admin', 'Category', 'add', '', '', '0', '1', '2', '21', '0', '0'), ('45', '删除栏目', '', 'Admin', 'Category', 'del', '', '', '0', '1', '2', '22', '0', '0'), ('46', '修改栏目', '', 'Admin', 'Category', 'edit', '', '', '0', '1', '2', '23', '0', '0'), ('47', '批量修改栏目', '', 'Admin', 'Category', 'BulkEdit', '', '', '0', '1', '2', '24', '0', '0'), ('68', '水印设置', '', 'Admin', 'Config', 'water', '', '', '1', '1', '11', '90', '0', '0'), ('50', '已装插件', '', 'Admin', '', '', '', '', '1', '1', '39', '100', '0', '0'), ('78', '数据备份', 'Addons', 'Backup', 'Admin', 'index', '', '插件Backup后台管理', '1', '1', '50', '100', '0', '0'), ('66', '友情链接', 'Addons', 'Link', 'Admin', 'index', '', '插件Link后台管理', '1', '1', '50', '100', '0', '0'), ('67', '导航菜单', 'Addons', 'Navigation', 'Admin', 'index', '', '插件Navigation后台管理', '1', '1', '50', '100', '0', '0'), ('69', '邮箱配置', '', 'Admin', 'Config', 'email', '', '', '1', '1', '11', '90', '0', '0'), ('81', '评论', 'Addons', 'Comment', 'Admin', 'index', '', '插件Comment后台管理', '1', '1', '50', '100', '0', '0'), ('79', '数据库内容替换', 'Addons', 'FieldReplace', 'Admin', 'index', '', '插件FieldReplace后台管理', '1', '1', '50', '100', '0', '0'), ('80', '前台搜索', 'Addons', 'Search', 'Admin', 'index', '', '插件Search后台管理', '1', '1', '50', '100', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `hd_picture`
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
  `content_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '文章状态  1 已审核 0 未审核',
  `readpoint` smallint(6) DEFAULT NULL COMMENT '阅读收费',
  `keywords` varchar(100) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `pics` mediumtext,
  PRIMARY KEY (`aid`),
  KEY `uid` (`uid`),
  KEY `cid` (`cid`),
  KEY `flag` (`flag`),
  KEY `content_status` (`content_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
--  Table structure for `hd_picture_data`
-- ----------------------------
DROP TABLE IF EXISTS `hd_picture_data`;
CREATE TABLE `hd_picture_data` (
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章主表ID',
  `content` text COMMENT '内容',
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章正文表';

-- ----------------------------
--  Table structure for `hd_role`
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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
--  Records of `hd_role`
-- ----------------------------
BEGIN;
INSERT INTO `hd_role` VALUES ('1', '超级管理员', '超级管理员', '1', '1', '10000', '1', '1'), ('2', '编辑', '内容编辑', '1', '1', '10000', '1', '1'), ('3', '发布人员', '发布人员', '1', '1', '10000', '1', '1'), ('4', '幼儿园', '新手上路', '0', '1', '100', '1', '1'), ('5', '小学生', '小学生', '0', '1', '250', '1', '1'), ('6', '中学生', '中学生', '0', '1', '450', '1', '1'), ('7', '高中生', '高中生', '0', '0', '700', '1', '1'), ('8', '大学生', '大学生', '0', '0', '1050', '1', '1'), ('9', '研究生', '研究生', '0', '0', '1450', '1', '1'), ('10', '博士', '博士', '0', '0', '2000', '1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `hd_session`
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
--  Records of `hd_session`
-- ----------------------------
BEGIN;
INSERT INTO `hd_session` VALUES ('niqf25v5sie9q5oqcgtj64an96', 'user|a:25:{s:3:\"uid\";s:1:\"1\";s:8:\"nickname\";s:5:\"admin\";s:8:\"username\";s:5:\"admin\";s:5:\"email\";s:22:\"houdunwangxj@gmail.com\";s:7:\"regtime\";s:10:\"1405397800\";s:9:\"logintime\";s:10:\"1409590177\";s:5:\"regip\";s:7:\"0.0.0.0\";s:6:\"lastip\";s:7:\"0.0.0.0\";s:11:\"user_status\";s:1:\"1\";s:13:\"lock_end_time\";s:1:\"0\";s:2:\"qq\";s:11:\"23000121211\";s:3:\"sex\";s:1:\"1\";s:7:\"credits\";s:5:\"10000\";s:3:\"rid\";s:1:\"1\";s:9:\"signature\";s:0:\"\";s:8:\"spec_num\";s:1:\"0\";s:4:\"icon\";s:64:\"http://localhost/hdcms/upload/user/2014/08/31/40341409493938.jpg\";s:5:\"rname\";s:15:\"超级管理员\";s:5:\"title\";s:15:\"超级管理员\";s:5:\"admin\";s:1:\"1\";s:6:\"system\";s:1:\"1\";s:12:\"creditslower\";s:5:\"10000\";s:13:\"comment_state\";s:1:\"1\";s:16:\"allowsendmessage\";s:1:\"1\";s:10:\"web_master\";b:1;}admin|N;', '1409595239', '0.0.0.0'), ('0aikkg5avdanfh38il8hbl1pi2', 'admin|N;user|a:25:{s:3:\"uid\";s:2:\"20\";s:8:\"nickname\";s:2:\"qq\";s:8:\"username\";s:2:\"qq\";s:5:\"email\";s:17:\"2300071698@qq.com\";s:7:\"regtime\";s:10:\"1409590987\";s:9:\"logintime\";s:10:\"1409590987\";s:5:\"regip\";s:7:\"0.0.0.0\";s:6:\"lastip\";s:7:\"0.0.0.0\";s:11:\"user_status\";s:1:\"1\";s:13:\"lock_end_time\";s:1:\"0\";s:2:\"qq\";s:0:\"\";s:3:\"sex\";s:1:\"1\";s:7:\"credits\";s:3:\"100\";s:3:\"rid\";s:1:\"4\";s:9:\"signature\";s:33:\"这家伙很懒什么也没写...\";s:8:\"spec_num\";s:1:\"0\";s:4:\"icon\";s:50:\"http://localhost/hdcms/HDCMS/Static/image/user.png\";s:5:\"rname\";s:9:\"幼儿园\";s:5:\"title\";s:12:\"新手上路\";s:5:\"admin\";s:1:\"0\";s:6:\"system\";s:1:\"1\";s:12:\"creditslower\";s:3:\"100\";s:13:\"comment_state\";s:1:\"1\";s:16:\"allowsendmessage\";s:1:\"1\";s:10:\"web_master\";b:0;}code|s:4:\"UBED\";', '1409595642', '0.0.0.0'), ('jjm68b1hhr1tr7i803aaj2mms1', 'admin|N;user|a:25:{s:3:\"uid\";s:1:\"1\";s:8:\"nickname\";s:5:\"admin\";s:8:\"username\";s:5:\"admin\";s:5:\"email\";s:22:\"houdunwangxj@gmail.com\";s:7:\"regtime\";s:10:\"1405397800\";s:9:\"logintime\";s:10:\"1409591982\";s:5:\"regip\";s:7:\"0.0.0.0\";s:6:\"lastip\";s:7:\"0.0.0.0\";s:11:\"user_status\";s:1:\"1\";s:13:\"lock_end_time\";s:1:\"0\";s:2:\"qq\";s:11:\"23000121211\";s:3:\"sex\";s:1:\"1\";s:7:\"credits\";s:5:\"10000\";s:3:\"rid\";s:1:\"1\";s:9:\"signature\";s:0:\"\";s:8:\"spec_num\";s:1:\"0\";s:4:\"icon\";s:64:\"http://localhost/hdcms/upload/user/2014/08/31/40341409493938.jpg\";s:5:\"rname\";s:15:\"超级管理员\";s:5:\"title\";s:15:\"超级管理员\";s:5:\"admin\";s:1:\"1\";s:6:\"system\";s:1:\"1\";s:12:\"creditslower\";s:5:\"10000\";s:13:\"comment_state\";s:1:\"1\";s:16:\"allowsendmessage\";s:1:\"1\";s:10:\"web_master\";b:1;}', '1409597314', '0.0.0.0');
COMMIT;

-- ----------------------------
--  Table structure for `hd_tag`
-- ----------------------------
DROP TABLE IF EXISTS `hd_tag`;
CREATE TABLE `hd_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(30) DEFAULT '' COMMENT 'tag字符',
  `total` mediumint(9) DEFAULT '1' COMMENT '次数',
  PRIMARY KEY (`tid`),
  UNIQUE KEY `name` (`tag`),
  KEY `total` (`total`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tag标签表';

-- ----------------------------
--  Table structure for `hd_upload`
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
--  Table structure for `hd_user`
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
  UNIQUE KEY `email` (`email`),
  KEY `password` (`password`),
  KEY `credits` (`credits`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
--  Records of `hd_user`
-- ----------------------------
BEGIN;
INSERT INTO `hd_user` VALUES ('1', 'admin', 'admin', '2341e915192eb5950721e563fdbc75bd', '3985dce0e6', 'houdunwangxj@gmail.com', '1405397800', '1409591982', '0.0.0.0', '0.0.0.0', '1', '0', '23000121211', '1', '10000', '1', '', '0', 'upload/user/2014/08/31/40341409493938.jpg');
COMMIT;

-- ----------------------------
--  Table structure for `hd_user_guest`
-- ----------------------------
DROP TABLE IF EXISTS `hd_user_guest`;
CREATE TABLE `hd_user_guest` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `space_uid` int(11) unsigned DEFAULT NULL COMMENT '主人uid',
  `guest_uid` int(11) unsigned DEFAULT NULL COMMENT '访问uid',
  `entertime` int(11) DEFAULT NULL COMMENT '访客时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
