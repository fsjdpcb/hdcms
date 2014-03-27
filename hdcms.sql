/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50535
Source Host           : localhost:3306
Source Database       : hdcms

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2014-03-28 00:45:59
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_access
-- ----------------------------
INSERT INTO `hd_access` VALUES ('2', '17');
INSERT INTO `hd_access` VALUES ('2', '11');
INSERT INTO `hd_access` VALUES ('2', '20');
INSERT INTO `hd_access` VALUES ('2', '21');
INSERT INTO `hd_access` VALUES ('2', '19');
INSERT INTO `hd_access` VALUES ('2', '16');
INSERT INTO `hd_access` VALUES ('2', '80');
INSERT INTO `hd_access` VALUES ('2', '69');
INSERT INTO `hd_access` VALUES ('2', '12');
INSERT INTO `hd_access` VALUES ('2', '79');
INSERT INTO `hd_access` VALUES ('2', '61');
INSERT INTO `hd_access` VALUES ('2', '9');
INSERT INTO `hd_access` VALUES ('2', '8');
INSERT INTO `hd_access` VALUES ('2', '6');
INSERT INTO `hd_access` VALUES ('2', '5');
INSERT INTO `hd_access` VALUES ('2', '70');
INSERT INTO `hd_access` VALUES ('2', '15');
INSERT INTO `hd_access` VALUES ('2', '14');
INSERT INTO `hd_access` VALUES ('2', '3');
INSERT INTO `hd_access` VALUES ('2', '10');
INSERT INTO `hd_access` VALUES ('2', '81');
INSERT INTO `hd_access` VALUES ('2', '4');
INSERT INTO `hd_access` VALUES ('2', '13');
INSERT INTO `hd_access` VALUES ('2', '2');
INSERT INTO `hd_access` VALUES ('2', '1');
INSERT INTO `hd_access` VALUES ('3', '81');
INSERT INTO `hd_access` VALUES ('3', '4');
INSERT INTO `hd_access` VALUES ('3', '13');
INSERT INTO `hd_access` VALUES ('3', '2');
INSERT INTO `hd_access` VALUES ('3', '1');
INSERT INTO `hd_access` VALUES ('2', '18');
INSERT INTO `hd_access` VALUES ('2', '30');
INSERT INTO `hd_access` VALUES ('2', '31');
INSERT INTO `hd_access` VALUES ('2', '32');
INSERT INTO `hd_access` VALUES ('2', '33');
INSERT INTO `hd_access` VALUES ('2', '34');
INSERT INTO `hd_access` VALUES ('2', '35');

-- ----------------------------
-- Table structure for hd_bug
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
-- Records of hd_bug
-- ----------------------------

