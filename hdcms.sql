/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50615
 Source Host           : 127.0.0.1
 Source Database       : hdcms

 Target Server Type    : MySQL
 Target Server Version : 50615
 File Encoding         : utf-8

 Date: 01/16/2014 04:07:24 AM
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_bug`
-- ----------------------------
DROP TABLE IF EXISTS `hd_bug`;
CREATE TABLE `hd_bug` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(30) NOT NULL DEFAULT '' COMMENT '反馈者',
  `addtime` int(10) NOT NULL DEFAULT '0',
  `email` char(50) NOT NULL DEFAULT '',
  `content` varchar(255) NOT NULL COMMENT '反馈内容',
  `reply` varchar(100) NOT NULL DEFAULT '感谢您的反馈，你的问题已经处理!' COMMENT '解决后的回复内容',
  `type` enum('BUG反馈','功能建议') NOT NULL DEFAULT 'BUG反馈',
  `status` enum('未审核','处理中','已解决') NOT NULL DEFAULT '未审核' COMMENT '审核状态',
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `index_tpl` varchar(100) NOT NULL DEFAULT '' COMMENT '封面模板',
  `list_tpl` varchar(100) NOT NULL DEFAULT '' COMMENT '列表页模板',
  `arc_tpl` varchar(100) NOT NULL DEFAULT '' COMMENT '内容页模板',
  `is_cat_html` tinyint(1) NOT NULL DEFAULT '1' COMMENT '栏目生成Html',
  `is_arc_html` tinyint(1) NOT NULL DEFAULT '1' COMMENT '内容页生成Html\n\n',
  `list_html_url` varchar(200) NOT NULL DEFAULT '' COMMENT '栏目页URL规则\n\n',
  `arc_html_url` varchar(200) NOT NULL DEFAULT '' COMMENT '内容页URL规则',
  `mid` smallint(6) NOT NULL DEFAULT '0' COMMENT '模型ID',
  `cattype` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 栏目,2 封面,3 外部链接',
  `urltype` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 静态访问 2 动态访问',
  `cat_redirecturl` varchar(100) NOT NULL DEFAULT '' COMMENT '跳转url',
  `catorder` smallint(5) unsigned DEFAULT '50' COMMENT '栏目排序',
  `cat_show` tinyint(1) DEFAULT '1' COMMENT 'channel标签调用时是否显示',
  `seo_title` char(100) DEFAULT NULL COMMENT 'SEO标题',
  `seo_description` varchar(255) DEFAULT NULL COMMENT 'SEO描述',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
--  Table structure for `hd_category_access`
-- ----------------------------
DROP TABLE IF EXISTS `hd_category_access`;
CREATE TABLE `hd_category_access` (
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `mid` smallint(1) NOT NULL DEFAULT '0' COMMENT '模型mid',
  `issend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许投稿 1允许 0 不允许',
  `isshow` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许访问 1 允许 0 不允许',
  `rid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '角色id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_comment`
-- ----------------------------
DROP TABLE IF EXISTS `hd_comment`;
CREATE TABLE `hd_comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论mid',
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章aid',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目id\n1 基本配置\n2 ',
  `comment` text NOT NULL COMMENT '评论内容',
  `uid` int(11) NOT NULL COMMENT '用户名',
  `ip` char(15) NOT NULL DEFAULT '' COMMENT 'IP地址',
  `c_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示 1 显示  0 不显示',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '回复时间',
  `pid` int(11) DEFAULT '0' COMMENT '父级id',
  `path` varchar(255) DEFAULT '',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_config`
-- ----------------------------
DROP TABLE IF EXISTS `hd_config`;
CREATE TABLE `hd_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '' COMMENT '配置名称\n',
  `value` text NOT NULL COMMENT '配置值',
  `type` enum('站点配置','高级设置','上传配置','会员设置','邮箱配置','安全设置','水印设置','内容相关','私有配置') NOT NULL DEFAULT '站点配置' COMMENT '配置类型\n1 站点配置\n2 性能设置\n3 上传配置\n4 交互设置\n5 会员设置',
  `title` char(30) NOT NULL DEFAULT '',
  `show_type` enum('文本','数字','布尔(1/0)','多行文本') DEFAULT '文本',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=154 DEFAULT CHARSET=utf8 COMMENT='系统配置';

