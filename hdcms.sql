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

 Date: 08/26/2014 01:53:07 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=180 DEFAULT CHARSET=utf8 COMMENT='插件表';

-- ----------------------------
--  Records of `hd_addons`
-- ----------------------------
BEGIN;
INSERT INTO `hd_addons` VALUES ('170', 'Backup', '数据备份', '数据备份还原插件', '1', 'a:0:{}', '后盾网向军', '1.0', '1408985011', '1'), ('178', 'Link', '友情链接', '友情链接', '1', 'a:0:{}', '后盾网向军', '1.0', '1408988196', '1'), ('179', 'Navigation', '导航菜单', '导航菜单', '1', 'a:0:{}', '后盾网向军', '1.0', '1408988221', '1');
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
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
--  Records of `hd_category`
-- ----------------------------
BEGIN;
INSERT INTO `hd_category` VALUES ('1', '0', '案例展示', 'case', '', '提交案例请发送到<a href=\"mailto:2300071698@qq.com\">2300071698@QQ.COM</a> 邮箱', 'article_index.html', 'image_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '100', '1', '提交案例', '', '1', '0', '1', '1', '1'), ('2', '0', '模板下载', 'template', '', '所有模板免费使用！提交模板请发送到<a href=\"mailto:2300071698@QQ.COM\">2300071698@QQ.COM</a> 邮箱', 'article_index.html', 'image_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '100', '1', '提交模板', '', '1', '0', '1', '1', '1'), ('3', '0', '模块插件', 'addon', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '100', '1', '', '', '1', '0', '1', '1', '1'), ('4', '0', 'CMS帮助', 'hdcms', '', '使用交流，问题求助社区', 'article_index.html', 'cms_help_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '100', '1', '', '', '1', '0', '1', '1', '1'), ('5', '0', '论坛', 'luntan', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '3', '1', '1', 'http://bbs.houdunwang.com', '1001', '1', '', '', '1', '0', '1', '1', '1'), ('6', '4', '标签使用', 'help/tag', '', '', 'article_index.html', 'cms_help_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '2', '1', '', '', '1', '0', '1', '1', '1'), ('7', '4', '安装使用', 'help/setup', '', '', 'article_index.html', 'cms_help_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '1', '1', '', '', '1', '0', '1', '1', '1'), ('8', '4', '模块插件', 'help/addon', '', '', 'article_index.html', 'cms_help_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '3', '1', '', '', '1', '0', '1', '1', '1'), ('9', '0', '框架帮助', 'hdphp', '', '', 'article_index.html', 'hdphp_help_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '100', '1', '', '', '1', '0', '1', '1', '1'), ('12', '9', '模板标签', 'hdphp/tag', '', '', 'article_index.html', 'hdphp_help_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '2', '1', '', '', '1', '0', '1', '1', '1'), ('11', '9', '起步知识', 'hdphp/base', '', '', 'article_index.html', 'hdphp_help_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '1', '1', '', '', '1', '0', '1', '1', '1'), ('13', '9', '数据模型', 'hdphp/model', '', '', 'article_index.html', 'hdphp_help_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '100', '1', '', '', '1', '0', '1', '1', '1'), ('14', '3', '模块', 'addon/module', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '100', '1', '', '', '1', '0', '1', '1', '1'), ('15', '3', '插件', 'addon/plugin', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '100', '1', '', '', '1', '0', '1', '1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `hd_category_access`
-- ----------------------------
DROP TABLE IF EXISTS `hd_category_access`;
CREATE TABLE `hd_category_access` (
  `rid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `mid` smallint(1) NOT NULL DEFAULT '0' COMMENT '模型mid',
  `show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许访问 1 允许 0 不允许',
  `add` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许投稿(添加) 1允许 0 不允许',
  `edit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许更新 1允许 0 不允许',
  `del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许删除 1允许 0 不允许',
  `order` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许排序 1允许 0 不允许',
  `move` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许移动 1允许 0 不允许',
  `audit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许审核栏目文章 1 允许 0 不允许',
  `admin` tinyint(1) NOT NULL COMMENT '是否为管理员权限 1 管理员 2 前台用户'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目权限表';

-- ----------------------------
--  Table structure for `hd_config`
-- ----------------------------
DROP TABLE IF EXISTS `hd_config`;
CREATE TABLE `hd_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '' COMMENT '配置名称\n',
  `value` text NOT NULL COMMENT '配置值',
  `type` enum('站点配置','高级配置','上传配置','会员配置','邮箱配置','安全配置','水印配置','内容相关','性能优化','伪静态','COOKIE配置','SESSION配置','自定义') NOT NULL DEFAULT '站点配置' COMMENT '配置类型\n1 站点配置\n2 性能设置\n3 上传配置\n4 交互设置\n5 会员设置',
  `title` char(30) NOT NULL DEFAULT '',
  `show_type` enum('文本','数字','布尔(1/0)','多行文本') DEFAULT '文本',
  `message` varchar(255) DEFAULT NULL COMMENT '提示',
  `order_list` smallint(6) unsigned DEFAULT '100' COMMENT '排序',
  `status` tinyint(4) DEFAULT '1' COMMENT '总配置模块显示  如模板风格就不显示 1显示 0 不显示',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COMMENT='系统配置';

-- ----------------------------
--  Records of `hd_config`
-- ----------------------------
BEGIN;
INSERT INTO `hd_config` VALUES ('1', 'WEBNAME', 'HDCMS内容管理系统', '站点配置', '网站名称', '文本', null, '1', '1'), ('2', 'ICP', '京ICP备12048441号-3', '站点配置', 'ICP备案号', '文本', null, '100', '1'), ('3', 'HTML_PATH', 'h', '站点配置', '静态html目录', '文本', null, '8', '1'), ('4', 'COPYRIGHT', 'Copyright © 2012-2014 HDCMS 后盾网', '站点配置', '网站版权信息', '文本', null, '100', '1'), ('5', 'KEYWORDS', 'php培训,php实训,后盾网', '站点配置', '网站关键词', '文本', null, '1', '1'), ('6', 'DESCRIPTION', '后盾网顶尖PHP培训 内容全面 全程实战!业内顶级讲师亲自授课,千余课时独家视频教程免费下载,超百G原创视频资源,实力不容造假!010-64825057', '站点配置', '网站描述', '多行文本', null, '100', '1'), ('7', 'EMAIL', 'houdunwangxj@gmail.com', '站点配置', '管理员邮箱', '文本', null, '100', '1'), ('8', 'BACKUP_DIR', 'backup', '内容相关', '数据备份目录', '文本', null, '100', '1'), ('9', 'WEB_OPEN', '1', '站点配置', '网站开启', '布尔(1/0)', null, '100', '1'), ('10', 'AUTH_KEY', 'houdunwang.com', '安全配置', 'cookie加密KEY', '文本', null, '100', '1'), ('63', 'UPLOAD_PATH', 'upload', '上传配置', '上传目录', '文本', null, '100', '1'), ('20', 'ALLOW_TYPE', 'jpg,jpeg,png,bmp,gif,zip,rar,doc', '上传配置', '允许上传文件类型', '文本', null, '100', '1'), ('21', 'ALLOW_SIZE', '10480000', '上传配置', '允许上传大小（字节）', '数字', null, '100', '1'), ('22', 'WATER_ON', '1', '上传配置', '上传文件加水印', '布尔(1/0)', null, '100', '1'), ('24', 'MEMBER_VERIFY', '1', '会员配置', '会员注册不需要审核', '布尔(1/0)', null, '1', '1'), ('25', 'REG_SHOW_CODE', '1', '会员配置', '会员注册显示验证码', '布尔(1/0)', null, '2', '1'), ('68', 'WEB_TITLE', '后盾网PHP开源项目', '站点配置', '网站标题', '文本', null, '2', '1'), ('27', 'REG_INTERVAL', '0', '会员配置', '2次注册间隔间间', '数字', '单位秒，0为不限', '100', '1'), ('28', 'DEFAULT_MEMBER_GROUP', '4', '会员配置', '新注册会员初始组', '数字', null, '100', '1'), ('29', 'TOKEN_ON', '0', '会员配置', '表单使用令牌验证', '布尔(1/0)', null, '100', '1'), ('30', 'LOG_KEY', 'houdunwang.com', '安全配置', '日志文件加密KEY', '文本', null, '100', '1'), ('61', 'SESSION_NAME', 'hdsid', 'SESSION配置', 'SESSION_NAME值', '文本', '一般不用更改', '100', '1'), ('64', 'TEL', '010-64825057', '站点配置', '联系电话', '文本', null, '100', '1'), ('41', 'WATER_TEXT', 'houdunwang.com', '水印配置', '水印文字', '文本', null, '100', '1'), ('42', 'WATER_TEXT_SIZE', '16', '水印配置', '文字大小', '数字', null, '100', '1'), ('43', 'WATER_IMG', 'static/image/water.png', '水印配置', '水印图像', '文本', null, '100', '1'), ('44', 'WATER_PCT', '80', '水印配置', '水印图片透明度', '数字', null, '100', '1'), ('45', 'WATER_QUALITY', '90', '水印配置', '图片压缩比', '数字', null, '100', '1'), ('46', 'WATER_POS', '9', '水印配置', '水印位置', '数字', null, '100', '1'), ('47', 'DEL_CONTENT_MODEL', '0', '内容相关', '删除文章标记为未审核', '布尔(1/0)', null, '100', '1'), ('67', 'CREATE_INDEX_HTML', '1', '站点配置', '首页生成静态', '布尔(1/0)', null, '9', '1'), ('31', 'REPLY_CREDITS', '1', '会员配置', '评论奖励积分', '文本', '会员提交回复奖励积分', '100', '1'), ('48', 'DOWN_REMOTE_PIC', '0', '内容相关', '下载远程图片', '布尔(1/0)', null, '100', '1'), ('49', 'AUTO_DESC', '1', '内容相关', '截取内容为摘要', '布尔(1/0)', null, '100', '1'), ('50', 'AUTO_THUMB', '1', '内容相关', '提取内容图片为缩略图', '布尔(1/0)', null, '100', '1'), ('32', 'MEMBER_OPEN', '1', '会员配置', '开启会员中心', '布尔(1/0)', null, '100', '1'), ('11', 'WEB_CLOSE_MESSAGE', '网站维护中，请稍候访问...', '站点配置', '网站关闭提示信息', '文本', null, '100', '1'), ('12', 'WEB_STYLE', 'default', '站点配置', '网站模板', '文本', null, '100', '0'), ('13', 'QQ', '1455067020', '站点配置', 'QQ号', '文本', null, '100', '1'), ('14', 'WEIBO', 'houdunwangxj@gmail.com', '站点配置', '新浪微博', '文本', null, '100', '1'), ('15', 'TWEIBO', 'houdunwang@gmail.com', '站点配置', '腾讯微博', '文本', null, '100', '1'), ('16', 'ENTERPRISE_EMAIL', 'houdunwangxj@gmail.com', '站点配置', '企业邮箱', '文本', null, '100', '1'), ('33', 'INIT_CREDITS', '100', '会员配置', '初始积分', '文本', null, '100', '1'), ('53', 'CACHE_INDEX', '0', '性能优化', '首页缓存时间', '文本', '单位秒，0为不缓存', '100', '1'), ('54', 'CACHE_CATEGORY', '0', '性能优化', '栏目缓存时间', '文本', '单位秒，0为不缓存', '100', '1'), ('55', 'CACHE_CONTENT', '0', '性能优化', '文章缓存时间', '文本', '单位秒，0为不缓存', '100', '1'), ('34', 'COMMENT_STEP_TIME', '10', '会员配置', '评论间隔时间', '文本', '必须大于1（单位秒)', '100', '1'), ('56', 'HTML_STATE', '0', '伪静态', '开启伪静态', '布尔(1/0)', '需要环境支持', '100', '1'), ('57', 'URL_REWRITE', '0', '伪静态', '开启Rewrite', '布尔(1/0)', '1:服务器需要支持Rewrtie <br/>2:根目录下存在.htaccess文件', '100', '1'), ('35', 'EMAIL_USERNAME', 'admin', '邮箱配置', '邮箱用户名', '文本', '使用126或qq邮箱', '3', '1'), ('36', 'EMAIL_PASSWORD', 'admin888', '邮箱配置', '邮箱密码', '文本', '邮箱的密码', '4', '1'), ('37', 'EMAIL_HOST', 'smtp.exmail.qq.com', '邮箱配置', 'smtp地址', '文本', '如smtp.gmail.com', '100', '1'), ('38', 'EMAIL_PORT', '25', '邮箱配置', 'smtp端口', '文本', 'qq,126为25，gmail为465', '100', '1'), ('39', 'EMAIL_FROMNAME', '后盾网', '邮箱配置', '发送人', '文本', '发件箱显示的用户名', '100', '1'), ('58', 'COOKIE_EXPIRE', '', 'COOKIE配置', 'Coodie有效期', '文本', '单位秒', '100', '1'), ('59', 'COOKIE_DOMAIN', '', 'COOKIE配置', 'Cookie域名', '文本', null, '100', '1'), ('60', 'COOKIE_PATH', '/', 'COOKIE配置', 'Cookie路径', '文本', '有效路径', '100', '1'), ('62', 'SESSION_DOMAIN', '', 'SESSION配置', 'SESSION域名', '文本', '如.hdphp.com 设置错误将导致无法登录后台', '100', '1'), ('65', 'MEMBER_EMAIL_VALIDATE', '0', '会员配置', '注册时验证邮件', '布尔(1/0)', '需填写邮箱配置，开启后会员注册审核功能无效', '3', '1'), ('72', 'EMAIL_FORMMAIL', '后盾网', '邮箱配置', '发件人', '文本', null, '1', '1');
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
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COMMENT='模型字段';

-- ----------------------------
--  Records of `hd_field`
-- ----------------------------
BEGIN;
INSERT INTO `hd_field` VALUES ('104', '1', '1', 'input', '1', 'content', 'readpoint', '阅读收费', '金币', '1', '1', '13', 'a:3:{s:4:\"size\";s:3:\"100\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('103', '1', '1', 'box', '1', 'content', 'content_status', '状态', '', '1', '1', '19', 'a:3:{s:7:\"options\";s:26:\"1|审核通过,0|待审查\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('101', '1', '1', 'content', '2', 'content_data', 'content', '正文', '', '1', '1', '5', '', '', '0', '', '', '0', '', '0', '1', '0', '1'), ('102', '1', '1', 'number', '1', 'content', 'click', '点击数', '', '1', '1', '18', 'a:4:{s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('98', '1', '1', 'flag', '1', 'content', 'flag', '属性', '', '1', '1', '3', '', '', '0', '', '', '0', '', '0', '1', '1', '0'), ('99', '1', '1', 'title', '1', 'content', 'title', '标题', '', '1', '1', '1', 'a:2:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";}', '', '0', '100', '', '1', '', '0', '1', '1', '1'), ('100', '1', '1', 'input', '1', 'content', 'tag', 'TAG', '', '1', '0', '6', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('96', '1', '1', 'thumb', '1', 'content', 'thumb', '缩略图', '', '1', '1', '9', '', '', '0', '', '', '0', '', '0', '0', '0', '1'), ('97', '1', '1', 'input', '1', 'content', 'html_path', 'html文件名', '', '1', '1', '14', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('94', '1', '1', 'cid', '1', 'content', 'cid', '栏目', '', '1', '1', '2', '', '', '0', '', '', '0', '', '0', '1', '0', '1'), ('95', '1', '1', 'input', '1', 'content', 'seo_title', 'SEO标题', '', '1', '1', '4', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('92', '1', '1', 'datetime', '1', 'content', 'addtime', '添加时间', '', '1', '1', '11', 'a:1:{s:6:\"format\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('93', '1', '1', 'input', '1', 'content', 'redirecturl', '转向链接', '', '1', '1', '10', 'a:3:{s:4:\"size\";s:3:\"150\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '/^http:///', '0', '', '0', '0', '0', '0'), ('90', '1', '1', 'template', '1', 'content', 'template', '模板', '', '1', '1', '15', '', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('91', '1', '1', 'box', '1', 'content', 'url_type', '文章访问方式', '', '1', '1', '16', 'a:3:{s:7:\"options\";s:45:\"1|静态访问,2|动态访问 ,3|继承栏目\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"3\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('89', '1', '1', 'number', '1', 'content', 'arc_sort', '排序', '', '1', '1', '17', 'a:5:{s:10:\"field_type\";s:9:\"mediumint\";s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('88', '1', '1', 'input', '1', 'content', 'keywords', '关键字', '', '1', '1', '7', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('87', '1', '1', 'textarea', '1', 'content', 'description', '描述', '', '1', '1', '8', 'a:3:{s:5:\"width\";s:3:\"500\";s:6:\"height\";s:3:\"100\";s:7:\"default\";s:0:\"\";}', '', '0', '', '', '0', '', '0', '1', '0', '1');
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
INSERT INTO `hd_menu_favorite` VALUES ('1', '12'), ('1', '16'), ('1', '41'), ('1', '57');
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='模型表';

-- ----------------------------
--  Records of `hd_model`
-- ----------------------------
BEGIN;
INSERT INTO `hd_model` VALUES ('1', '文章模型', 'content', '1', '', '1');
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
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COMMENT='节点表（后台菜单也使用）';

-- ----------------------------
--  Records of `hd_node`
-- ----------------------------
BEGIN;
INSERT INTO `hd_node` VALUES ('1', '内容', '', 'Admin', '', '', '', '', '1', '2', '0', '2', '0', '0'), ('2', '内容管理', '', 'Admin', '', '', '', '', '1', '1', '1', '10', '0', '0'), ('3', '系统', '', 'Admin', '', '', '', '', '1', '1', '0', '10', '0', '0'), ('4', '后台菜单管理', '', 'Admin', 'Node', 'index', '', '', '1', '1', '11', '100', '0', '0'), ('8', '栏目管理', '', 'Admin', 'Category', 'index', '', '', '1', '1', '2', '20', '0', '1'), ('9', '模型管理', '', 'Admin', 'Model', 'index', '', '', '1', '1', '37', '100', '0', '0'), ('10', '推荐位', '', 'Admin', 'Flag', 'index', 'mid=1', '', '1', '1', '37', '100', '0', '0'), ('11', '系统设置', '', 'Admin', '', '', '', '', '1', '1', '3', '98', '0', '0'), ('12', '文章列表', '', 'Admin', 'Content', 'index', '', '', '1', '1', '2', '10', '0', '1'), ('13', '管理员设置', '', 'Admin', '', '', '', '', '1', '1', '3', '100', '0', '0'), ('14', '管理员管理', '', 'Admin', 'Administrator', 'index', '', '', '1', '1', '13', '100', '0', '0'), ('15', '角色管理', '', 'Admin', 'Role', 'index', '', '', '1', '1', '13', '100', '0', '0'), ('16', '网站配置', '', 'Admin', 'Config', 'edit', '', '', '1', '1', '11', '90', '0', '0'), ('17', '生成静态', '', 'Admin', '', '', '', '', '1', '1', '1', '11', '0', '0'), ('18', '批量更新栏目页', '', 'Admin', 'Html', 'createCategory', '', '生成栏目页', '1', '1', '17', '102', '0', '0'), ('19', '生成首页', '', 'Admin', 'Html', 'createIndex', '', '生成首页', '1', '1', '17', '101', '0', '1'), ('20', '批量更新内容页', '', 'Admin', 'Html', 'createContent', '', '生成内容页', '1', '1', '17', '103', '0', '0'), ('21', '修改密码', '', 'Admin', 'Personal', 'editPassword', '', '', '1', '1', '24', '100', '0', '0'), ('22', '修改个人信息', '', 'Admin', 'Personal', 'editInfo', '', '', '1', '1', '24', '100', '0', '0'), ('23', '我的面板', '', 'Admin', '', '', '', '', '1', '2', '0', '100', '0', '0'), ('24', '个人信息', '', 'Admin', '', '', '', '', '1', '1', '23', '100', '0', '0'), ('26', '会员', '', 'Admin', '', '', '', '', '1', '1', '0', '100', '0', '0'), ('27', '会员管理', '', 'Admin', '', '', '', '', '1', '1', '26', '100', '0', '0'), ('28', '会员管理', '', 'Admin', 'User', 'index', '', '', '1', '1', '27', '100', '0', '0'), ('29', '审核会员', '', 'Admin', 'User', 'index', 'user_status=0', '', '1', '1', '27', '100', '0', '0'), ('30', '会员组管理', '', 'Admin', '', '', '', '', '1', '1', '26', '100', '0', '0'), ('31', '管理会员组', '', 'Admin', 'Group', 'index', '', '', '1', '1', '30', '100', '0', '0'), ('32', '模板', '', 'Admin', '', '', '', '', '1', '1', '0', '100', '0', '0'), ('33', '模板管理', '', 'Admin', '', '', '', '', '1', '1', '32', '100', '0', '0'), ('34', '模板风格', '', 'Admin', 'TemplateStyle', 'styleList', '', '', '1', '1', '33', '90', '0', '0'), ('35', '标签云', '', 'Admin', 'Tag', 'index', '', '', '1', '1', '37', '100', '0', '0'), ('37', '其他操作', '', 'Admin', '', '', '', '', '1', '1', '1', '100', '0', '0'), ('59', '附件管理', '', 'Admin', 'Attachment', 'index', '', '', '1', '1', '37', '100', '0', '0'), ('39', '扩展', '', 'Admin', '', '', '', '', '1', '1', '0', '1000', '0', '0'), ('40', '插件管理', '', 'Admin', '', '', '', '', '1', '1', '39', '99', '0', '0'), ('41', '插件管理', '', 'Admin', 'Addons', 'index', '', '', '1', '1', '40', '100', '0', '0'), ('42', '审核文章', '', 'Admin', 'ContentAudit', 'content', 'mid=1', '', '1', '1', '2', '11', '0', '1'), ('49', '钓子管理', '', 'Admin', 'Hooks', 'index', '', '', '1', '1', '40', '100', '0', '0'), ('44', '添加栏目', '', 'Admin', 'Category', 'add', '', '', '0', '1', '2', '21', '0', '0'), ('45', '删除栏目', '', 'Admin', 'Category', 'del', '', '', '0', '1', '2', '22', '0', '0'), ('46', '修改栏目', '', 'Admin', 'Category', 'edit', '', '', '0', '1', '2', '23', '0', '0'), ('47', '批量修改栏目', '', 'Admin', 'Category', 'BulkEdit', '', '', '0', '1', '2', '24', '0', '0'), ('50', '已装插件', '', 'Admin', '', '', '', '', '1', '1', '39', '100', '0', '0'), ('57', '数据备份', 'Addons', 'Backup', 'Admin', 'index', '', '插件Backup后台管理', '1', '1', '50', '100', '0', '0'), ('66', '友情链接', 'Addons', 'Link', 'Admin', 'index', '', '插件Link后台管理', '1', '1', '50', '100', '0', '0'), ('67', '导航菜单', 'Addons', 'Navigation', 'Admin', 'index', '', '插件Navigation后台管理', '1', '1', '50', '100', '0', '0');
COMMIT;

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
--  Table structure for `hd_search`
-- ----------------------------
DROP TABLE IF EXISTS `hd_search`;
CREATE TABLE `hd_search` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'mid',
  `word` char(100) NOT NULL DEFAULT '' COMMENT '搜索关键词',
  `total` mediumint(8) unsigned NOT NULL DEFAULT '1' COMMENT '搜索次数',
  PRIMARY KEY (`sid`),
  UNIQUE KEY `name` (`word`) USING BTREE,
  KEY `total` (`total`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='搜索结果表';

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
INSERT INTO `hd_session` VALUES ('4onmarth2b9b373qruo4kklr04', 'admin|s:1:\"1\";code|s:3:\"BD6\";uid|s:1:\"1\";nickname|s:5:\"admin\";username|s:5:\"admin\";email|s:22:\"houdunwangxj@gmail.com\";regtime|s:10:\"1405397800\";logintime|s:10:\"1408463978\";regip|s:7:\"0.0.0.0\";lastip|s:7:\"0.0.0.0\";user_status|s:1:\"1\";lock_end_time|s:1:\"0\";qq|s:0:\"\";sex|s:1:\"1\";credits|s:5:\"10000\";rid|s:1:\"1\";signature|s:0:\"\";domain|s:5:\"admin\";spec_num|s:1:\"0\";icon|s:43:\"http://localhost/hdcmsStatic/image/user.png\";rname|s:15:\"超级管理员\";title|s:15:\"超级管理员\";system|s:1:\"1\";creditslower|s:5:\"10000\";comment_state|s:1:\"1\";allowsendmessage|s:1:\"1\";web_master|s:1:\"1\";uploadFile|a:5:{i:0;s:44:\"upload/content/2014/08/25/38791408975770.jpg\";i:1;s:44:\"upload/content/2014/08/25/15041408982247.jpg\";i:2;s:44:\"upload/content/2014/08/25/91991408982253.jpg\";i:3;s:44:\"upload/content/2014/08/25/37631408982260.jpg\";i:4;s:44:\"upload/content/2014/08/25/88191408982265.jpg\";}', '1408989185', '0.0.0.0');
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
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COMMENT='上传文件';

-- ----------------------------
--  Records of `hd_upload`
-- ----------------------------
BEGIN;
INSERT INTO `hd_upload` VALUES ('2', '5303836_Screenshot_2014-08-20-14-23-11', '74861408975755', '74861408975755jpg', 'upload/content/2014/08/25/74861408975755.jpg', 'jpg', '1', '37549', '1408975756', '0', '1', '1'), ('3', '5303836_Screenshot_2014-08-20-14-23-11_thumb', '85971408975756', '85971408975756jpg', 'upload/content/2014/08/25/85971408975756.jpg', 'jpg', '1', '30673', '1408975756', '0', '1', '1'), ('4', '5303836_Screenshot_2014-08-20-14-48-09', '58421408975756', '58421408975756jpg', 'upload/content/2014/08/25/58421408975756.jpg', 'jpg', '1', '57488', '1408975757', '0', '1', '1'), ('7', '5303836_Screenshot_2014-08-20-14-48-15_thumb', '40951408975757', '40951408975757jpg', 'upload/content/2014/08/25/40951408975757.jpg', 'jpg', '1', '53771', '1408975757', '0', '1', '1'), ('8', '5303836_Screenshot_2014-08-20-14-48-35', '7681408975757', '7681408975757jpg', 'upload/content/2014/08/25/7681408975757.jpg', 'jpg', '1', '64187', '1408975758', '0', '1', '1'), ('9', '5303836_Screenshot_2014-08-20-14-48-35_thumb', '30961408975758', '30961408975758jpg', 'upload/content/2014/08/25/30961408975758.jpg', 'jpg', '1', '53352', '1408975758', '0', '1', '1'), ('10', '5303836_Screenshot_2014-08-20-15-15-28', '78671408975758', '78671408975758jpg', 'upload/content/2014/08/25/78671408975758.jpg', 'jpg', '1', '29756', '1408975758', '0', '1', '1'), ('11', '5303836_Screenshot_2014-08-20-15-15-28_thumb', '9881408975758', '9881408975758jpg', 'upload/content/2014/08/25/9881408975758.jpg', 'jpg', '1', '23366', '1408975758', '0', '1', '1'), ('12', '5303836_Screenshot_2014-08-20-14-54-28', '451408975758', '451408975758jpg', 'upload/content/2014/08/25/451408975758.jpg', 'jpg', '1', '31053', '1408975758', '0', '1', '1'), ('13', '5303836_Screenshot_2014-08-20-14-54-28_thumb', '23861408975758', '23861408975758jpg', 'upload/content/2014/08/25/23861408975758.jpg', 'jpg', '1', '24477', '1408975758', '0', '1', '1'), ('14', '5303836_Screenshot_2014-08-20-15-15-19', '13571408975758', '13571408975758jpg', 'upload/content/2014/08/25/13571408975758.jpg', 'jpg', '1', '29507', '1408975758', '0', '1', '1'), ('15', '5303836_Screenshot_2014-08-20-15-15-19_thumb', '24371408975758', '24371408975758jpg', 'upload/content/2014/08/25/24371408975758.jpg', 'jpg', '1', '22875', '1408975758', '0', '1', '1'), ('16', '5303836_Screenshot_2014-08-20-15-22-19', '31181408975758', '31181408975758jpg', 'upload/content/2014/08/25/31181408975758.jpg', 'jpg', '1', '84477', '1408975759', '0', '1', '1'), ('17', '5303836_Screenshot_2014-08-20-15-22-19_thumb', '72521408975759', '72521408975759jpg', 'upload/content/2014/08/25/72521408975759.jpg', 'jpg', '1', '70208', '1408975759', '0', '1', '1'), ('18', '5303836_Screenshot_2014-08-20-15-10-30', '9981408975759', '9981408975759jpg', 'upload/content/2014/08/25/9981408975759.jpg', 'jpg', '1', '40006', '1408975759', '0', '1', '1'), ('19', '5303836_Screenshot_2014-08-20-15-10-30_thumb', '62641408975759', '62641408975759jpg', 'upload/content/2014/08/25/62641408975759.jpg', 'jpg', '1', '32816', '1408975759', '0', '1', '1'), ('20', '5303836_Screenshot_2014-08-20-15-10-33', '8181408975759', '8181408975759jpg', 'upload/content/2014/08/25/8181408975759.jpg', 'jpg', '1', '24495', '1408975760', '0', '1', '1'), ('21', '5303836_Screenshot_2014-08-20-15-10-33_thumb', '36231408975760', '36231408975760jpg', 'upload/content/2014/08/25/36231408975760.jpg', 'jpg', '1', '19099', '1408975760', '0', '1', '1'), ('22', '5303836_Screenshot_2014-08-21-16-09-37', '77771408975760', '77771408975760png', 'upload/content/2014/08/25/77771408975760.png', 'png', '1', '240895', '1408975763', '0', '1', '1'), ('23', '5303836_Screenshot_2014-08-21-16-09-37_thumb', '1291408975763', '1291408975763png', 'upload/content/2014/08/25/1291408975763.png', 'png', '1', '62688', '1408975763', '0', '1', '1'), ('24', '5303836_Screenshot_2014-08-21-16-10-59', '37311408975763', '37311408975763png', 'upload/content/2014/08/25/37311408975763.png', 'png', '1', '256386', '1408975764', '0', '1', '1'), ('25', '5303836_Screenshot_2014-08-21-16-10-59_thumb', '33091408975764', '33091408975764png', 'upload/content/2014/08/25/33091408975764.png', 'png', '1', '78510', '1408975764', '0', '1', '1'), ('26', '5303836_Screenshot_2014-08-22-15-34', '14991408975764', '14991408975764png', 'upload/content/2014/08/25/14991408975764.png', 'png', '1', '111233', '1408975764', '0', '1', '1'), ('27', '5303836_Screenshot_2014-08-22-15-34_thumb', '42481408975764', '42481408975764png', 'upload/content/2014/08/25/42481408975764.png', 'png', '1', '58198', '1408975764', '0', '1', '1'), ('28', '5303836_Screenshot_2014-08-22-15-19-06', '9371408975764', '9371408975764png', 'upload/content/2014/08/25/9371408975764.png', 'png', '1', '223268', '1408975764', '0', '1', '1'), ('29', '5303836_Screenshot_2014-08-22-15-19-06_thumb', '15781408975764', '15781408975764png', 'upload/content/2014/08/25/15781408975764.png', 'png', '1', '45336', '1408975764', '0', '1', '1'), ('30', '5310558_5303836_Screenshot_2014-08-22-15-32-36_thumb', '71281408975764', '71281408975764png', 'upload/content/2014/08/25/71281408975764.png', 'png', '1', '26640', '1408975765', '0', '1', '1'), ('31', '5310558_5303836_Screenshot_2014-08-22-15-32-36_thumb_thumb', '92361408975765', '92361408975765png', 'upload/content/2014/08/25/92361408975765.png', 'png', '1', '21677', '1408975768', '0', '1', '1'), ('32', '5310558_5303836_Screenshot_2014-08-22-15-32-50_thumb', '54401408975768', '54401408975768png', 'upload/content/2014/08/25/54401408975768.png', 'png', '1', '42405', '1408975768', '0', '1', '1'), ('33', '5310558_5303836_Screenshot_2014-08-22-15-32-50_thumb_thumb', '86881408975768', '86881408975768png', 'upload/content/2014/08/25/86881408975768.png', 'png', '1', '36955', '1408975768', '0', '1', '1'), ('34', '5303836_Screenshot_2014-08-20-15-02-12', '52181408975768', '52181408975768jpg', 'upload/content/2014/08/25/52181408975768.jpg', 'jpg', '1', '107670', '1408975768', '0', '1', '1'), ('35', '5303836_Screenshot_2014-08-20-15-02-12_thumb', '65021408975768', '65021408975768jpg', 'upload/content/2014/08/25/65021408975768.jpg', 'jpg', '1', '89354', '1408975768', '0', '1', '1'), ('36', '5303836_Screenshot_2014-08-20-15-02-19', '8921408975768', '8921408975768jpg', 'upload/content/2014/08/25/8921408975768.jpg', 'jpg', '1', '47925', '1408975768', '0', '1', '1'), ('37', '5303836_Screenshot_2014-08-20-15-02-19_thumb', '13501408975768', '13501408975768jpg', 'upload/content/2014/08/25/13501408975768.jpg', 'jpg', '1', '39054', '1408975768', '0', '1', '1'), ('38', '5303836_Screenshot_2014-08-20-15-14-47', '39661408975768', '39661408975768jpg', 'upload/content/2014/08/25/39661408975768.jpg', 'jpg', '1', '32600', '1408975768', '0', '1', '1'), ('39', '5303836_Screenshot_2014-08-20-15-14-47_thumb', '1891408975768', '1891408975768jpg', 'upload/content/2014/08/25/1891408975768.jpg', 'jpg', '1', '25060', '1408975768', '0', '1', '1'), ('40', '5303836_Screenshot_2014-08-20-15-14-40', '23201408975768', '23201408975768jpg', 'upload/content/2014/08/25/23201408975768.jpg', 'jpg', '1', '31697', '1408975769', '0', '1', '1'), ('41', '5303836_Screenshot_2014-08-20-15-14-40_thumb', '40861408975769', '40861408975769jpg', 'upload/content/2014/08/25/40861408975769.jpg', 'jpg', '1', '25464', '1408975769', '0', '1', '1'), ('42', '5303836_Screenshot_2014-08-20-15-15-51', '73481408975769', '73481408975769jpg', 'upload/content/2014/08/25/73481408975769.jpg', 'jpg', '1', '49184', '1408975769', '0', '1', '1'), ('43', '5303836_Screenshot_2014-08-20-15-15-51_thumb', '17791408975769', '17791408975769jpg', 'upload/content/2014/08/25/17791408975769.jpg', 'jpg', '1', '39445', '1408975769', '0', '1', '1'), ('44', '5303836_Screenshot_2014-08-20-15-16-11', '21241408975769', '21241408975769jpg', 'upload/content/2014/08/25/21241408975769.jpg', 'jpg', '1', '40921', '1408975769', '0', '1', '1'), ('45', '5303836_Screenshot_2014-08-20-15-16-11_thumb', '73541408975769', '73541408975769jpg', 'upload/content/2014/08/25/73541408975769.jpg', 'jpg', '1', '31923', '1408975769', '0', '1', '1'), ('46', '5303836_Screenshot_2014-08-18-14-54-17', '95111408975769', '95111408975769jpg', 'upload/content/2014/08/25/95111408975769.jpg', 'jpg', '1', '80947', '1408975769', '0', '1', '1'), ('47', '5303836_Screenshot_2014-08-18-14-54-17_thumb', '47491408975769', '47491408975769jpg', 'upload/content/2014/08/25/47491408975769.jpg', 'jpg', '1', '67379', '1408975770', '0', '1', '1'), ('48', '5303836_Screenshot_2014-08-18-15-50-36', '621408975770', '621408975770jpg', 'upload/content/2014/08/25/621408975770.jpg', 'jpg', '1', '38408', '1408975770', '0', '1', '1'), ('49', '5303836_Screenshot_2014-08-18-15-50-36_thumb', '22971408975770', '22971408975770jpg', 'upload/content/2014/08/25/22971408975770.jpg', 'jpg', '1', '30930', '1408975770', '0', '1', '1'), ('50', '5310558_06-1_thumb', '94041408975770', '94041408975770jpg', 'upload/content/2014/08/25/94041408975770.jpg', 'jpg', '1', '72489', '1408975770', '0', '1', '1'), ('51', '5310558_00006_thumb', '38791408975770', '38791408975770jpg', 'upload/content/2014/08/25/38791408975770.jpg', 'jpg', '1', '135299', '1408975770', '1', '1', '1'), ('52', '22851408975755', '15041408982247', '15041408982247jpg', 'upload/content/2014/08/25/15041408982247.jpg', 'jpg', '1', '135299', '1408982247', '1', '1', '1'), ('53', '22851408975755', '91991408982253', '91991408982253jpg', 'upload/content/2014/08/25/91991408982253.jpg', 'jpg', '1', '135299', '1408982253', '1', '1', '1'), ('54', '22851408975755', '37631408982260', '37631408982260jpg', 'upload/content/2014/08/25/37631408982260.jpg', 'jpg', '1', '135299', '1408982260', '1', '1', '1'), ('55', '22851408975755', '88191408982265', '88191408982265jpg', 'upload/content/2014/08/25/88191408982265.jpg', 'jpg', '1', '135299', '1408982265', '1', '1', '1');
COMMIT;

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
  `domain` char(20) NOT NULL DEFAULT '' COMMENT '个性域名',
  `spec_num` mediumint(9) unsigned NOT NULL DEFAULT '0' COMMENT '空间访问数',
  `icon` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nickname` (`nickname`),
  UNIQUE KEY `domain` (`domain`),
  KEY `password` (`password`),
  KEY `credits` (`credits`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
--  Records of `hd_user`
-- ----------------------------
BEGIN;
INSERT INTO `hd_user` VALUES ('1', 'admin', 'admin', 'ea038f6915e2a950d016220b197d7aa7', '4865dfb852', 'houdunwangxj@gmail.com', '1405397800', '1408968809', '0.0.0.0', '0.0.0.0', '1', '0', '', '1', '10000', '1', '', 'admin', '0', '');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
