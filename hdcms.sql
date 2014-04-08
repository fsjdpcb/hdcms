/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50535
Source Host           : localhost:3306
Source Database       : hdcms

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2014-04-09 01:01:42
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_bug
-- ----------------------------
INSERT INTO `hd_bug` VALUES ('1', 'sdf', '1396976462', '23000sdffds71698@qq.com', 'dsdfdsfdsffffffffffffffffffffff', '感谢您的反馈，你的问题已经处理!', '功能建议', '未审核');

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
  `index_tpl` varchar(200) NOT NULL DEFAULT '' COMMENT '封面模板',
  `list_tpl` varchar(200) NOT NULL DEFAULT '' COMMENT '列表页模板',
  `arc_tpl` varchar(200) NOT NULL DEFAULT '' COMMENT '内容页模板',
  `single_tpl` varchar(200) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
-- Records of hd_category
-- ----------------------------
INSERT INTO `hd_category` VALUES ('8', '0', 'PHP', 'PHP', '', '', 'article_index.html', 'article_list.html', 'article_default.html', null, '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '110', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `hd_category` VALUES ('7', '0', '前端', 'qianduan', '', '', 'article_index.html', 'article_list.html', 'article_default.html', null, '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '100', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `hd_category` VALUES ('6', '0', '汽车', 'qiche', '', '', 'article_index.html', 'article_list.html', 'article_default.html', 'single_default.html', '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '100', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `hd_category` VALUES ('9', '0', '服务器', 'fuwuqi', '', '', 'article_index.html', 'article_list.html', 'article_default.html', null, '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '120', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `hd_category` VALUES ('10', '0', '实战培训', 'shizhanpeixun', '', '', 'article_index.html', 'article_list.html', 'article_default.html', null, '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '3', '2', '2', 'http://www.houdunwang.com', '1000', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `hd_category` VALUES ('11', '0', '公告', 'gonggao', '', '', 'article_index.html', 'article_list.html', 'article_default.html', null, '{catdir}/list_{cid}_{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', '1', '1', '2', '2', '', '100', '0', '', '', '1', '0', '1', '1', '1');

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

-- ----------------------------
-- Table structure for hd_comment
-- ----------------------------
DROP TABLE IF EXISTS `hd_comment`;
CREATE TABLE `hd_comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论mid',
  `mid` smallint(5) unsigned NOT NULL,
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目id\n1 基本配置\n2 ',
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章aid',
  `content` text NOT NULL COMMENT '评论内容',
  `uid` int(11) NOT NULL COMMENT '用户名',
  `comment_state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示 1 显示  0 不显示',
  `pubtime` int(11) NOT NULL DEFAULT '0' COMMENT '发表时间',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父级id',
  `reply_comment_id` int(11) NOT NULL DEFAULT '0' COMMENT '回复的最顶层评论comment_id',
  PRIMARY KEY (`comment_id`),
  KEY `reply_comment_id` (`reply_comment_id`),
  KEY `cid_aid_state` (`aid`,`cid`,`comment_state`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_comment
-- ----------------------------
INSERT INTO `hd_comment` VALUES ('32', '1', '6', '8', '排气布局该车依旧采用双边共两出的设计', '98', '1', '1396975854', '0', '0');
INSERT INTO `hd_comment` VALUES ('33', '1', '6', '36', '要被打包成ZIP或RAR压缩文件后才能上传', '98', '1', '1396976244', '0', '0');
INSERT INTO `hd_comment` VALUES ('34', '1', '6', '37', '要被打包成ZIP或RAR压缩文件后才能上传', '98', '1', '1396976253', '0', '0');
INSERT INTO `hd_comment` VALUES ('35', '1', '6', '9', '要被打包成ZIP或RAR压缩文件后才能上传', '98', '1', '1396976262', '0', '0');
INSERT INTO `hd_comment` VALUES ('36', '1', '6', '9', '要被打包成ZIP或RAR压缩文件后才能上传sd', '98', '1', '1396976273', '35', '35');
INSERT INTO `hd_comment` VALUES ('37', '1', '6', '9', '1212121212', '98', '1', '1396976288', '36', '35');
INSERT INTO `hd_comment` VALUES ('38', '1', '6', '9', 'sdfsdffsdfdsfdsfds', '98', '1', '1396976299', '37', '35');

-- ----------------------------
-- Table structure for hd_config
-- ----------------------------
DROP TABLE IF EXISTS `hd_config`;
CREATE TABLE `hd_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '' COMMENT '配置名称\n',
  `value` text NOT NULL COMMENT '配置值',
  `type` enum('站点配置','高级设置','上传配置','会员设置','邮箱配置','安全设置','水印设置','内容相关','性能优化','私有配置') NOT NULL DEFAULT '站点配置' COMMENT '配置类型\n1 站点配置\n2 性能设置\n3 上传配置\n4 交互设置\n5 会员设置',
  `title` char(30) NOT NULL DEFAULT '',
  `show_type` enum('文本','数字','布尔(1/0)','多行文本') DEFAULT '文本',
  `message` varchar(255) DEFAULT NULL COMMENT '提示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=165 DEFAULT CHARSET=utf8 COMMENT='系统配置';

-- ----------------------------
-- Records of hd_config
-- ----------------------------
INSERT INTO `hd_config` VALUES ('1', 'webname', 'HDPHP社区--中国最强PHP培训机构  《后盾网》 ', '站点配置', '网站名称', '文本', null);
INSERT INTO `hd_config` VALUES ('2', 'icp', '京ICP备12048441号-3', '站点配置', 'ICP备案号', '文本', null);
INSERT INTO `hd_config` VALUES ('3', 'html_path', 'html', '站点配置', '静态html目录', '文本', null);
INSERT INTO `hd_config` VALUES ('4', 'copyright', 'Copyright © 2012-2013 HDCMS 后盾网 版权所有', '站点配置', '网站版权信息', '文本', null);
INSERT INTO `hd_config` VALUES ('5', 'keywords', 'php培训,php实训,后盾网', '站点配置', '网站关键词', '文本', null);
INSERT INTO `hd_config` VALUES ('6', 'description', '后盾网顶尖PHP培训 内容全面 全程实战!业内顶级讲师亲自授课,千余课时独家视频教程免费下载,超百G原创视频资源,实力不容造假!010-64825057', '站点配置', '网站描述', '多行文本', null);
INSERT INTO `hd_config` VALUES ('152', 'email', 'houdunwangxj@gmail.com', '站点配置', '管理员邮箱', '文本', null);
INSERT INTO `hd_config` VALUES ('9', 'backup_dir', 'backup', '高级设置', '数据备份目录', '文本', null);
INSERT INTO `hd_config` VALUES ('10', 'web_open', '1', '站点配置', '网站开启', '布尔(1/0)', null);
INSERT INTO `hd_config` VALUES ('15', 'auth_key', 'houdunwang.com', '安全设置', 'cookie加密KEY', '文本', null);
INSERT INTO `hd_config` VALUES ('16', 'upload_path', 'upload', '上传配置', '上传目录', '文本', null);
INSERT INTO `hd_config` VALUES ('17', 'upload_img_path', 'img', '上传配置', '上传图片目录', '文本', null);
INSERT INTO `hd_config` VALUES ('18', 'allow_type', 'jpg,jpeg,png,bmp,gif', '上传配置', '允许上传文件类型', '文本', null);
INSERT INTO `hd_config` VALUES ('19', 'allow_size', '2048000', '上传配置', '允许上传大小（字节）', '数字', null);
INSERT INTO `hd_config` VALUES ('20', 'water_on', '0', '水印设置', '上传文件加水印', '布尔(1/0)', null);
INSERT INTO `hd_config` VALUES ('115', 'member_verify', '0', '会员设置', '会员注册是否需要审核', '布尔(1/0)', null);
INSERT INTO `hd_config` VALUES ('116', 'reg_show_code', '1', '会员设置', '会员注册是否显示验证码', '布尔(1/0)', null);
INSERT INTO `hd_config` VALUES ('119', 'reg_email', '1', '会员设置', '注册成功是否发邮件', '布尔(1/0)', null);
INSERT INTO `hd_config` VALUES ('120', 'reg_interval', '0', '会员设置', '2次注册间隔间间', '数字', null);
INSERT INTO `hd_config` VALUES ('121', 'default_member_group', '4', '会员设置', '新注册会员初始组', '数字', null);
INSERT INTO `hd_config` VALUES ('159', 'cache_index', '', '站点配置', '', '文本', null);
INSERT INTO `hd_config` VALUES ('123', 'token_on', '0', '安全设置', '表单使用令牌验证', '布尔(1/0)', null);
INSERT INTO `hd_config` VALUES ('124', 'log_key', 'houdunwang.com', '安全设置', '日志文件加密KEY', '文本', null);
INSERT INTO `hd_config` VALUES ('125', 'session_name', 'hdsid', '安全设置', 'SESSION_NAME值', '文本', null);
INSERT INTO `hd_config` VALUES ('126', 'super_admin_key', 'SUPER_ADMIN', '安全设置', '站长令牌名称', '文本', null);
INSERT INTO `hd_config` VALUES ('127', 'tel', '010-64825057', '站点配置', '联系电话', '文本', null);
INSERT INTO `hd_config` VALUES ('128', 'water_text', 'houdunwang.com', '水印设置', '水印文字', '文本', null);
INSERT INTO `hd_config` VALUES ('129', 'water_text_size', '16', '水印设置', '文字大小', '数字', null);
INSERT INTO `hd_config` VALUES ('130', 'water_img', 'data/water/water.png', '水印设置', '水印图像', '文本', null);
INSERT INTO `hd_config` VALUES ('131', 'water_pct', '0', '水印设置', '水印图片透明度', '数字', null);
INSERT INTO `hd_config` VALUES ('132', 'water_quality', '90', '水印设置', '图片压缩比', '数字', null);
INSERT INTO `hd_config` VALUES ('133', 'water_pos', '9', '水印设置', '水印位置', '数字', null);
INSERT INTO `hd_config` VALUES ('134', 'del_content_model', '1', '高级设置', '删除文章先放入回收站', '布尔(1/0)', null);
INSERT INTO `hd_config` VALUES ('136', 'down_remove_pic_size', '500', '高级设置', '下载远程资源允许最大值', '数字', null);
INSERT INTO `hd_config` VALUES ('137', 'comment_state', '1', '会员设置', '评论不需要审核，直接显示', '布尔(1/0)', null);
INSERT INTO `hd_config` VALUES ('138', 'favicon_width', '180', '会员设置', '会员头像宽度', '数字', null);
INSERT INTO `hd_config` VALUES ('139', 'favicon_height', '180', '会员设置', '会员头像高度', '数字', null);
INSERT INTO `hd_config` VALUES ('160', 'cache_index', '-1', '站点配置', '', '文本', null);
INSERT INTO `hd_config` VALUES ('142', 'down_remote_pic', '0', '内容相关', '下载远程图片', '布尔(1/0)', null);
INSERT INTO `hd_config` VALUES ('143', 'auto_desc', '1', '内容相关', '截取内容为摘要', '布尔(1/0)', null);
INSERT INTO `hd_config` VALUES ('144', 'auto_thumb', '0', '内容相关', '提取内容图片为缩略图', '布尔(1/0)', null);
INSERT INTO `hd_config` VALUES ('145', 'upload_img_max_width', '600', '内容相关', '上传图片宽度超过此值，进行缩放', '数字', null);
INSERT INTO `hd_config` VALUES ('146', 'upload_img_max_height', '600', '内容相关', '上传图片高度超过此值，进行缩放', '数字', null);
INSERT INTO `hd_config` VALUES ('147', 'member_content_status', '0', '会员设置', '会员发表文章需要审核', '布尔(1/0)', null);
INSERT INTO `hd_config` VALUES ('149', 'member_open', '1', '会员设置', '开启会员中心', '布尔(1/0)', null);
INSERT INTO `hd_config` VALUES ('150', 'web_close_message', '网站暂时关闭，请稍候访问', '站点配置', '网站关闭提示信息', '文本', null);
INSERT INTO `hd_config` VALUES ('151', 'web_style', 'default', '私有配置', '网站模板', '文本', null);
INSERT INTO `hd_config` VALUES ('155', 'qq', '1455067020', '站点配置', 'QQ号', '文本', null);
INSERT INTO `hd_config` VALUES ('154', 'weibo', 'houdunwangxj@gmail.com', '站点配置', '新浪微博', '文本', null);
INSERT INTO `hd_config` VALUES ('156', 'tweibo', 'houdunwang@gmail.com', '站点配置', '腾讯微博', '文本', null);
INSERT INTO `hd_config` VALUES ('157', 'email', 'houdunwangxj@gmail.com', '站点配置', '企业邮箱', '文本', null);
INSERT INTO `hd_config` VALUES ('158', 'init_credits', '100', '会员设置', '初始积分', '文本', null);
INSERT INTO `hd_config` VALUES ('161', 'cache_index', '-1', '性能优化', '首页缓存时间', '文本', '（单位：秒，-1不缓存 0永久缓存)');
INSERT INTO `hd_config` VALUES ('162', 'cache_category', '-1', '性能优化', '栏目缓存时间', '文本', '（单位：秒，-1不缓存 0永久缓存)');
INSERT INTO `hd_config` VALUES ('163', 'cache_content', '-1', '性能优化', '文章缓存时间', '文本', '（单位：秒，-1不缓存 0永久缓存)');
INSERT INTO `hd_config` VALUES ('164', 'comment_step_time', '10', '会员设置', '评论间隔时间', '文本', '必须大于1（单位秒)');

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
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of hd_content
-- ----------------------------
INSERT INTO `hd_content` VALUES ('7', '6', '排气布局该车依旧采用双边共两出的设计。  大众大众(进口)途锐2014款 4.2L V8', '推荐,图片,幻灯片,站长推荐', '0', '', 'upload/Content/2014/04/01/34801396358793.jpg', '100', '', '', '', '1', '1396358793', '1396315581', '', '', '3', '100', '1', '双边,两出,设计,采用,依旧,布局,该车,排气', '排气布局该车依旧采用双边共两出的设计。', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('6', '6', '这时我才知道，它是如此的招人喜欢！  奔驰奔驰(进口)奔驰CLA级2013款 CLA250', '置顶,推荐,图片,站长推荐', '0', '', 'upload/Content/2014/04/01/32141396358730.jpg', '100', '', '', '', '1', '1396358726', '1396315497', '', '', '3', '100', '1', '招人,喜欢,如此,它是,我才,知道,这时', '这时我才知道，它是如此的招人喜欢！', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('8', '6', '过最大扭矩没有优势，而且最大扭矩的输出转速也来得较晚。  奔腾一汽奔腾奔腾B902014款 1.8T 自动旗舰型', '热门,置顶,图片', '0', '', 'upload/Content/2014/04/01/20541396358832.jpg', '100', '', '', '', '1', '1396358832', '1396315604', '', '', '3', '100', '1', '最大,扭矩,来得,较晚,转速,而且,没有,优势,输出', '过最大扭矩没有优势，而且最大扭矩的输出转速也来得较晚。', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('9', '6', '福特野马Cobra改装案例  汽车之家', '图片', '0', '', 'upload/Content/2014/04/01/43511396358873.jpg', '100', '', '', '', '1', '1396358873', '1396315666', '', '', '3', '100', '1', '案例,改装,Cobra,野马,福特', '福特野马Cobra改装案例', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('10', '6', '告诉你，这是真实存在的一辆直线加速赛车。  汽车之家', '图片', '0', '', 'upload/Content/2014/04/01/74301396358893.jpg', '100', '', '', '', '1', '1396358893', '1396315683', '', '', '3', '100', '1', '直线,加速,赛车,一辆,在的,是真,实存,告诉', '告诉你，这是真实存在的一辆直线加速赛车。', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('12', '6', '转速表，2500以上有点吵，但是牧马人在120KM\\H 是转速也在2千以下。', '', '0', '', '', '100', '', '', '', '1', '1396364344', '1396321101', '', '', '3', '100', '1', 'A6,瑞风', '瑞风A6：', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('13', '6', '的确可以营造出一种其他品牌难以相比的视觉冲击。 运动视觉系 试驾全新马自达3昂克赛拉', '图片', '0', '', 'upload/Content/2014/04/02/66771396411204.jpg', '100', '', '', '', '1', '1396411192', '1396411184', '', '', '3', '100', '1', '难以,比的,视觉,冲击,品牌,其他,可以,造出,一种', '的确可以营造出一种其他品牌难以相比的视觉冲击。', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('15', '11', 'HDPHP官网改版上线', '', '0', '', '', '100', '', '', '', '1', '1396450033', '1396406626', '', '', '3', '100', '1', 'HDPHPCOM,网站,HDCMS,改版,系统,一个,得到,一模一样,不错', 'HDPHP.COM改版上线了此次HDPHP官网改版完全基于HDCMS系统大家可以下载HDCMS系统就会得到一个和HDPHP.COM网站一模一样的网站，听起来是不是觉得不错:(', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('16', '6', '王八蛋', '', '0', '', '', '0', '', '', '', '1', '1396786972', '1396786972', '', '', '3', '100', '1', '', '', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('17', '6', '王八蛋', '', '0', '', '', '0', '', '', '', '1', '1396786976', '1396786976', '', '', '3', '100', '1', '', '', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('18', '6', '王八蛋', '', '0', '', '', '0', '', '', '', '1', '1396786981', '1396786981', '', '', '3', '100', '1', '', '', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('19', '6', '王八蛋', '', '0', '', '', '0', '', '', '', '1', '1396786988', '1396786988', '', '', '3', '100', '1', '', '', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('20', '6', '王八蛋', '', '0', '', '', '0', '', '', '', '1', '1396786993', '1396786993', '', '', '3', '100', '1', '', '', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('21', '6', '王八蛋', '', '0', '', '', '0', '', '', '', '1', '1396786994', '1396786994', '', '', '3', '100', '1', '', '', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('22', '6', '王八蛋', '', '0', '', '', '0', '', '', '', '1', '1396786995', '1396786995', '', '', '3', '100', '1', '', '', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('23', '6', '王八蛋', '', '0', '', '', '0', '', '', '', '1', '1396786996', '1396786996', '', '', '3', '100', '1', '', '', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('24', '6', '王八蛋', '', '0', '', '', '0', '', '', '', '1', '1396786997', '1396786997', '', '', '3', '100', '1', '', '', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('25', '6', '王八蛋', '', '0', '', '', '0', '', '', '', '1', '1396787008', '1396787008', '', '', '3', '100', '1', '', '', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('26', '6', 'dsfsdf', '图片', '0', '', 'upload/content/2014/04/06/35141396794878.jpg', '0', '', '', '', '1', '1396794888', '1396794888', '', '', '3', '100', '1', 'sdfsdfsd', 'sdfsdfsd', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('27', '6', 'dsfsdf', '图片', '0', '', 'upload/content/2014/04/06/35141396794878.jpg', '0', '', '', '', '1', '1396795063', '1396795063', '', '', '3', '100', '1', 'sdfsdfsd', 'sdfsdfsd', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('28', '6', 'sdfsdfsdf', '图片', '0', '', 'upload/content/2014/04/06/15811396795201.jpg', '0', '', '', '', '1', '1396795597', '1396795597', '', '', '3', '100', '1', 'sdfsdfsdfsdf', 'sdfsdfsdfsdf', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('29', '6', '我也不知道你在说什么', '图片', '0', '', 'upload/content/2014/04/06/33761396795985.png', '0', '', '', '', '1', '1396795999', '1396795999', '', '', '3', '100', '1', '什么,在说,不知道,我也', '我也不知道你在说什么', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('30', '6', '内容是什么呀', '', '0', '', '', '0', '', '', '', '1', '1396801479', '1396801479', '', '', '3', '100', '1', '是什么,内容', '内容是什么呀', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('31', '6', 'sfsfssfdsfddfdfs', '', '0', '', '', '0', '', '', '', '1', '1396801673', '1396801673', '', '', '3', '100', '1', '', '', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('32', '6', 'sfsfssfdsfddfdfs', '', '0', '', '', '0', '', '', '', '1', '1396801688', '1396801688', '', '', '3', '100', '1', '', '', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('33', '6', 'rrrrrrrrrrrrrrrrrrrrrr', '', '0', '', '', '0', '', '', '', '1', '1396801711', '1396801711', '', '', '3', '100', '1', '', '', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('34', '6', 'rrrrrrrrrrrrrrrrrrrrrr', '', '0', '', '', '0', '', '', '', '1', '1396801741', '1396801741', '', '', '3', '100', '1', '', '', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('35', '6', 'rrrrrrrrrrrrrrrrrrrrrr', '', '0', '', '', '0', '', '', '', '1', '1396801778', '1396801778', '', '', '3', '100', '1', '', '', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('36', '6', '附件需要被打包成ZIP或RAR压缩文件后才能上传', '', '0', '', '', '0', '', '', '', '1', '1396801834', '1396801834', '', '', '3', '100', '1', '压缩,文件,才能,上传,RAR,ZIP,需要,被打,包成', '附件需要被打包成ZIP或RAR压缩文件后才能上传 ', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('37', '6', '附件需要被打包成ZIP或RAR压缩文件后才能上传', '', '0', '', '', '0', '', '', '', '1', '1396801866', '1396801866', '', '', '3', '100', '1', '压缩,文件,才能,上传,RAR,ZIP,需要,被打,包成', '附件需要被打包成ZIP或RAR压缩文件后才能上传 ', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('38', '6', '签是可选项，多个标签使用空格分隔', '', '0', '', '', '0', '', '', '', '1', '1396802058', '1396802058', '', '', '3', '100', '1', '空格,分隔,使用,标签,多个,可选项', '签是可选项，多个标签使用空格分隔 ', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('39', '6', '签是可选项，多个标签使用空格分隔', '', '0', '', '', '0', '', '', '', '1', '1396802077', '1396802077', '', '', '3', '100', '1', '空格,分隔,使用,标签,多个,可选项', '签是可选项，多个标签使用空格分隔 ', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('40', '6', '签是可选项，多个标签使用空格分隔', '', '0', '', '', '0', '', '', '', '1', '1396802111', '1396802111', '', '', '3', '100', '1', '空格,分隔,使用,标签,多个,可选项', '签是可选项，多个标签使用空格分隔 ', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('41', '6', '签是可选项，多个标签使用空格分隔', '', '0', '', '', '0', '', '', '', '1', '1396802161', '1396802161', '', '', '3', '100', '1', '空格,分隔,使用,标签,多个,可选项', '签是可选项，多个标签使用空格分隔 ', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('42', '6', '向军向军', '', '0', '', '', '0', '', '', '', '1', '1396802227', '1396806237', '', '', '3', '100', '1', '', '向军向军', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('43', '6', 'sdffsd', '', '0', '', 'upload/content/2014/04/07/44651396803482.png', '0', '', '', '', '1', '1396803493', '1396803595', '', '', '3', '100', '1', 'fdsfdsdfs', 'fdsfdsdfs', '86', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('44', '6', '提交代码前，请检查标题和内容是否已经填写', '', '0', '', '', '0', '', '', '', '1', '1396804437', '1396804437', '', '', '3', '100', '1', '是否,已经,填写,内容,标题,代码,检查,提交', '提交代码前，请检查标题和内容是否已经填写', '86', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('45', '6', '提交代码前，请检查标题和内容是否已经填写', '图片', '0', '', 'upload/content/2014/04/07/42291396804551.jpg', '0', '', '', '', '1', '1396804556', '1396804556', '', '', '3', '100', '1', '是否,已经,填写,内容,标题,代码,检查,提交', '提交代码前，请检查标题和内容是否已经填写', '86', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('46', '6', '提交代码前，请检查标题和内容是否已经填写', '图片', '0', '', 'upload/content/2014/04/07/53381396804633.jpg', '0', '', '', '', '1', '1396804638', '1396804638', '', '', '3', '100', '1', '', '', '86', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('47', '6', '认提交代码前，12125555', '图片', '0', '', 'upload/content/2014/04/07/77801396805956.png', '0', '', '', '', '1', '1396804712', '1396805961', '', '', '3', '100', '1', '', 'v', '86', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('48', '6', 'sdfdsfds', '', '0', '', 'upload/content/2014/04/07/73731396805289.jpg', '0', '', '', '', '1', '1396805298', '1396805321', '', '', '3', '100', '1', 'sffs', 'sffs', '86', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('49', '6', '9999999999999999999999999999999999', '图片', '0', '', 'upload/content/2014/04/07/2411396806674.jpg', '0', '', '', '', '1', '1396806275', '1396806678', '', '', '3', '100', '1', '', '', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('50', '6', '附件需要被打包成ZIP或RAR压缩文件后才能上传1212', '', '0', '', 'upload/content/2014/04/07/12801396806768.jpg', '0', '', '', '', '1', '1396806779', '1396962451', '', '', '3', '100', '1', '附件需要被打包成ZIP或RAR压缩文件后才能上传', '附件需要被打包成ZIP或RAR压缩文件后才能上传', '1', '0', '0', '0');
INSERT INTO `hd_content` VALUES ('52', '6', '压顶地枯枯枯', '', '0', '', 'upload/content/2014/04/07/84621396846676.png', '0', '', '', '', '1', '1396846680', '1396846680', '', '', '3', '100', '1', '23', '枯枯厅标有 要要枯枯枯枯', '1', '0', '0', '0');

-- ----------------------------
-- Table structure for hd_content_data
-- ----------------------------
DROP TABLE IF EXISTS `hd_content_data`;
CREATE TABLE `hd_content_data` (
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章主表ID',
  `content` text COMMENT '正文',
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_content_data
-- ----------------------------
INSERT INTO `hd_content_data` VALUES ('6', '<p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: 宋体, arial, tahoma, sans-serif; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);\">这时我才知道，它是如此的招人喜欢！</p><p><a href=\"http://www.autohome.com.cn/img/?img=newspic/2014/3/19/0_1_2014031910321804954.jpg\" target=\"_blank\" style=\"color: rgb(59, 89, 152); outline: 0px; text-decoration: none; font-family: 宋体, arial, tahoma, sans-serif; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"></a></p><p style=\"text-align:center;margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: 宋体, arial, tahoma, sans-serif; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://car.autohome.com.cn/photo/14597/14/2367137.html\" target=\"_blank\" style=\"color: rgb(59, 89, 152); outline: 0px; text-decoration: none;\"><img title=\"奔驰奔驰(进口)奔驰CLA级2013款 CLA250\" alt=\"奔驰奔驰(进口)奔驰CLA级2013款 CLA250\" width=\"620\" height=\"414\" original=\"http://localhost/hdcms/upload/Content/2014/04/01/12271396358731.jpg\" src=\"http://localhost/hdcms/upload/Content/2014/04/01/12271396358731.jpg\" style=\"vertical-align: top; background-image: url(http://x.autoimg.cn/news/show20/1210/default_bg.png); display: inline-block; border: 0px !important; background-position: 50% 50%; background-repeat: no-repeat no-repeat;\"/></a></p><p><br/></p>');
INSERT INTO `hd_content_data` VALUES ('7', '<p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: 宋体, arial, tahoma, sans-serif; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);\">排气布局该车依旧采用双边共两出的设计。</p><p style=\"text-align:center;margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: 宋体, arial, tahoma, sans-serif; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://car.autohome.com.cn/photo/17495/10/2193465.html\" target=\"_blank\" style=\"color: rgb(59, 89, 152); outline: 0px; text-decoration: none;\"><img title=\"大众大众(进口)途锐2014款 4.2L V8\" alt=\"大众大众(进口)途锐2014款 4.2L V8\" width=\"620\" height=\"465\" original=\"http://localhost/hdcms/upload/Content/2014/04/01/39831396358794.jpg\" src=\"http://localhost/hdcms/upload/Content/2014/04/01/39831396358794.jpg\" style=\"vertical-align: top; background-image: url(http://x.autoimg.cn/news/show20/1210/default_bg.png); display: inline-block; border: 0px !important; background-position: 50% 50%; background-repeat: no-repeat no-repeat;\"/></a></p><p><br/></p>');
INSERT INTO `hd_content_data` VALUES ('8', '<p style=\"text-align:left;margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: 宋体, arial, tahoma, sans-serif; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);\">过最大<a class=\"blackclink\" href=\"http://car.autohome.com.cn/shuyu/detail_40_41_99.html\" target=\"_blank\" style=\"color: rgb(51, 51, 51); outline: 0px; text-decoration: none;\">扭矩</a>没有优势，而且最大<a class=\"blackclink\" href=\"http://car.autohome.com.cn/shuyu/detail_40_41_99.html\" target=\"_blank\" style=\"color: rgb(51, 51, 51); outline: 0px; text-decoration: none;\">扭矩</a>的输出转速也来得较晚。</p><p style=\"text-align:center;margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: 宋体, arial, tahoma, sans-serif; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://car.autohome.com.cn/photo/18666/14/2385023.html\" target=\"_blank\" style=\"color: rgb(59, 89, 152); outline: 0px; text-decoration: none;\"><img title=\"奔腾一汽奔腾奔腾B902014款 1.8T 自动旗舰型\" alt=\"奔腾一汽奔腾奔腾B902014款 1.8T 自动旗舰型\" width=\"620\" height=\"432\" original=\"http://localhost/hdcms/upload/Content/2014/04/01/85731396358833.jpg\" src=\"http://localhost/hdcms/upload/Content/2014/04/01/85731396358833.jpg\" style=\"vertical-align: top; background-image: url(http://x.autoimg.cn/news/show20/1210/default_bg.png); display: inline-block; border: 0px !important; background-position: 50% 50%; background-repeat: no-repeat no-repeat;\"/></a></p><p><br/></p>');
INSERT INTO `hd_content_data` VALUES ('9', '<p style=\"text-align:left;margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: 宋体, arial, tahoma, sans-serif; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong><a class=\"blackclink\" href=\"http://car.autohome.com.cn/price/brand-8.html\" target=\"_blank\" style=\"color: rgb(51, 51, 51); outline: 0px; text-decoration: none;\">福特</a><a class=\"blackclink\" href=\"http://www.autohome.com.cn/102/\" target=\"_blank\" style=\"color: rgb(51, 51, 51); outline: 0px; text-decoration: none;\">野马</a>Cobra改装案例</strong></p><p style=\"text-align:center;margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: 宋体, arial, tahoma, sans-serif; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.autohome.com.cn/dutu/750614.html#p=9\" target=\"_blank\" style=\"color: rgb(59, 89, 152); outline: 0px; text-decoration: none;\"><img alt=\"汽车之家\" width=\"620\" height=\"411\" original=\"http://www1.autoimg.cn/newspic/2014/3/21/620x0_1_2014032117103728182.jpg\" src=\"http://localhost/hdcms/upload/Content/2014/04/01/43551396358874.jpg\" id=\"image-05944100976921618\" style=\"vertical-align: top; background-image: url(http://x.autoimg.cn/news/show20/1210/default_bg.png); display: inline-block; border: 0px !important; background-position: 50% 50%; background-repeat: no-repeat no-repeat;\"/></a></p><p><br/></p>');
INSERT INTO `hd_content_data` VALUES ('10', '<p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: 宋体, arial, tahoma, sans-serif; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);\">告诉你，这是真实存在的一辆<a class=\"ShuKeyWordLink\" href=\"http://car.autohome.com.cn/shuyu/detail_32_35_906.html\" target=\"_blank\" style=\"color: rgb(51, 51, 51); outline: 0px; text-decoration: none; border-bottom-width: 1px; border-bottom-style: dotted; border-bottom-color: rgb(59, 89, 152);\">直线加速赛</a>车。</p><p style=\"text-align:center;margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: 宋体, arial, tahoma, sans-serif; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.autohome.com.cn/img/?img=newspic/2014/3/19/2014031918071569509.jpg\" target=\"_blank\" style=\"color: rgb(59, 89, 152); outline: 0px; text-decoration: none;\"><img width=\"620\" height=\"411\" alt=\"汽车之家\" src=\"http://localhost/hdcms/upload/Content/2014/04/01/98011396358893.jpg\" original=\"http://localhost/hdcms/upload/Content/2014/04/01/98011396358893.jpg\" style=\"vertical-align: top; background-image: url(http://x.autoimg.cn/news/show20/1210/default_bg.png); display: inline-block; border: 0px !important; background-position: 50% 50%; background-repeat: no-repeat no-repeat;\"/></a></p><p><br/></p>');
INSERT INTO `hd_content_data` VALUES ('12', '<p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: 宋体, arial, tahoma, sans-serif; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;<strong><a class=\"blackclink\" href=\"http://www.autohome.com.cn/3363/\" target=\"_blank\" style=\"color: rgb(51, 51, 51); outline: 0px; text-decoration: none;\">瑞风A6</a>：</strong></p><p style=\"text-align:center;margin-top: 15px; margin-bottom: 15px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: 宋体, arial, tahoma, sans-serif; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.autohome.com.cn/img/?img=newspic/2014/3/27/0_1_2014032713453761278.jpg\" target=\"_blank\" style=\"color: rgb(59, 89, 152); outline: 0px; text-decoration: none;\"><img alt=\"汽车之家\" src=\"http://localhost/hdcms/upload/Content/2014/04/01/34551396364345.jpg\" width=\"620\" height=\"465\" original=\"http://localhost/hdcms/upload/Content/2014/04/01/34551396364345.jpg\" style=\"vertical-align: top; background-image: url(http://x.autoimg.cn/news/show20/1210/default_bg.png); display: inline-block; border: 0px !important; background-position: 50% 50%; background-repeat: no-repeat no-repeat;\"/></a></p><p><br/></p>');
INSERT INTO `hd_content_data` VALUES ('13', '<p style=\"margin: 20px auto 0px; padding: 0px; font-size: 16px; overflow: hidden; line-height: 28px; font-family: simsun; color: rgb(51, 51, 51); white-space: normal;\">的确可以营造出一种其他品牌难以相比的视觉冲击。</p><p style=\"text-align:center;margin: 20px auto 0px; padding: 0px; font-size: 16px; overflow: hidden; line-height: 28px; font-family: simsun; color: rgb(51, 51, 51); white-space: normal;\"><a href=\"http://product.xgo.com.cn/product/3607684.html\" style=\"color: rgb(51, 51, 51); text-decoration: none;\"><img alt=\"运动视觉系 试驾全新马自达3昂克赛拉\" src=\"http://localhost/hdcms/upload/Content/2014/04/02/83301396411212.jpg\" style=\"border: 1px solid rgb(211, 222, 235); vertical-align: bottom;\"/></a></p><p><br/></p>');
INSERT INTO `hd_content_data` VALUES ('15', '<p style=\"text-align: left;\"><span style=\"font-size: 16px; line-height: 1em;\">此次HDPHP官网改版完全基于HDCMS系统。</span><br/></p><p style=\"text-align: left;\"><span style=\"font-size: 16px;\">告诉大家一个好消息，大家下载HDCMS系统就会得到一个和HDPHP.COM网站一模一样的网站，是不是很不错！</span></p>');
INSERT INTO `hd_content_data` VALUES ('16', '王八蛋');
INSERT INTO `hd_content_data` VALUES ('17', '王八蛋');
INSERT INTO `hd_content_data` VALUES ('18', '王八蛋');
INSERT INTO `hd_content_data` VALUES ('19', '王八蛋');
INSERT INTO `hd_content_data` VALUES ('20', '王八蛋');
INSERT INTO `hd_content_data` VALUES ('21', '王八蛋');
INSERT INTO `hd_content_data` VALUES ('22', '王八蛋');
INSERT INTO `hd_content_data` VALUES ('23', '王八蛋');
INSERT INTO `hd_content_data` VALUES ('24', '王八蛋');
INSERT INTO `hd_content_data` VALUES ('25', '王八蛋');
INSERT INTO `hd_content_data` VALUES ('26', 'fddsfsdfdsdsf');
INSERT INTO `hd_content_data` VALUES ('27', 'fddsfsdfdsdsf');
INSERT INTO `hd_content_data` VALUES ('28', 'sdfdsfdsf夺顶替');
INSERT INTO `hd_content_data` VALUES ('29', '我也不知道你在说什么');
INSERT INTO `hd_content_data` VALUES ('30', '<img src=\"http://localhost/hdcms/upload/editor/2014/04/07/56791396801460.png\" alt=\"\" /><br />');
INSERT INTO `hd_content_data` VALUES ('31', 'sfsfssfdsfddfdfs');
INSERT INTO `hd_content_data` VALUES ('32', 'sfsfssfdsfddfdfs');
INSERT INTO `hd_content_data` VALUES ('33', 'rrrrrrrrrrrrrrrrrrrrrr');
INSERT INTO `hd_content_data` VALUES ('34', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr');
INSERT INTO `hd_content_data` VALUES ('35', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr');
INSERT INTO `hd_content_data` VALUES ('36', '附件需要被打包成ZIP或RAR压缩文件后才能上传');
INSERT INTO `hd_content_data` VALUES ('37', '附件需要被打包成ZIP或RAR压缩文件后才能上传');
INSERT INTO `hd_content_data` VALUES ('38', '签是可选项，多个标签使用空格分隔');
INSERT INTO `hd_content_data` VALUES ('39', '签是可选项，多个标签使用空格分隔 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;');
INSERT INTO `hd_content_data` VALUES ('40', '签是可选项，多个标签使用空格分隔 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;');
INSERT INTO `hd_content_data` VALUES ('41', '签是可选项，多个标签使用空格分隔 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;');
INSERT INTO `hd_content_data` VALUES ('42', '向军向军');
INSERT INTO `hd_content_data` VALUES ('43', 'dsfdsfsfddsfsdfsdfsdf');
INSERT INTO `hd_content_data` VALUES ('44', '<span style=\"color:#666666;font-family:\'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;line-height:24px;white-space:normal;background-color:#FFFFFF;\">提交代码前，请检查标题和内容是否已经填写</span>');
INSERT INTO `hd_content_data` VALUES ('45', '<span style=\"color:#666666;font-family:\'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;line-height:24px;white-space:normal;background-color:#FFFFFF;\">提交代码前，请检查标题和内容是否已经填写</span>');
INSERT INTO `hd_content_data` VALUES ('46', '<span style=\"color:#666666;font-family:\'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;line-height:24px;white-space:normal;background-color:#FFFFFF;\">提交代码前，请检查标题和内容是否已经填写</span>');
INSERT INTO `hd_content_data` VALUES ('47', '<span style=\"color:#666666;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;line-height:24px;white-space:normal;background-color:#FFFFFF;\">认提交代码前，sdfsdfds</span>');
INSERT INTO `hd_content_data` VALUES ('48', '<img src=\"http://localhost/hdcms/upload/editor/2014/04/07/35701396805318.jpg\" alt=\"\" />fssfdsfdfdsfds');
INSERT INTO `hd_content_data` VALUES ('49', '<img src=\"http://localhost/hdcms/upload/editor/2014/04/07/10381396806646.png\" alt=\"\" /><span style=\"color:#666666;font-family:\'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;line-height:24px;white-space:normal;background-color:#FFFFFF;\">完整</span>');
INSERT INTO `hd_content_data` VALUES ('50', '<ul style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p>           \r\n		附件需要被打包成ZIP或RAR压缩文件后才能上传<img src=\"http://localhost/hdcms/upload/editor/2014/04/07/79341396806774.png\" alt=\"\"/></p></li></ul>');
INSERT INTO `hd_content_data` VALUES ('52', '&nbsp;林要枯无可奈何花落去 顶替村');

-- ----------------------------
-- Table structure for hd_content_single
-- ----------------------------
DROP TABLE IF EXISTS `hd_content_single`;
CREATE TABLE `hd_content_single` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cid` smallint(6) NOT NULL DEFAULT '0' COMMENT '栏目id',
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
  `seo_title` char(100) NOT NULL DEFAULT '' COMMENT 'seo标题',
  `keywords` char(100) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `content` text NOT NULL COMMENT '正文',
  `html_path` varchar(255) NOT NULL DEFAULT '' COMMENT '自定义生成的静态文件地址',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '作者uid',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_content_single
-- ----------------------------

-- ----------------------------
-- Table structure for hd_content_tag
-- ----------------------------
DROP TABLE IF EXISTS `hd_content_tag`;
CREATE TABLE `hd_content_tag` (
  `mid` smallint(6) NOT NULL DEFAULT '0' COMMENT '模型cid',
  `cid` smallint(6) NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `aid` int(11) NOT NULL DEFAULT '0' COMMENT '文章aid',
  `tid` int(11) NOT NULL DEFAULT '0' COMMENT '标签id',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户uid'
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of hd_content_tag
-- ----------------------------
INSERT INTO `hd_content_tag` VALUES ('1', '6', '30', '148', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '6', '140', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '6', '143', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '6', '142', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '29', '147', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '12', '131', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '9', '106', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '9', '105', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '9', '104', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '29', '108', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '28', '146', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '12', '138', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '10', '134', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '8', '145', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '8', '138', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '12', '132', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '12', '133', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '6', '141', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '8', '139', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '7', '139', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '31', '149', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '32', '149', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '33', '150', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '34', '150', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '35', '150', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '36', '151', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '37', '152', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '38', '153', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '39', '154', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '40', '155', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '41', '156', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '42', '162', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '44', '159', '86');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '45', '153', '86');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '46', '156', '86');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '49', '164', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '50', '165', '1');
INSERT INTO `hd_content_tag` VALUES ('1', '6', '52', '166', '1');

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
-- Table structure for hd_favorite
-- ----------------------------
DROP TABLE IF EXISTS `hd_favorite`;
CREATE TABLE `hd_favorite` (
  `fid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` smallint(5) unsigned NOT NULL,
  `cid` smallint(5) unsigned NOT NULL,
  `aid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=gbk COMMENT='收藏夹';

-- ----------------------------
-- Records of hd_favorite
-- ----------------------------
INSERT INTO `hd_favorite` VALUES ('4', '1', '6', '50', '1');
INSERT INTO `hd_favorite` VALUES ('5', '1', '6', '9', '1');
INSERT INTO `hd_favorite` VALUES ('6', '1', '6', '8', '1');
INSERT INTO `hd_favorite` VALUES ('7', '1', '6', '8', '98');
INSERT INTO `hd_favorite` VALUES ('8', '1', '6', '49', '98');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='友情链接';

-- ----------------------------
-- Records of hd_link
-- ----------------------------
INSERT INTO `hd_link` VALUES ('1', '中国', 'http://www.sina.com.cn', 'upload/link/14151396319743.jpg', '1455067020@qq.com', '1', '', '中国', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='友情链接分类';

-- ----------------------------
-- Records of hd_link_type
-- ----------------------------
INSERT INTO `hd_link_type` VALUES ('1', '友情链接', '1');
INSERT INTO `hd_link_type` VALUES ('2', '合作伙伴', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=179 DEFAULT CHARSET=utf8 COMMENT='节点表（后台菜单也使用）';

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
INSERT INTO `hd_node` VALUES ('4', '管理内容', 'Hdcms', 'Content', 'Index', 'index', '', '', '1', '1', '2', '10', '0', '1');
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
INSERT INTO `hd_node` VALUES ('30', '会员', 'Hdcms', '', '', '', '', '', '1', '1', '0', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('31', '会员管理', 'Hdcms', '', '', '', '', '', '1', '1', '30', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('32', '会员管理', 'Hdcms', 'Group', 'User', 'index', '', '', '1', '1', '31', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('33', '审核会员', 'Hdcms', 'Group', 'User', 'index', 'state=0', '', '1', '1', '31', '100', '0', '1');
INSERT INTO `hd_node` VALUES ('34', '会员组管理', 'Hdcms', '', '', '', '', '', '1', '1', '30', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('35', '管理会员组', 'Hdcms', 'Group', 'Group', 'index', '', '', '1', '1', '34', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('36', '模板', 'Hdcms', '', '', '', '', '', '1', '1', '0', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('37', '模板管理', 'Hdcms', '', '', '', '', '', '1', '1', '36', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('38', '模板风格', 'Hdcms', 'Template', 'Template', 'style_list', '', '', '1', '1', '37', '90', '0', '0');
INSERT INTO `hd_node` VALUES ('39', '模板文件', 'Hdcms', 'Template', 'Template', 'show_dir', '', '', '1', '1', '37', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('70', '标签云', 'Hdcms', 'Tag', 'Tag', 'index', '', '', '1', '1', '10', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('69', '搜索关键词', 'Hdcms', 'Search', 'Manage', 'index', '3', '', '1', '1', '79', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('79', '其他操作', 'Hdcms', '', '', '', '', '', '1', '1', '1', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('80', '导航菜单', 'Hdcms', 'Navigation', 'Navigation', 'index', '', '', '1', '1', '79', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('91', '插件', 'Hdcms', '', '', '', '', '', '1', '1', '0', '1000', '0', '0');
INSERT INTO `hd_node` VALUES ('92', '插件管理', 'Hdcms', '', '', '', '', '', '1', '1', '91', '99', '0', '0');
INSERT INTO `hd_node` VALUES ('93', '插件管理', 'Hdcms', 'Plugin', 'Plugin', 'Plugin_list', '', '', '1', '1', '92', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('94', '正在使用', 'Hdcms', 'Plugin', '', '', '', '', '1', '1', '91', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('153', '反馈', 'Hdcms', '', '', '', '', '', '1', '2', '0', '2000', '0', '0');
INSERT INTO `hd_node` VALUES ('154', '问题反馈', 'Hdcms', '', '', '', '', '', '1', '2', '153', '100', '0', '0');
INSERT INTO `hd_node` VALUES ('178', '友情链接', 'Plugin', 'Link', 'Manage', 'index', '', '', '1', '2', '94', '100', '0', '0');
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
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COMMENT='插件列表';

-- ----------------------------
-- Records of hd_plugin
-- ----------------------------
INSERT INTO `hd_plugin` VALUES ('77', '友情链接', '2014-04-01', '1.0', '后盾网', 'Link', 'houdunwang@gmail.com', 'www.houdunwang.com', '2014-02-09');

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
  `tag` varchar(30) DEFAULT '' COMMENT 'tag字符',
  `total` mediumint(9) DEFAULT '1' COMMENT '次数',
  PRIMARY KEY (`tid`),
  UNIQUE KEY `name` (`tag`),
  KEY `total` (`total`)
) ENGINE=MyISAM AUTO_INCREMENT=167 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_tag
-- ----------------------------
INSERT INTO `hd_tag` VALUES ('107', '汽车', '1');
INSERT INTO `hd_tag` VALUES ('104', '中国', '1');
INSERT INTO `hd_tag` VALUES ('106', '上海', '1');
INSERT INTO `hd_tag` VALUES ('57', '香港', '1');
INSERT INTO `hd_tag` VALUES ('108', '美国', '2');
INSERT INTO `hd_tag` VALUES ('109', '日本', '2');
INSERT INTO `hd_tag` VALUES ('143', '奔驰', '1');
INSERT INTO `hd_tag` VALUES ('142', '汽车之家', '1');
INSERT INTO `hd_tag` VALUES ('141', 'bmz', '1');
INSERT INTO `hd_tag` VALUES ('133', '车展', '2');
INSERT INTO `hd_tag` VALUES ('132', '北京', '2');
INSERT INTO `hd_tag` VALUES ('131', '瑞风', '2');
INSERT INTO `hd_tag` VALUES ('110', '武汉', '1');
INSERT INTO `hd_tag` VALUES ('138', '海南', '3');
INSERT INTO `hd_tag` VALUES ('118', '新家坡', '2');
INSERT INTO `hd_tag` VALUES ('139', '德国', '3');
INSERT INTO `hd_tag` VALUES ('144', '法国', '2');
INSERT INTO `hd_tag` VALUES ('145', '意大利', '1');
INSERT INTO `hd_tag` VALUES ('146', '世界', '1');
INSERT INTO `hd_tag` VALUES ('147', '和平里', '1');
INSERT INTO `hd_tag` VALUES ('148', '内容是什么呀', '1');
INSERT INTO `hd_tag` VALUES ('149', 'sfsfssfdsfddfdfs', '2');
INSERT INTO `hd_tag` VALUES ('150', 'rrrrrrrrrrrrrrrrrrrrrr', '3');
INSERT INTO `hd_tag` VALUES ('151', 'e', '1');
INSERT INTO `hd_tag` VALUES ('152', 'ffdgfdg', '1');
INSERT INTO `hd_tag` VALUES ('153', 'dsf', '3');
INSERT INTO `hd_tag` VALUES ('154', 'f', '1');
INSERT INTO `hd_tag` VALUES ('155', 'sdf', '1');
INSERT INTO `hd_tag` VALUES ('156', 'fsd', '2');
INSERT INTO `hd_tag` VALUES ('157', '向军向军', '1');
INSERT INTO `hd_tag` VALUES ('158', 'sdsd', '1');
INSERT INTO `hd_tag` VALUES ('159', 'df', '1');
INSERT INTO `hd_tag` VALUES ('160', 'fdfsd', '1');
INSERT INTO `hd_tag` VALUES ('161', 'as', '1');
INSERT INTO `hd_tag` VALUES ('162', 'aa', '3');
INSERT INTO `hd_tag` VALUES ('163', '完整', '1');
INSERT INTO `hd_tag` VALUES ('164', '99999999999', '1');
INSERT INTO `hd_tag` VALUES ('165', '附件需要被打包成ZIP或RAR压缩文件后才能上传', '7');
INSERT INTO `hd_tag` VALUES ('166', '23', '1');

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
  `name` varchar(255) DEFAULT '' COMMENT '原文件名',
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
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COMMENT='上传文件';

-- ----------------------------
-- Records of hd_upload
-- ----------------------------
INSERT INTO `hd_upload` VALUES ('1', '', '7151396279894', '7151396279894.jpg', 'upload/Content/2014/03/31/7151396279894.jpg', 'jpg', '1', '116811', '1396279894', '1', '1');
INSERT INTO `hd_upload` VALUES ('2', '', '31711396281345', '31711396281345.jpg', 'upload/Content/2014/03/31/31711396281345.jpg', 'jpg', '1', '116811', '1396281345', '1', '1');
INSERT INTO `hd_upload` VALUES ('3', '', '11911396281346', '11911396281346.jpg', 'upload/Content/2014/03/31/11911396281346.jpg', 'jpg', '1', '116811', '1396281346', '1', '1');
INSERT INTO `hd_upload` VALUES ('4', '', '78691396281398', '78691396281398.jpg', 'upload/Content/2014/03/31/78691396281398.jpg', 'jpg', '1', '116811', '1396281398', '1', '1');
INSERT INTO `hd_upload` VALUES ('5', '', '4471396281399', '4471396281399.jpg', 'upload/Content/2014/03/31/4471396281399.jpg', 'jpg', '1', '116811', '1396281399', '1', '1');
INSERT INTO `hd_upload` VALUES ('6', '', '90571396358670', '90571396358670.jpg', 'upload/Content/2014/04/01/90571396358670.jpg', 'jpg', '1', '65581', '1396358670', '1', '1');
INSERT INTO `hd_upload` VALUES ('7', '', '90401396358672', '90401396358672.jpg', 'upload/Content/2014/04/01/90401396358672.jpg', 'jpg', '1', '65581', '1396358672', '1', '1');
INSERT INTO `hd_upload` VALUES ('8', '', '32141396358730', '32141396358730.jpg', 'upload/Content/2014/04/01/32141396358730.jpg', 'jpg', '1', '65581', '1396358730', '1', '1');
INSERT INTO `hd_upload` VALUES ('9', '', '12271396358731', '12271396358731.jpg', 'upload/Content/2014/04/01/12271396358731.jpg', 'jpg', '1', '65581', '1396358731', '1', '1');
INSERT INTO `hd_upload` VALUES ('10', '', '34801396358793', '34801396358793.jpg', 'upload/Content/2014/04/01/34801396358793.jpg', 'jpg', '1', '71416', '1396358793', '1', '1');
INSERT INTO `hd_upload` VALUES ('11', '', '39831396358794', '39831396358794.jpg', 'upload/Content/2014/04/01/39831396358794.jpg', 'jpg', '1', '71416', '1396358794', '1', '1');
INSERT INTO `hd_upload` VALUES ('12', '', '20541396358832', '20541396358832.jpg', 'upload/Content/2014/04/01/20541396358832.jpg', 'jpg', '1', '74000', '1396358832', '1', '1');
INSERT INTO `hd_upload` VALUES ('13', '', '85731396358833', '85731396358833.jpg', 'upload/Content/2014/04/01/85731396358833.jpg', 'jpg', '1', '74000', '1396358833', '1', '1');
INSERT INTO `hd_upload` VALUES ('14', '', '43511396358873', '43511396358873.jpg', 'upload/Content/2014/04/01/43511396358873.jpg', 'jpg', '1', '66339', '1396358873', '1', '1');
INSERT INTO `hd_upload` VALUES ('15', '', '43551396358874', '43551396358874.jpg', 'upload/Content/2014/04/01/43551396358874.jpg', 'jpg', '1', '66339', '1396358874', '1', '1');
INSERT INTO `hd_upload` VALUES ('16', '', '74301396358893', '74301396358893.jpg', 'upload/Content/2014/04/01/74301396358893.jpg', 'jpg', '1', '73346', '1396358893', '1', '1');
INSERT INTO `hd_upload` VALUES ('17', '', '98011396358893', '98011396358893.jpg', 'upload/Content/2014/04/01/98011396358893.jpg', 'jpg', '1', '73346', '1396358893', '1', '1');
INSERT INTO `hd_upload` VALUES ('18', '', '481396364344', '481396364344.jpg', 'upload/Content/2014/04/01/481396364344.jpg', 'jpg', '1', '116420', '1396364344', '1', '1');
INSERT INTO `hd_upload` VALUES ('19', '', '34551396364345', '34551396364345.jpg', 'upload/Content/2014/04/01/34551396364345.jpg', 'jpg', '1', '116420', '1396364345', '1', '1');
INSERT INTO `hd_upload` VALUES ('20', 'crop 1', '80311396367052', '80311396367052.png', 'upload/content/2014/04/01/80311396367052.png', 'png', '1', '782690', '1396367052', '1', '1');
INSERT INTO `hd_upload` VALUES ('21', '', '66771396411204', '66771396411204.jpg', 'upload/Content/2014/04/02/66771396411204.jpg', 'jpg', '1', '55097', '1396411204', '1', '1');
INSERT INTO `hd_upload` VALUES ('22', '', '83301396411212', '83301396411212.jpg', 'upload/Content/2014/04/02/83301396411212.jpg', 'jpg', '1', '55097', '1396411212', '1', '1');
INSERT INTO `hd_upload` VALUES ('23', 'mini汽车', '81481396794158', '81481396794158.jpg', 'upload/content/2014/04/06/81481396794158.jpg', 'jpg', '1', '165538', '1396794158', '1', '1');
INSERT INTO `hd_upload` VALUES ('24', 'mini汽车', '85131396794745', '85131396794745.jpg', 'upload/content/2014/04/06/85131396794745.jpg', 'jpg', '1', '165538', '1396794745', '1', '1');
INSERT INTO `hd_upload` VALUES ('25', 'mini汽车', '16341396794756', '16341396794756.jpg', 'upload/content/2014/04/06/16341396794756.jpg', 'jpg', '1', '165538', '1396794756', '1', '1');
INSERT INTO `hd_upload` VALUES ('26', 'mini汽车', '58531396794773', '58531396794773.jpg', 'upload/content/2014/04/06/58531396794773.jpg', 'jpg', '1', '165538', '1396794774', '1', '1');
INSERT INTO `hd_upload` VALUES ('27', 'mini汽车', '35141396794878', '35141396794878.jpg', 'upload/content/2014/04/06/35141396794878.jpg', 'jpg', '1', '165538', '1396794878', '1', '1');
INSERT INTO `hd_upload` VALUES ('28', 'mini汽车', '15811396795201', '15811396795201.jpg', 'upload/content/2014/04/06/15811396795201.jpg', 'jpg', '1', '165538', '1396795202', '1', '1');
INSERT INTO `hd_upload` VALUES ('29', 'crop 1', '55861396795928', '55861396795928.png', 'upload/content/2014/04/06/55861396795928.png', 'png', '1', '782690', '1396795928', '1', '1');
INSERT INTO `hd_upload` VALUES ('30', 'crop 1', '33761396795985', '33761396795985.png', 'upload/content/2014/04/06/33761396795985.png', 'png', '1', '782690', '1396795985', '1', '1');
INSERT INTO `hd_upload` VALUES ('31', 'mini汽车', '28451396798877', '28451396798877.jpg', 'upload/editor/2014/04/06/28451396798877.jpg', 'jpg', '1', '90924', '1396798877', '1', '1');
INSERT INTO `hd_upload` VALUES ('32', 'mini汽车', '14181396798922', '14181396798922.jpg', 'upload/content/2014/04/06/14181396798922.jpg', 'jpg', '1', '165538', '1396798922', '1', '1');
INSERT INTO `hd_upload` VALUES ('33', 'mini汽车', '95761396799028', '95761396799028.jpg', 'upload/content/2014/04/06/95761396799028.jpg', 'jpg', '1', '165538', '1396799028', '1', '1');
INSERT INTO `hd_upload` VALUES ('34', 'crop 1', '83501396801350', '83501396801350.png', 'upload/editor/2014/04/07/83501396801350.png', 'png', '1', '782690', '1396801351', '1', '1');
INSERT INTO `hd_upload` VALUES ('35', 'crop 1', '48741396801367', '48741396801367.png', 'upload/editor/2014/04/07/48741396801367.png', 'png', '1', '782690', '1396801368', '1', '1');
INSERT INTO `hd_upload` VALUES ('36', 'crop 1', '94341396801414', '94341396801414.png', 'upload/editor/2014/04/07/94341396801414.png', 'png', '1', '782690', '1396801415', '1', '1');
INSERT INTO `hd_upload` VALUES ('37', 'crop 1', '56791396801460', '56791396801460.png', 'upload/editor/2014/04/07/56791396801460.png', 'png', '1', '782690', '1396801460', '1', '1');
INSERT INTO `hd_upload` VALUES ('38', 'crop 1', '73431396801549', '73431396801549.png', 'upload/content/2014/04/07/73431396801549.png', 'png', '1', '782690', '1396801549', '1', '1');
INSERT INTO `hd_upload` VALUES ('39', 'crop 1', '44651396803482', '44651396803482.png', 'upload/content/2014/04/07/44651396803482.png', 'png', '1', '782690', '1396803482', '1', '86');
INSERT INTO `hd_upload` VALUES ('40', 'crop 1', '2241396803986', '2241396803986.png', 'upload/content/2014/04/07/2241396803986.png', 'png', '1', '782690', '1396803987', '1', '86');
INSERT INTO `hd_upload` VALUES ('41', 'crop 1', '23361396804187', '23361396804187.png', 'upload/content/2014/04/07/23361396804187.png', 'png', '1', '782690', '1396804187', '1', '86');
INSERT INTO `hd_upload` VALUES ('42', 'mini汽车', '42291396804551', '42291396804551.jpg', 'upload/content/2014/04/07/42291396804551.jpg', 'jpg', '1', '165538', '1396804552', '1', '86');
INSERT INTO `hd_upload` VALUES ('43', 'mini汽车', '53381396804633', '53381396804633.jpg', 'upload/content/2014/04/07/53381396804633.jpg', 'jpg', '1', '165538', '1396804633', '1', '86');
INSERT INTO `hd_upload` VALUES ('44', 'mini汽车', '99031396804709', '99031396804709.jpg', 'upload/content/2014/04/07/99031396804709.jpg', 'jpg', '1', '165538', '1396804709', '1', '86');
INSERT INTO `hd_upload` VALUES ('45', 'crop 1', '37611396804742', '37611396804742.png', 'upload/content/2014/04/07/37611396804742.png', 'png', '1', '782690', '1396804742', '1', '86');
INSERT INTO `hd_upload` VALUES ('46', 'crop 1', '10941396805001', '10941396805001.png', 'upload/content/2014/04/07/10941396805001.png', 'png', '1', '782690', '1396805001', '1', '86');
INSERT INTO `hd_upload` VALUES ('47', 'crop 1', '26101396805010', '26101396805010.png', 'upload/content/2014/04/07/26101396805010.png', 'png', '1', '782690', '1396805011', '1', '86');
INSERT INTO `hd_upload` VALUES ('48', 'mini汽车', '73731396805289', '73731396805289.jpg', 'upload/content/2014/04/07/73731396805289.jpg', 'jpg', '1', '165538', '1396805289', '1', '86');
INSERT INTO `hd_upload` VALUES ('49', 'mini汽车', '35701396805318', '35701396805318.jpg', 'upload/editor/2014/04/07/35701396805318.jpg', 'jpg', '1', '165538', '1396805318', '1', '86');
INSERT INTO `hd_upload` VALUES ('50', 'mini汽车', '37321396805727', '37321396805727.jpg', 'upload/content/2014/04/07/37321396805727.jpg', 'jpg', '1', '165538', '1396805727', '1', '86');
INSERT INTO `hd_upload` VALUES ('51', 'crop 1', '77801396805956', '77801396805956.png', 'upload/content/2014/04/07/77801396805956.png', 'png', '1', '782690', '1396805956', '1', '86');
INSERT INTO `hd_upload` VALUES ('52', 'mini汽车', '49251396806638', '49251396806638.jpg', 'upload/content/2014/04/07/49251396806638.jpg', 'jpg', '1', '165538', '1396806638', '1', '1');
INSERT INTO `hd_upload` VALUES ('53', 'crop 1', '10381396806646', '10381396806646.png', 'upload/editor/2014/04/07/10381396806646.png', 'png', '1', '782690', '1396806646', '1', '1');
INSERT INTO `hd_upload` VALUES ('54', 'mini汽车', '2411396806674', '2411396806674.jpg', 'upload/content/2014/04/07/2411396806674.jpg', 'jpg', '1', '165538', '1396806674', '1', '1');
INSERT INTO `hd_upload` VALUES ('55', 'mini汽车', '12801396806768', '12801396806768.jpg', 'upload/content/2014/04/07/12801396806768.jpg', 'jpg', '1', '165538', '1396806768', '1', '1');
INSERT INTO `hd_upload` VALUES ('56', 'crop 1', '79341396806774', '79341396806774.png', 'upload/editor/2014/04/07/79341396806774.png', 'png', '1', '782690', '1396806775', '1', '1');
INSERT INTO `hd_upload` VALUES ('57', '', '88051396846274', '88051396846274.jpg', 'upload/Content/2014/04/07/88051396846274.jpg', 'jpg', '1', '155304', '1396846274', '1', '1');
INSERT INTO `hd_upload` VALUES ('58', '', '19991396846274', '19991396846274.jpg', 'upload/Content/2014/04/07/19991396846274.jpg', 'jpg', '1', '155304', '1396846274', '1', '1');
INSERT INTO `hd_upload` VALUES ('59', 'crop 1', '84621396846676', '84621396846676.png', 'upload/content/2014/04/07/84621396846676.png', 'png', '1', '782690', '1396846676', '1', '1');
INSERT INTO `hd_upload` VALUES ('60', 'crop 1', '75841396846795', '75841396846795.png', 'upload/content/2014/04/07/75841396846795.png', 'png', '1', '782690', '1396846795', '1', '1');
INSERT INTO `hd_upload` VALUES ('61', 'mini汽车', '21561396847438', '21561396847438.jpg', 'upload/content/2014/04/07/21561396847438.jpg', 'jpg', '1', '165538', '1396847439', '1', '1');
INSERT INTO `hd_upload` VALUES ('62', '', '', '', 'upload/user/2014/04/08/5171396961955.png', '', '1', '0', '0', '0', '0');
INSERT INTO `hd_upload` VALUES ('63', '', '', '', 'upload/user/2014/04/08/41811396961993.jpg', '', '1', '0', '0', '1', '1');
INSERT INTO `hd_upload` VALUES ('64', '', '', '', 'upload/user/2014/04/08/4121396962113.jpg', '', '1', '0', '0', '1', '1');
INSERT INTO `hd_upload` VALUES ('65', '', '', '', 'upload/user/2014/04/08/6931396962249.jpg', '', '1', '0', '0', '1', '1');
INSERT INTO `hd_upload` VALUES ('66', '', '', '', 'upload/user/2014/04/08/20441396962270.jpg', '', '1', '0', '0', '1', '1');
INSERT INTO `hd_upload` VALUES ('67', '', '', '', 'upload/user/2014/04/08/42471396966063.png', '', '1', '0', '0', '0', '1');
INSERT INTO `hd_upload` VALUES ('68', '', '', '', 'upload/user/2014/04/08/96341396966569.jpg', '', '1', '0', '0', '0', '1');
INSERT INTO `hd_upload` VALUES ('69', '', '', '', 'upload/user/2014/04/08/41791396971188.jpg', '', '1', '0', '0', '0', '98');
INSERT INTO `hd_upload` VALUES ('70', '', '', '', 'upload/user/2014/04/08/98911396971292.jpg', '', '1', '0', '0', '0', '98');

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
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '个性签名',
  `domain` char(20) NOT NULL DEFAULT '' COMMENT '个性域名',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  KEY `password` (`password`),
  KEY `credits` (`credits`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_user
-- ----------------------------
INSERT INTO `hd_user` VALUES ('1', '后盾网向军', 'admin', '054e1e1672569f5810335722c6a1994f', 'a120882783', 'houdunwangxj@gmail.com', '0', '1396971083', '', '0.0.0.0', '1', '', '1', '', '10008', '1', '1', '后盾网 人人做后盾', 'xiangjun');
INSERT INTO `hd_user` VALUES ('25', '李四', 'lisi', 'e4046eade27db4ee56b3abdcdd711df3', '07041b46e0', 'a@qq.com', '0', '1395066799', '', '0.0.0.0', '1', '', '1', '', '100', '1', '1', '', '');
INSERT INTO `hd_user` VALUES ('85', '向军', 'houdunwang', '72c8e536d1e2db29db9f46c44ab8933a', '848c619651', 'houdunwang@gmail.com', '1395668246', '1395760521', '0.0.0.0', '0.0.0.0', '1', '', '1', '', '100', '4', '1', '', '');
INSERT INTO `hd_user` VALUES ('86', '后盾向军', '后盾向军', '0c420220b21c8ebdee72dd20ec90061c', 'f303dc8696', '2300071698@qq.com', '1396803420', '1396803420', '0.0.0.0', '0.0.0.0', '1', '', '1', '', '100', '4', '1', '', '');
INSERT INTO `hd_user` VALUES ('87', 'admindf', 'admindf', '', '575c018a16', 'ddfkdsk@ffd.com', '1396861863', '1396861863', '0.0.0.0', '0.0.0.0', '0', '23000112', '1', '', '10011', '4', '1', '', '');
INSERT INTO `hd_user` VALUES ('88', '', 'adminsddsf', 'adminsddsf', '', 'df@fd.com', '0', '0', '', '', '1', '232323', '1', '', '100', '4', '1', '', '');
INSERT INTO `hd_user` VALUES ('89', '', 'admin223223', 'admin223223', '', 'df@fdfd.com', '0', '0', '', '', '1', '232323', '1', '', '100', '4', '1', '', '');
INSERT INTO `hd_user` VALUES ('90', '', 'ad3444', 'ad3444', '', 'df@fddffd.com', '0', '0', '', '', '1', '232323', '1', '', '100', '4', '1', '', '');
INSERT INTO `hd_user` VALUES ('91', '', 'ad3444df1', 'ad3444df1', '', 'ffsdfds@ffd.com', '0', '0', '', '', '1', '343434', '1', '', '100', '4', '1', '', '');
INSERT INTO `hd_user` VALUES ('92', 'ad3444df1sdf', 'ad3444df1sdf', '', '5cf07af24f', 'ffsdfds@ffdd.com', '1396865680', '1396865680', '0.0.0.0', '0.0.0.0', '0', '343434', '1', '', '100', '4', '1', '', '');
INSERT INTO `hd_user` VALUES ('93', 'sdfd', 'sdfd', 'b3b7f8a405781d125c597274d7103cfa', '88a5664d04', 'sdfs@fd.com', '1396872771', '1396872771', '0.0.0.0', '0.0.0.0', '1', '', '1', '', '100', '4', '1', '', '');
INSERT INTO `hd_user` VALUES ('94', 'sdfsdf', 'sdfsdf', '979ba3fa8f83b66a8a43310ef060f201', '4938cd1341', '2sdf300071698@qq.com', '1396873283', '1396873283', '0.0.0.0', '0.0.0.0', '1', '', '1', '', '100', '4', '1', '', '');
INSERT INTO `hd_user` VALUES ('95', 'skdskl', 'skdskl', '192e2419d1e2920a7634c25b4c73923e', '52dd351090', '230df0071698@qq.com', '1396873437', '1396873437', '0.0.0.0', '0.0.0.0', '1', '', '1', '', '100', '4', '1', '', '');
INSERT INTO `hd_user` VALUES ('96', 'sdfdfdsf', 'sdfdfdsf', 'e403e6c592ea202ac9ab65447d156540', '9960180087', 'sdf2300071698@qq.com', '1396873502', '1396873502', '0.0.0.0', '0.0.0.0', '1', '', '1', '', '100', '4', '1', '', '');
INSERT INTO `hd_user` VALUES ('97', 'sdffdsdfs', 'sdffdsdfs', 'f2ac9fc4aba17a20fb4f017f11324edc', '3cf5110883', '23000sdf71698@qq.com', '1396873567', '1396873567', '0.0.0.0', '0.0.0.0', '1', '', '1', '', '100', '4', '1', '', '');
INSERT INTO `hd_user` VALUES ('98', '北京向军', 'bjxj', 'b623030bf204f6da6d85d98187c9ca5a', 'bf484c88b5', 'sdksd@f.com', '1396971115', '1396971115', '0.0.0.0', '0.0.0.0', '1', '', '1', '', '100', '4', '1', '我学习，我强大', '');

-- ----------------------------
-- Table structure for hd_user_guest
-- ----------------------------
DROP TABLE IF EXISTS `hd_user_guest`;
CREATE TABLE `hd_user_guest` (
  `gid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `guest_uid` int(11) unsigned NOT NULL COMMENT '访问id',
  `uid` int(11) unsigned NOT NULL COMMENT '被访问空间Uid',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of hd_user_guest
-- ----------------------------
INSERT INTO `hd_user_guest` VALUES ('11', '1', '98');
INSERT INTO `hd_user_guest` VALUES ('15', '98', '1');

-- ----------------------------
-- Table structure for hd_user_icon
-- ----------------------------
DROP TABLE IF EXISTS `hd_user_icon`;
CREATE TABLE `hd_user_icon` (
  `user_uid` int(11) NOT NULL DEFAULT '0',
  `icon50` varchar(255) NOT NULL DEFAULT '',
  `icon100` varchar(255) NOT NULL DEFAULT '',
  `icon150` varchar(255) NOT NULL DEFAULT '',
  UNIQUE KEY `user_uid` (`user_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='用户头像';

-- ----------------------------
-- Records of hd_user_icon
-- ----------------------------
INSERT INTO `hd_user_icon` VALUES ('1', 'upload/user/2014/04/08/1_50.png', 'upload/user/2014/04/08/1_100.png', 'upload/user/2014/04/08/1_150.png');
INSERT INTO `hd_user_icon` VALUES ('0', 'upload/user/2014/04/08/98_50.jpg', 'upload/user/2014/04/08/98_100.jpg', 'upload/user/2014/04/08/98_150.jpg');
INSERT INTO `hd_user_icon` VALUES ('98', 'upload/user/2014/04/08/98_50.jpg', 'upload/user/2014/04/08/98_100.jpg', 'upload/user/2014/04/08/98_150.jpg');

-- ----------------------------
-- Table structure for hd_user_message
-- ----------------------------
DROP TABLE IF EXISTS `hd_user_message`;
CREATE TABLE `hd_user_message` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_uid` int(10) unsigned NOT NULL,
  `to_uid` int(10) unsigned NOT NULL,
  `message` varchar(255) NOT NULL DEFAULT '',
  `state` tinyint(1) NOT NULL COMMENT '是否查阅  1 已阅读  2 未读',
  `sendtime` int(10) NOT NULL COMMENT '发送时间',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=gbk COMMENT='短消息';

-- ----------------------------
-- Records of hd_user_message
-- ----------------------------
INSERT INTO `hd_user_message` VALUES ('1', '25', '1', 'hello', '1', '0');
INSERT INTO `hd_user_message` VALUES ('2', '1', '25', 'dsfdsf', '0', '0');
INSERT INTO `hd_user_message` VALUES ('3', '1', '25', '', '0', '0');