-- ----------------------------
--  Records of `hd_config`
-- ----------------------------
BEGIN;
INSERT INTO `hd_config` VALUES ('1', 'webname', 'HDCMS内容管理系统', '站点配置', '网站名称', '文本'), ('2', 'icp', '京ICP备12048441号-3', '站点配置', 'ICP备案号', '文本'), ('3', 'html_path', 'html', '站点配置', '静态html目录', '文本'), ('4', 'copyright', 'Copyright © 2012-2013 HDCMS 后盾网 版权所有', '站点配置', '网站版权信息', '文本'), ('5', 'keywords', 'php培训,php实训,后盾网', '站点配置', '网站关键词', '文本'), ('6', 'description', '后盾网顶尖PHP培训 内容全面 全程实战!业内顶级讲师亲自授课,千余课时独家视频教程免费下载,超百G原创视频资源,实力不容造假!010-64825057', '站点配置', '网站描述', '多行文本'), ('8', 'email', 'houdunwangxj@gmail.com', '站点配置', '管理员邮箱', '文本'), ('9', 'backup_dir', 'backup', '高级设置', '数据备份目录', '文本'), ('10', 'web_open', '1', '站点配置', '网站开关', '布尔(1/0)'), ('15', 'auth_key', 'houdunwang.com', '安全设置', 'cookie加密KEY', '文本'), ('16', 'upload_path', 'upload', '上传配置', '上传目录', '文本'), ('17', 'upload_img_path', 'img', '上传配置', '上传图片目录', '文本'), ('18', 'allow_type', 'jpg,jpeg,png,bmp,gif', '上传配置', '允许上传文件类型', '文本'), ('19', 'allow_size', '2048000', '上传配置', '允许上传大小（字节）', '数字'), ('20', 'water_on', '0', '水印设置', '上传文件加水印', '布尔(1/0)'), ('115', 'member_verify', '0', '会员设置', '会员注册是否需要审核', '布尔(1/0)'), ('116', 'reg_show_code', '1', '会员设置', '会员注册是否显示验证码', '布尔(1/0)'), ('119', 'reg_email', '1', '会员设置', '注册成功是否发邮件', '布尔(1/0)'), ('120', 'reg_interval', '0', '会员设置', '2次注册间隔间间', '数字'), ('121', 'member_group', '2', '会员设置', '默认会员组', '数字'), ('122', 'admin_list_row', '15', '高级设置', '后台列表页数据显示行数', '数字'), ('123', 'token_on', '0', '安全设置', '表单使用令牌验证', '布尔(1/0)'), ('124', 'log_key', 'houdunwang.com', '安全设置', '日志文件加密KEY', '文本'), ('125', 'session_name', 'hdsid', '安全设置', 'SESSION_NAME值', '文本'), ('126', 'super_admin_key', 'SUPER_ADMIN', '安全设置', '站长令牌名称', '文本'), ('127', 'tel', '010-64825057', '站点配置', '联系电话', '文本'), ('128', 'water_text', 'houdunwang.com', '水印设置', '水印文字', '文本'), ('129', 'water_text_size', '16', '水印设置', '文字大小', '数字'), ('130', 'water_img', './data/water/water.png', '水印设置', '水印图像', '文本'), ('131', 'water_pct', '0', '水印设置', '水印图片透明度', '数字'), ('132', 'water_quality', '90', '水印设置', '图片压缩比', '数字'), ('133', 'water_pos', '1', '水印设置', '水印位置', '数字'), ('134', 'del_content_model', '1', '高级设置', '删除文章先放入回收站', '布尔(1/0)'), ('136', 'down_remove_pic_size', '500', '高级设置', '下载远程资源允许最大值', '数字'), ('137', 'comment_status', '1', '会员设置', '评论需要审核', '布尔(1/0)'), ('138', 'favicon_width', '180', '会员设置', '会员头像宽度', '数字'), ('139', 'favicon_height', '180', '会员设置', '会员头像高度', '数字'), ('140', 'upload_img_max_width', '650', '高级设置', '图片超过这个尺寸进行缩放', '数字'), ('141', 'upload_img_max_height', '650', '高级设置', '图片超过这个尺寸进行缩放', '数字'), ('142', 'down_remote_pic', '0', '内容相关', '下载远程图片', '布尔(1/0)'), ('143', 'auto_desc', '1', '内容相关', '截取内容为摘要', '布尔(1/0)'), ('144', 'auto_thumb', '0', '内容相关', '提取内容图片为缩略图', '布尔(1/0)'), ('145', 'upload_img_max_width', '2000', '内容相关', '上传图片宽度超过此值，进行缩放', '数字'), ('146', 'upload_img_max_height', '2000', '内容相关', '上传图片高度超过此值，进行缩放', '数字'), ('147', 'member_content_status', '1', '会员设置', '会员发表文章需要审核', '布尔(1/0)'), ('148', 'default_user_group', '2', '会员设置', '新注册会员初始组', '数字'), ('149', 'member_open', '0', '会员设置', '开启会员中心', '布尔(1/0)'), ('150', 'web_close_message', '网站暂时关闭，请稍候访问', '站点配置', '网站关闭提示信息', '文本'), ('151', 'web_style', 'bootstrap', '私有配置', '网站模板', '文本'), ('152', 'qq', '', '站点配置', 'QQ号', '文本'), ('153', 'weibo', 'houdunwangxj@gmail.com', '站点配置', '新浪微博', '文本');
COMMIT;

