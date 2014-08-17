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

 Date: 08/17/2014 02:30:00 AM
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
--  Records of `hd_access`
-- ----------------------------
BEGIN;
INSERT INTO `hd_access` VALUES ('3', '32'), ('3', '33'), ('3', '31'), ('3', '35'), ('3', '34'), ('3', '30'), ('3', '9'), ('3', '6'), ('3', '8'), ('3', '61'), ('3', '5');
COMMIT;

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='插件表';

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='栏目表';

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
INSERT INTO `hd_config` VALUES ('1', 'WEBNAME', 'HDCMS内容管理系统', '站点配置', '网站名称', '文本', '', '1', '1'), ('2', 'ICP', '京ICP备12048441号-3', '站点配置', 'ICP备案号', '文本', '', '100', '1'), ('3', 'HTML_PATH', 'h', '站点配置', '静态html目录', '文本', '', '8', '1'), ('4', 'COPYRIGHT', 'Copyright © 2012-2014 HDCMS 后盾网', '站点配置', '网站版权信息', '文本', '', '100', '1'), ('5', 'KEYWORDS', 'php培训,php实训,后盾网', '站点配置', '网站关键词', '文本', '', '1', '1'), ('6', 'DESCRIPTION', '后盾网顶尖PHP培训 内容全面 全程实战!业内顶级讲师亲自授课,千余课时独家视频教程免费下载,超百G原创视频资源,实力不容造假!010-64825057', '站点配置', '网站描述', '多行文本', '', '100', '1'), ('7', 'EMAIL', 'houdunwangxj@gmail.com', '站点配置', '管理员邮箱', '文本', '', '100', '1'), ('8', 'BACKUP_DIR', 'backup', '内容相关', '数据备份目录', '文本', '', '100', '1'), ('9', 'WEB_OPEN', '1', '站点配置', '网站开启', '布尔(1/0)', '', '100', '1'), ('10', 'AUTH_KEY', 'houdunwang.com', '安全配置', 'cookie加密KEY', '文本', '', '100', '1'), ('63', 'UPLOAD_PATH', 'upload', '上传配置', '上传目录', '文本', '', '100', '1'), ('20', 'ALLOW_TYPE', 'jpg,jpeg,png,bmp,gif,zip,rar,doc', '上传配置', '允许上传文件类型', '文本', '', '100', '1'), ('21', 'ALLOW_SIZE', '10480000', '上传配置', '允许上传大小（字节）', '数字', '', '100', '1'), ('22', 'WATER_ON', '1', '上传配置', '上传文件加水印', '布尔(1/0)', '', '100', '1'), ('24', 'MEMBER_VERIFY', '1', '会员配置', '会员注册不需要审核', '布尔(1/0)', '', '1', '1'), ('25', 'REG_SHOW_CODE', '1', '会员配置', '会员注册显示验证码', '布尔(1/0)', '', '2', '1'), ('68', 'WEB_TITLE', '后盾网PHP开源项目', '站点配置', '网站标题', '文本', '', '2', '1'), ('27', 'REG_INTERVAL', '0', '会员配置', '2次注册间隔间间', '数字', '单位秒，0为不限', '100', '1'), ('28', 'DEFAULT_MEMBER_GROUP', '4', '会员配置', '新注册会员初始组', '数字', '', '100', '1'), ('29', 'TOKEN_ON', '0', '会员配置', '表单使用令牌验证', '布尔(1/0)', '', '100', '1'), ('30', 'LOG_KEY', 'houdunwang.com', '安全配置', '日志文件加密KEY', '文本', '', '100', '1'), ('61', 'SESSION_NAME', 'hdsid', 'SESSION配置', 'SESSION_NAME值', '文本', '一般不用更改', '100', '1'), ('64', 'TEL', '010-64825057', '站点配置', '联系电话', '文本', '', '100', '1'), ('41', 'WATER_TEXT', 'houdunwang.com', '水印配置', '水印文字', '文本', '', '100', '1'), ('42', 'WATER_TEXT_SIZE', '16', '水印配置', '文字大小', '数字', '', '100', '1'), ('43', 'WATER_IMG', 'data/water/water.png', '水印配置', '水印图像', '文本', '', '100', '1'), ('44', 'WATER_PCT', '80', '水印配置', '水印图片透明度', '数字', '', '100', '1'), ('45', 'WATER_QUALITY', '90', '水印配置', '图片压缩比', '数字', '', '100', '1'), ('46', 'WATER_POS', '9', '水印配置', '水印位置', '数字', '', '100', '1'), ('47', 'DEL_CONTENT_MODEL', '0', '内容相关', '删除文章标记为未审核', '布尔(1/0)', '', '100', '1'), ('67', 'CREATE_INDEX_HTML', '1', '站点配置', '首页生成静态', '布尔(1/0)', '', '9', '1'), ('31', 'REPLY_CREDITS', '1', '会员配置', '评论奖励积分', '文本', '会员提交回复奖励积分', '100', '1'), ('48', 'DOWN_REMOTE_PIC', '0', '内容相关', '下载远程图片', '布尔(1/0)', '', '100', '1'), ('49', 'AUTO_DESC', '1', '内容相关', '截取内容为摘要', '布尔(1/0)', '', '100', '1'), ('50', 'AUTO_THUMB', '1', '内容相关', '提取内容图片为缩略图', '布尔(1/0)', '', '100', '1'), ('32', 'MEMBER_OPEN', '1', '会员配置', '开启会员中心', '布尔(1/0)', '', '100', '1'), ('11', 'WEB_CLOSE_MESSAGE', '网站维护中，请稍候访问...', '站点配置', '网站关闭提示信息', '文本', '', '100', '1'), ('12', 'WEB_STYLE', 'default', '站点配置', '网站模板', '文本', '', '100', '0'), ('13', 'QQ', '1455067020', '站点配置', 'QQ号', '文本', '', '100', '1'), ('14', 'WEIBO', 'houdunwangxj@gmail.com', '站点配置', '新浪微博', '文本', '', '100', '1'), ('15', 'TWEIBO', 'houdunwang@gmail.com', '站点配置', '腾讯微博', '文本', '', '100', '1'), ('16', 'ENTERPRISE_EMAIL', 'houdunwangxj@gmail.com', '站点配置', '企业邮箱', '文本', '', '100', '1'), ('33', 'INIT_CREDITS', '100', '会员配置', '初始积分', '文本', '', '100', '1'), ('53', 'CACHE_INDEX', '0', '性能优化', '首页缓存时间', '文本', '单位秒，0为不缓存', '100', '1'), ('54', 'CACHE_CATEGORY', '0', '性能优化', '栏目缓存时间', '文本', '单位秒，0为不缓存', '100', '1'), ('55', 'CACHE_CONTENT', '0', '性能优化', '文章缓存时间', '文本', '单位秒，0为不缓存', '100', '1'), ('34', 'COMMENT_STEP_TIME', '10', '会员配置', '评论间隔时间', '文本', '必须大于1（单位秒)', '100', '1'), ('56', 'HTML_STATE', '0', '伪静态', '开启伪静态', '布尔(1/0)', '需要环境支持', '100', '1'), ('57', 'URL_REWRITE', '0', '伪静态', '开启Rewrite', '布尔(1/0)', '1:服务器需要支持Rewrtie <br/>2:根目录下存在.htaccess文件', '100', '1'), ('35', 'EMAIL_USERNAME', 'admin', '邮箱配置', '邮箱用户名', '文本', '使用126或qq邮箱', '3', '1'), ('36', 'EMAIL_PASSWORD', 'admin888', '邮箱配置', '邮箱密码', '文本', '邮箱的密码', '4', '1'), ('37', 'EMAIL_HOST', 'smtp.exmail.qq.com', '邮箱配置', 'smtp地址', '文本', '如smtp.gmail.com', '100', '1'), ('38', 'EMAIL_PORT', '25', '邮箱配置', 'smtp端口', '文本', 'qq,126为25，gmail为465', '100', '1'), ('39', 'EMAIL_FROMNAME', '后盾网', '邮箱配置', '发送人', '文本', '发件箱显示的用户名', '100', '1'), ('58', 'COOKIE_EXPIRE', '', 'COOKIE配置', 'Coodie有效期', '文本', '单位秒', '100', '1'), ('59', 'COOKIE_DOMAIN', '', 'COOKIE配置', 'Cookie域名', '文本', '', '100', '1'), ('60', 'COOKIE_PATH', '/', 'COOKIE配置', 'Cookie路径', '文本', '有效路径', '100', '1'), ('62', 'SESSION_DOMAIN', '', 'SESSION配置', 'SESSION域名', '文本', '如.hdphp.com 设置错误将导致无法登录后台', '100', '1'), ('65', 'MEMBER_EMAIL_VALIDATE', '0', '会员配置', '注册时验证邮件', '布尔(1/0)', '需填写邮箱配置，开启后会员注册审核功能无效', '3', '1'), ('72', 'EMAIL_FORMMAIL', '后盾网', '邮箱配置', '发件人', '文本', null, '1', '1');
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
  `source` char(60) NOT NULL DEFAULT '' COMMENT '来源',
  `redirecturl` varchar(255) NOT NULL DEFAULT '' COMMENT '转向链接',
  `html_path` varchar(255) NOT NULL DEFAULT '' COMMENT '自定义生成的静态文件地址',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updatetime` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `color` char(7) NOT NULL DEFAULT '' COMMENT '标题颜色',
  `template` varchar(255) NOT NULL DEFAULT '' COMMENT '模板',
  `url_type` tinyint(80) NOT NULL DEFAULT '3' COMMENT '文章访问方式  1 静态访问  2 动态访问  3 继承栏目',
  `arc_sort` mediumint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  `content_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '文章状态  1 已审核 0 未审核',
  `keywords` varchar(100) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `favorites` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数',
  `comment_num` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  PRIMARY KEY (`aid`),
  KEY `uid` (`uid`),
  KEY `cid` (`cid`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='文章表';

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
--  Table structure for `hd_favorite`
-- ----------------------------
DROP TABLE IF EXISTS `hd_favorite`;
CREATE TABLE `hd_favorite` (
  `fid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` smallint(5) unsigned NOT NULL,
  `cid` smallint(5) unsigned NOT NULL,
  `aid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='收藏夹';

-- ----------------------------
--  Records of `hd_favorite`
-- ----------------------------
BEGIN;
INSERT INTO `hd_favorite` VALUES ('1', '1', '10', '8', '1'), ('2', '1', '10', '11', '7'), ('3', '1', '10', '8', '7');
COMMIT;

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
) ENGINE=MyISAM AUTO_INCREMENT=496 DEFAULT CHARSET=utf8 COMMENT='模型字段';

-- ----------------------------
--  Records of `hd_field`
-- ----------------------------
BEGIN;
INSERT INTO `hd_field` VALUES ('1', '1', '1', 'title', '1', 'content', 'title', '标题', '', '1', '1', '1', 'a:2:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";}', '', '0', '100', '', '1', '', '0', '1', '1', '1'), ('2', '1', '1', 'input', '1', 'content', 'html_path', 'html文件名', '', '1', '1', '100', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('3', '1', '1', 'flag', '1', 'content', 'flag', '属性', '', '1', '1', '12', '', '', '0', '', '', '0', '', '0', '1', '1', '0'), ('4', '1', '1', 'input', '1', 'content', 'seo_title', 'SEO标题', '', '1', '1', '13', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('5', '1', '1', 'thumb', '1', 'content', 'thumb', '缩略图', '', '1', '1', '20', '', '', '0', '', '', '0', '', '0', '0', '0', '1'), ('6', '1', '1', 'cid', '1', 'content', 'cid', '栏目', '', '1', '1', '2', '', '', '0', '', '', '0', '', '0', '1', '0', '1'), ('7', '1', '1', 'input', '1', 'content', 'source', '来源', '', '1', '1', '26', 'a:3:{s:4:\"size\";s:3:\"150\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('8', '1', '1', 'input', '1', 'content', 'redirecturl', '转向链接', '', '1', '1', '21', 'a:3:{s:4:\"size\";s:3:\"150\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '/^http:///', '0', '', '0', '0', '0', '0'), ('9', '1', '1', 'box', '1', 'content', 'allowreply', '允许回复', '', '1', '1', '23', 'a:3:{s:7:\"options\";s:12:\"1| 是,2|否\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('10', '1', '1', 'datetime', '1', 'content', 'addtime', '添加时间', '', '1', '1', '25', 'a:1:{s:6:\"format\";s:1:\"1\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('11', '1', '1', 'template', '1', 'content', 'template', '模板', '', '1', '1', '100', '', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('12', '1', '1', 'tag', '1', 'content', 'tag', 'tag', '', '1', '1', '17', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('14', '1', '1', 'number', '1', 'content', 'arc_sort', '排序', '', '1', '1', '100', 'a:5:{s:10:\"field_type\";s:9:\"mediumint\";s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('15', '1', '1', 'input', '1', 'content', 'keywords', '关键字', '', '1', '1', '18', 'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}', '', '0', '', '', '0', '', '0', '1', '0', '0'), ('16', '1', '1', 'textarea', '1', 'content', 'description', '描述', '', '1', '1', '19', 'a:3:{s:5:\"width\";s:3:\"500\";s:6:\"height\";s:3:\"100\";s:7:\"default\";s:0:\"\";}', '', '0', '', '', '0', '', '0', '1', '0', '1'), ('17', '1', '1', 'content', '2', 'content_data', 'content', '正文', '', '1', '1', '14', '', '', '0', '', '', '0', '', '0', '1', '0', '1'), ('18', '1', '1', 'number', '1', 'content', 'click', '点击数', '', '1', '1', '100', 'a:4:{s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}', '', '0', '', '', '0', '', '0', '0', '0', '0'), ('19', '1', '1', 'number', '1', 'content', 'favorites', '收藏数', '', '1', '1', '100', 'a:4:{s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}', '', '0', '', '', '0', '', '0', '0', '0', '0');
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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_link`
-- ----------------------------
DROP TABLE IF EXISTS `hd_link`;
CREATE TABLE `hd_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `webname` char(100) NOT NULL DEFAULT '' COMMENT '网站名称',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '网址',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT '网站logo',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `tid` tinyint(1) NOT NULL DEFAULT '2' COMMENT '友情链接类型',
  `qq` char(15) NOT NULL DEFAULT '' COMMENT '站长qq',
  `comment` text NOT NULL COMMENT '网站介绍',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='友情链接';

-- ----------------------------
--  Table structure for `hd_link_config`
-- ----------------------------
DROP TABLE IF EXISTS `hd_link_config`;
CREATE TABLE `hd_link_config` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `webname` char(100) NOT NULL DEFAULT '' COMMENT '网站名称',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '网址',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT 'logo',
  `email` varchar(255) NOT NULL COMMENT '站长邮箱',
  `comment` text NOT NULL COMMENT '申请说明',
  `allow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '开放申请',
  `code` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示验证码',
  `qq` char(15) NOT NULL DEFAULT '' COMMENT '联系QQ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='本网站友情链接信息';

-- ----------------------------
--  Records of `hd_link_config`
-- ----------------------------
BEGIN;
INSERT INTO `hd_link_config` VALUES ('1', '后盾网', 'http://localhost/hdcms', 'hd/Plugin/Link/Data/logo.png', 'houdunwang@gmail.com', '1、请先在贵站做好后盾网的友情链接\n2、将右侧‘文字链接’或‘图片链接’代码复制到贵站\n3、凡开通我站友情链接且内容健康的网站，经管理员审核后，将显示在此友情链接页面\n4、首页友情连接，要求pr>=2、alexa < 10000；其他页面连接根据具体页面而定（请具体咨询）\n5、贵网站要在百度google都有记录收录，且网站访问速度不能太慢', '1', '1', '2300071698');
COMMIT;

-- ----------------------------
--  Table structure for `hd_link_type`
-- ----------------------------
DROP TABLE IF EXISTS `hd_link_type`;
CREATE TABLE `hd_link_type` (
  `tid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` char(50) NOT NULL DEFAULT '' COMMENT '分类名称',
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '系统类型',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='友情链接分类';

-- ----------------------------
--  Records of `hd_link_type`
-- ----------------------------
BEGIN;
INSERT INTO `hd_link_type` VALUES ('1', '友情链接', '1'), ('2', '合作伙伴', '1');
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
INSERT INTO `hd_menu_favorite` VALUES ('1', '20'), ('1', '12'), ('1', '61'), ('1', '13'), ('1', '4'), ('1', '180');
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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='模型表';

-- ----------------------------
--  Records of `hd_model`
-- ----------------------------
BEGIN;
INSERT INTO `hd_model` VALUES ('1', '普通文章', 'content', '1', '', '1');
COMMIT;

-- ----------------------------
--  Table structure for `hd_navigation`
-- ----------------------------
DROP TABLE IF EXISTS `hd_navigation`;
CREATE TABLE `hd_navigation` (
  `nid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` char(30) NOT NULL DEFAULT '菜单名称' COMMENT '菜单名',
  `pid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '父id',
  `target` enum('_self','_blank') NOT NULL DEFAULT '_self' COMMENT '打开方式',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1 显示 0 不显示',
  `list_order` mediumint(100) NOT NULL DEFAULT '100' COMMENT '排序',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='网站前台导航';

-- ----------------------------
--  Table structure for `hd_node`
-- ----------------------------
DROP TABLE IF EXISTS `hd_node`;
CREATE TABLE `hd_node` (
  `nid` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` char(30) NOT NULL DEFAULT '' COMMENT '中文标题',
  `module` char(30) NOT NULL DEFAULT '' COMMENT '应用',
  `control` char(30) NOT NULL DEFAULT '' COMMENT '控制器',
  `action` char(30) NOT NULL DEFAULT '' COMMENT '方法',
  `param` char(100) NOT NULL DEFAULT '' COMMENT '参数',
  `comment` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1 显示 0 不显示',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '类型 1 权限控制菜单   2 普通菜单 ',
  `pid` smallint(6) NOT NULL DEFAULT '0',
  `list_order` smallint(6) NOT NULL DEFAULT '100' COMMENT '排序',
  `is_system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '系统菜单 1 是  0 不是',
  `favorite` tinyint(1) NOT NULL DEFAULT '0' COMMENT '后台常用菜单   1 是  0 不是',
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=204 DEFAULT CHARSET=utf8 COMMENT='节点表（后台菜单也使用）';

-- ----------------------------
--  Records of `hd_node`
-- ----------------------------
BEGIN;
INSERT INTO `hd_node` VALUES ('1', '内容', 'Admin', '', '', '', '', '1', '2', '0', '2', '1', '0'), ('2', '内容管理', 'Admin', '', '', '', '', '1', '2', '1', '10', '1', '0'), ('16', '系统', 'Admin', '', '', '', '', '1', '1', '0', '10', '1', '0'), ('21', '后台菜单管理', 'Admin', 'Node', 'index', '', '', '1', '1', '19', '100', '1', '0'), ('3', '附件管理', 'Admin', 'Attachment', 'index', '', '', '1', '1', '10', '100', '1', '0'), ('12', '数据备份', 'Admin', 'Backup', 'backup', '', '', '1', '1', '79', '100', '1', '1'), ('10', '内容相关管理', 'Admin', '', '', '', '', '1', '1', '1', '12', '1', '0'), ('13', '栏目管理', 'Admin', 'Category', 'index', '', '', '1', '1', '2', '20', '1', '1'), ('14', '模型管理', 'Admin', 'Model', 'index', '', '', '1', '1', '10', '100', '1', '0'), ('15', '推荐位', 'Admin', 'Flag', 'index', 'mid=1', '', '1', '1', '10', '100', '1', '0'), ('19', '系统设置', 'Admin', '', '', '', '', '1', '1', '16', '98', '1', '0'), ('4', '文章列表', 'Admin', 'Content', 'index', '', '', '1', '2', '2', '10', '1', '1'), ('11', '管理员设置', 'Admin', '', '', '', '', '1', '1', '16', '100', '1', '0'), ('17', '管理员管理', 'Admin', 'Administrator', 'index', '', '', '1', '1', '11', '100', '1', '0'), ('18', '角色管理', 'Admin', 'Role', 'index', '', '', '1', '1', '11', '100', '1', '0'), ('20', '网站配置', 'Admin', 'Config', 'edit', '', '', '1', '1', '19', '90', '1', '0'), ('5', '生成静态', 'Admin', '', '', '', '', '1', '1', '1', '11', '1', '0'), ('6', '批量更新栏目页', 'Admin', 'Html', 'createCategory', '', '生成栏目页', '1', '1', '5', '102', '1', '0'), ('8', '生成首页', 'Admin', 'Html', 'createIndex', '', '生成首页', '1', '1', '5', '101', '1', '1'), ('9', '批量更新内容页', 'Admin', 'Html', 'createContent', '', '生成内容页', '1', '1', '5', '103', '1', '0'), ('28', '修改密码', 'Admin', 'Personal', 'editPassword', '', '', '1', '2', '29', '100', '1', '0'), ('27', '修改个人信息', 'Admin', 'Personal', 'editInfo', '', '', '1', '2', '29', '100', '1', '0'), ('26', '我的面板', 'Admin', '', '', '', '', '1', '2', '0', '100', '1', '0'), ('29', '个人信息', 'Admin', '', '', '', '', '1', '2', '26', '100', '1', '0'), ('61', '一键更新', 'Admin', 'Html', 'createAll', '', '一键更新全站', '1', '1', '5', '100', '1', '1'), ('30', '会员', 'Admin', '', '', '', '', '1', '1', '0', '100', '1', '0'), ('31', '会员管理', 'Admin', '', '', '', '', '1', '1', '30', '100', '1', '0'), ('32', '会员管理', 'Admin', 'User', 'index', '', '', '1', '1', '31', '100', '1', '0'), ('33', '审核会员', 'Admin', 'User', 'index', 'user_status=0', '', '1', '1', '31', '100', '1', '0'), ('34', '会员组管理', 'Admin', '', '', '', '', '1', '1', '30', '100', '1', '0'), ('35', '管理会员组', 'Admin', 'Group', 'index', '', '', '1', '1', '34', '100', '1', '0'), ('36', '模板', 'Admin', '', '', '', '', '1', '1', '0', '100', '1', '0'), ('37', '模板管理', 'Admin', '', '', '', '', '1', '1', '36', '100', '1', '0'), ('38', '模板风格', 'Admin', 'TemplateStyle', 'styleList', '', '', '1', '1', '37', '90', '1', '0'), ('70', '标签云', 'Admin', 'Tag', 'index', '', '', '1', '1', '10', '100', '1', '0'), ('69', '搜索关键词', 'Admin', 'Search', 'index', '', '', '1', '1', '79', '100', '1', '0'), ('79', '其他操作', 'Admin', '', '', '', '', '1', '1', '1', '100', '1', '0'), ('80', '导航菜单', 'Admin', 'Navigation', 'index', '', '', '1', '1', '79', '100', '1', '0'), ('91', '插件', 'Admin', '', '', '', '', '1', '1', '0', '1000', '1', '0'), ('92', '插件管理', 'Admin', '', '', '', '', '1', '1', '91', '99', '1', '0'), ('93', '插件管理', 'Admin', 'Plugin', 'plugin_list', '', '', '1', '1', '92', '100', '1', '0'), ('180', '审核文章', 'Admin', 'ContentAudit', 'content', 'mid=1', '', '1', '1', '2', '11', '1', '1'), ('156', 'BUG管理', 'Admin', 'Bug', 'showBug', '', '', '1', '1', '154', '100', '1', '0'), ('184', '添加栏目', 'Admin', 'Category', 'add', '', '', '0', '1', '2', '21', '1', '0'), ('185', '删除栏目', 'Admin', 'Category', 'del', '', '', '0', '1', '2', '22', '1', '0'), ('186', '修改栏目', 'Admin', 'Category', 'edit', '', '', '0', '1', '2', '23', '1', '0'), ('187', '批量修改栏目', 'Admin', 'Category', 'BulkEdit', '', '', '0', '1', '2', '24', '1', '0'), ('200', '数据库内容替换', 'Admin', 'Table', 'contentReplace', '', '', '1', '1', '79', '100', '1', '0');
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
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8 COMMENT='搜索结果表';

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
INSERT INTO `hd_session` VALUES ('720cnj0cvmc3old73viueru485', 'code|s:4:\"CYK6\";uid|s:1:\"1\";nickname|s:5:\"admin\";username|s:5:\"admin\";email|s:22:\"houdunwangxj@gmail.com\";regtime|s:10:\"1405397800\";logintime|s:10:\"1408075113\";regip|s:7:\"0.0.0.0\";lastip|s:7:\"0.0.0.0\";user_status|s:1:\"1\";lock_end_time|s:1:\"0\";qq|s:0:\"\";sex|s:1:\"1\";credits|s:5:\"10000\";rid|s:1:\"1\";signature|s:0:\"\";domain|s:5:\"admin\";spec_num|s:1:\"0\";icon|s:46:\"http://localhost/hdcms/data/image/user/250.png\";rname|s:15:\"超级管理员\";title|s:15:\"超级管理员\";admin|s:1:\"1\";system|s:1:\"1\";creditslower|s:5:\"10000\";comment_state|s:1:\"1\";allowsendmessage|s:1:\"1\";icon250|s:46:\"http://localhost/hdcms/data/image/user/250.png\";icon150|s:46:\"http://localhost/hdcms/data/image/user/150.png\";icon100|s:46:\"http://localhost/hdcms/data/image/user/100.png\";icon50|s:45:\"http://localhost/hdcms/data/image/user/50.png\";uploadFile|a:2:{i:0;s:25:\"upload/65701407663264.png\";i:1;s:44:\"upload/content/2014/08/17/22771408213082.png\";}', '1408213419', '0.0.0.0');
COMMIT;

-- ----------------------------
--  Table structure for `hd_system_message`
-- ----------------------------
DROP TABLE IF EXISTS `hd_system_message`;
CREATE TABLE `hd_system_message` (
  `mid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收信人',
  `message` varchar(200) NOT NULL DEFAULT '' COMMENT '消息内容',
  `state` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否阅读  1 已经阅读 0 未阅读',
  `sendtime` int(11) unsigned NOT NULL COMMENT '发送时间',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统消息表';

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
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='上传文件';

-- ----------------------------
--  Records of `hd_upload`
-- ----------------------------
BEGIN;
INSERT INTO `hd_upload` VALUES ('13', '1', '76861406552546.jpg', 'upload/76861406552546.jpg', 'upload/76861406552546.jpg', 'jpg', '1', '130684', '1406552546', '1', '1', '1'), ('14', '4855566_01_thumb', '69891406642251', '69891406642251jpg', 'upload/content/2014/07/29/69891406642251.jpg', 'jpg', '1', '60199', '1406642252', '0', '1', '1'), ('15', '4855566_02_thumb', '28751406642252', '28751406642252jpg', 'upload/content/2014/07/29/28751406642252.jpg', 'jpg', '1', '56950', '1406642252', '0', '1', '1'), ('16', '4855566_03_thumb', '68821406642252', '68821406642252jpg', 'upload/content/2014/07/29/68821406642252.jpg', 'jpg', '1', '65859', '1406642252', '0', '1', '1'), ('17', '4855566_04_thumb', '8761406642252', '8761406642252jpg', 'upload/content/2014/07/29/8761406642252.jpg', 'jpg', '1', '59808', '1406642252', '0', '1', '1'), ('18', '4855566_05_thumb', '42141406642252', '42141406642252jpg', 'upload/content/2014/07/29/42141406642252.jpg', 'jpg', '1', '48399', '1406642252', '0', '1', '1'), ('19', '4855566_06_thumb', '99581406642252', '99581406642252jpg', 'upload/content/2014/07/29/99581406642252.jpg', 'jpg', '1', '42376', '1406642252', '0', '1', '1'), ('20', '4855566_01_thumb', '36021406642252', '36021406642252jpg', 'upload/content/2014/07/29/36021406642252.jpg', 'jpg', '1', '60199', '1406642252', '1', '1', '1'), ('21', '69891406642251', '54861406642530', '54861406642530jpg', 'upload/content/2014/07/29/54861406642530.jpg', 'jpg', '1', '60199', '1406642530', '0', '1', '1'), ('22', '28751406642252', '79441406642530', '79441406642530jpg', 'upload/content/2014/07/29/79441406642530.jpg', 'jpg', '1', '56950', '1406642530', '0', '1', '1'), ('23', '68821406642252', '87541406642530', '87541406642530jpg', 'upload/content/2014/07/29/87541406642530.jpg', 'jpg', '1', '65859', '1406642530', '0', '1', '1'), ('24', '8761406642252', '93791406642530', '93791406642530jpg', 'upload/content/2014/07/29/93791406642530.jpg', 'jpg', '1', '59808', '1406642530', '0', '1', '1'), ('25', '42141406642252', '35241406642530', '35241406642530jpg', 'upload/content/2014/07/29/35241406642530.jpg', 'jpg', '1', '48399', '1406642530', '0', '1', '1'), ('26', '99581406642252', '38571406642530', '38571406642530jpg', 'upload/content/2014/07/29/38571406642530.jpg', 'jpg', '1', '42376', '1406642530', '0', '1', '1'), ('27', '69891406642251', '67431406642530', '67431406642530jpg', 'upload/content/2014/07/29/67431406642530.jpg', 'jpg', '1', '60199', '1406642530', '1', '1', '1'), ('28', '54861406642530', '20011406645060', '20011406645060jpg', 'upload/content/2014/07/29/20011406645060.jpg', 'jpg', '1', '60199', '1406645060', '1', '1', '1'), ('29', '4855546_142592134_thumb', '81221406645095', '81221406645095jpg', 'upload/content/2014/07/29/81221406645095.jpg', 'jpg', '1', '24290', '1406645095', '1', '1', '1'), ('30', '4855567_falcon-g6e-1_thumb', '2801406645155', '2801406645155jpg', 'upload/content/2014/07/29/2801406645155.jpg', 'jpg', '1', '44592', '1406645156', '1', '1', '1'), ('31', '4855567_falcon-g6e-1_thumb', '33481406647819', '33481406647819jpg', 'upload/content/2014/07/29/33481406647819.jpg', 'jpg', '1', '44592', '1406647819', '1', '1', '1'), ('32', '48681406915747', '63901406915979', '63901406915979jpg', 'upload/content/2014/08/02/63901406915979.jpg', 'jpg', '1', '84743', '1406915979', '1', '1', '1'), ('33', 'anli', '31671406958657.jpg', 'upload/31671406958657.jpg', 'upload/31671406958657.jpg', 'jpg', '1', '12347', '1406958657', '1', '1', '1'), ('34', '壁纸', '65701407663264.png', 'upload/65701407663264.png', 'upload/65701407663264.png', 'png', '1', '1631131', '1407663264', '1', '1', '32'), ('35', '壁纸', '69621407664432.png', 'upload/69621407664432.png', 'upload/69621407664432.png', 'png', '1', '1631131', '1407664432', '1', '1', '1'), ('36', '57961408213080', '22771408213082', '22771408213082png', 'upload/content/2014/08/17/22771408213082.png', 'png', '1', '68984', '1408213082', '1', '1', '32');
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
INSERT INTO `hd_user` VALUES ('1', 'admin', 'admin', '5241cb9dc7fa1ecedd06ed1c96c6a19c', 'eff6bbc40e', 'houdunwangxj@gmail.com', '1405397800', '1408204578', '0.0.0.0', '0.0.0.0', '1', '0', '', '1', '10000', '1', '', 'admin', '0', '');
COMMIT;

-- ----------------------------
--  Table structure for `hd_user_deny_ip`
-- ----------------------------
DROP TABLE IF EXISTS `hd_user_deny_ip`;
CREATE TABLE `hd_user_deny_ip` (
  `ip` char(15) NOT NULL DEFAULT '' COMMENT '拒绝访问ip',
  UNIQUE KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='拒绝访问ip';

-- ----------------------------
--  Table structure for `hd_user_dynamic`
-- ----------------------------
DROP TABLE IF EXISTS `hd_user_dynamic`;
CREATE TABLE `hd_user_dynamic` (
  `did` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户uid',
  `content` text NOT NULL COMMENT '内容',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`did`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员动态';

-- ----------------------------
--  Table structure for `hd_user_follow`
-- ----------------------------
DROP TABLE IF EXISTS `hd_user_follow`;
CREATE TABLE `hd_user_follow` (
  `uid` int(11) unsigned NOT NULL COMMENT '用户uid',
  `fans_uid` int(11) unsigned DEFAULT NULL COMMENT '粉丝uid'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员关注表';

-- ----------------------------
--  Table structure for `hd_user_guest`
-- ----------------------------
DROP TABLE IF EXISTS `hd_user_guest`;
CREATE TABLE `hd_user_guest` (
  `gid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `guest_uid` int(11) unsigned NOT NULL COMMENT '访问id',
  `uid` int(11) unsigned NOT NULL COMMENT '被访问空间Uid',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='空间访客表';

-- ----------------------------
--  Table structure for `hd_user_message`
-- ----------------------------
DROP TABLE IF EXISTS `hd_user_message`;
CREATE TABLE `hd_user_message` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_uid` int(10) unsigned NOT NULL,
  `to_uid` int(10) unsigned NOT NULL,
  `content` varchar(255) NOT NULL DEFAULT '',
  `user_message_state` tinyint(1) NOT NULL COMMENT '是否查阅  1 已阅读  2 未读',
  `sendtime` int(10) NOT NULL COMMENT '发送时间',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='短消息';

SET FOREIGN_KEY_CHECKS = 1;