-- ----------------------------
-- Table structure for hd_category
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
  `cat_html_url` varchar(200) NOT NULL DEFAULT '' COMMENT '栏目页URL规则\n\n',
  `arc_html_url` varchar(200) NOT NULL DEFAULT '' COMMENT '内容页URL规则',
  `mid` smallint(6) NOT NULL DEFAULT '0' COMMENT '模型ID',
  `cattype` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 栏目,2 封面,3 外部链接',
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
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
-- Records of hd_category
-- ----------------------------
INSERT INTO `hd_category` VALUES ('2', '0', '最新消息', 'news', '', '', '{style}/article_index.html', '{style}/article_list.html', '{style}/article_default.html', '1', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '100', '2', '', '', '0', '0', '1', '1', '1');
INSERT INTO `hd_category` VALUES ('4', '0', '问答', 'question', '', '', '{style}/article_index.html', '{style}/article_list.html', '{style}/article_default.html', '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '100', '1', '', '', '0', '0', '1', '1', '1');
INSERT INTO `hd_category` VALUES ('5', '0', '新闻', 'news', '', '', '{style}/article_index.html', '{style}/article_list.html', '{style}/article_default.html', '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '100', '1', '', '', '0', '0', '1', '1', '1');
INSERT INTO `hd_category` VALUES ('12', '8', '前端', 'div', '', '', '{style}/article_index.html', '{style}/article_list.html', '{style}/article_default.html', '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '100', '1', '', '', '0', '0', '1', '1', '1');
INSERT INTO `hd_category` VALUES ('11', '8', '服务器', 'server', '', '', '{style}/article_index.html', '{style}/article_list.html', '{style}/article_default.html', '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '100', '1', '', '', '0', '0', '1', '1', '1');
INSERT INTO `hd_category` VALUES ('8', '0', '每日教程', 'lesson', '', '', '{style}/article_index.html', '{style}/article_list.html', '{style}/article_default.html', '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '2', '1', '1', '', '100', '1', '', '', '0', '0', '1', '1', '1');
INSERT INTO `hd_category` VALUES ('10', '8', 'php', 'php', '', '', '{style}/article_index.html', '{style}/article_list.html', '{style}/article_default.html', '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '100', '1', '', '', '2', '0', '1', '1', '0');
INSERT INTO `hd_category` VALUES ('34', '0', 'dsfsdf', 'dsfsdf', '', '', '{style}/article_index.html', '{style}/article_list.html', '{style}/article_default.html', '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '100', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `hd_category` VALUES ('35', '0', 'cccccc', 'cccccc', '', '', '{style}/article_index.html', '{style}/article_list.html', '{style}/article_default.html', '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '1', '1', '', '100', '1', '', '', '1', '0', '1', '1', '1');

-- ----------------------------
-- Table structure for hd_category_access
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
  `move` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许移动 1允许 0 不允许'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_category_access
-- ----------------------------
INSERT INTO `hd_category_access` VALUES ('1', '34', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `hd_category_access` VALUES ('2', '34', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `hd_category_access` VALUES ('3', '34', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `hd_category_access` VALUES ('4', '34', '1', '1', '1', '0', '0', '0', '0');
INSERT INTO `hd_category_access` VALUES ('5', '34', '1', '1', '1', '0', '0', '0', '0');
INSERT INTO `hd_category_access` VALUES ('6', '34', '1', '1', '1', '0', '0', '0', '0');
INSERT INTO `hd_category_access` VALUES ('1', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `hd_category_access` VALUES ('5', '2', '1', '1', '1', '0', '0', '0', '0');
INSERT INTO `hd_category_access` VALUES ('6', '2', '1', '1', '1', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for hd_comment
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
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父级id',
  `reply_id` int(11) NOT NULL DEFAULT '0' COMMENT '回复的最顶层评论id',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_comment
-- ----------------------------

-- ----------------------------
-- Table structure for hd_config
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
) ENGINE=MyISAM AUTO_INCREMENT=159 DEFAULT CHARSET=utf8 COMMENT='系统配置';

-- ----------------------------
-- Records of hd_config
-- ----------------------------
INSERT INTO `hd_config` VALUES ('1', 'webname', 'HDPHP社区--中国最强PHP培训机构  《后盾网》 ', '站点配置', '网站名称', '文本');
INSERT INTO `hd_config` VALUES ('2', 'icp', '京ICP备12048441号-3', '站点配置', 'ICP备案号', '文本');
INSERT INTO `hd_config` VALUES ('3', 'html_path', 'html', '站点配置', '静态html目录', '文本');
INSERT INTO `hd_config` VALUES ('4', 'copyright', 'Copyright © 2012-2013 HDCMS 后盾网 版权所有', '站点配置', '网站版权信息', '文本');
INSERT INTO `hd_config` VALUES ('5', 'keywords', 'php培训,php实训,后盾网', '站点配置', '网站关键词', '文本');
INSERT INTO `hd_config` VALUES ('6', 'description', '后盾网顶尖PHP培训 内容全面 全程实战!业内顶级讲师亲自授课,千余课时独家视频教程免费下载,超百G原创视频资源,实力不容造假!010-64825057', '站点配置', '网站描述', '多行文本');
INSERT INTO `hd_config` VALUES ('152', 'email', 'houdunwangxj@gmail.com', '站点配置', '管理员邮箱', '文本');
INSERT INTO `hd_config` VALUES ('9', 'backup_dir', 'backup', '高级设置', '数据备份目录', '文本');
INSERT INTO `hd_config` VALUES ('10', 'web_open', '1', '站点配置', '网站开启', '布尔(1/0)');
INSERT INTO `hd_config` VALUES ('15', 'auth_key', 'houdunwang.com', '安全设置', 'cookie加密KEY', '文本');
INSERT INTO `hd_config` VALUES ('16', 'upload_path', 'upload', '上传配置', '上传目录', '文本');
INSERT INTO `hd_config` VALUES ('17', 'upload_img_path', 'img', '上传配置', '上传图片目录', '文本');
INSERT INTO `hd_config` VALUES ('18', 'allow_type', 'jpg,jpeg,png,bmp,gif', '上传配置', '允许上传文件类型', '文本');
INSERT INTO `hd_config` VALUES ('19', 'allow_size', '2048000', '上传配置', '允许上传大小（字节）', '数字');
INSERT INTO `hd_config` VALUES ('20', 'water_on', '1', '水印设置', '上传文件加水印', '布尔(1/0)');
INSERT INTO `hd_config` VALUES ('115', 'member_verify', '0', '会员设置', '会员注册是否需要审核', '布尔(1/0)');
INSERT INTO `hd_config` VALUES ('116', 'reg_show_code', '1', '会员设置', '会员注册是否显示验证码', '布尔(1/0)');
INSERT INTO `hd_config` VALUES ('119', 'reg_email', '1', '会员设置', '注册成功是否发邮件', '布尔(1/0)');
INSERT INTO `hd_config` VALUES ('120', 'reg_interval', '0', '会员设置', '2次注册间隔间间', '数字');
INSERT INTO `hd_config` VALUES ('121', 'default_member_group', '4', '会员设置', '新注册会员初始组', '数字');
INSERT INTO `hd_config` VALUES ('122', 'admin_list_row', '15', '高级设置', '后台列表页数据显示行数', '数字');
INSERT INTO `hd_config` VALUES ('123', 'token_on', '0', '安全设置', '表单使用令牌验证', '布尔(1/0)');
INSERT INTO `hd_config` VALUES ('124', 'log_key', 'houdunwang.com', '安全设置', '日志文件加密KEY', '文本');
INSERT INTO `hd_config` VALUES ('125', 'session_name', 'hdsid', '安全设置', 'SESSION_NAME值', '文本');
INSERT INTO `hd_config` VALUES ('126', 'super_admin_key', 'SUPER_ADMIN', '安全设置', '站长令牌名称', '文本');
INSERT INTO `hd_config` VALUES ('127', 'tel', '010-64825057', '站点配置', '联系电话', '文本');
INSERT INTO `hd_config` VALUES ('128', 'water_text', 'houdunwang.com', '水印设置', '水印文字', '文本');
INSERT INTO `hd_config` VALUES ('129', 'water_text_size', '16', '水印设置', '文字大小', '数字');
INSERT INTO `hd_config` VALUES ('130', 'water_img', 'data/water/water.png', '水印设置', '水印图像', '文本');
INSERT INTO `hd_config` VALUES ('131', 'water_pct', '0', '水印设置', '水印图片透明度', '数字');
INSERT INTO `hd_config` VALUES ('132', 'water_quality', '90', '水印设置', '图片压缩比', '数字');
INSERT INTO `hd_config` VALUES ('133', 'water_pos', '9', '水印设置', '水印位置', '数字');
INSERT INTO `hd_config` VALUES ('134', 'del_content_model', '1', '高级设置', '删除文章先放入回收站', '布尔(1/0)');
INSERT INTO `hd_config` VALUES ('136', 'down_remove_pic_size', '500', '高级设置', '下载远程资源允许最大值', '数字');
INSERT INTO `hd_config` VALUES ('137', 'comment_status', '1', '会员设置', '评论需要审核', '布尔(1/0)');
INSERT INTO `hd_config` VALUES ('138', 'favicon_width', '180', '会员设置', '会员头像宽度', '数字');
INSERT INTO `hd_config` VALUES ('139', 'favicon_height', '180', '会员设置', '会员头像高度', '数字');
INSERT INTO `hd_config` VALUES ('142', 'down_remote_pic', '0', '内容相关', '下载远程图片', '布尔(1/0)');
INSERT INTO `hd_config` VALUES ('143', 'auto_desc', '1', '内容相关', '截取内容为摘要', '布尔(1/0)');
INSERT INTO `hd_config` VALUES ('144', 'auto_thumb', '0', '内容相关', '提取内容图片为缩略图', '布尔(1/0)');
INSERT INTO `hd_config` VALUES ('145', 'upload_img_max_width', '600', '内容相关', '上传图片宽度超过此值，进行缩放', '数字');
INSERT INTO `hd_config` VALUES ('146', 'upload_img_max_height', '600', '内容相关', '上传图片高度超过此值，进行缩放', '数字');
INSERT INTO `hd_config` VALUES ('147', 'member_content_status', '1', '会员设置', '会员发表文章需要审核', '布尔(1/0)');
INSERT INTO `hd_config` VALUES ('149', 'member_open', '1', '会员设置', '开启会员中心', '布尔(1/0)');
INSERT INTO `hd_config` VALUES ('150', 'web_close_message', '网站暂时关闭，请稍候访问', '站点配置', '网站关闭提示信息', '文本');
INSERT INTO `hd_config` VALUES ('151', 'web_style', 'default', '私有配置', '网站模板', '文本');
INSERT INTO `hd_config` VALUES ('155', 'qq', '1455067020', '站点配置', 'QQ号', '文本');
INSERT INTO `hd_config` VALUES ('154', 'weibo', 'houdunwangxj@gmail.com', '站点配置', '新浪微博', '文本');
INSERT INTO `hd_config` VALUES ('156', 'tweibo', 'houdunwang@gmail.com', '站点配置', '腾讯微博', '文本');
INSERT INTO `hd_config` VALUES ('157', 'email', 'houdunwangxj@gmail.com', '站点配置', '企业邮箱', '文本');
INSERT INTO `hd_config` VALUES ('158', 'init_credits', '100', '会员设置', '初始积分', '文本');

-- ----------------------------
-- Table structure for hd_content
-- ----------------------------
DROP TABLE IF EXISTS `hd_content`;
CREATE TABLE `hd_content` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `title` char(100) NOT NULL DEFAULT '' COMMENT '标题',
  `flag` set('热门','置顶','推荐','图片','精华','幻灯片','站长推荐') DEFAULT NULL,
  `new_window` tinyint(1) NOT NULL DEFAULT '0' COMMENT '新窗口打开',
  `seo_title` char(100) NOT NULL DEFAULT '' COMMENT '标题',
  `thumb` char(200) NOT NULL DEFAULT '' COMMENT '缩略图',
  `click` mediumint(9) NOT NULL DEFAULT '0' COMMENT '点击次数',
  `source` char(30) NOT NULL DEFAULT '' COMMENT '来源',
  `redirecturl` char(100) NOT NULL DEFAULT '' COMMENT '转向链接',
  `html_path` varchar(255) NOT NULL DEFAULT '' COMMENT '自定义生成的静态文件地址',
  `allowreply` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许回复',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updatetime` int(10) NOT NULL DEFAULT '0' COMMENT '发布时间 ',
  `color` char(7) NOT NULL DEFAULT '' COMMENT '标题颜色',
  `template` varchar(255) NOT NULL DEFAULT '' COMMENT '模板',
  `url_type` tinyint(1) NOT NULL DEFAULT '3' COMMENT '文章访问方式  1 静态访问  2 动态访问  3 继承栏目',
  `arc_sort` int(10) unsigned NOT NULL DEFAULT '100' COMMENT '排序',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 已审核 0 未审核',
  `keywords` char(100) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `uid` int(10) unsigned NOT NULL COMMENT '用户uid',
  `favorites` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数',
  `comment_num` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  `read_credits` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '阅读金币',
  PRIMARY KEY (`aid`),
  KEY `cid` (`cid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of hd_content
-- ----------------------------
INSERT INTO `hd_content` VALUES ('1', '10', '　新款B90搭载了锦湖Ecsta LX系列轮胎，其节能环保的设计，降低了20％的滚动阻力。另外，现款B90全系均为16寸轮毂，而新款则全部升级为17寸，看上去更为大方。  14款奔腾B90', '图片', '0', '', 'upload/Content/2014/03/27/45591395853239.jpg', '100', '', '', '', '1', '1395852482', '1395895642', '', '', '2', '100', '0', '新款,B90,轮毂,16寸,全系,全部,均为,升级,大方', '　新款B90搭载了锦湖Ecsta LX系列轮胎，其节能环保的设计，降低了20％的滚动阻力。另外，现款B90全系均为16寸轮毂，而新款则全部升级为17寸，看上去更为大方。', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('2', '10', '常我们关注一款车的动力表现时都是看发动机功率参数，这个数', '图片', '0', '', 'upload/Content/2014/03/27/46821395926649.jpg', '100', '', '', '', '1', '1395926649', '1395883164', '', '', '1', '100', '1', '功率,厂家,发动机,数值,驱动,车辆,真正,才是,面上', '常我们关注一款车的动力表现时都是看发动机功率参数，这个数值是厂家在特定的环境下实验得出的，不过在现实中这台发动机装在汽车上，经过变速箱、传动轴和车轮，最终作用在路面上的才是驱动车辆时真正能用到的功率，那么实际功率和厂家公布的数值究竟有多大差距？这就是功率测试的目的。', '1', '0', '0', '0');

-- ----------------------------
-- Table structure for hd_content_data
-- ----------------------------
DROP TABLE IF EXISTS `hd_content_data`;
CREATE TABLE `hd_content_data` (
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章主表ID',
  `content` text COMMENT '正文',
  `images` mediumtext,
  `downs` mediumtext,
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_content_data
-- ----------------------------
INSERT INTO `hd_content_data` VALUES ('1', '<p style=\"margin: 0px auto 20px; padding: 0px; font-size: 16px; word-wrap: normal; color: rgb(51, 51, 51); font-family: 宋体, arial, sans-serif; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\">　新款B90搭载了锦湖Ecsta LX系列轮胎，其节能环保的设计，降低了20％的滚动阻力。另外，现款B90全系均为16寸轮毂，而新款则全部升级为17寸，看上去更为大方。</p><p style=\"margin: 0px auto 20px; padding: 0px; font-size: 16px; word-wrap: normal; color: rgb(51, 51, 51); font-family: 宋体, arial, sans-serif; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><a href=\"http://price.pcauto.com.cn/cars/image/1432551-1.html\" target=\"_blank\" style=\"color: rgb(51, 51, 51); text-decoration: none; outline: none;\"><img alt=\"14款奔腾B90\" class=\"piclibImg2\" src=\"http://img.pcauto.com.cn/images/pcautogallery/modle/article/20143/25/13957438506175460_600.jpg\" title=\"14款奔腾B90\" style=\"border: 1px solid rgb(198, 198, 198); vertical-align: middle;\"/></a></p><p><br/></p>', null, null);
INSERT INTO `hd_content_data` VALUES ('2', '<p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: 宋体, arial, tahoma, sans-serif; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);\">常我们关注一款车的动力表现时都是看<a class=\"ShuKeyWordLink\" href=\"http://car.autohome.com.cn/shuyu/detail_8_9_555.html\" target=\"_blank\" style=\"color: rgb(51, 51, 51); outline: 0px; text-decoration: none; border-bottom-width: 1px; border-bottom-style: dotted; border-bottom-color: rgb(59, 89, 152);\">发动机</a><a class=\"blackclink\" href=\"http://car.autohome.com.cn/shuyu/detail_40_41_98.html\" target=\"_blank\" style=\"color: rgb(51, 51, 51); outline: 0px; text-decoration: none;\">功率</a>参数，这个数值是厂家在特定的环境下实验得出的，不过在现实中这台<a class=\"blackclink\" href=\"http://car.autohome.com.cn/shuyu/detail_8_9_555.html\" target=\"_blank\" style=\"color: rgb(51, 51, 51); outline: 0px; text-decoration: none;\">发动机</a>装在汽车上，经过变速箱、<a class=\"ShuKeyWordLink\" href=\"http://car.autohome.com.cn/shuyu/detail_3_5_397.html\" target=\"_blank\" style=\"color: rgb(51, 51, 51); outline: 0px; text-decoration: none; border-bottom-width: 1px; border-bottom-style: dotted; border-bottom-color: rgb(59, 89, 152);\">传动轴</a>和车轮，最终作用在路面上的才是驱动车辆时真正能用到的<a class=\"blackclink\" href=\"http://car.autohome.com.cn/shuyu/detail_40_41_98.html\" target=\"_blank\" style=\"color: rgb(51, 51, 51); outline: 0px; text-decoration: none;\">功率</a>，那么实际<a class=\"blackclink\" href=\"http://car.autohome.com.cn/shuyu/detail_40_41_98.html\" target=\"_blank\" style=\"color: rgb(51, 51, 51); outline: 0px; text-decoration: none;\">功率</a>和厂家公布的数值究竟有多大差距？这就是<a class=\"blackclink\" href=\"http://car.autohome.com.cn/shuyu/detail_40_41_98.html\" target=\"_blank\" style=\"color: rgb(51, 51, 51); outline: 0px; text-decoration: none;\">功率</a>测试的目的。</p><p style=\"text-align:center;margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: 宋体, arial, tahoma, sans-serif; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.autohome.com.cn/img/?img=newspic/2014/3/27/2014032707273885455.jpg\" target=\"_blank\" style=\"color: rgb(59, 89, 152); outline: 0px; text-decoration: none;\"></a><a href=\"http://www.autohome.com.cn/img/?img=newspic/2014/3/27/2014032718345159695.jpg\" target=\"_blank\" style=\"color: rgb(59, 89, 152); outline: 0px; text-decoration: none;\"><img alt=\"汽车之家\" src=\"http://localhost/hdcms/upload/Content/2014/03/27/21651395926650.jpg\" width=\"620\" height=\"680\" original=\"http://localhost/hdcms/upload/Content/2014/03/27/21651395926650.jpg\" style=\"vertical-align: top; background-image: url(http://x.autoimg.cn/news/show20/1210/default_bg.png); display: inline-block; border: 0px !important; background-position: 50% 50%; background-repeat: no-repeat no-repeat;\"/></a></p><p><br/></p>', 'a:5:{i:0;a:2:{s:4:\"path\";s:44:\"upload/content/2014/03/27/47251395852460.jpg\";s:3:\"alt\";s:0:\"\";}i:1;a:2:{s:4:\"path\";s:44:\"upload/content/2014/03/27/94081395852466.jpg\";s:3:\"alt\";s:0:\"\";}i:2;a:2:{s:4:\"path\";s:44:\"upload/Content/2014/03/27/45591395853239.jpg\";s:3:\"alt\";s:0:\"\";}i:3;a:2:{s:4:\"path\";s:41:\"upload/content/2014/03/27/31395895818.jpg\";s:3:\"alt\";s:0:\"\";}i:4;a:2:{s:4:\"path\";s:44:\"upload/content/2014/03/27/20211395895962.jpg\";s:3:\"alt\";s:0:\"\";}}', null);

-- ----------------------------
-- Table structure for hd_content_single
-- ----------------------------
DROP TABLE IF EXISTS `hd_content_single`;
CREATE TABLE `hd_content_single` (
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
  `arc_sort` smallint(5) unsigned NOT NULL DEFAULT '100',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 已审核 0 未审核',
  `cid` smallint(6) NOT NULL DEFAULT '0' COMMENT '栏目id',
  `seo_title` char(100) NOT NULL DEFAULT '' COMMENT 'seo标题',
  `keywords` char(100) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `content` text NOT NULL COMMENT '正文',
  `html_path` varchar(255) NOT NULL DEFAULT '' COMMENT '自定义生成的静态文件地址',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '作者uid',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_content_single
-- ----------------------------

-- ----------------------------
-- Table structure for hd_custom_js
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
-- Records of hd_custom_js
-- ----------------------------

-- ----------------------------
-- Table structure for hd_field
-- ----------------------------
DROP TABLE IF EXISTS `hd_field`;
CREATE TABLE `hd_field` (
  `fid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `show_type` varchar(45) NOT NULL DEFAULT '' COMMENT '字段类型 text|textarea|radio|checkbox|image|images|datetime|',
  `table_name` varchar(30) NOT NULL DEFAULT '' COMMENT '所在表名',
  `field_name` varchar(45) NOT NULL DEFAULT '' COMMENT '字段name名称',
  `title` varchar(45) NOT NULL DEFAULT '' COMMENT '字段标题 ',
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 开启 0 关闭',
  `is_system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为系统字段',
  `fieldsort` smallint(6) NOT NULL DEFAULT '50' COMMENT '字段排序',
  `member_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '会员中心显示',
  `set` text NOT NULL COMMENT '字段设置',
  PRIMARY KEY (`fid`),
  KEY `mid` (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='模型字段';

-- ----------------------------
-- Records of hd_field
-- ----------------------------
INSERT INTO `hd_field` VALUES ('13', '1', 'images', 'content_data', 'images', '图片集', '1', '0', '50', '1', 'a:13:{s:7:\"message\";s:0:\"\";s:20:\"upload_img_max_width\";s:3:\"600\";s:21:\"upload_img_max_height\";s:3:\"600\";s:3:\"num\";s:2:\"10\";s:5:\"water\";s:1:\"1\";s:5:\"error\";s:0:\"\";s:3:\"css\";s:0:\"\";s:10:\"validation\";s:5:\"false\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:7:\"default\";s:0:\"\";s:8:\"required\";s:0:\"\";s:7:\"options\";s:0:\"\";}');
INSERT INTO `hd_field` VALUES ('14', '1', 'files', 'content_data', 'downs', '文件下载', '1', '0', '50', '1', 'a:12:{s:7:\"message\";s:0:\"\";s:3:\"num\";s:2:\"10\";s:8:\"filetype\";s:7:\"zip,rar\";s:12:\"down_credits\";s:1:\"0\";s:5:\"error\";s:0:\"\";s:3:\"css\";s:0:\"\";s:10:\"validation\";s:5:\"false\";s:5:\"width\";s:0:\"\";s:6:\"height\";s:0:\"\";s:7:\"default\";s:0:\"\";s:8:\"required\";s:0:\"\";s:7:\"options\";s:0:\"\";}');

-- ----------------------------
-- Table structure for hd_link
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
-- Records of hd_link
-- ----------------------------

-- ----------------------------
-- Table structure for hd_link_config
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
-- Records of hd_link_config
-- ----------------------------
INSERT INTO `hd_link_config` VALUES ('1', '后盾网', 'http://localhost/hdcms', 'hd/Plugin/Link/Data/logo.png', 'houdunwang@gmail.com', '1、请先在贵站做好后盾网的友情链接\r\n2、将右侧‘文字链接’或‘图片链接’代码复制到贵站\r\n3、凡开通我站友情链接且内容健康的网站，经管理员审核后，将显示在此友情链接页面\r\n4、首页友情连接，要求pr>=2、alexa < 10000；其他页面连接根据具体页面而定（请具体咨询）\r\n5、贵网站要在百度google都有记录收录，且网站访问速度不能太慢', '1', '1', '2300071698');

-- ----------------------------
-- Table structure for hd_link_type
-- ----------------------------
DROP TABLE IF EXISTS `hd_link_type`;
CREATE TABLE `hd_link_type` (
  `tid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` char(50) NOT NULL DEFAULT '' COMMENT '分类名称',
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '系统类型',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='友情链接分类';

-- ----------------------------
-- Records of hd_link_type
-- ----------------------------

-- ----------------------------
-- Table structure for hd_model
-- ----------------------------
DROP TABLE IF EXISTS `hd_model`;
CREATE TABLE `hd_model` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `model_name` char(30) NOT NULL DEFAULT '' COMMENT '模型名称',
  `table_name` char(20) NOT NULL DEFAULT '' COMMENT '主表名',
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '禁用 1 开启 0 关闭',
  `description` varchar(45) NOT NULL DEFAULT '' COMMENT '模型描述',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 基本模型 主、附表     2 独立模型 只有主表',
  `is_submit` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 允许投稿 2 不允许投稿',
  `m_order` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `is_system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 系统模型  2 普通模型',
  `app_group` char(50) NOT NULL DEFAULT '' COMMENT '应用组',
  `app` char(50) NOT NULL DEFAULT '' COMMENT '应用',
  `control` char(50) NOT NULL DEFAULT '' COMMENT '控制器',
  `method` char(50) NOT NULL DEFAULT '' COMMENT '方法',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='模型表';

-- ----------------------------
-- Records of hd_model
-- ----------------------------
INSERT INTO `hd_model` VALUES ('1', '普通文章', 'content', '1', '', '1', '0', '0', '1', 'Hdcms', 'Content', 'Content', 'index');

-- ----------------------------
-- Table structure for hd_navigation
-- ----------------------------
DROP TABLE IF EXISTS `hd_navigation`;
CREATE TABLE `hd_navigation` (
  `nid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` char(30) NOT NULL DEFAULT '菜单名称' COMMENT '菜单名',
  `pid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '父id',
  `target` enum('_self','_blank') NOT NULL DEFAULT '_self' COMMENT '打开方式',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1 显示 0 不显示',
  `list_order` mediumint(100) NOT NULL DEFAULT '100' COMMENT '排序',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='网站前台导航';

-- ----------------------------
-- Records of hd_navigation
-- ----------------------------
INSERT INTO `hd_navigation` VALUES ('1', '教程', '0', '_self', '1', '100', '[ROOT]/index.php?a=Index&c=Category&m=category&cid=1');

-- ----------------------------
-- Table structure for hd_node
-- ----------------------------
DROP TABLE IF EXISTS `hd_node`;
CREATE TABLE `hd_node` (
  `nid` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` char(30) NOT NULL DEFAULT '' COMMENT '中文标题',
  `app_group` char(30) NOT NULL DEFAULT 'Hdcms' COMMENT '应用组',
  `app` char(30) NOT NULL DEFAULT '' COMMENT '应用',
  `control` char(30) NOT NULL DEFAULT '' COMMENT '控制器',
  `method` char(30) NOT NULL DEFAULT '' COMMENT '方法',
  `param` char(100) NOT NULL DEFAULT '' COMMENT '参数',
  `comment` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1 显示 0 不显示',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '类型 1 权限+菜单   2 普通菜单 ',
  `pid` smallint(6) NOT NULL DEFAULT '0',
  `list_order` smallint(6) NOT NULL DEFAULT '100' COMMENT '排序',
  `is_system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '系统菜单 1 是  0 不是',
  `favorite` tinyint(1) NOT NULL DEFAULT '0' COMMENT '后台常用菜单   1 是  0 不是',
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=158 DEFAULT CHARSET=utf8 COMMENT='节点表（后台菜单也使用）';

-- ----------------------------
-- Records of hd_node
-- ----------------------------
INSERT INTO `hd_node` VALUES ('1', '内容', 'Hdcms', '', '', '', '', '', '1', '1', '0', '8', '0', '0');
INSERT INTO `hd_node` VALUES ('2', '内容管理', 'Hdcms', '', '', '', '', '', '1', '1', '1', '10', '0', '0');
INSERT INTO `hd_node` VALUES ('16', '系统', 'Hdcms', '', '', '', '', '', '1', '1', '0', '10', '0', '0');
INSERT INTO `hd_node` VALUES ('21', '后台菜单管理', 'Hdcms', 'Node', 'Node', 'index', '', '', '1', '1', '19', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('3', '附件管理', 'Hdcms', 'Upload', 'Index', 'index', '', '', '1', '1', '10', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('12', '数据备份', 'Hdcms', 'Backup', 'Backup', 'index', '', '', '1', '1', '79', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('10', '内容相关管理', 'Hdcms', '', '', '', '', '', '1', '1', '1', '12', '0', '0');
INSERT INTO `hd_node` VALUES ('13', '栏目管理', 'Hdcms', 'Category', 'Category', 'index', '', '', '1', '1', '2', '11', '0', '1');
INSERT INTO `hd_node` VALUES ('14', '模型管理', 'Hdcms', 'Model', 'Model', 'index', '', '', '1', '1', '10', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('15', '推荐位', 'Hdcms', 'Flag', 'Flag', 'index', '', '', '1', '1', '10', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('19', '系统设置', 'Hdcms', '', '', '', '', '', '1', '1', '16', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('4', '管理内容', 'Hdcms', 'Content', 'Content', 'index', '', '', '1', '1', '2', '10', '0', '1');
INSERT INTO `hd_node` VALUES ('11', '管理员设置', 'Hdcms', '', '', '', '', '', '1', '1', '16', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('17', '管理员管理', 'Hdcms', 'Role', 'Admin', 'index', '', '', '1', '1', '11', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('18', '角色管理', 'Hdcms', 'Role', 'Role', 'index', '', '', '1', '1', '11', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('20', '网站配置', 'Hdcms', 'Config', 'Config', 'edit', '', '', '1', '1', '19', '90', '0', '0');
INSERT INTO `hd_node` VALUES ('5', '生成静态', 'Hdcms', '', '', '', '', '', '1', '1', '1', '11', '0', '0');
INSERT INTO `hd_node` VALUES ('6', '批量更新栏目页', 'Hdcms', 'Html', 'Html', 'create_category', '&', '', '1', '1', '5', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('8', '生成首页', 'Hdcms', 'Html', 'Html', 'create_index', '&', '', '1', '1', '5', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('9', '批量更新内容页', 'Hdcms', 'Html', 'Html', 'create_content', '&', '', '1', '1', '5', '100', '0', '1');
INSERT INTO `hd_node` VALUES ('28', '修改密码', 'Hdcms', 'Role', 'Personal', 'edit_password', '&', '', '1', '1', '29', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('27', '修改个人信息', 'Hdcms', 'Role', 'Personal', 'edit_info', '', '', '1', '1', '29', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('26', '我的面板', 'Hdcms', '', '', '', '', '', '1', '1', '0', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('29', '个人信息', 'Hdcms', '', '', '', '', '', '1', '1', '26', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('61', '一键更新', 'Hdcms', 'Html', 'Html', 'create_all', '', '一键更新全站', '1', '1', '5', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('40', 'JS标签调用', 'Hdcms', 'TemplateTag', 'CustomJs', 'index', '', '', '1', '1', '37', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('30', '会员', 'Hdcms', '', '', '', '', '', '1', '1', '0', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('31', '会员管理', 'Hdcms', '', '', '', '', '', '1', '1', '30', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('32', '会员管理', 'Hdcms', 'Group', 'User', 'index', '', '', '1', '1', '31', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('33', '审核会员', 'Hdcms', 'Group', 'User', 'index', 'state=0', '', '1', '1', '31', '100', '0', '1');
INSERT INTO `hd_node` VALUES ('34', '会员组管理', 'Hdcms', '', '', '', '', '', '1', '1', '30', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('35', '管理会员组', 'Hdcms', 'Group', 'Group', 'index', '', '', '1', '1', '34', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('36', '模板', 'Hdcms', '', '', '', '', '', '1', '1', '0', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('37', '模板管理', 'Hdcms', '', '', '', '', '', '1', '1', '36', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('38', '模板风格', 'Hdcms', 'Template', 'Template', 'style_list', '', '', '1', '1', '37', '90', '0', '0');
INSERT INTO `hd_node` VALUES ('39', '模板文件', 'Hdcms', 'Template', 'Template', 'show_dir', '', '', '1', '1', '37', '90', '0', '0');
INSERT INTO `hd_node` VALUES ('70', '标签云', 'Hdcms', 'Tag', 'Tag', 'index', '', '', '1', '1', '10', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('69', '搜索关键词', 'Hdcms', 'Search', 'Manage', 'index', '3', '', '1', '1', '79', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('79', '其他操作', 'Hdcms', '', '', '', '', '', '1', '1', '1', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('80', '导航菜单', 'Hdcms', 'Navigation', 'Navigation', 'index', '', '', '1', '1', '79', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('81', '单页面', 'Hdcms', 'Single', 'single', 'index', '', '', '1', '1', '2', '12', '0', '1');
INSERT INTO `hd_node` VALUES ('91', '插件', 'Hdcms', '', '', '', '', '', '1', '1', '0', '1000', '0', '0');
INSERT INTO `hd_node` VALUES ('92', '插件管理', 'Hdcms', '', '', '', '', '', '1', '1', '91', '99', '0', '0');
INSERT INTO `hd_node` VALUES ('93', '插件管理', 'Hdcms', 'Plugin', 'Plugin', 'Plugin_list', '', '', '1', '1', '92', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('94', '正在使用', 'Hdcms', 'Plugin', '', '', '', '', '1', '1', '91', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('153', '反馈', 'Hdcms', '', '', '', '', '', '1', '2', '0', '2000', '0', '0');
INSERT INTO `hd_node` VALUES ('154', '问题反馈', 'Hdcms', '', '', '', '', '', '1', '2', '153', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('157', '友情链接', 'Plugin', 'Link', 'Manage', 'index', '', '', '1', '1', '94', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('155', '提交BUG', 'Hdcms', 'Bug', 'Bug', 'feedback', '', '', '1', '2', '154', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('156', 'BUG管理', 'Hdcms', 'Bug', 'Bug', 'showBug', '', '', '1', '1', '154', '100', '0', '0');

-- ----------------------------
-- Table structure for hd_plugin
-- ----------------------------
DROP TABLE IF EXISTS `hd_plugin`;
CREATE TABLE `hd_plugin` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` char(50) NOT NULL DEFAULT '' COMMENT '插件名称',
  `install_time` date DEFAULT NULL COMMENT '安装时间',
  `version` varchar(100) NOT NULL DEFAULT '' COMMENT '版本号',
  `team` varchar(100) NOT NULL DEFAULT '' COMMENT '团队名称',
  `app` char(50) NOT NULL DEFAULT '' COMMENT '应用名',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '电子邮箱',
  `web` varchar(255) NOT NULL DEFAULT '' COMMENT '官方网址',
  `pubdate` date DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COMMENT='插件列表';

-- ----------------------------
-- Records of hd_plugin
-- ----------------------------
INSERT INTO `hd_plugin` VALUES ('56', '友情链接', '2014-02-11', '1.0', '后盾网', 'Link', 'houdunwang@gmail.com', 'www.houdunwang.com', '2014-02-09');

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
  `allowpost` tinyint(1) NOT NULL DEFAULT '1' COMMENT '允许投稿  1 允许 2 不允许',
  `allowpostverify` tinyint(1) NOT NULL DEFAULT '1' COMMENT '投稿不需要审核  1 不需要  2 需要',
  `allowsendmessage` tinyint(1) NOT NULL DEFAULT '1' COMMENT '允许发短消息  1 允许  2 不允许',
  PRIMARY KEY (`rid`),
  KEY `gid` (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_role
-- ----------------------------
INSERT INTO `hd_role` VALUES ('1', '超级管理员', '超级管理员', '1', '1', '0', '1', '1', '1');
INSERT INTO `hd_role` VALUES ('2', '编辑', '内容编辑', '1', '1', '0', '1', '1', '1');
INSERT INTO `hd_role` VALUES ('3', '发布人员', '发布人员', '1', '1', '0', '1', '1', '1');
INSERT INTO `hd_role` VALUES ('4', '新手上路', '新手上路', '0', '1', '100', '1', '1', '1');
INSERT INTO `hd_role` VALUES ('5', '中级会员', '中级会员', '0', '1', '200', '1', '1', '1');
INSERT INTO `hd_role` VALUES ('6', '高级会员', '高级会员', '0', '1', '300', '1', '1', '1');

-- ----------------------------
-- Table structure for hd_search
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
-- Records of hd_search
-- ----------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_session
-- ----------------------------

-- ----------------------------
-- Table structure for hd_tag
-- ----------------------------
DROP TABLE IF EXISTS `hd_tag`;
CREATE TABLE `hd_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(30) DEFAULT '' COMMENT 'tag字符',
  `total` mediumint(9) DEFAULT '1' COMMENT '次数',
  PRIMARY KEY (`tid`),
  UNIQUE KEY `name` (`tag_name`),
  KEY `total` (`total`)
) ENGINE=MyISAM AUTO_INCREMENT=401 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_tag
-- ----------------------------
INSERT INTO `hd_tag` VALUES ('12', 'smarty', '1');
INSERT INTO `hd_tag` VALUES ('13', 'dsfdsffdfds', '1');
INSERT INTO `hd_tag` VALUES ('14', 'fdsdsdsfsdfsdsfdsfddsfsfdsdsds', '1');
INSERT INTO `hd_tag` VALUES ('15', 'cccccccccccccccccccc', '1');
INSERT INTO `hd_tag` VALUES ('18', 'ffffffffffffffff', '3');
INSERT INTO `hd_tag` VALUES ('28', '是否', '2');
INSERT INTO `hd_tag` VALUES ('29', '已经', '2');
INSERT INTO `hd_tag` VALUES ('30', '填写', '2');
INSERT INTO `hd_tag` VALUES ('31', '完整', '2');
INSERT INTO `hd_tag` VALUES ('32', '内容', '2');
INSERT INTO `hd_tag` VALUES ('33', '标题', '2');
INSERT INTO `hd_tag` VALUES ('34', '提交', '2');
INSERT INTO `hd_tag` VALUES ('35', '代码', '2');
INSERT INTO `hd_tag` VALUES ('36', '检查', '2');
INSERT INTO `hd_tag` VALUES ('37', 'sdfsdfsdsfdfssfd', '1');
INSERT INTO `hd_tag` VALUES ('38', '文件', '1');
INSERT INTO `hd_tag` VALUES ('39', '现有', '1');
INSERT INTO `hd_tag` VALUES ('40', '单文件', '1');
INSERT INTO `hd_tag` VALUES ('41', '最大', '1');
INSERT INTO `hd_tag` VALUES ('42', '2MB', '1');
INSERT INTO `hd_tag` VALUES ('43', '一些', '1');
INSERT INTO `hd_tag` VALUES ('44', '删掉', '1');
INSERT INTO `hd_tag` VALUES ('45', '上限', '1');
INSERT INTO `hd_tag` VALUES ('46', '若要', '1');
INSERT INTO `hd_tag` VALUES ('47', 'zzzzzzzzzzzzzzzzzzzzzz', '1');
INSERT INTO `hd_tag` VALUES ('51', 'sdffds', '3');
INSERT INTO `hd_tag` VALUES ('49', 'sdfdsf', '1');
INSERT INTO `hd_tag` VALUES ('52', 'sdf', '1');
INSERT INTO `hd_tag` VALUES ('384', 'B90', '18');
INSERT INTO `hd_tag` VALUES ('291', '改款', '8');
INSERT INTO `hd_tag` VALUES ('293', '后的', '8');
INSERT INTO `hd_tag` VALUES ('101', '体验', '6');
INSERT INTO `hd_tag` VALUES ('292', '奔腾', '8');
INSERT INTO `hd_tag` VALUES ('295', '的当', '8');
INSERT INTO `hd_tag` VALUES ('383', '新款', '16');
INSERT INTO `hd_tag` VALUES ('105', '将会', '6');
INSERT INTO `hd_tag` VALUES ('294', '注目', '8');
INSERT INTO `hd_tag` VALUES ('275', '配置', '29');
INSERT INTO `hd_tag` VALUES ('276', '丰富', '29');
INSERT INTO `hd_tag` VALUES ('277', '科技', '29');
INSERT INTO `hd_tag` VALUES ('278', '不变', '29');
INSERT INTO `hd_tag` VALUES ('279', '样式', '29');
INSERT INTO `hd_tag` VALUES ('280', '内饰', '29');
INSERT INTO `hd_tag` VALUES ('296', '中最', '2');
INSERT INTO `hd_tag` VALUES ('297', '迎来', '2');
INSERT INTO `hd_tag` VALUES ('298', '一次', '2');
INSERT INTO `hd_tag` VALUES ('299', '柘城', '1');
INSERT INTO `hd_tag` VALUES ('385', '轮毂', '10');
INSERT INTO `hd_tag` VALUES ('386', '16寸', '10');
INSERT INTO `hd_tag` VALUES ('387', '全系', '10');
INSERT INTO `hd_tag` VALUES ('388', '全部', '10');
INSERT INTO `hd_tag` VALUES ('389', '均为', '10');
INSERT INTO `hd_tag` VALUES ('390', '升级', '10');
INSERT INTO `hd_tag` VALUES ('391', '大方', '10');
INSERT INTO `hd_tag` VALUES ('309', 'dsfdsfdsfdsdf', '1');
INSERT INTO `hd_tag` VALUES ('337', '1212', '1');
INSERT INTO `hd_tag` VALUES ('392', '功率', '1');
INSERT INTO `hd_tag` VALUES ('393', '厂家', '1');
INSERT INTO `hd_tag` VALUES ('394', '发动机', '1');
INSERT INTO `hd_tag` VALUES ('395', '数值', '1');
INSERT INTO `hd_tag` VALUES ('396', '驱动', '1');
INSERT INTO `hd_tag` VALUES ('397', '车辆', '1');
INSERT INTO `hd_tag` VALUES ('398', '真正', '1');
INSERT INTO `hd_tag` VALUES ('399', '才是', '1');
INSERT INTO `hd_tag` VALUES ('400', '面上', '1');

-- ----------------------------
-- Table structure for hd_template_tag
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
-- Records of hd_template_tag
-- ----------------------------

-- ----------------------------
-- Table structure for hd_upload
-- ----------------------------
DROP TABLE IF EXISTS `hd_upload`;
CREATE TABLE `hd_upload` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `filename` varchar(100) NOT NULL DEFAULT '' COMMENT '文件名',
  `basename` varchar(100) NOT NULL DEFAULT '',
  `path` char(200) NOT NULL DEFAULT '' COMMENT '文件路径 ',
  `ext` varchar(45) NOT NULL DEFAULT '' COMMENT '扩展名',
  `image` tinyint(1) NOT NULL DEFAULT '1' COMMENT '图片',
  `size` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `uptime` int(10) NOT NULL DEFAULT '0' COMMENT '上传时间',
  `state` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否使用 1 使用 0 未使用',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户uid',
  PRIMARY KEY (`id`),
  KEY `basename` (`basename`),
  KEY `id` (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='上传文件';

-- ----------------------------
-- Records of hd_upload
-- ----------------------------
INSERT INTO `hd_upload` VALUES ('1', '47251395852460', '47251395852460.jpg', 'upload/content/2014/03/27/47251395852460.jpg', 'jpg', '1', '165538', '1395852461', '1', '1');
INSERT INTO `hd_upload` VALUES ('2', '94081395852466', '94081395852466.jpg', 'upload/content/2014/03/27/94081395852466.jpg', 'jpg', '1', '165538', '1395852466', '1', '1');
INSERT INTO `hd_upload` VALUES ('3', '45591395853239', '45591395853239.jpg', 'upload/Content/2014/03/27/45591395853239.jpg', 'jpg', '1', '94750', '1395853239', '1', '1');
INSERT INTO `hd_upload` VALUES ('4', '31701395895195', '31701395895195.jpg', 'upload/content/2014/03/27/31701395895195.jpg', 'jpg', '1', '165538', '1395895195', '1', '1');
INSERT INTO `hd_upload` VALUES ('5', '23371395895797', '23371395895797.jpg', 'upload/content/2014/03/27/23371395895797.jpg', 'jpg', '1', '165538', '1395895798', '1', '1');
INSERT INTO `hd_upload` VALUES ('6', '31395895818', '31395895818.jpg', 'upload/content/2014/03/27/31395895818.jpg', 'jpg', '1', '165538', '1395895818', '1', '1');
INSERT INTO `hd_upload` VALUES ('7', '83521395895843', '83521395895843.jpg', 'upload/content/2014/03/27/83521395895843.jpg', 'jpg', '1', '165538', '1395895843', '1', '1');
INSERT INTO `hd_upload` VALUES ('8', '20211395895962', '20211395895962.jpg', 'upload/content/2014/03/27/20211395895962.jpg', 'jpg', '1', '165538', '1395895963', '1', '1');
INSERT INTO `hd_upload` VALUES ('9', '80741395895989', '80741395895989.jpg', 'upload/content/2014/03/27/80741395895989.jpg', 'jpg', '1', '165538', '1395895989', '1', '1');
INSERT INTO `hd_upload` VALUES ('10', '97051395896136', '97051395896136.jpg', 'upload/content/2014/03/27/97051395896136.jpg', 'jpg', '1', '165538', '1395896137', '1', '1');
INSERT INTO `hd_upload` VALUES ('11', '99971395926569', '99971395926569.jpg', 'upload/content/2014/03/27/99971395926569.jpg', 'jpg', '1', '165538', '1395926569', '1', '1');
INSERT INTO `hd_upload` VALUES ('12', '46821395926649', '46821395926649.jpg', 'upload/Content/2014/03/27/46821395926649.jpg', 'jpg', '1', '139192', '1395926649', '1', '1');
INSERT INTO `hd_upload` VALUES ('13', '21651395926650', '21651395926650.jpg', 'upload/Content/2014/03/27/21651395926650.jpg', 'jpg', '1', '139192', '1395926650', '1', '1');
INSERT INTO `hd_upload` VALUES ('14', '10781395934228', '10781395934228.zip', 'upload/content/2014/03/27/10781395934228.zip', 'zip', '0', '165362', '1395934228', '0', '1');
INSERT INTO `hd_upload` VALUES ('15', '7421395935153', '7421395935153.zip', 'upload/content/2014/03/27/7421395935153.zip', 'zip', '0', '165362', '1395935153', '0', '1');
INSERT INTO `hd_upload` VALUES ('16', '89851395935175', '89851395935175.zip', 'upload/content/2014/03/27/89851395935175.zip', 'zip', '0', '165362', '1395935175', '0', '1');
INSERT INTO `hd_upload` VALUES ('17', '86961395935441', '86961395935441.jpg', 'upload/content/2014/03/27/86961395935441.jpg', 'jpg', '1', '165538', '1395935442', '0', '1');
INSERT INTO `hd_upload` VALUES ('18', '80901395935616', '80901395935616.jpg', 'upload/content/2014/03/27/80901395935616.jpg', 'jpg', '1', '165538', '1395935616', '0', '1');
INSERT INTO `hd_upload` VALUES ('19', '59411395935718', '59411395935718.jpg', 'upload/content/2014/03/27/59411395935718.jpg', 'jpg', '1', '165538', '1395935719', '0', '1');
INSERT INTO `hd_upload` VALUES ('20', '56551395935842', '56551395935842.jpg', 'upload/content/2014/03/27/56551395935842.jpg', 'jpg', '1', '165538', '1395935842', '0', '1');
INSERT INTO `hd_upload` VALUES ('21', '34741395935867', '34741395935867.jpg', 'upload/content/2014/03/27/34741395935867.jpg', 'jpg', '1', '165538', '1395935868', '0', '1');
INSERT INTO `hd_upload` VALUES ('22', '511395935957', '511395935957.jpg', 'upload/content/2014/03/27/511395935957.jpg', 'jpg', '1', '22071', '1395935957', '0', '1');
INSERT INTO `hd_upload` VALUES ('23', '37641395936361', '37641395936361.png', 'upload/content/2014/03/28/37641395936361.png', 'png', '1', '26618', '1395936361', '0', '1');
INSERT INTO `hd_upload` VALUES ('24', '951395936414', '951395936414.jpg', 'upload/content/2014/03/28/951395936414.jpg', 'jpg', '1', '165538', '1395936414', '0', '1');
INSERT INTO `hd_upload` VALUES ('25', '37561395936758', '37561395936758.jpg', 'upload/content/2014/03/28/37561395936758.jpg', 'jpg', '1', '165538', '1395936759', '0', '1');
INSERT INTO `hd_upload` VALUES ('26', '6741395936874', '6741395936874.jpg', 'upload/content/2014/03/28/6741395936874.jpg', 'jpg', '1', '165538', '1395936875', '0', '1');
INSERT INTO `hd_upload` VALUES ('27', '82861395936981', '82861395936981.zip', 'upload/content/2014/03/28/82861395936981.zip', 'zip', '0', '165362', '1395936981', '0', '1');
INSERT INTO `hd_upload` VALUES ('28', '49641395937105', '49641395937105.jpg', 'upload/content/2014/03/28/49641395937105.jpg', 'jpg', '1', '165538', '1395937106', '0', '1');
INSERT INTO `hd_upload` VALUES ('29', '48791395937293', '48791395937293.jpg', 'upload/content/2014/03/28/48791395937293.jpg', 'jpg', '1', '165538', '1395937293', '0', '1');
INSERT INTO `hd_upload` VALUES ('30', '75521395937509', '75521395937509.jpg', 'upload/content/2014/03/28/75521395937509.jpg', 'jpg', '1', '165538', '1395937510', '0', '1');
INSERT INTO `hd_upload` VALUES ('31', '37871395937664', '37871395937664.zip', 'upload/content/2014/03/28/37871395937664.zip', 'zip', '0', '165362', '1395937664', '0', '1');
INSERT INTO `hd_upload` VALUES ('32', '96561395937797', '96561395937797.zip', 'upload/content/2014/03/28/96561395937797.zip', 'zip', '0', '165362', '1395937797', '0', '1');
INSERT INTO `hd_upload` VALUES ('33', '34631395937838', '34631395937838.zip', 'upload/content/2014/03/28/34631395937838.zip', 'zip', '0', '165362', '1395937838', '0', '1');
INSERT INTO `hd_upload` VALUES ('34', '32971395937880', '32971395937880.zip', 'upload/content/2014/03/28/32971395937880.zip', 'zip', '0', '165362', '1395937880', '0', '1');
INSERT INTO `hd_upload` VALUES ('35', '10461395937922', '10461395937922.zip', 'upload/content/2014/03/28/10461395937922.zip', 'zip', '0', '165362', '1395937922', '0', '1');
INSERT INTO `hd_upload` VALUES ('36', '1381395938584', '1381395938584.zip', 'upload/content/2014/03/28/1381395938584.zip', 'zip', '0', '165362', '1395938584', '0', '1');

-- ----------------------------
-- Table structure for hd_user
-- ----------------------------
DROP TABLE IF EXISTS `hd_user`;
CREATE TABLE `hd_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` char(30) NOT NULL DEFAULT '' COMMENT '昵称',
  `username` char(30) NOT NULL DEFAULT '',
  `password` char(40) NOT NULL DEFAULT '',
  `code` char(20) NOT NULL DEFAULT '' COMMENT '校验码',
  `email` char(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  `regtime` int(11) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `regip` char(255) NOT NULL DEFAULT '' COMMENT '注册IP',
  `lastip` char(15) NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1  正常  2 锁定',
  `qq` char(20) NOT NULL DEFAULT '' COMMENT 'qq号码',
  `sex` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 男 2 女 3 保密',
  `favicon` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `credits` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '积分',
  `rid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  `allow_user_set_credits` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '允许前台会员设置投稿积分',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  KEY `password` (`password`),
  KEY `credits` (`credits`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_user
-- ----------------------------
INSERT INTO `hd_user` VALUES ('1', '后盾网', 'admin', '67a52a373a64b0a4ce05d47150b85ce2', '861bfc56d5', 'houdunwangxj@gmail.com', '0', '1395926341', '', '0.0.0.0', '1', '', '1', '', '10008', '1', '1');
INSERT INTO `hd_user` VALUES ('25', '李四', 'lisi', 'eef592a724549ee2c9d0e4337c07cd9d', '07041b46e0', 'a@qq.com', '0', '1395066799', '', '0.0.0.0', '1', '', '1', '', '100', '1', '1');
INSERT INTO `hd_user` VALUES ('85', '向军', 'houdunwang', '72c8e536d1e2db29db9f46c44ab8933a', '848c619651', 'houdunwang@gmail.com', '1395668246', '1395760521', '0.0.0.0', '0.0.0.0', '1', '', '1', '', '100', '4', '1');

-- ----------------------------
-- Table structure for hd_user_icon
-- ----------------------------
DROP TABLE IF EXISTS `hd_user_icon`;
CREATE TABLE `hd_user_icon` (
  `user_uid` int(11) NOT NULL DEFAULT '0',
  `icon50` varchar(255) NOT NULL DEFAULT '',
  `icon100` varchar(255) NOT NULL DEFAULT '',
  `icon150` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='用户头像';

-- ----------------------------
-- Records of hd_user_icon
-- ----------------------------