-- ----------------------------
--  Table structure for `hd_content`
-- ----------------------------
DROP TABLE IF EXISTS `hd_content`;
CREATE TABLE `hd_content` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` char(100) NOT NULL DEFAULT '' COMMENT '标题',
  `new_window` tinyint(1) NOT NULL DEFAULT '0' COMMENT '新窗口打开',
  `thumb` char(200) NOT NULL DEFAULT '' COMMENT '缩略图',
  `click` mediumint(9) NOT NULL DEFAULT '0' COMMENT '点击次数',
  `source` char(30) NOT NULL DEFAULT '' COMMENT '来源',
  `redirecturl` char(100) NOT NULL DEFAULT '' COMMENT '转向链接',
  `allowreply` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许回复',
  `author` char(45) NOT NULL DEFAULT '' COMMENT '作者',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updatetime` int(10) NOT NULL DEFAULT '0' COMMENT '发布时间 ',
  `color` char(7) NOT NULL DEFAULT '' COMMENT '标题颜色\n',
  `template` varchar(255) NOT NULL DEFAULT '' COMMENT '内容页模板\n',
  `ishtml` tinyint(1) NOT NULL DEFAULT '1',
  `arc_sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 已审核 0 未审核',
  `cid` smallint(6) NOT NULL DEFAULT '0' COMMENT '栏目id',
  `seo_title` char(100) NOT NULL DEFAULT '' COMMENT 'seo标题',
  `keywords` char(100) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `html_path` varchar(255) NOT NULL DEFAULT '' COMMENT '自定义生成的静态文件地址',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_content_data`
-- ----------------------------
DROP TABLE IF EXISTS `hd_content_data`;
CREATE TABLE `hd_content_data` (
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章主表ID',
  `content` text COMMENT '正文',
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_content_flag`
-- ----------------------------
DROP TABLE IF EXISTS `hd_content_flag`;
CREATE TABLE `hd_content_flag` (
  `aid` int(11) unsigned NOT NULL COMMENT '文章id',
  `fid` mediumint(9) unsigned NOT NULL COMMENT '属性id',
  `cid` smallint(6) unsigned NOT NULL COMMENT '栏目ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_custom_js`
-- ----------------------------
DROP TABLE IF EXISTS `hd_custom_js`;
CREATE TABLE `hd_custom_js` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(100) DEFAULT NULL COMMENT '标签名称',
  `description` varchar(255) DEFAULT NULL COMMENT 'js描述',
  `options` text COMMENT 'js属性设置',
  `name` varchar(100) DEFAULT NULL COMMENT 'JS名称',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `username` char(30) DEFAULT NULL COMMENT '添加者',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='自定义js';

-- ----------------------------
--  Table structure for `hd_extcredits`
-- ----------------------------
DROP TABLE IF EXISTS `hd_extcredits`;
CREATE TABLE `hd_extcredits` (
  `uid` int(10) unsigned DEFAULT NULL COMMENT '用户uid',
  `extcredits1` int(10) unsigned DEFAULT NULL COMMENT '积分1',
  `extcredits2` int(10) unsigned DEFAULT NULL COMMENT '积分2',
  `extcredits3` int(10) unsigned DEFAULT NULL COMMENT '积分3',
  `extcredits4` int(10) unsigned DEFAULT NULL,
  `extcredits5` int(10) unsigned DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户积分表';

-- ----------------------------
--  Table structure for `hd_field`
-- ----------------------------
DROP TABLE IF EXISTS `hd_field`;
CREATE TABLE `hd_field` (
  `fid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `show_type` varchar(45) NOT NULL DEFAULT '' COMMENT '字段类型 text|textarea|radio|checkbox|image|images|datetime|',
  `table_type` tinyint(1) NOT NULL DEFAULT '1',
  `table_name` varchar(30) NOT NULL DEFAULT '' COMMENT '所在表名',
  `field_name` varchar(45) NOT NULL DEFAULT '' COMMENT '字段name名称',
  `title` varchar(45) NOT NULL DEFAULT '' COMMENT '字段标题 ',
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 开启 0 关闭',
  `is_system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为系统字段',
  `fieldsort` smallint(6) NOT NULL DEFAULT '50' COMMENT '字段排序',
  `member_show` tinyint(1) NOT NULL DEFAULT '1',
  `set` text NOT NULL COMMENT '字段设置',
  PRIMARY KEY (`fid`),
  KEY `mid` (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='模型字段';

-- ----------------------------
--  Table structure for `hd_flag`
-- ----------------------------
DROP TABLE IF EXISTS `hd_flag`;
CREATE TABLE `hd_flag` (
  `fid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `flagname` char(20) NOT NULL,
  `system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 系统属性(不能删除)  2 用户定义属性',
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `hd_flag`
-- ----------------------------
BEGIN;
INSERT INTO `hd_flag` VALUES ('1', '热门', '1'), ('2', '置顶', '1'), ('3', '推荐', '1'), ('4', '图片', '1'), ('5', '幻灯片', '1'), ('6', '精华', '0'), ('7', '置顶', '0'), ('8', '站长推荐', '0');
COMMIT;

-- ----------------------------
--  Table structure for `hd_member_group`
-- ----------------------------
DROP TABLE IF EXISTS `hd_member_group`;
CREATE TABLE `hd_member_group` (
  `gid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '会员组id',
  `is_system` smallint(5) unsigned NOT NULL DEFAULT '2' COMMENT '1 系统组 2 普通组',
  `point` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '积分<=时为此会员组',
  `allowpost` smallint(1) NOT NULL COMMENT '允许投稿  1 允许 2 不允许',
  `allowpostverify` smallint(1) NOT NULL COMMENT '投稿不需要审核  1 不需要  2 需要',
  `allowsendmessage` smallint(1) NOT NULL COMMENT '允许发短消息  1 允许  2 不允许',
  `description` varchar(255) NOT NULL COMMENT '用户组描述',
  `gname` char(30) NOT NULL COMMENT '会员组名称',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `hd_member_group`
-- ----------------------------
BEGIN;
INSERT INTO `hd_member_group` VALUES ('2', '1', '100', '1', '1', '1', '新手上路', '新手上路'), ('3', '1', '200', '1', '0', '0', '中级会员 	', '中级会员 	'), ('4', '1', '300', '1', '0', '0', '高级会员', '高级会员'), ('5', '1', '500', '1', '1', '1', '', '钻石会员');
COMMIT;

-- ----------------------------
--  Table structure for `hd_model`
-- ----------------------------
DROP TABLE IF EXISTS `hd_model`;
CREATE TABLE `hd_model` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `model_name` char(30) NOT NULL DEFAULT '' COMMENT '模型名称',
  `tablename` char(20) NOT NULL DEFAULT '' COMMENT '主表名',
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '禁用 1 开启 0 关闭',
  `description` varchar(45) NOT NULL DEFAULT '' COMMENT '模型描述',
  `app_name` char(30) NOT NULL COMMENT '处理程序（控制器）',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 基本模型 主、附表     2 独立模型 只有主表',
  `is_submit` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 允许投稿 2 不允许投稿',
  `m_order` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `is_system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 系统模型  2 普通模型',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='模型表';

-- ----------------------------
--  Records of `hd_model`
-- ----------------------------
BEGIN;
INSERT INTO `hd_model` VALUES ('1', '普通文章', 'content', '1', '', 'Content', '1', '0', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `hd_node`
-- ----------------------------
DROP TABLE IF EXISTS `hd_node`;
CREATE TABLE `hd_node` (
  `nid` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` char(30) NOT NULL DEFAULT '' COMMENT '中文标题',
  `app` char(30) NOT NULL DEFAULT '' COMMENT '应用',
  `control` char(30) NOT NULL DEFAULT '' COMMENT '控制器',
  `method` char(30) NOT NULL DEFAULT '' COMMENT '方法',
  `param` char(100) NOT NULL DEFAULT '' COMMENT '参数',
  `comment` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1 显示 0 不显示',
  `menu_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型 1 权限+菜单   2 普通菜单 ',
  `pid` smallint(6) NOT NULL DEFAULT '0',
  `list_order` smallint(6) NOT NULL DEFAULT '0',
  `is_system` tinyint(1) DEFAULT '0' COMMENT '系统菜单 1 是  0 不是',
  `favorite` tinyint(1) unsigned DEFAULT '0' COMMENT '0 普通 1 常用 ',
  `level` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `hd_node`
-- ----------------------------
BEGIN;
INSERT INTO `hd_node` VALUES ('1', '内容', '', '', '', '', '', '1', '1', '0', '0', '1', '0', '1'), ('2', '内容管理', '', '', '', '', '', '1', '1', '1', '6', '1', '0', '2'), ('16', '系统', '', '', '', '', '', '1', '1', '0', '0', '1', '0', '1'), ('21', '后台菜单管理', 'Node', 'Node', 'index', '', '', '1', '1', '19', '0', '1', '0', '3'), ('3', '附件管理', 'Upload', 'Index', 'index', '', '', '1', '1', '10', '0', '1', '0', '1'), ('12', '数据备份', 'Backup', 'Backup', 'index', '', '', '1', '1', '10', '0', '1', '0', '3'), ('10', '内容相关管理', '', '', '', '', '', '1', '1', '1', '4', '1', '0', '2'), ('13', '栏目管理', 'Category', 'Category', 'index', '', '', '1', '1', '2', '0', '1', '0', '3'), ('14', '模型管理', 'Model', 'Model', 'index', '', '', '1', '1', '10', '0', '1', '0', '3'), ('15', '推荐位管理', 'Flag', 'Flag', 'index', '', '', '1', '1', '10', '0', '1', '0', '3'), ('19', '系统设置', '', '', '', '', '', '1', '1', '16', '0', '1', '0', '2'), ('4', '管理内容', 'Content', 'Content', 'index', '', '', '1', '1', '2', '1', '1', '0', '3'), ('11', '管理员设置', '', '', '', '', '', '1', '1', '16', '0', '1', '0', '2'), ('17', '管理员管理', 'Admin', 'Admin', 'index', '', '', '1', '1', '11', '0', '1', '0', '3'), ('18', '角色管理', 'Role', 'Role', 'index', '', '', '1', '1', '11', '0', '1', '0', '3'), ('20', '网站配置', 'Config', 'Config', 'edit', '', '', '1', '1', '19', '5', '1', '0', '3'), ('5', '生成静态', '', '', '', '', '', '1', '1', '1', '5', '1', '0', '2'), ('6', '批量更新栏目页', 'Html', 'Html', 'create_category', '&', '', '1', '1', '5', '4', '1', '0', '1'), ('8', '生成首页', 'Html', 'Html', 'create_index', '&', '', '1', '1', '5', '5', '1', '0', '1'), ('9', '批量更新内容页', 'Html', 'Html', 'create_content', '&', '', '1', '1', '5', '3', '1', '0', '1'), ('28', '修改密码', 'Admin', 'Personal', 'edit_password', '&', '', '1', '1', '29', '0', '1', '0', '1'), ('27', '修改个人信息', 'Admin', 'Personal', 'edit_info', '', '', '1', '1', '29', '1', '1', '0', '3'), ('26', '我的面板', '', '', '', '', '', '1', '1', '0', '10', '1', '0', '1'), ('29', '个人信息', '', '', '', '', '', '1', '1', '26', '0', '1', '0', '2'), ('61', '一键更新', 'Html', 'Html', 'create_all', '', '一键更新全站', '1', '1', '5', '8', '1', '0', '3'), ('40', 'JS标签调用', 'TemplateTag', 'CustomJs', 'index', '', '', '1', '1', '37', '0', '1', '0', '1'), ('30', '会员', '', '', '', '', '', '1', '1', '0', '0', '1', '0', '1'), ('31', '会员管理', '', '', '', '', '', '1', '1', '30', '0', '1', '0', '2'), ('32', '会员管理', 'Member', 'Member', 'index', '', '', '1', '1', '31', '0', '1', '0', '1'), ('33', '审核会员', 'Member', 'Member', 'verify', '', '', '1', '1', '31', '0', '1', '0', '1'), ('34', '会员组管理', '', '', '', '', '', '1', '1', '30', '0', '1', '0', '2'), ('35', '管理会员组', 'Member', 'Group', 'index', '', '', '1', '1', '34', '0', '1', '0', '1'), ('36', '模板', '', '', '', '', '', '1', '1', '0', '0', '1', '0', '1'), ('37', '模板管理', '', '', '', '', '', '1', '1', '36', '0', '1', '0', '2'), ('38', '模板风格', 'Template', 'Template', 'style_list', '', '', '1', '1', '37', '3', '1', '0', '1'), ('39', '模板文件', 'Template', 'Template', 'show_dir', '', '', '1', '1', '37', '3', '1', '0', '1'), ('70', 'Tag管理', 'Tag', 'Tag', 'index', '3', '', '1', '1', '2', '0', '0', '0', '3'), ('69', '搜索关键词', 'Search', 'Manage', 'index', '3', '', '1', '1', '10', '0', '0', '0', '3');
COMMIT;

-- ----------------------------
--  Table structure for `hd_role`
-- ----------------------------
DROP TABLE IF EXISTS `hd_role`;
CREATE TABLE `hd_role` (
  `rid` smallint(5) NOT NULL AUTO_INCREMENT,
  `rname` char(60) NOT NULL DEFAULT '',
  `pid` smallint(5) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `creditslower` int(255) NOT NULL DEFAULT '0' COMMENT '当前角色积分最小值',
  `is_admin` tinyint(1) DEFAULT '2' COMMENT '1 管理组  2 会员组',
  PRIMARY KEY (`rid`),
  KEY `gid` (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `hd_role`
-- ----------------------------
BEGIN;
INSERT INTO `hd_role` VALUES ('1', '超级管理员', '0', '超级管理员', '0', '1'), ('2', '编辑', '0', '内容编辑', '0', '1'), ('3', '发布人员', '0', '发布人员', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `hd_search`
-- ----------------------------
DROP TABLE IF EXISTS `hd_search`;
CREATE TABLE `hd_search` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL DEFAULT '' COMMENT '搜索关键词',
  `total` mediumint(8) unsigned NOT NULL DEFAULT '1' COMMENT '搜索次数',
  PRIMARY KEY (`sid`),
  UNIQUE KEY `name` (`name`) USING BTREE,
  KEY `total` (`total`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `hd_session`
-- ----------------------------
BEGIN;
INSERT INTO `hd_session` VALUES ('qq8df4cgankup1bk2klh6rcrn7', 'history|s:131:\"http://localhost/hdcms/index.php?a=Backup&amp;c=Backup&amp;m=backup&amp;dirname=Li9kYXRhL2JhY2t1cC8yMDEzMTIyNDA3MDUyNA==&amp;fid=16\";code|s:4:\"R8SA\";uid|s:1:\"1\";admin|i:1;WEB_MASTER|b:1;username|s:5:\"admin\";realname|s:0:\"\";rid|s:1:\"1\";rname|s:15:\"超级管理员\";favicon|s:69:\"http://localhost/hdcms/./upload/favicon/2013/12/11/42661386702404.jpg\";', '1387839934', '0.0.0.0'), ('c57nrm1u96t74rth7qefm1gfa3', 'history|s:64:\"http://localhost/hdcms/index.php?a=Hdcms&amp;c=Login&amp;m=login\";code|s:4:\"C8Y7\";', '1389062007', '0.0.0.0');
COMMIT;

-- ----------------------------
--  Table structure for `hd_tag`
-- ----------------------------
DROP TABLE IF EXISTS `hd_tag`;
CREATE TABLE `hd_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT '' COMMENT 'tag字符',
  `total` mediumint(9) DEFAULT '1' COMMENT '次数',
  PRIMARY KEY (`tid`),
  UNIQUE KEY `name` (`name`),
  KEY `total` (`total`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_template_tag`
-- ----------------------------
DROP TABLE IF EXISTS `hd_template_tag`;
CREATE TABLE `hd_template_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` mediumint(8) unsigned DEFAULT NULL COMMENT '类型  1 arclist',
  `options` text COMMENT '标签属性',
  `name` varchar(100) DEFAULT NULL COMMENT '标签名称',
  `content` text COMMENT '标签内容',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='后台管理员自定义模板标签';

-- ----------------------------
--  Table structure for `hd_upload`
-- ----------------------------
DROP TABLE IF EXISTS `hd_upload`;
CREATE TABLE `hd_upload` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `aid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文章id',
  `mid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '文件名',
  `filename` varchar(100) NOT NULL DEFAULT '',
  `path` char(200) NOT NULL DEFAULT '' COMMENT '文件路径 ',
  `ext` varchar(45) NOT NULL DEFAULT '' COMMENT '扩展名',
  `isimage` tinyint(1) NOT NULL DEFAULT '1' COMMENT '图片',
  `size` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `uptime` int(10) NOT NULL DEFAULT '0' COMMENT '上传时间',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  PRIMARY KEY (`id`),
  KEY `aid` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='上传文件';

-- ----------------------------
--  Table structure for `hd_user`
-- ----------------------------
DROP TABLE IF EXISTS `hd_user`;
CREATE TABLE `hd_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(30) NOT NULL DEFAULT '',
  `password` char(40) NOT NULL DEFAULT '',
  `email` char(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `ip` char(15) NOT NULL DEFAULT '' COMMENT '登录IP',
  `realname` char(30) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 正常  2 锁定',
  `qq` char(20) NOT NULL DEFAULT '' COMMENT 'qq号码',
  `sex` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 男 2 女',
  `favicon` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `credits` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户积分',
  `rid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  `gid` smallint(6) NOT NULL COMMENT '会员组',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  KEY `password` (`password`),
  KEY `credits` (`credits`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `hd_user`
-- ----------------------------
BEGIN;
INSERT INTO `hd_user` VALUES ('1', 'admin', '7fef6171469e80d32c0559f88b377245', 'houdunwangxj@gmail.com', '1389763934', '0.0.0.0', '向军', '1', '2300071698', '1', './upload/favicon/2013/12/11/42661386702404.jpg', '0', '1', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
