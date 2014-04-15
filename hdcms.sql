-- MySQL dump 10.13  Distrib 5.1.58, for redhat-linux-gnu (i686)
--
-- Host: localhost    Database: hdcms
-- ------------------------------------------------------
-- Server version	5.1.58

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `hd_access`
--

DROP TABLE IF EXISTS `hd_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_access` (
  `rid` smallint(5) unsigned NOT NULL,
  `nid` smallint(5) unsigned NOT NULL,
  KEY `gid` (`rid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员权限分配表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_access`
--

LOCK TABLES `hd_access` WRITE;
/*!40000 ALTER TABLE `hd_access` DISABLE KEYS */;
INSERT INTO `hd_access` VALUES (2,17),(2,11),(2,20),(2,21),(2,19),(2,16),(2,80),(2,69),(2,12),(2,79),(2,61),(2,9),(2,8),(2,6),(2,5),(2,70),(2,15),(2,14),(2,3),(2,10),(2,81),(2,4),(2,13),(2,2),(2,1),(3,81),(3,4),(3,13),(3,2),(3,1),(2,18),(2,30),(2,31),(2,32),(2,33),(2,34),(2,35);
/*!40000 ALTER TABLE `hd_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_bug`
--

DROP TABLE IF EXISTS `hd_bug`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_bug`
--

LOCK TABLES `hd_bug` WRITE;
/*!40000 ALTER TABLE `hd_bug` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_bug` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_category`
--

DROP TABLE IF EXISTS `hd_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='栏目表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_category`
--

LOCK TABLES `hd_category` WRITE;
/*!40000 ALTER TABLE `hd_category` DISABLE KEYS */;
INSERT INTO `hd_category` VALUES (1,0,'HDPHP','hdphp','','','article_index.html','article_list.html','article_default.html','','{catdir}/list_{cid}_{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,2,2,2,'',100,1,'','',1,0,1,1,0),(3,0,'HDCMS','hdcms','','','article_index.html','article_list.html','article_default.html','','{catdir}/list_{cid}_{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,2,2,2,'',100,1,'','',1,0,1,1,1),(10,1,'安装使用','help','','','article_index.html','article_list.html','article_default.html',NULL,'{catdir}/list_{cid}_{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',100,1,'','',1,0,1,1,0),(12,3,'安装使用','help','','','article_index.html','article_list.html','article_default.html',NULL,'{catdir}/list_{cid}_{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',100,1,'','',1,0,1,1,0),(14,0,'闲聊','xianliao','','','article_index.html','article_list.html','article_default.html',NULL,'{catdir}/list_{cid}_{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',200,1,'','',1,0,1,1,0),(5,0,'站内公告','news','','','article_index.html','article_list.html','article_default.html',NULL,'{catdir}/list_{cid}_{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',1000,2,'','',1,0,1,1,0),(6,0,'分享','it','','','article_index.html','article_list.html','article_default.html',NULL,'{catdir}/list_{cid}_{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,2,2,2,'',100,1,'','',1,0,1,1,0),(7,6,'PHP','php','','','article_index.html','article_list.html','article_default.html',NULL,'{catdir}/list_{cid}_{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',100,1,'','',1,0,1,1,0),(8,6,'前端','html','','','article_index.html','article_list.html','article_default.html',NULL,'{catdir}/list_{cid}_{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',100,1,'','',1,0,1,1,0),(9,6,'服务器','inux','','','article_index.html','article_list.html','article_default.html',NULL,'{catdir}/list_{cid}_{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',100,1,'','',1,0,1,1,0),(11,1,'BUG反馈','bug','','','article_index.html','article_list.html','article_default.html',NULL,'{catdir}/list_{cid}_{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',100,1,'','',1,0,1,1,0),(13,3,'Bug反馈','bug','','','article_index.html','article_list.html','article_default.html',NULL,'{catdir}/list_{cid}_{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',100,1,'','',1,0,1,1,0);
/*!40000 ALTER TABLE `hd_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_category_access`
--

DROP TABLE IF EXISTS `hd_category_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目权限表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_category_access`
--

LOCK TABLES `hd_category_access` WRITE;
/*!40000 ALTER TABLE `hd_category_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_category_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_comment`
--

DROP TABLE IF EXISTS `hd_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_comment`
--

LOCK TABLES `hd_comment` WRITE;
/*!40000 ALTER TABLE `hd_comment` DISABLE KEYS */;
INSERT INTO `hd_comment` VALUES (1,1,5,1,'占楼~占楼~占楼~占楼~占楼~',2,1,1397455768,0,0),(2,1,5,2,'占楼~占楼~占楼~占楼~占楼~',2,1,1397455783,0,0),(3,1,5,2,'欢迎楼主',1,1,1397455994,2,2),(4,1,5,1,'恭喜恭喜~！',3,1,1397456635,0,0),(5,1,5,1,'呀 ，，，算是前排嘛！强烈支持',4,1,1397456968,0,0),(6,1,5,2,'强烈支持',4,1,1397457189,0,0),(7,1,5,1,'- - 希望尽快推出更多教程~~',7,1,1397459706,0,0),(8,1,5,2,'昨天下载的貌似有BUG呀，新建模板风格提示”文件夹不存在“，但文件实际存在的……',8,1,1397459962,0,0),(9,1,5,1,'必须支持呀~~~各种手册插件丰富起来，搞个社区，活跃起来~~~',9,1,1397460016,0,0),(10,1,5,1,'正式版终于发布了，恭喜！\r\n',11,1,1397460230,0,0),(11,1,5,2,'你还在使用漏洞百出的织梦吗?还在为无比繁琐的帝国cms纠结吗？别再OUT了！后盾CMS震撼发布！高端大气、开源免费，傻瓜化操作，独一无二的安全机制，一切只为最优',6,1,1397460341,0,0),(12,1,5,1,'会出相关教程吗',13,1,1397460630,0,0),(13,1,5,1,'占位恭喜',14,1,1397461014,0,0),(14,1,5,1,'这家伙太懒了，什么都没留下，只留下了恭喜',15,1,1397461181,0,0),(15,1,5,2,'向为框架辛勤付出的各位老师，特别是向军老师表示感谢~我会用自己的努力来参与社区的建设中的~',9,1,1397461526,0,0),(16,1,5,1,'顶起顶起。',17,1,1397461848,0,0),(17,1,3,3,'上传的图片没有显示。',6,1,1397462155,0,0),(18,1,5,1,'支持一下',19,1,1397462521,0,0),(19,1,3,3,'你在哪里传图片，不显示？',18,1,1397462768,17,17),(20,1,5,1,'同喜',1,1,1397465144,10,10),(21,1,2,4,'模板的配置文件设置对了吗？',1,1,1397465195,0,0),(22,1,2,4,'不行了，您测试下',18,1,1397465639,21,21),(23,1,2,4,'一会我看一下，我看到你给我发的网站私信了。',1,1,1397465725,22,21),(24,1,2,4,'谢谢老师  设置对了的',4,1,1397466013,23,21),(25,1,2,4,'问题已经修复，但是GIT推不动。一会回来，我推一下，今晚要打针，先闪了。',1,1,1397467825,22,21),(26,1,2,4,'好的  谢谢啊  我看见git.os上面更新了\r\n',4,1,1397468064,25,21),(27,1,2,4,'推上去了，pull吧！',1,1,1397468331,22,21),(28,1,2,4,'好的   哈哈 谢谢向老师',4,1,1397468426,27,21),(29,1,5,1,'凑热闹的。。。。。。',23,1,1397473396,0,0),(30,1,5,1,'当然会的，本周五开始V5课堂讲解HDCMS与插件开发方法',1,1,1397475825,12,12),(31,1,2,4,'老师  ，会有视频讲解吗',24,1,1397478425,0,0),(32,1,2,4,'看来你没听过V5课堂呀，是在线即时讲解，远程视频教学（免费的）',1,1,1397478557,31,31),(33,1,5,1,'顶！。。。。。。。。。。。。。。。。。。。。',26,1,1397480249,0,0),(34,1,5,2,'好',27,1,1397480301,0,0),(35,1,13,6,'耶，我传的图片呢，怎么没有显示出来！！！',18,1,1397486647,0,0),(36,1,13,6,'你是怎么传的，是缩略图还是正文里的图片 呀？缩略图只在列表页调用的。你可以在周5听一下V5课堂',1,1,1397487798,35,35),(37,1,13,6,'传的是缩略图，哦，是这样啊，我看到也内容页面，没注意',18,1,1397489263,36,35),(38,1,5,2,'强烈关注中！！！',28,1,1397524193,0,0),(39,1,5,1,'安装不成功\r\n提示:网站出错了，请稍候再试...',30,1,1397525476,0,0),(40,1,5,1,'顶',33,1,1397530056,0,0),(41,1,5,1,'没有同学反映这个问题，你周五来上V5课堂吧。到时我帮助你解决。',1,1,1397532777,39,39),(42,1,5,2,'会越来越好的。！',1,1,1397532800,38,38),(43,1,3,10,'1 你提出的问题，很好，我们尽快修复这个模板问题。\r\n2 缩略图是用来在首页、列表页使用pagelist 或arclist等标签调用时显示的，显示图片 请在内容',1,1,1397532900,0,0),(44,1,3,5,'分页使用pagelist标签调用就行，分页模板默认是article_list.html，当然可以自定义的',1,1,1397533006,0,0),(45,1,3,5,'我就是用pagelist调用的.各种刷新，点击分页出来的是搜索页面。&lt;div id=&quot;box_2&quot;&gt;\r\n&lt;div clas',18,1,1397534616,44,44),(46,1,3,5,'我再测试一下，还有周五有V5课堂，讲解HDCMS使用与插件安装方法',1,1,1397535535,45,44),(47,1,13,6,'收到，这是一个小问题',1,1,1397536354,0,0),(48,1,3,5,'老师，你把Search下的模板改动一下，你点击列表分页看看，就是链接到搜索模板的。',18,1,1397538438,44,44),(49,1,10,12,'火钳刘明。',6,1,1397538950,0,0),(50,1,12,5,'自己顶起来！！！',18,1,1397542929,0,0),(51,1,5,1,'好的谢谢',30,1,1397552597,41,39),(52,1,12,13,'谢谢，我们会努力的。',1,1,1397563270,0,0),(53,1,12,11,'不是博客是CMS，当然你可以使用这个系统做Blog',1,1,1397563759,0,0),(54,1,12,10,'这是个问题，我们尽快修复',1,1,1397563786,0,0),(55,1,12,5,'在编辑栏目选择模板就可以，关注V5课堂，周五讲解HDCMS',1,1,1397563844,50,50),(56,1,12,5,'要不老师，远程看看，真是不可以。QQ:464748053',18,1,1397565269,55,50);
/*!40000 ALTER TABLE `hd_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_config`
--

DROP TABLE IF EXISTS `hd_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '' COMMENT '配置名称\n',
  `value` text NOT NULL COMMENT '配置值',
  `type` enum('站点配置','高级设置','上传配置','会员设置','邮箱配置','安全设置','水印设置','内容相关','性能优化','私有配置') NOT NULL DEFAULT '站点配置' COMMENT '配置类型\n1 站点配置\n2 性能设置\n3 上传配置\n4 交互设置\n5 会员设置',
  `title` char(30) NOT NULL DEFAULT '',
  `show_type` enum('文本','数字','布尔(1/0)','多行文本') DEFAULT '文本',
  `message` varchar(255) DEFAULT NULL COMMENT '提示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=166 DEFAULT CHARSET=utf8 COMMENT='系统配置';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_config`
--

LOCK TABLES `hd_config` WRITE;
/*!40000 ALTER TABLE `hd_config` DISABLE KEYS */;
INSERT INTO `hd_config` VALUES (1,'webname','HDPHP社区--中国最强PHP培训机构  《后盾网》','站点配置','网站名称','文本',''),(2,'icp','京ICP备12048441号-3','站点配置','ICP备案号','文本',''),(3,'html_path','html','站点配置','静态html目录','文本',''),(4,'copyright','Copyright © 2012-2013 HDCMS 后盾网 版权所有','站点配置','网站版权信息','文本',''),(5,'keywords','php培训,php实训,后盾网','站点配置','网站关键词','文本',''),(6,'description','后盾网顶尖PHP培训 内容全面 全程实战!业内顶级讲师亲自授课,千余课时独家视频教程免费下载,超百G原创视频资源,实力不容造假!010-64825057','站点配置','网站描述','多行文本',''),(152,'email','houdunwangxj@gmail.com','站点配置','管理员邮箱','文本',''),(9,'backup_dir','backup','高级设置','数据备份目录','文本',''),(10,'web_open','1','站点配置','网站开启','布尔(1/0)',''),(15,'auth_key','houdunwang.com','安全设置','cookie加密KEY','文本',''),(16,'upload_path','upload','上传配置','上传目录','文本',''),(17,'upload_img_path','img','上传配置','上传图片目录','文本',''),(18,'allow_type','jpg,jpeg,png,bmp,gif','上传配置','允许上传文件类型','文本',''),(19,'allow_size','2048000','上传配置','允许上传大小（字节）','数字',''),(20,'water_on','0','水印设置','上传文件加水印','布尔(1/0)',''),(115,'member_verify','0','会员设置','会员注册是否需要审核','布尔(1/0)',''),(116,'reg_show_code','1','会员设置','会员注册是否显示验证码','布尔(1/0)',''),(119,'reg_email','1','会员设置','注册成功是否发邮件','布尔(1/0)',''),(120,'reg_interval','0','会员设置','2次注册间隔间间','数字',''),(121,'default_member_group','4','会员设置','新注册会员初始组','数字',''),(123,'token_on','0','安全设置','表单使用令牌验证','布尔(1/0)',''),(124,'log_key','houdunwang.com','安全设置','日志文件加密KEY','文本',''),(125,'session_name','hdsid','安全设置','SESSION_NAME值','文本',''),(126,'super_admin_key','SUPER_ADMIN','安全设置','站长令牌名称','文本',''),(127,'tel','010-64825057','站点配置','联系电话','文本',''),(128,'water_text','houdunwang.com','水印设置','水印文字','文本',''),(129,'water_text_size','16','水印设置','文字大小','数字',''),(130,'water_img','data/water/water.png','水印设置','水印图像','文本',''),(131,'water_pct','0','水印设置','水印图片透明度','数字',''),(132,'water_quality','90','水印设置','图片压缩比','数字',''),(133,'water_pos','9','水印设置','水印位置','数字',''),(134,'del_content_model','1','高级设置','删除文章先放入回收站','布尔(1/0)',''),(136,'down_remove_pic_size','500','高级设置','下载远程资源允许最大值','数字',''),(165,'comment_len','80','会员设置','评论内容最大长度','文本',''),(138,'favicon_width','180','会员设置','会员头像宽度','数字',''),(139,'favicon_height','180','会员设置','会员头像高度','数字',''),(142,'down_remote_pic','0','内容相关','下载远程图片','布尔(1/0)',''),(143,'auto_desc','1','内容相关','截取内容为摘要','布尔(1/0)',''),(144,'auto_thumb','0','内容相关','提取内容图片为缩略图','布尔(1/0)',''),(145,'upload_img_max_width','600','内容相关','上传图片宽度超过此值，进行缩放','数字',''),(146,'upload_img_max_height','600','内容相关','上传图片高度超过此值，进行缩放','数字',''),(149,'member_open','1','会员设置','开启会员中心','布尔(1/0)',''),(150,'web_close_message','网站暂时关闭，请稍候访问','站点配置','网站关闭提示信息','文本',''),(151,'web_style','default','私有配置','网站模板','文本',''),(155,'qq','1455067020','站点配置','QQ号','文本',''),(154,'weibo','houdunwangxj@gmail.com','站点配置','新浪微博','文本',''),(156,'tweibo','houdunwang@gmail.com','站点配置','腾讯微博','文本',''),(157,'email','houdunwangxj@gmail.com','站点配置','企业邮箱','文本',''),(158,'init_credits','100','会员设置','初始积分','文本',''),(161,'cache_index','-1','性能优化','首页缓存时间','文本','（单位：秒，-1不缓存 0永久缓存)'),(162,'cache_category','-1','性能优化','栏目缓存时间','文本','（单位：秒，-1不缓存 0永久缓存)'),(163,'cache_content','-1','性能优化','文章缓存时间','文本','（单位：秒，-1不缓存 0永久缓存)'),(164,'comment_step_time','10','会员设置','评论间隔时间','文本','必须大于1（单位秒)');
/*!40000 ALTER TABLE `hd_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_content`
--

DROP TABLE IF EXISTS `hd_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=gbk;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_content`
--

LOCK TABLES `hd_content` WRITE;
/*!40000 ALTER TABLE `hd_content` DISABLE KEYS */;
INSERT INTO `hd_content` VALUES (1,5,'HDCMS盛大发布','置顶,推荐,图片',0,'','upload/content/2014/04/14/64631397455215.jpg',100,'','','',1,1397455178,1397411849,'','',3,100,1,'后盾,HDCMS,提供,http,而且,模板,一个,很多,我们','HDCMS (正式版)后盾网HDCMS是一个用PHP编写的内容管理系统软件包，数据库采用Mysql。提供强大的、完整的功能，满足快速网站开发的目的。你不需要很长时间就可以开发出一个很不错的网站，而且后盾网提供很多优秀模板，让你连做模板的时间也省掉，而且我们会定期举行免费远程培训，让你的学习与使用变得更轻松。技术支持：后盾网：http://www.houdunwang.comHDPHP官网：http',1,0,0,0),(2,5,'HDPHP开源框架','置顶,推荐,图片',0,'','houdunwang.jpg',100,'','','',1,1397455377,1397412057,'','',3,100,1,'框架,HDPHP,完成,提供,开发,后盾,处理,能上,系统性','HDPHP后盾网HDPHP框架是一个为用PHP程序语言编写网络应用程序的人员提供的软件包。 提供强大的、完整的类库包,满足开发中的项目需求,可以将需要完成的任务代码量最小化，大大提高项目开发效率与质量。高效的核心编译处理机制让系统运行更快。 做为优秀的框架产品,在系统性能上做的大量的优化处理,只为让程序员使用HDPHP框架强悍的功能同时,用最短的时间完成项目的开发。技术支持：后盾网：http://',1,0,0,0),(3,3,'后盾网最帅的是哪位老师？','',0,'','',0,'','','',1,1397462135,1397462135,'','',3,100,1,'后盾网','',6,0,0,0),(6,13,'hdcms后台模版选择问题','图片',0,'','upload/content/2014/04/14/71521397486502.jpg',0,'','','',1,1397486568,1397489041,'','',3,100,1,'后台模版选择','后台栏目模版选择，\r\n	如果模版很多，就全部显示不出来了，只显示这几个文件，希望有滚动条的出现！',18,0,0,0),(7,13,'hdcms友情链接调不出来','',0,'','',0,'','','',1,1397488794,1397489013,'','',3,100,1,'友情链接','',18,0,0,0),(5,12,'hdcms的列表分页模版修改','图片',0,'','upload/editor/2014/04/14/33441397489112.jpg',0,'','','',1,1397484163,1397489170,'','',3,100,1,'分页模版','hdcms的列表分页模版在哪里修改？\r\n	我有一个文章列表模版，产品列表模版要怎么来绑定分页模版？\r\n	点击下一页后：出现的是搜索页面，没有继承我下载本来的列表页面',18,0,0,0),(8,10,'hdcms后台栏目权限','',0,'','',0,'','','',1,1397490729,1397490729,'','',3,100,1,'栏目权限','',18,0,0,0),(9,10,'hdcms模版缩略图路径问题','',0,'','',0,'','','',1,1397491526,1397491526,'','',3,100,1,'模版缩略图','',18,0,0,0),(10,12,'hdcms首页显示会员详细信息面板位置问题','图片',0,'','upload/editor/2014/04/15/92101397525176.jpg',0,'','','',1,1397524896,1397525180,'','',3,100,1,'底部滚动条,错位,会员面板','如图所示，感觉鼠标划过会员头像时候所显示出来的会员面板都是在右边，这样会出现撑大页面横度，使浏览器底部出现横向滚动条！感觉不是很友善，希望向军老师能够改善下。本人是19寸显示器的！【刚上传了好几次缩略图都没法显示出来，咋回事呢！】',18,0,0,0),(11,12,'是博客系统吗？','',0,'','',0,'','','',1,1397529773,1397529773,'','',3,100,1,'教程 模版','',18,0,0,0),(12,10,'抢注“管理员”昵称 哈哈','',0,'','',0,'','','',1,1397529990,1397529990,'','',3,100,1,'抢注[管理员\"昵称 哈哈   是不是要被封啊~~~~','',18,0,0,0),(13,12,'期待更多功能','',0,'','',0,'','','',1,1397530114,1397530114,'','',3,100,1,'期待更多功能','',18,0,0,0);
/*!40000 ALTER TABLE `hd_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_content_data`
--

DROP TABLE IF EXISTS `hd_content_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_content_data` (
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章主表ID',
  `content` text COMMENT '正文',
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='内容表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_content_data`
--

LOCK TABLES `hd_content_data` WRITE;
/*!40000 ALTER TABLE `hd_content_data` DISABLE KEYS */;
INSERT INTO `hd_content_data` VALUES (1,'<h1 style=\"margin: 0px 0px 10px; padding: 0px; font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; line-height: 36px; text-rendering: optimizelegibility; font-size: 30px; -webkit-font-smoothing: antialiased; cursor: text; position: relative; white-space: normal;\">HDCMS (正式版)</h1><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; line-height: 22px; white-space: normal;\">后盾网HDCMS是一个用PHP编写的内容管理系统软件包，数据库采用Mysql。提供强大的、完整的功能，满足快速网站开发的目的。你不需要很长时间就可以开发出一个很不错的网站，而且后盾网提供很多优秀模板，让你连做模板的时间也省掉，而且我们会定期举行免费远程培训，让你的学习与使用变得更轻松。</p><h3 style=\"margin: 20px 0px 10px; padding: 0px; font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; line-height: 36px; color: rgb(51, 51, 51); text-rendering: optimizelegibility; font-size: 18px; -webkit-font-smoothing: antialiased; cursor: text; position: relative; white-space: normal;\"><a class=\"anchor\" id=\"技术支持：\" href=\"https://git.oschina.net/houdunwang/hdcms#技术支持：\" style=\"margin-top: 0px !important; margin-right: 0px; margin-bottom: 0px !important; margin-left: -25px; padding: 0px 0px 0px 25px; color: rgb(65, 131, 196); text-decoration: none; display: block; cursor: pointer; position: absolute; top: 0px; left: 0px; bottom: 0px;\"></a>技术支持：</h3><blockquote style=\"margin: 15px 0px; padding: 0px 15px; border-left-width: 4px; border-left-style: solid; border-left-color: rgb(221, 221, 221); color: rgb(119, 119, 119); font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; font-size: 14px; line-height: 22px; white-space: normal;\"><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; font-size: 17.5px; line-height: 1.25;\">后盾网：&nbsp;<a href=\"http://www.houdunwang.com/\" title=\"后盾网\" style=\"margin-top: 0px !important; margin-right: 0px; margin-bottom: 0px !important; margin-left: 0px; padding: 0px; color: rgb(65, 131, 196); text-decoration: none;\">http://www.houdunwang.com</a></p><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; font-size: 17.5px; line-height: 1.25;\">HDPHP官网：&nbsp;<a href=\"http://www.hdphp.com/\" title=\"HDPHP官网\" style=\"margin-top: 0px !important; margin-right: 0px; margin-bottom: 0px !important; margin-left: 0px; padding: 0px; color: rgb(65, 131, 196); text-decoration: none;\">http://www.hdphp.com</a></p><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; font-size: 17.5px; line-height: 1.25;\"><img alt=\"后盾网  人人做后盾\" src=\"http://www.hdphp.com/houdunwang.jpg\" style=\"margin-top: 0px !important; margin-right: 0px; margin-bottom: 0px !important; margin-left: 0px; padding: 0px; border: 0px; max-width: 100%; height: auto; vertical-align: middle;\"/></p></blockquote><h2 style=\"margin: 20px 0px 10px; padding: 0px; font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; line-height: 36px; text-rendering: optimizelegibility; font-size: 24px; -webkit-font-smoothing: antialiased; cursor: text; position: relative; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(204, 204, 204); white-space: normal;\"><a class=\"anchor\" id=\"优秀特性支持\" href=\"https://git.oschina.net/houdunwang/hdcms#优秀特性支持\" style=\"margin-top: 0px !important; margin-right: 0px; margin-bottom: 0px !important; margin-left: -25px; padding: 0px 0px 0px 25px; color: rgb(65, 131, 196); text-decoration: none; display: block; cursor: pointer; position: absolute; top: 0px; left: 0px; bottom: 0px;\"></a>优秀特性支持</h2><ul style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px 0px 0px 30px; color: rgb(51, 51, 51); font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; font-size: 14px; line-height: 22px; white-space: normal;\" class=\" list-paddingleft-2\"><li><p>HDCMS是完全免费的，你不用担心任何版权问题</p></li><li><p>你可以用在任意网站（包括商业网站）你不需要支付任何费用</p></li><li><p>提供多项优化策略，速度非常快</p></li><li><p>采用 MVC 设计模式</p></li><li><p>生成干净的 URL</p></li><li><p>灵活简单的html标签数据调用</p></li><li><p>内容页tag管理</p></li><li><p>全站搜索关键词管理</p></li><li><p>全站HTML静态化</p></li><li><p>安全的数据备份</p></li><li><p>自定义模型管理</p></li><li><p>支持Memcached与NoSql</p></li><li><p>灵活简单的标签特性</p></li><li><p>每周更新一个新功能</p></li></ul><h1 style=\"margin: 20px 0px 10px; padding: 0px; font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; line-height: 36px; text-rendering: optimizelegibility; font-size: 30px; -webkit-font-smoothing: antialiased; cursor: text; position: relative; white-space: normal;\"><a class=\"anchor\" id=\"安全性\" href=\"https://git.oschina.net/houdunwang/hdcms#安全性\" style=\"margin-top: 0px !important; margin-right: 0px; margin-bottom: 0px !important; margin-left: -25px; padding: 0px 0px 0px 25px; color: rgb(65, 131, 196); text-decoration: none; display: block; cursor: pointer; position: absolute; top: 0px; left: 0px; bottom: 0px;\"></a>安全性</h1><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; line-height: 22px; white-space: normal;\">HDCMS完全基于后盾网HDPHP框架开发提供了众多的安全特性，产品安全无忧。这些特性包括：</p><ul style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px 0px 0px 30px; color: rgb(51, 51, 51); font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; font-size: 14px; line-height: 22px; white-space: normal;\" class=\" list-paddingleft-2\"><li><p>COOKIE加密处理</p></li><li><p>数据预处理机制</p></li><li><p>XSS安全防护</p></li><li><p>表单自动验证</p></li><li><p>强制数据类型转换</p></li><li><p>输入数据过滤</p></li><li><p>表单令牌验证</p></li><li><p>防SQL注入</p></li><li><p>图像上传检测</p></li></ul><h1 style=\"margin: 20px 0px 10px; padding: 0px; font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; line-height: 36px; text-rendering: optimizelegibility; font-size: 30px; -webkit-font-smoothing: antialiased; cursor: text; position: relative; white-space: normal;\"><a class=\"anchor\" id=\"商业友好的开源协议\" href=\"https://git.oschina.net/houdunwang/hdcms#商业友好的开源协议\" style=\"margin-top: 0px !important; margin-right: 0px; margin-bottom: 0px !important; margin-left: -25px; padding: 0px 0px 0px 25px; color: rgb(65, 131, 196); text-decoration: none; display: block; cursor: pointer; position: absolute; top: 0px; left: 0px; bottom: 0px;\"></a>商业友好的开源协议</h1><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; line-height: 22px; white-space: normal;\">HDCMS遵循Apache2开源协议发布。Apache Licence是著名的非盈利开源组织Apache采用的协议。该协议和BSD类似，鼓励代码共享和尊重原作者的著作权，同样允许代码修改，再作为开源或商业软件发布。</p><p><br/></p><h3>下载地址：<a href=\"https://git.oschina.net/houdunwang/hdcms/repository/archive?ref=master\" target=\"_self\">ZIP包下载</a> &nbsp; &nbsp; GIT地址：<a href=\"https://git.oschina.net/houdunwang/hdcms\" target=\"_self\">GIT获取地址</a></h3>'),(2,'<h1 style=\"margin: 0px 0px 10px; padding: 0px; font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; line-height: 36px; text-rendering: optimizelegibility; font-size: 30px; -webkit-font-smoothing: antialiased; cursor: text; position: relative; white-space: normal;\">HDPHP</h1><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; line-height: 22px; white-space: normal;\">后盾网HDPHP框架是一个为用PHP程序语言编写网络应用程序的人员提供的软件包。 提供强大的、完整的类库包,满足开发中的项目需求,可以将需要完成的任务代码量最小化，大大提高项目开发效率与质量。高效的核心编译处理机制让系统运行更快。 做为优秀的框架产品,在系统性能上做的大量的优化处理,只为让程序员使用HDPHP框架强悍的功能同时,用最短的时间完成项目的开发。</p><h3 style=\"margin: 20px 0px 10px; padding: 0px; font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; line-height: 36px; color: rgb(51, 51, 51); text-rendering: optimizelegibility; font-size: 18px; -webkit-font-smoothing: antialiased; cursor: text; position: relative; white-space: normal;\"><a class=\"anchor\" id=\"技术支持：\" href=\"https://git.oschina.net/houdunwang/hdphp#技术支持：\" style=\"margin-top: 0px !important; margin-right: 0px; margin-bottom: 0px !important; margin-left: -25px; padding: 0px 0px 0px 25px; color: rgb(65, 131, 196); text-decoration: none; display: block; cursor: pointer; position: absolute; top: 0px; left: 0px; bottom: 0px;\"></a>技术支持：</h3><blockquote style=\"margin: 15px 0px; padding: 0px 15px; border-left-width: 4px; border-left-style: solid; border-left-color: rgb(221, 221, 221); color: rgb(119, 119, 119); font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; font-size: 14px; line-height: 22px; white-space: normal;\"><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; font-size: 17.5px; line-height: 1.25;\">后盾网：&nbsp;<a href=\"http://www.houdunwang.com/\" title=\"后盾网\" style=\"margin-top: 0px !important; margin-right: 0px; margin-bottom: 0px !important; margin-left: 0px; padding: 0px; color: rgb(65, 131, 196); text-decoration: none;\">http://www.houdunwang.com</a></p><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; font-size: 17.5px; line-height: 1.25;\">HDPHP官网：&nbsp;<a href=\"http://www.hdphp.com/\" title=\"HDPHP官网\" style=\"margin-top: 0px !important; margin-right: 0px; margin-bottom: 0px !important; margin-left: 0px; padding: 0px; color: rgb(65, 131, 196); text-decoration: none;\">http://www.hdphp.com</a></p><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; font-size: 17.5px; line-height: 1.25;\"><img alt=\"后盾网  人人做后盾\" src=\"http://www.hdphp.com/houdunwang.jpg\" style=\"margin-top: 0px !important; margin-right: 0px; margin-bottom: 0px !important; margin-left: 0px; padding: 0px; border: 0px; max-width: 100%; height: auto; vertical-align: middle;\"/></p></blockquote><h2 style=\"margin: 20px 0px 10px; padding: 0px; font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; line-height: 36px; text-rendering: optimizelegibility; font-size: 24px; -webkit-font-smoothing: antialiased; cursor: text; position: relative; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(204, 204, 204); white-space: normal;\"><a class=\"anchor\" id=\"全面的web开发特性支持\" href=\"https://git.oschina.net/houdunwang/hdphp#全面的web开发特性支持\" style=\"margin-top: 0px !important; margin-right: 0px; margin-bottom: 0px !important; margin-left: -25px; padding: 0px 0px 0px 25px; color: rgb(65, 131, 196); text-decoration: none; display: block; cursor: pointer; position: absolute; top: 0px; left: 0px; bottom: 0px;\"></a>全面的WEB开发特性支持</h2><ul style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px 0px 0px 30px; color: rgb(51, 51, 51); font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; font-size: 14px; line-height: 22px; white-space: normal;\" class=\" list-paddingleft-2\"><li><p>HDPHP是完全免费的，你不用担心任何版权问题</p></li><li><p>提供多项优化策略，速度非常快</p></li><li><p>采用 MVC 设计模式</p></li><li><p>URL全站路由控制</p></li><li><p>支持Memcached、Redis等NoSql</p></li><li><p>高效的HDView模板引擎</p></li><li><p>拥有全范围的类库</p></li><li><p>通过自定义类库、辅助函数来实现框架的扩展</p></li><li><p>JS前端自动验证</p></li><li><p>PHP自动验证、自动完成、字段映射、表单令牌</p></li><li><p>高级扩展模型</p></li><li><p>全站缓存控制</p></li><li><p>中文分词</p></li><li><p>商城购物车处理</p></li><li><p>RBAC角色控制</p></li><li><p>完整的错误处理机制</p></li><li><p>集成前端常用库（编辑器、文件上传、图片缩放等等）</p></li><li><p>对象关系映射(ORM)</p></li><li><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px;\">与后盾网hdjs完美整合</p><h2 style=\"margin: 20px 0px 10px; padding: 0px; font-family: inherit; line-height: 36px; color: black; text-rendering: optimizelegibility; font-size: 24px; -webkit-font-smoothing: antialiased; cursor: text; position: relative; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(204, 204, 204);\"><a class=\"anchor\" id=\"安全性\" href=\"https://git.oschina.net/houdunwang/hdphp#安全性\" style=\"margin: 0px 0px 0px -25px; padding: 0px 0px 0px 25px; color: rgb(65, 131, 196); text-decoration: none; display: block; cursor: pointer; position: absolute; top: 0px; left: 0px; bottom: 0px;\"></a>安全性</h2><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">框架在系统层面提供了众多的安全特性，确保你的网站和产品安全无忧。这些特性包括：</p></li><li><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">COOKIE加密处理</p></li><li><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">数据预处理机制</p></li><li><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">XSS安全防护</p></li><li><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">表单自动验证</p></li><li><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">强制数据类型转换</p></li><li><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">输入数据过滤</p></li><li><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">表单令牌验证</p></li><li><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">防SQL注入</p></li><li><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">图像上传检测</p></li></ul><h2 style=\"margin: 20px 0px 10px; padding: 0px; font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; line-height: 36px; text-rendering: optimizelegibility; font-size: 24px; -webkit-font-smoothing: antialiased; cursor: text; position: relative; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(204, 204, 204); white-space: normal;\"><a class=\"anchor\" id=\"商业友好的开源协议\" href=\"https://git.oschina.net/houdunwang/hdphp#商业友好的开源协议\" style=\"margin-top: 0px !important; margin-right: 0px; margin-bottom: 0px !important; margin-left: -25px; padding: 0px 0px 0px 25px; color: rgb(65, 131, 196); text-decoration: none; display: block; cursor: pointer; position: absolute; top: 0px; left: 0px; bottom: 0px;\"></a>商业友好的开源协议</h2><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; line-height: 22px; white-space: normal;\">HDPHP遵循Apache2开源协议发布。Apache Licence是著名的非盈利开源组织Apache采用的协议。该协议和BSD类似，鼓励代码共享和尊重原作者的著作权，同样允许代码修改，再作为开源或商业软件发布。</p><blockquote style=\"margin: 15px 0px; padding: 0px 15px; border-left-width: 4px; border-left-style: solid; border-left-color: rgb(221, 221, 221); color: rgb(119, 119, 119); font-family: Helvetica, &#39;microsoft yahei&#39;, Arial, sans-serif; font-size: 14px; line-height: 22px; white-space: normal;\"><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; font-size: 17.5px; line-height: 1.25;\">V5课堂从2013.12.20开始开课(正在免费授课），本期讲解内容就是HDPHP&amp;CMS开发，同时有问题解答环节！</p></blockquote><h3>下载地址：&nbsp;<a href=\"https://git.oschina.net/houdunwang/hdphp/repository/archive?ref=master\" target=\"_self\">ZIP包下载</a> &nbsp; &nbsp;GIT:&nbsp;<a href=\"http://git.oschina.net/houdunwang/hdphp.git\" target=\"_self\">GIT获取地址</a></h3>'),(3,'<img src=\"http://www.hdphp.com/hd/HDPHP/hdphp/Extend/Org/Keditor/plugins/emoticons/images/13.gif\" border=\"0\" alt=\"\" />标题党，测试一下。'),(6,'<p>\r\n	后台栏目模版选择，</p><p>\r\n	如果模版很多，就全部显示不出来了，只显示这几个文件，希望有滚动条的出现！</p><p><br/></p><p><img src=\"http://www.hdphp.com/upload/editor/2014/04/14/27911397489037.jpg\" alt=\"\"/></p>'),(5,'<p>\r\n	hdcms的列表分页模版在哪里修改？</p><p>\r\n	我有一个文章列表模版，产品列表模版要怎么来绑定分页模版？</p><p><br/></p><p><img src=\"http://www.hdphp.com/upload/editor/2014/04/14/33441397489112.jpg\" alt=\"\"/></p><p><br/></p><p>\r\n	点击下一页后：出现的是搜索页面，没有继承我下载本来的列表页面</p><p><br/></p><p><img src=\"http://www.hdphp.com/upload/editor/2014/04/14/77511397489167.jpg\" alt=\"\"/></p>'),(7,'<p>\r\n	hdcms友情链接调不出来\r\n</p>\r\n<p>\r\n	<img src=\"http://www.hdphp.com/upload/editor/2014/04/14/15311397489006.jpg\" alt=\"\" />\r\n</p>'),(8,'<p>\r\n	hdcms后台栏目权限这里我好像看到可以设置权限的，怎么先在不能设置了呢》\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src=\"http://www.hdphp.com/upload/editor/2014/04/14/50591397490682.jpg\" alt=\"\" />\r\n</p>'),(9,'<p>\r\n	自己在模板目录放置template.jpg 系统做为模板缩略图使用，路径感觉不对。电脑的盘符都读取出来了\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src=\"http://www.hdphp.com/upload/editor/2014/04/15/70501397491456.jpg\" alt=\"\" />\r\n</p>'),(10,'<p><img src=\"http://www.hdphp.com/upload/editor/2014/04/15/92101397525176.jpg\" alt=\"\"/></p><p>\r\n	如图所示，感觉鼠标划过会员头像时候所显示出来的会员面板都是在右边，这样会出现撑大页面横度，使浏览器底部出现横向滚动条！感觉不是很友善，希望向军老师能够改善下。本人是19寸显示器的！【刚上传了好几次缩略图都没法显示出来，咋回事呢！】</p>'),(11,'<p>\r\n	能不能添加团购功能 做成团购网站？ 官方有没有更多的教程 模版等等？？\r\n</p>'),(12,'抢注“管理员”昵称 哈哈&nbsp;&nbsp; 是不是要被封啊~~~~'),(13,'期待更多功能的添加<img border=\"0\" alt=\"\" src=\"http://www.hdphp.com/hd/HDPHP/hdphp/Extend/Org/Keditor/plugins/emoticons/images/79.gif\" />');
/*!40000 ALTER TABLE `hd_content_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_content_single`
--

DROP TABLE IF EXISTS `hd_content_single`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_content_single`
--

LOCK TABLES `hd_content_single` WRITE;
/*!40000 ALTER TABLE `hd_content_single` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_content_single` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_content_tag`
--

DROP TABLE IF EXISTS `hd_content_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_content_tag` (
  `mid` smallint(6) NOT NULL DEFAULT '0' COMMENT '模型cid',
  `cid` smallint(6) NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `aid` int(11) NOT NULL DEFAULT '0' COMMENT '文章aid',
  `tid` int(11) NOT NULL DEFAULT '0' COMMENT '标签id',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户uid'
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_content_tag`
--

LOCK TABLES `hd_content_tag` WRITE;
/*!40000 ALTER TABLE `hd_content_tag` DISABLE KEYS */;
INSERT INTO `hd_content_tag` VALUES (1,5,2,5,1),(1,5,2,4,1),(1,5,2,3,1),(1,5,2,2,1),(1,5,2,1,1),(1,5,1,4,1),(1,5,1,8,1),(1,5,1,7,1),(1,5,1,6,1),(1,5,1,9,1),(1,5,1,3,1),(1,5,2,9,1),(1,1,3,4,6),(1,2,4,6,1),(1,2,4,10,1),(1,12,5,11,1),(1,13,6,12,1),(1,13,7,13,18),(1,10,8,14,18),(1,10,9,15,18),(1,12,10,18,1),(1,12,10,17,1),(1,12,10,16,1),(1,3,11,19,31),(1,10,12,20,33),(1,3,13,21,33);
/*!40000 ALTER TABLE `hd_content_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_custom_js`
--

DROP TABLE IF EXISTS `hd_custom_js`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_custom_js`
--

LOCK TABLES `hd_custom_js` WRITE;
/*!40000 ALTER TABLE `hd_custom_js` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_custom_js` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_favorite`
--

DROP TABLE IF EXISTS `hd_favorite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_favorite` (
  `fid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` smallint(5) unsigned NOT NULL,
  `cid` smallint(5) unsigned NOT NULL,
  `aid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=gbk COMMENT='收藏夹';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_favorite`
--

LOCK TABLES `hd_favorite` WRITE;
/*!40000 ALTER TABLE `hd_favorite` DISABLE KEYS */;
INSERT INTO `hd_favorite` VALUES (4,1,5,2,1),(2,1,5,1,1),(7,1,5,1,0),(8,1,5,2,18),(9,1,5,1,18),(10,1,5,2,0);
/*!40000 ALTER TABLE `hd_favorite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_field`
--

DROP TABLE IF EXISTS `hd_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='模型字段';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_field`
--

LOCK TABLES `hd_field` WRITE;
/*!40000 ALTER TABLE `hd_field` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_link`
--

DROP TABLE IF EXISTS `hd_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_link`
--

LOCK TABLES `hd_link` WRITE;
/*!40000 ALTER TABLE `hd_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_link_config`
--

DROP TABLE IF EXISTS `hd_link_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_link_config`
--

LOCK TABLES `hd_link_config` WRITE;
/*!40000 ALTER TABLE `hd_link_config` DISABLE KEYS */;
INSERT INTO `hd_link_config` VALUES (1,'hdphp开源社区','http://www.hdphp.com','hd/Plugin/Link/Data/logo.png','houdunwang@gmail.com','1、请先在贵站做好后盾网的友情链接\n2、将右侧‘文字链接’或‘图片链接’代码复制到贵站\n3、凡开通我站友情链接且内容健康的网站，经管理员审核后，将显示在此友情链接页面\n4、首页友情连接，要求pr>=2、alexa < 10000；其他页面连接根据具体页面而定（请具体咨询）\n5、贵网站要在百度google都有记录收录，且网站访问速度不能太慢',1,1,'2300071698');
/*!40000 ALTER TABLE `hd_link_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_link_type`
--

DROP TABLE IF EXISTS `hd_link_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_link_type` (
  `tid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` char(50) NOT NULL DEFAULT '' COMMENT '分类名称',
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '系统类型',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='友情链接分类';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_link_type`
--

LOCK TABLES `hd_link_type` WRITE;
/*!40000 ALTER TABLE `hd_link_type` DISABLE KEYS */;
INSERT INTO `hd_link_type` VALUES (1,'友情链接',1),(2,'合作伙伴',1);
/*!40000 ALTER TABLE `hd_link_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_model`
--

DROP TABLE IF EXISTS `hd_model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='模型表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_model`
--

LOCK TABLES `hd_model` WRITE;
/*!40000 ALTER TABLE `hd_model` DISABLE KEYS */;
INSERT INTO `hd_model` VALUES (1,'普通文章','content',1,'',1,0,0,1,'Hdcms','Content','Content','index');
/*!40000 ALTER TABLE `hd_model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_navigation`
--

DROP TABLE IF EXISTS `hd_navigation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_navigation` (
  `nid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` char(30) NOT NULL DEFAULT '菜单名称' COMMENT '菜单名',
  `pid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '父id',
  `target` enum('_self','_blank') NOT NULL DEFAULT '_self' COMMENT '打开方式',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1 显示 0 不显示',
  `list_order` mediumint(100) NOT NULL DEFAULT '100' COMMENT '排序',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='网站前台导航';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_navigation`
--

LOCK TABLES `hd_navigation` WRITE;
/*!40000 ALTER TABLE `hd_navigation` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_navigation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_node`
--

DROP TABLE IF EXISTS `hd_node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `type` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '类型 1 权限控制菜单   2 普通菜单 ',
  `pid` smallint(6) NOT NULL DEFAULT '0',
  `list_order` smallint(6) NOT NULL DEFAULT '100' COMMENT '排序',
  `is_system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '系统菜单 1 是  0 不是',
  `favorite` tinyint(1) NOT NULL DEFAULT '0' COMMENT '后台常用菜单   1 是  0 不是',
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=184 DEFAULT CHARSET=utf8 COMMENT='节点表（后台菜单也使用）';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_node`
--

LOCK TABLES `hd_node` WRITE;
/*!40000 ALTER TABLE `hd_node` DISABLE KEYS */;
INSERT INTO `hd_node` VALUES (1,'内容','Hdcms','','','','','',1,1,0,8,1,0),(2,'内容管理','Hdcms','','','','','',1,1,1,10,1,0),(16,'系统','Hdcms','','','','','',1,1,0,10,1,0),(21,'后台菜单管理','Hdcms','Node','Node','index','','',1,1,19,100,1,0),(3,'附件管理','Hdcms','Upload','Index','index','','',1,1,10,100,1,0),(12,'数据备份','Hdcms','Backup','Backup','index','','',1,1,79,100,1,1),(10,'内容相关管理','Hdcms','','','','','',1,1,1,12,1,0),(13,'栏目管理','Hdcms','Category','Category','index','','',1,1,2,11,1,1),(14,'模型管理','Hdcms','Model','Model','index','','',1,1,10,100,1,0),(15,'推荐位','Hdcms','Flag','Flag','index','','',1,1,10,100,1,0),(19,'系统设置','Hdcms','','','','','',1,1,16,100,1,0),(4,'管理内容','Hdcms','Content','Index','index','','',1,2,2,10,1,1),(11,'管理员设置','Hdcms','','','','','',1,1,16,100,1,0),(17,'管理员管理','Hdcms','Role','Admin','index','','',1,1,11,100,1,0),(18,'角色管理','Hdcms','Role','Role','index','','',1,1,11,100,1,0),(20,'网站配置','Hdcms','Config','Config','edit','','',1,1,19,90,1,0),(5,'生成静态','Hdcms','','','','','',1,1,1,11,1,0),(6,'批量更新栏目页','Hdcms','Html','Html','create_category','','',1,1,5,102,1,0),(8,'生成首页','Hdcms','Html','Html','create_index','','',1,1,5,101,1,0),(9,'批量更新内容页','Hdcms','Html','Html','create_content','','',1,1,5,103,1,0),(28,'修改密码','Hdcms','Role','Personal','edit_password','','',1,1,29,100,1,0),(27,'修改个人信息','Hdcms','Role','Personal','edit_info','','',1,1,29,100,1,0),(26,'我的面板','Hdcms','','','','','',1,1,0,100,1,0),(29,'个人信息','Hdcms','','','','','',1,1,26,100,1,0),(61,'一键更新','Hdcms','Html','Html','create_all','','一键更新全站',1,1,5,100,1,1),(30,'会员','Hdcms','','','','','',1,1,0,100,1,0),(31,'会员管理','Hdcms','','','','','',1,1,30,100,1,0),(32,'会员管理','Hdcms','User','User','index','','',1,1,31,100,1,1),(33,'审核会员','Hdcms','User','User','index','state=0','',1,1,31,100,1,0),(34,'会员组管理','Hdcms','','','','','',1,1,30,100,1,0),(35,'管理会员组','Hdcms','Group','Group','index','','',1,1,34,100,1,0),(36,'模板','Hdcms','','','','','',1,1,0,100,1,0),(37,'模板管理','Hdcms','','','','','',1,1,36,100,1,0),(38,'模板风格','Hdcms','Template','Template','style_list','','',1,1,37,90,1,0),(39,'模板文件','Hdcms','Template','Template','show_dir','','',1,1,37,100,1,0),(70,'标签云','Hdcms','Tag','Tag','index','','',1,1,10,100,1,0),(69,'搜索关键词','Hdcms','Search','Manage','index','','',1,1,79,100,1,0),(79,'其他操作','Hdcms','','','','','',1,1,1,100,1,0),(80,'导航菜单','Hdcms','Navigation','Navigation','index','','',1,1,79,100,1,0),(91,'插件','Hdcms','','','','','',1,1,0,1000,1,0),(92,'插件管理','Hdcms','','','','','',1,1,91,99,1,0),(93,'插件管理','Hdcms','Plugin','Plugin','Plugin_list','','',1,1,92,100,1,0),(94,'正在使用','Hdcms','Plugin','','','','',1,1,91,100,1,0),(180,'审核内容','Hdcms','Content','Audit','content','','',1,1,2,100,0,1),(178,'友情链接','Plugin','Link','Manage','index','','',1,2,94,100,1,0),(156,'BUG管理','Hdcms','Bug','Bug','showBug','','',1,1,154,100,1,0),(179,'评论管理','Hdcms','Comment','Manage','index','','',1,1,10,100,1,1);
/*!40000 ALTER TABLE `hd_node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_plugin`
--

DROP TABLE IF EXISTS `hd_plugin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='插件列表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_plugin`
--

LOCK TABLES `hd_plugin` WRITE;
/*!40000 ALTER TABLE `hd_plugin` DISABLE KEYS */;
INSERT INTO `hd_plugin` VALUES (1,'友情链接','2014-04-01','1.0','后盾网','Link','houdunwang@gmail.com','www.houdunwang.com','2014-02-09');
/*!40000 ALTER TABLE `hd_plugin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_role`
--

DROP TABLE IF EXISTS `hd_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_role`
--

LOCK TABLES `hd_role` WRITE;
/*!40000 ALTER TABLE `hd_role` DISABLE KEYS */;
INSERT INTO `hd_role` VALUES (1,'超级管理员','超级管理员',1,1,10000,1,1),(2,'编辑','内容编辑',1,1,10000,1,1),(3,'发布人员','发布人员',1,1,10000,1,1),(4,'幼儿园','新手上路',0,1,100,1,1),(5,'小学生','小学生',0,1,250,1,1),(6,'中学生','中学生',0,1,450,1,1),(7,'高中生','高中生',0,0,700,1,1),(8,'大学生','大学生',0,0,1050,1,1),(9,'研究生','研究生',0,0,1450,1,1),(10,'博士','博士',0,0,2000,1,1);
/*!40000 ALTER TABLE `hd_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_search`
--

DROP TABLE IF EXISTS `hd_search`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_search` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'mid',
  `word` char(100) NOT NULL DEFAULT '' COMMENT '搜索关键词',
  `total` mediumint(8) unsigned NOT NULL DEFAULT '1' COMMENT '搜索次数',
  PRIMARY KEY (`sid`),
  UNIQUE KEY `name` (`word`) USING BTREE,
  KEY `total` (`total`)
) ENGINE=MyISAM AUTO_INCREMENT=321 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_search`
--

LOCK TABLES `hd_search` WRITE;
/*!40000 ALTER TABLE `hd_search` DISABLE KEYS */;
INSERT INTO `hd_search` VALUES (260,1,'hdphp',18),(257,1,'php',16),(285,1,'内容管理系统',24),(302,1,'后盾网',29),(318,1,'hdcms',31),(312,1,'CMS',14),(317,1,'向军',22),(256,1,'下载',23),(316,1,'框架',24),(14,1,'php后盾',2),(177,1,'后盾_tag',2),(52,1,'sa',1),(276,1,'a',2),(63,1,'',1),(201,1,'111',2),(73,1,'s',1),(74,1,'ph',1),(76,1,'我',1),(98,1,'!S!WCRTESTINPUT000000!E!',5),(85,1,'!S!WCRTESTINPUT000000!E!\' aNd \'7\'=\'7',2),(86,1,'!S!WCRTESTINPUT000000!E!\' aNd \'7\'=\'2',1),(87,1,'1 aNd 7=7',1),(88,1,'1 aNd 7=2',1),(89,1,'1\' aNd \'7\'=\'7',1),(90,1,'1\' aNd \'7\'=\'2',1),(91,1,'99999999 oR 7=7',1),(92,1,'99999999 oR 7=2',1),(97,1,'99999999\' oR \'7\'=\'7',8),(115,1,'?????????',1),(116,1,'??????',1),(254,1,'模板',12),(319,1,'友情链接',7),(273,1,'关联模型写法_tag',2),(179,1,'文章 初次 HDPHP 盾友_tag',1),(180,1,'梦想_tag',1),(181,1,'重复提交_tag',1),(304,1,'hdphp_tag',3),(314,1,'后台模版选择',5),(308,1,'栏目权限',6),(255,1,'分页模版',6),(284,1,'模版缩略图',6),(225,1,'22',1),(231,1,'一中',1),(311,1,'教程 模版',5),(320,1,'底部滚动条',9),(310,1,'期待更多功能',5),(301,1,'后盾真心给力调试_tag',3),(307,1,'错位',4),(293,1,'会员面板',3),(272,1,'test',1),(274,1,'123',1),(275,1,'hd',1),(277,1,'c',1),(296,1,'hack ;DROP ;',1),(303,1,'test_tag',2),(305,1,'CMS_tag',1),(306,1,'hdcms_tag',1);
/*!40000 ALTER TABLE `hd_search` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_session`
--

DROP TABLE IF EXISTS `hd_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_session` (
  `sessid` char(32) NOT NULL DEFAULT '',
  `data` text,
  `atime` int(10) NOT NULL DEFAULT '0',
  `ip` char(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`sessid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_session`
--

LOCK TABLES `hd_session` WRITE;
/*!40000 ALTER TABLE `hd_session` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_system_message`
--

DROP TABLE IF EXISTS `hd_system_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_system_message` (
  `mid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收信人',
  `message` varchar(200) NOT NULL DEFAULT '' COMMENT '消息内容',
  `state` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否阅读  1 已经阅读 0 未阅读',
  `sendtime` int(11) unsigned NOT NULL COMMENT '发送时间',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_system_message`
--

LOCK TABLES `hd_system_message` WRITE;
/*!40000 ALTER TABLE `hd_system_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_system_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_tag`
--

DROP TABLE IF EXISTS `hd_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(30) DEFAULT '' COMMENT 'tag字符',
  `total` mediumint(9) DEFAULT '1' COMMENT '次数',
  PRIMARY KEY (`tid`),
  UNIQUE KEY `name` (`tag`),
  KEY `total` (`total`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_tag`
--

LOCK TABLES `hd_tag` WRITE;
/*!40000 ALTER TABLE `hd_tag` DISABLE KEYS */;
INSERT INTO `hd_tag` VALUES (1,'hdphp',2),(2,'下载',2),(3,'框架',3),(4,'后盾网',5),(5,'向军',2),(6,'hdcms',4),(7,'CMS',2),(8,'内容管理系统',2),(9,'php',2),(10,'模板',2),(11,'分页模版',4),(12,'后台模版选择',3),(13,'友情链接',2),(14,'栏目权限',1),(15,'模版缩略图',1),(16,'会员面板',6),(17,'错位',6),(18,'底部滚动条',6),(19,'教程 模版',1),(20,'抢注[管理员\"昵称 哈哈   是不是要被封啊~~~~',1),(21,'期待更多功能',1);
/*!40000 ALTER TABLE `hd_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_template_tag`
--

DROP TABLE IF EXISTS `hd_template_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_template_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` mediumint(8) unsigned DEFAULT NULL COMMENT '类型  1 arclist',
  `options` text COMMENT '标签属性',
  `name` varchar(100) DEFAULT NULL COMMENT '标签名称',
  `content` text COMMENT '标签内容',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='后台管理员自定义模板标签';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_template_tag`
--

LOCK TABLES `hd_template_tag` WRITE;
/*!40000 ALTER TABLE `hd_template_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_template_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_upload`
--

DROP TABLE IF EXISTS `hd_upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='上传文件';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_upload`
--

LOCK TABLES `hd_upload` WRITE;
/*!40000 ALTER TABLE `hd_upload` DISABLE KEYS */;
INSERT INTO `hd_upload` VALUES (1,'360截图-520887','64631397455215','64631397455215.jpg','upload/content/2014/04/14/64631397455215.jpg','jpg',1,57842,1397455215,1,1),(2,'QQ图片20140414163531','66451397464669','66451397464669.jpg','upload/editor/2014/04/14/66451397464669.jpg','jpg',1,38895,1397464669,1,4),(3,'11','71521397486502','71521397486502.jpg','upload/content/2014/04/14/71521397486502.jpg','jpg',1,154392,1397486502,0,4),(4,'2','15311397489006','15311397489006.jpg','upload/editor/2014/04/14/15311397489006.jpg','jpg',1,79572,1397489006,1,18),(5,'11','27911397489037','27911397489037.jpg','upload/editor/2014/04/14/27911397489037.jpg','jpg',1,154392,1397489038,1,18),(6,'3','33441397489112','33441397489112.jpg','upload/editor/2014/04/14/33441397489112.jpg','jpg',1,238542,1397489112,1,18),(7,'4','77511397489167','77511397489167.jpg','upload/editor/2014/04/14/77511397489167.jpg','jpg',1,140957,1397489167,1,18),(8,'1','50591397490682','50591397490682.jpg','upload/editor/2014/04/14/50591397490682.jpg','jpg',1,132870,1397490682,0,4),(9,'aa','70501397491456','70501397491456.jpg','upload/editor/2014/04/15/70501397491456.jpg','jpg',1,265116,1397491456,0,4),(10,'7%@5TH7SLD5ODGN5W8GNKM8','92101397525176','92101397525176.jpg','upload/editor/2014/04/15/92101397525176.jpg','jpg',1,93292,1397525176,1,29);
/*!40000 ALTER TABLE `hd_upload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_user`
--

DROP TABLE IF EXISTS `hd_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `lock_end_time` int(10) NOT NULL DEFAULT '0' COMMENT '锁定到期时间',
  `qq` char(20) NOT NULL DEFAULT '' COMMENT 'qq号码',
  `sex` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 男 2 女 3 保密',
  `favicon` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `credits` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '积分',
  `rid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  `allow_user_set_credits` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '允许前台会员设置投稿积分',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '个性签名',
  `domain` char(20) NOT NULL DEFAULT '' COMMENT '个性域名',
  `spec_num` mediumint(9) unsigned NOT NULL DEFAULT '0' COMMENT '空间访问数',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nickname` (`nickname`),
  UNIQUE KEY `domain` (`domain`),
  KEY `password` (`password`),
  KEY `credits` (`credits`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_user`
--

LOCK TABLES `hd_user` WRITE;
/*!40000 ALTER TABLE `hd_user` DISABLE KEYS */;
INSERT INTO `hd_user` VALUES (1,'后盾网向军','admin','83ff46e5f629ef870fd4f59d954a425f','d0e412d21d','houdunwangxj@gmail.com',1397452628,1397563239,'101.38.68.62','101.38.0.145',1,0,'',1,'',10008,1,1,'后盾网  人人做后盾','houdunwangxj',282),(2,'∞。『007』','mm2007','0c0581a684702515e7b4dfd05a4b2a96','a347980cc1','1016053132@qq.com',1397455742,1397455742,'118.194.193.211','118.194.193.211',1,0,'',1,'',100,4,1,'','7',204),(3,'streson','streson','12a2ef29eb09e12a61a0cae1ae5e9f59','3f26fbd6c5','862747954@qq.com',1397456604,1397456604,'171.107.24.170','171.107.24.170',1,0,'',1,'',100,4,1,'','streson',198),(4,'levivi','levivi','ee2d59c9cf329e39c8ea68e3ef7b3263','189fbc843c','442202406@qq.com',1397456939,1397524236,'220.163.4.232','220.163.4.232',1,0,'',1,'',100,4,1,'<php?    echo \" 哎哟！你','levivi',190),(5,'后盾网','后盾网','83af755631cb9bf6db4440481b096bf5','0282ee46f6','houdunwang@gmail.com',1397457356,1397457356,'101.38.68.62','101.38.68.62',1,0,'',1,'',100,4,1,'','后盾网',187),(6,'深水鱼','深水鱼','68a60fdfc5f00eb17eb9155568276ae5','fc8600d3cd','admin@sunqizheng.cn',1397458844,1397538911,'119.255.55.6','119.255.55.6',1,0,'',1,'',100,4,1,'','深水鱼',174),(7,'Snowden','Snowden','7b585caf04e16b7745c56155944388a1','4c043b6352','jxxuxuefeng@qq.com',1397459465,1397459465,'220.189.251.102','220.189.251.102',1,0,'',1,'',100,4,1,'','Snowden',171),(8,'srdcphp','srdcphp','fdb8ad56bd3ece2f24a9d86ace853f6a','63c853c27f','srdc2012@163.com',1397459896,1397459896,'118.198.227.205','118.198.227.205',1,0,'',1,'',100,4,1,'','srdcphp',171),(9,'snowdiva','snowdiva','9660e1c0b23cdd09880c9db3f201e70c','08154fcb0f','snowdiva@163.com',1397459989,1397459989,'221.11.45.154','221.11.45.154',1,0,'',1,'',100,4,1,'','snowdiva',171),(10,'kxinlx','kxinlx','f7cdcff0dd30328dad69db644bbd607c','dff65fc034','kxinlx@qq.com',1397459994,1397459994,'114.250.16.21','114.250.16.21',1,0,'',1,'',100,4,1,'','kxinlx',171),(11,'miracle','skyxu27','80057c11d15b4eb78ff591519a305802','844f32b2f7','5352722@qq.com',1397460070,1397460070,'223.72.77.59','223.72.77.59',1,0,'',1,'',100,4,1,'','miracle',171),(12,'liang','liang','6d9e325e739c9f1725eb15a058fcb3aa','17197b65d6','499605194@qq.com',1397460554,1397460554,'202.104.17.142','202.104.17.142',1,0,'',1,'',100,4,1,'','liang',169),(13,'q56727011','q56727011','9b69bad66ca4bfa4734f5a462f2473b5','47769fd959','56727011@qq.com',1397460607,1397460607,'122.141.208.147','122.141.208.147',1,0,'',1,'',100,4,1,'','q56727011',169),(14,'tests','tests','5462d547167ceadba21bb6ebdd055e09','256c1dfab2','tests@testwtet.cn',1397460825,1397460825,'59.55.66.49','59.55.66.49',1,0,'',1,'',100,4,1,'','tests',168),(15,'s2010rt','s2010rt','3be2c607b3215a645018f659a8e12ca3','15252c0d8b','1007889475@qq.com',1397461108,1397461108,'218.29.61.109','218.29.61.109',1,0,'',1,'',100,4,1,'','s2010rt',167),(16,'benbenhu','benbenhu','c1ee94f94960657a2b2fa68cf1557792','436f49aa8e','chenxuehu0@qq.com',1397461728,1397461728,'58.251.134.2','58.251.134.2',1,0,'',1,'',100,4,1,'','benbenhu',163),(17,'nangua','nangua','51427532844210f29177c16653e93bfb','7c6d582d2a','410966126@qq.com',1397461813,1397461813,'59.58.101.210','59.58.101.210',1,0,'',1,'',100,4,1,'','nangua',163),(18,'jiangyouhong','jiangyouhong','ace1fa19c6ac8276f1d133b13440621e','33b2214004','464748053@qq.com',1397461936,1397557215,'182.245.69.209','112.115.148.208',1,0,'',1,'',100,4,1,'','jiangyouhong',163),(19,'wazd12','wazd12','a983e7a1c10e26697e2e3be58980c9dd','c30a9085e0','1215850394@qq.com',1397462468,1397462468,'223.64.60.99','223.64.60.99',1,0,'',1,'',100,4,1,'','wazd12',159),(20,'xazzz','xazzz','8c77a669729a21a21f2f2599d8bfb1b2','8f3bc5d0b1','10752842@qq.com',1397463288,1397463288,'123.138.75.190','123.138.75.190',1,0,'',1,'',100,4,1,'','xazzz',158),(21,'mangmu126','mangmu126','8879c8899c3c3325da10917651d77c81','76ae920579','1455941459@qq.com',1397467143,1397467143,'183.1.69.251','183.1.69.251',1,0,'',1,'',100,4,1,'','mangmu126',144),(22,'wt2209','wt2209','501e96fdceddea33214626b8e93345f8','6e2bdd08e6','wt2209@126.com',1397467445,1397467445,'39.65.38.79','39.65.38.79',1,0,'',1,'',100,4,1,'','wt2209',142),(23,'web','web','b1cc7b0a95c6d04b07c7dc2e01ed18ce','98e28d3f46','tosend@qq.com',1397473344,1397473344,'125.71.209.32','125.71.209.32',1,0,'',1,'',100,4,1,'','web',131),(24,'xiuqian','xiuqian','abcdf09b9c485f044fb9e93a1886b050','34760c654b','huangzexiameishu@163.com',1397478342,1397478342,'218.4.251.228','218.4.251.228',1,0,'',1,'',100,4,1,'','xiuqian',122),(25,'nq10087','nq10087','0e65655256690e29bffaba2635a4f29b','25a4d68c85','355032497@qq.com',1397478345,1397478345,'120.15.173.216','120.15.173.216',1,0,'',1,'',100,4,1,'','nq10087',122),(26,'宇宙骑士','andy_hd','58f634fb5db65781ec078b22fd9dc79b','e2c16a7a51','1010707582@qq.com',1397480169,1397564552,'106.60.186.97','106.60.189.200',1,0,'',1,'',100,4,1,'','andy_hd',119),(27,'php','php','1065dc010a63c5f69677fbd4c787a0dc','ca8042654f','alexa456@163.com',1397480268,1397480268,'14.131.189.124','14.131.189.124',1,0,'',1,'',100,4,1,'','php',119),(28,'chimerica','chimerica','79b15ff34eeac290f3ce6b362cad18f2','6fa9340f26','971729864@qq.com',1397524062,1397524062,'122.71.233.127','122.71.233.127',1,0,'',1,'',100,4,1,'','chimerica',72),(29,'CaipengSir','CaipengSir','51650c39eeacc7954bb2972e75230139','35505bc8de','473816868@qq.com',1397524442,1397525150,'61.143.189.120','61.143.189.120',1,0,'',1,'',100,4,1,'','CaipengSir',72),(30,'bashan1884','bashan1884','6c8206fb6ba84bf37f097d19cfabacff','d714c8091e','410251051@qq.com',1397525462,1397552571,'124.205.129.162','124.205.129.162',1,0,'',1,'',100,4,1,'','bashan1884',70),(31,'houdun','houdun','635c73086d181603426de8a4809542bf','7108a207f1','858110916@qq.com',1397528497,1397528497,'123.170.198.107','123.170.198.107',1,0,'',1,'',100,4,1,'','houdun',70),(32,'vip','vip','0f56181de9a9db716ff5c28b551437a3','ab9515f3fe','bzswzgd@126.com',1397529858,1397529858,'123.170.198.107','123.170.198.107',1,0,'',1,'',100,4,1,'','vip',69),(33,'管理员','管理员','d8949a71398f2e00e3344fe60275beb0','b8351ea93d','zgd666888@126.com',1397529927,1397553360,'123.170.198.107','123.170.198.107',1,0,'',1,'',100,4,1,'','管理员',69),(34,'一杯茶','一杯茶','bea491850118ac25db61feb474f5b022','8403fd4142','wongsmail@qq.com',1397534292,1397534292,'59.51.110.147','59.51.110.147',1,0,'',1,'',100,4,1,'','一杯茶',65),(35,'z1030967305','z1030967305','0f3508162f55c0172908635a48fbae5a','57a62d4f8e','1030967305@qq.com',1397539863,1397539863,'113.240.129.191','113.240.129.191',1,0,'',1,'',100,4,1,'','z1030967305',46),(36,'超级管理员','超级管理员','973132721c14493fe9098e054cb79f8e','0782beca1a','371404655@qq.com',1397541925,1397541925,'125.43.223.24','125.43.223.24',1,0,'',1,'',100,4,1,'','超级管理员',44),(37,'IceCry','IceCry','fc19e15e9779899d9e9dbb428466f75d','a39caf407b','yzhsh89@126.com',1397549450,1397549450,'14.106.190.124','14.106.190.124',1,0,'',1,'',100,4,1,'','IceCry',31),(38,'service','server','ab20817aecb76b2b8c70f881023b17af','2907ce26b9','455238182@qq.com',1397549462,1397549462,'115.46.139.137','115.46.139.137',1,0,'',1,'',100,4,1,'','server',31),(39,'newgudi','newgudi','ec7b0297eedaf16fd5fb940e693170b5','e1ef65ded5','newgudi@163.com',1397558964,1397558964,'182.121.155.52','182.121.155.52',1,0,'',1,'',100,4,1,'','newgudi',21),(40,'test','test','3822b6670dc5e4e81d7d02b93150c73a','411cd5b95d','test@test.com',1397561026,1397561026,'113.132.255.194','113.132.255.194',1,0,'',1,'',100,4,1,'','test',13);
/*!40000 ALTER TABLE `hd_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_user_deny_ip`
--

DROP TABLE IF EXISTS `hd_user_deny_ip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_user_deny_ip` (
  `ip` char(15) NOT NULL DEFAULT '' COMMENT '拒绝访问ip',
  UNIQUE KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='拒绝访问ip';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_user_deny_ip`
--

LOCK TABLES `hd_user_deny_ip` WRITE;
/*!40000 ALTER TABLE `hd_user_deny_ip` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_user_deny_ip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_user_dynamic`
--

DROP TABLE IF EXISTS `hd_user_dynamic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_user_dynamic` (
  `did` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户uid',
  `content` text NOT NULL COMMENT '内容',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`did`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=gbk COMMENT='会员动态';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_user_dynamic`
--

LOCK TABLES `hd_user_dynamic` WRITE;
/*!40000 ALTER TABLE `hd_user_dynamic` DISABLE KEYS */;
INSERT INTO `hd_user_dynamic` VALUES (1,2,'<a href=\'http://www.hdphp.com?mm2007\'><img src=\'http://www.hdphp.com/upload/user/1/2_50.png\'\n                            onmouseover=\'user.show(this,2)\'/></a> <a href=\'http://www.hdphp.com?mm2007\'>mm2007</a> 发表了评论: 占楼~占楼~占楼~占楼~占楼~',1397455768),(2,2,'<a href=\'http://www.hdphp.com?mm2007\'><img src=\'http://www.hdphp.com/upload/user/1/2_50.png\'\n                            onmouseover=\'user.show(this,2)\'/></a> <a href=\'http://www.hdphp.com?mm2007\'>mm2007</a> 发表了评论: 占楼~占楼~占楼~占楼~占楼~',1397455783),(3,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 欢迎楼主',1397455994),(4,3,'<a href=\'http://www.hdphp.com?streson\'><img src=\'http://www.hdphp.com/upload/user/1/3_50.png\'\n                            onmouseover=\'user.show(this,3)\'/></a> <a href=\'http://www.hdphp.com?streson\'>streson</a> 发表了评论: 恭喜恭喜~！',1397456635),(5,4,'<a href=\'http://www.hdphp.com?levivi\'><img src=\'http://www.hdphp.com/upload/user/1/4_50.png\'\n                            onmouseover=\'user.show(this,4)\'/></a> <a href=\'http://www.hdphp.com?levivi\'>levivi</a> 发表了评论: 呀 ，，，算是前排嘛！强烈支持',1397456968),(6,4,'<a href=\'http://www.hdphp.com?levivi\'><img src=\'http://www.hdphp.com/upload/user/1/4_50.png\'\n                            onmouseover=\'user.show(this,4)\'/></a> <a href=\'http://www.hdphp.com?levivi\'>levivi</a> 发表了评论: 强烈支持',1397457189),(7,7,'<a href=\'http://www.hdphp.com?Snowden\'><img src=\'http://www.hdphp.com/upload/user/1/7_50.png\'\r\n                            onmouseover=\'user.show(this,7)\'/></a> <a href=\'http://www.hdphp.com?Snowden\'>Snowden</a> 发表了评论: - - 希望尽快推出更多教程~~',1397459706),(8,8,'<a href=\'http://www.hdphp.com?srdcphp\'><img src=\'http://www.hdphp.com/upload/user/1/8_50.png\'\r\n                            onmouseover=\'user.show(this,8)\'/></a> <a href=\'http://www.hdphp.com?srdcphp\'>srdcphp</a> 发表了评论: 昨天下载的貌似有BUG呀，新建模板风格提示”文件夹不存在“，',1397459962),(9,9,'<a href=\'http://www.hdphp.com?snowdiva\'><img src=\'http://www.hdphp.com/upload/user/1/9_50.png\'\r\n                            onmouseover=\'user.show(this,9)\'/></a> <a href=\'http://www.hdphp.com?snowdiva\'>snowdiva</a> 发表了评论: 必须支持呀~~~各种手册插件丰富起来，搞个社区，活跃起来~~',1397460016),(10,11,'<a href=\'http://www.hdphp.com?miracle\'><img src=\'http://www.hdphp.com/upload/user/1/11_50.png\'\r\n                            onmouseover=\'user.show(this,11)\'/></a> <a href=\'http://www.hdphp.com?miracle\'>miracle</a> 发表了评论: 正式版终于发布了，恭喜！\r\n',1397460230),(11,6,'<a href=\'http://www.hdphp.com?深水鱼\'><img src=\'http://www.hdphp.com/upload/user/1/6_50.png\'\r\n                            onmouseover=\'user.show(this,6)\'/></a> <a href=\'http://www.hdphp.com?深水鱼\'>深水鱼</a> 发表了评论: 你还在使用漏洞百出的织梦吗?还在为无比繁琐的帝国cms纠结吗',1397460341),(12,13,'<a href=\'http://www.hdphp.com?q56727011\'><img src=\'http://www.hdphp.com/upload/user/1/13_50.png\'\r\n                            onmouseover=\'user.show(this,13)\'/></a> <a href=\'http://www.hdphp.com?q56727011\'>q56727011</a> 发表了评论: 会出相关教程吗',1397460630),(13,14,'<a href=\'http://www.hdphp.com?tests\'><img src=\'http://www.hdphp.com/upload/user/1/14_50.png\'\r\n                            onmouseover=\'user.show(this,14)\'/></a> <a href=\'http://www.hdphp.com?tests\'>tests</a> 发表了评论: 占位恭喜',1397461014),(14,15,'<a href=\'http://www.hdphp.com?s2010rt\'><img src=\'http://www.hdphp.com/upload/user/1/15_50.png\'\r\n                            onmouseover=\'user.show(this,15)\'/></a> <a href=\'http://www.hdphp.com?s2010rt\'>s2010rt</a> 发表了评论: 这家伙太懒了，什么都没留下，只留下了恭喜',1397461181),(15,9,'<a href=\'http://www.hdphp.com?snowdiva\'><img src=\'http://www.hdphp.com/upload/user/1/9_50.png\'\r\n                            onmouseover=\'user.show(this,9)\'/></a> <a href=\'http://www.hdphp.com?snowdiva\'>snowdiva</a> 发表了评论: 向为框架辛勤付出的各位老师，特别是向军老师表示感谢~我会用自',1397461526),(16,17,'<a href=\'http://www.hdphp.com?nangua\'><img src=\'http://www.hdphp.com/upload/user/1/17_50.png\'\r\n                            onmouseover=\'user.show(this,17)\'/></a> <a href=\'http://www.hdphp.com?nangua\'>nangua</a> 发表了评论: 顶起顶起。',1397461848),(17,6,'<a href=\'http://www.hdphp.com?深水鱼\'><img src=\'http://www.hdphp.com/upload/user/1/6_50.png\'\r\n                            onmouseover=\'user.show(this,6)\'/></a> <a href=\'http://www.hdphp.com?深水鱼\'>深水鱼</a> 发表了文章: <a href=\"http://www.hdphp.com/index.php?a=Index&c=Article&m=show&mid=1&cid=1&aid=3\" target=\"_blank\">后盾网最帅的是哪位老师？</a>',1397462135),(18,6,'<a href=\'http://www.hdphp.com?深水鱼\'><img src=\'http://www.hdphp.com/upload/user/1/6_50.png\'\r\n                            onmouseover=\'user.show(this,6)\'/></a> <a href=\'http://www.hdphp.com?深水鱼\'>深水鱼</a> 发表了评论: 上传的图片没有显示。',1397462155),(19,19,'<a href=\'http://www.hdphp.com?wazd12\'><img src=\'http://www.hdphp.com/upload/user/1/19_50.png\'\r\n                            onmouseover=\'user.show(this,19)\'/></a> <a href=\'http://www.hdphp.com?wazd12\'>wazd12</a> 发表了评论: 支持一下',1397462521),(20,18,'<a href=\'http://www.hdphp.com?jiangyouhong\'><img src=\'http://www.hdphp.com/upload/user/1/18_50.png\'\r\n                            onmouseover=\'user.show(this,18)\'/></a> <a href=\'http://www.hdphp.com?jiangyouhong\'>jiangyouhong</a> 发表了评论: 你在哪里传图片，不显示？',1397462768),(21,4,'<a href=\'http://www.hdphp.com?levivi\'><img src=\'http://www.hdphp.com/upload/user/1/4_50.png\'\r\n                            onmouseover=\'user.show(this,4)\'/></a> <a href=\'http://www.hdphp.com?levivi\'>levivi</a> 发表了文章: <a href=\"http://www.hdphp.com/index.php?a=Index&c=Article&m=show&mid=1&cid=1&aid=4\" target=\"_blank\">关于模板问题</a>',1397464718),(22,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\r\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 同喜',1397465144),(23,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\r\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 模板的配置文件设置对了吗？',1397465195),(24,18,'<a href=\'http://www.hdphp.com?jiangyouhong\'><img src=\'http://www.hdphp.com/upload/user/1/18_50.png\'\r\n                            onmouseover=\'user.show(this,18)\'/></a> <a href=\'http://www.hdphp.com?jiangyouhong\'>jiangyouhong</a> 发表了评论: 不行了，您测试下',1397465639),(25,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\r\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 一会我看一下，我看到你给我发的网站私信了。',1397465725),(26,4,'<a href=\'http://www.hdphp.com?levivi\'><img src=\'http://www.hdphp.com/upload/user/1/4_50.png\'\r\n                            onmouseover=\'user.show(this,4)\'/></a> <a href=\'http://www.hdphp.com?levivi\'>levivi</a> 发表了评论: 谢谢老师  设置对了的',1397466013),(27,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\r\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 问题已经修复，但是GIT推不动。一会回来，我推一下，今晚要打',1397467825),(28,4,'<a href=\'http://www.hdphp.com?levivi\'><img src=\'http://www.hdphp.com/upload/user/1/4_50.png\'\r\n                            onmouseover=\'user.show(this,4)\'/></a> <a href=\'http://www.hdphp.com?levivi\'>levivi</a> 发表了评论: 好的  谢谢啊  我看见git.os上面更新了\r\n',1397468064),(29,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\r\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 推上去了，pull吧！',1397468331),(30,4,'<a href=\'http://www.hdphp.com?levivi\'><img src=\'http://www.hdphp.com/upload/user/1/4_50.png\'\r\n                            onmouseover=\'user.show(this,4)\'/></a> <a href=\'http://www.hdphp.com?levivi\'>levivi</a> 发表了评论: 好的   哈哈 谢谢向老师',1397468426),(31,23,'<a href=\'http://www.hdphp.com?web\'><img src=\'http://www.hdphp.com/upload/user/1/23_50.png\'\r\n                            onmouseover=\'user.show(this,23)\'/></a> <a href=\'http://www.hdphp.com?web\'>web</a> 发表了评论: 凑热闹的。。。。。。',1397473396),(32,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\r\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 当然会的，本周五开始V5课堂讲解HDCMS与插件开发方法',1397475825),(33,24,'<a href=\'http://www.hdphp.com?xiuqian\'><img src=\'http://www.hdphp.com/upload/user/1/24_50.png\'\r\n                            onmouseover=\'user.show(this,24)\'/></a> <a href=\'http://www.hdphp.com?xiuqian\'>xiuqian</a> 发表了评论: 老师  ，会有视频讲解吗',1397478425),(34,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\r\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 看来你没听过V5课堂呀，是在线即时讲解，远程视频教学（免费的',1397478557),(35,26,'<a href=\'http://www.hdphp.com?andy_hd\'><img src=\'http://www.hdphp.com/upload/user/1/26_50.png\'\r\n                            onmouseover=\'user.show(this,26)\'/></a> <a href=\'http://www.hdphp.com?andy_hd\'>宇宙骑士</a> 发表了评论: 顶！。。。。。。。。。。。。。。。。。。。。',1397480249),(36,27,'<a href=\'http://www.hdphp.com?php\'><img src=\'http://www.hdphp.com/upload/user/1/27_50.png\'\r\n                            onmouseover=\'user.show(this,27)\'/></a> <a href=\'http://www.hdphp.com?php\'>php</a> 发表了评论: 好',1397480301),(37,18,'<a href=\'http://www.hdphp.com?jiangyouhong\'><img src=\'http://www.hdphp.com/upload/user/1/18_50.png\'\r\n                            onmouseover=\'user.show(this,18)\'/></a> <a href=\'http://www.hdphp.com?jiangyouhong\'>jiangyouhong</a> 发表了文章: <a href=\"http://www.hdphp.com/index.php?a=Index&c=Article&m=show&mid=1&cid=3&aid=5\" target=\"_blank\">hdcms的列表分页模版修改</a>',1397484163),(38,18,'<a href=\'http://www.hdphp.com?jiangyouhong\'><img src=\'http://www.hdphp.com/upload/user/1/18_50.png\'\r\n                            onmouseover=\'user.show(this,18)\'/></a> <a href=\'http://www.hdphp.com?jiangyouhong\'>jiangyouhong</a> 发表了文章: <a href=\"http://www.hdphp.com/index.php?a=Index&c=Article&m=show&mid=1&cid=13&aid=6\" target=\"_blank\">hdcms后台模版选择问题</a>',1397486568),(39,18,'<a href=\'http://www.hdphp.com?jiangyouhong\'><img src=\'http://www.hdphp.com/upload/user/1/18_50.png\'\r\n                            onmouseover=\'user.show(this,18)\'/></a> <a href=\'http://www.hdphp.com?jiangyouhong\'>jiangyouhong</a> 发表了评论: 耶，我传的图片呢，怎么没有显示出来！！！',1397486647),(40,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\r\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 你是怎么传的，是缩略图还是正文里的图片 呀？缩略图只在列表页',1397487798),(41,18,'<a href=\'http://www.hdphp.com?jiangyouhong\'><img src=\'http://www.hdphp.com/upload/user/1/18_50.png\'\r\n                            onmouseover=\'user.show(this,18)\'/></a> <a href=\'http://www.hdphp.com?jiangyouhong\'>jiangyouhong</a> 发表了文章: <a href=\"http://www.hdphp.com/index.php?a=Index&c=Article&m=show&mid=1&cid=13&aid=7\" target=\"_blank\">hdcms友情链接调不出来</a>',1397488794),(42,18,'<a href=\'http://www.hdphp.com?jiangyouhong\'><img src=\'http://www.hdphp.com/upload/user/1/18_50.png\'\r\n                            onmouseover=\'user.show(this,18)\'/></a> <a href=\'http://www.hdphp.com?jiangyouhong\'>jiangyouhong</a> 发表了评论: 传的是缩略图，哦，是这样啊，我看到也内容页面，没注意',1397489263),(43,18,'<a href=\'http://www.hdphp.com?jiangyouhong\'><img src=\'http://www.hdphp.com/upload/user/1/18_50.png\'\r\n                            onmouseover=\'user.show(this,18)\'/></a> <a href=\'http://www.hdphp.com?jiangyouhong\'>jiangyouhong</a> 发表了文章: <a href=\"http://www.hdphp.com/index.php?a=Index&c=Article&m=show&mid=1&cid=10&aid=8\" target=\"_blank\">hdcms后台栏目权限</a>',1397490729),(44,18,'<a href=\'http://www.hdphp.com?jiangyouhong\'><img src=\'http://www.hdphp.com/upload/user/1/18_50.png\'\r\n                            onmouseover=\'user.show(this,18)\'/></a> <a href=\'http://www.hdphp.com?jiangyouhong\'>jiangyouhong</a> 发表了文章: <a href=\"http://www.hdphp.com/index.php?a=Index&c=Article&m=show&mid=1&cid=10&aid=9\" target=\"_blank\">hdcms模版缩略图路径问题</a>',1397491526),(45,28,'<a href=\'http://www.hdphp.com?chimerica\'><img src=\'http://www.hdphp.com/upload/user/1/28_50.png\'\r\n                            onmouseover=\'user.show(this,28)\'/></a> <a href=\'http://www.hdphp.com?chimerica\'>chimerica</a> 发表了评论: 强烈关注中！！！',1397524193),(46,29,'<a href=\'http://www.hdphp.com?CaipengSir\'><img src=\'http://www.hdphp.com/upload/user/1/29_50.png\'\r\n                            onmouseover=\'user.show(this,29)\'/></a> <a href=\'http://www.hdphp.com?CaipengSir\'>CaipengSir</a> 发表了文章: <a href=\"http://www.hdphp.com/index.php?a=Index&c=Article&m=show&mid=1&cid=3&aid=10\" target=\"_blank\">hdcms首页显示会员详细信息面板位置问题</a>',1397524896),(47,30,'<a href=\'http://www.hdphp.com?bashan1884\'><img src=\'http://www.hdphp.com/upload/user/1/30_50.png\'\r\n                            onmouseover=\'user.show(this,30)\'/></a> <a href=\'http://www.hdphp.com?bashan1884\'>bashan1884</a> 发表了评论: 安装不成功\r\n提示:网站出错了，请稍候再试...',1397525476),(48,31,'<a href=\'http://www.hdphp.com?houdun\'><img src=\'http://www.hdphp.com/upload/user/1/31_50.png\'\r\n                            onmouseover=\'user.show(this,31)\'/></a> <a href=\'http://www.hdphp.com?houdun\'>houdun</a> 发表了文章: <a href=\"http://www.hdphp.com/index.php?a=Index&c=Article&m=show&mid=1&cid=3&aid=11\" target=\"_blank\">是博客系统吗？</a>',1397529773),(49,33,'<a href=\'http://www.hdphp.com?管理员\'><img src=\'http://www.hdphp.com/upload/user/1/33_50.png\'\r\n                            onmouseover=\'user.show(this,33)\'/></a> <a href=\'http://www.hdphp.com?管理员\'>管理员</a> 发表了文章: <a href=\"http://www.hdphp.com/index.php?a=Index&c=Article&m=show&mid=1&cid=10&aid=12\" target=\"_blank\">抢注“管理员”昵称 哈哈</a>',1397529990),(50,33,'<a href=\'http://www.hdphp.com?管理员\'><img src=\'http://www.hdphp.com/upload/user/1/33_50.png\'\r\n                            onmouseover=\'user.show(this,33)\'/></a> <a href=\'http://www.hdphp.com?管理员\'>管理员</a> 发表了评论: 顶',1397530056),(51,33,'<a href=\'http://www.hdphp.com?管理员\'><img src=\'http://www.hdphp.com/upload/user/1/33_50.png\'\r\n                            onmouseover=\'user.show(this,33)\'/></a> <a href=\'http://www.hdphp.com?管理员\'>管理员</a> 发表了文章: <a href=\"http://www.hdphp.com/index.php?a=Index&c=Article&m=show&mid=1&cid=3&aid=13\" target=\"_blank\">期待更多功能</a>',1397530114),(52,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\r\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 没有同学反映这个问题，你周五来上V5课堂吧。到时我帮助你解决',1397532777),(53,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\r\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 会越来越好的。！',1397532800),(54,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\r\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 1 你提出的问题，很好，我们尽快修复这个模板问题。\r\n2 缩',1397532900),(55,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\r\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 分页使用pagelist标签调用就行，分页模板默认是arti',1397533006),(56,18,'<a href=\'http://www.hdphp.com?jiangyouhong\'><img src=\'http://www.hdphp.com/upload/user/1/18_50.png\'\r\n                            onmouseover=\'user.show(this,18)\'/></a> <a href=\'http://www.hdphp.com?jiangyouhong\'>jiangyouhong</a> 发表了评论: 我就是用pagelist调用的.各种刷新，点击分页出来的是搜',1397534616),(57,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\r\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 我再测试一下，还有周五有V5课堂，讲解HDCMS使用与插件安',1397535535),(58,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\r\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 收到，这是一个小问题',1397536354),(59,18,'<a href=\'http://www.hdphp.com?jiangyouhong\'><img src=\'http://www.hdphp.com/upload/user/1/18_50.png\'\r\n                            onmouseover=\'user.show(this,18)\'/></a> <a href=\'http://www.hdphp.com?jiangyouhong\'>jiangyouhong</a> 发表了评论: 老师，你把Search下的模板改动一下，你点击列表分页看看，',1397538438),(60,6,'<a href=\'http://www.hdphp.com?深水鱼\'><img src=\'http://www.hdphp.com/upload/user/1/6_50.png\'\r\n                            onmouseover=\'user.show(this,6)\'/></a> <a href=\'http://www.hdphp.com?深水鱼\'>深水鱼</a> 发表了评论: 火钳刘明。',1397538950),(61,18,'<a href=\'http://www.hdphp.com?jiangyouhong\'><img src=\'http://www.hdphp.com/upload/user/1/18_50.png\'\r\n                            onmouseover=\'user.show(this,18)\'/></a> <a href=\'http://www.hdphp.com?jiangyouhong\'>jiangyouhong</a> 发表了评论: 自己顶起来！！！',1397542929),(62,30,'<a href=\'http://www.hdphp.com?bashan1884\'><img src=\'http://www.hdphp.com/upload/user/1/30_50.png\'\r\n                            onmouseover=\'user.show(this,30)\'/></a> <a href=\'http://www.hdphp.com?bashan1884\'>bashan1884</a> 发表了评论: 好的谢谢',1397552597),(63,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\r\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 谢谢，我们会努力的。',1397563270),(64,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\r\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 不是博客是CMS，当然你可以使用这个系统做Blog',1397563759),(65,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\r\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 这是个问题，我们尽快修复',1397563786),(66,1,'<a href=\'http://www.hdphp.com?houdunwangxj\'><img src=\'http://www.hdphp.com/upload/user/1/1_50.png\'\r\n                            onmouseover=\'user.show(this,1)\'/></a> <a href=\'http://www.hdphp.com?houdunwangxj\'>后盾网向军</a> 发表了评论: 在编辑栏目选择模板就可以，关注V5课堂，周五讲解HDCMS',1397563844),(67,18,'<a href=\'http://www.hdphp.com?jiangyouhong\'><img src=\'http://www.hdphp.com/upload/user/1/18_50.png\'\r\n                            onmouseover=\'user.show(this,18)\'/></a> <a href=\'http://www.hdphp.com?jiangyouhong\'>jiangyouhong</a> 发表了评论: 要不老师，远程看看，真是不可以。QQ:464748053',1397565269);
/*!40000 ALTER TABLE `hd_user_dynamic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_user_follow`
--

DROP TABLE IF EXISTS `hd_user_follow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_user_follow` (
  `uid` int(11) unsigned NOT NULL COMMENT '用户uid',
  `fans_uid` int(11) unsigned DEFAULT NULL COMMENT '粉丝uid'
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='会员关注表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_user_follow`
--

LOCK TABLES `hd_user_follow` WRITE;
/*!40000 ALTER TABLE `hd_user_follow` DISABLE KEYS */;
INSERT INTO `hd_user_follow` VALUES (2,1),(5,1),(4,1),(3,1),(6,1),(9,1),(7,1),(13,1),(18,4),(1,4);
/*!40000 ALTER TABLE `hd_user_follow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_user_guest`
--

DROP TABLE IF EXISTS `hd_user_guest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_user_guest` (
  `gid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `guest_uid` int(11) unsigned NOT NULL COMMENT '访问id',
  `uid` int(11) unsigned NOT NULL COMMENT '被访问空间Uid',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=gbk COMMENT='空间访客表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_user_guest`
--

LOCK TABLES `hd_user_guest` WRITE;
/*!40000 ALTER TABLE `hd_user_guest` DISABLE KEYS */;
INSERT INTO `hd_user_guest` VALUES (24,1,2),(4,2,1),(23,1,3),(12,4,2),(22,1,4),(26,10,6),(27,1,6),(28,1,9),(29,13,6),(30,1,15),(31,1,19),(32,16,1),(33,18,1),(34,21,1),(35,4,18),(36,4,1),(37,1,13),(38,23,1),(39,23,6),(40,4,7),(41,1,24),(42,4,16),(43,18,22),(44,33,1),(45,40,1),(46,40,24),(47,1,18);
/*!40000 ALTER TABLE `hd_user_guest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_user_icon`
--

DROP TABLE IF EXISTS `hd_user_icon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_user_icon` (
  `user_uid` int(11) NOT NULL DEFAULT '0',
  `icon50` varchar(255) NOT NULL DEFAULT '',
  `icon100` varchar(255) NOT NULL DEFAULT '',
  `icon150` varchar(255) NOT NULL DEFAULT '',
  UNIQUE KEY `user_uid` (`user_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='用户头像';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_user_icon`
--

LOCK TABLES `hd_user_icon` WRITE;
/*!40000 ALTER TABLE `hd_user_icon` DISABLE KEYS */;
INSERT INTO `hd_user_icon` VALUES (1,'upload/user/1/1_50.png','upload/user/1/1_100.png','upload/user/1/1_150.png'),(2,'upload/user/1/2_50.png','upload/user/1/2_100.png','upload/user/1/2_150.png'),(3,'upload/user/1/3_50.png','upload/user/1/3_100.png','upload/user/1/3_150.png'),(4,'upload/user/1/4_50.png','upload/user/1/4_100.png','upload/user/1/4_150.png'),(5,'upload/user/1/5_50.png','upload/user/1/5_100.png','upload/user/1/5_150.png'),(6,'upload/user/1/6_50.png','upload/user/1/6_100.png','upload/user/1/6_150.png'),(7,'upload/user/1/7_50.png','upload/user/1/7_100.png','upload/user/1/7_150.png'),(8,'upload/user/1/8_50.png','upload/user/1/8_100.png','upload/user/1/8_150.png'),(9,'upload/user/1/9_50.png','upload/user/1/9_100.png','upload/user/1/9_150.png'),(10,'upload/user/1/10_50.png','upload/user/1/10_100.png','upload/user/1/10_150.png'),(11,'upload/user/1/11_50.png','upload/user/1/11_100.png','upload/user/1/11_150.png'),(12,'upload/user/1/12_50.png','upload/user/1/12_100.png','upload/user/1/12_150.png'),(13,'upload/user/1/13_50.png','upload/user/1/13_100.png','upload/user/1/13_150.png'),(14,'upload/user/1/14_50.png','upload/user/1/14_100.png','upload/user/1/14_150.png'),(15,'upload/user/1/15_50.png','upload/user/1/15_100.png','upload/user/1/15_150.png'),(16,'upload/user/1/16_50.png','upload/user/1/16_100.png','upload/user/1/16_150.png'),(17,'upload/user/1/17_50.png','upload/user/1/17_100.png','upload/user/1/17_150.png'),(18,'upload/user/1/18_50.png','upload/user/1/18_100.png','upload/user/1/18_150.png'),(19,'upload/user/1/19_50.png','upload/user/1/19_100.png','upload/user/1/19_150.png'),(20,'upload/user/1/20_50.png','upload/user/1/20_100.png','upload/user/1/20_150.png'),(21,'upload/user/1/21_50.png','upload/user/1/21_100.png','upload/user/1/21_150.png'),(22,'upload/user/1/22_50.png','upload/user/1/22_100.png','upload/user/1/22_150.png'),(23,'upload/user/1/23_50.png','upload/user/1/23_100.png','upload/user/1/23_150.png'),(24,'upload/user/1/24_50.png','upload/user/1/24_100.png','upload/user/1/24_150.png'),(25,'upload/user/1/25_50.png','upload/user/1/25_100.png','upload/user/1/25_150.png'),(26,'upload/user/1/26_50.png','upload/user/1/26_100.png','upload/user/1/26_150.png'),(27,'upload/user/1/27_50.png','upload/user/1/27_100.png','upload/user/1/27_150.png'),(28,'upload/user/1/28_50.png','upload/user/1/28_100.png','upload/user/1/28_150.png'),(29,'upload/user/1/29_50.png','upload/user/1/29_100.png','upload/user/1/29_150.png'),(30,'upload/user/1/30_50.png','upload/user/1/30_100.png','upload/user/1/30_150.png'),(31,'upload/user/1/31_50.png','upload/user/1/31_100.png','upload/user/1/31_150.png'),(32,'upload/user/1/32_50.png','upload/user/1/32_100.png','upload/user/1/32_150.png'),(33,'upload/user/1/33_50.png','upload/user/1/33_100.png','upload/user/1/33_150.png'),(34,'upload/user/1/34_50.png','upload/user/1/34_100.png','upload/user/1/34_150.png'),(35,'upload/user/1/35_50.png','upload/user/1/35_100.png','upload/user/1/35_150.png'),(36,'upload/user/1/36_50.png','upload/user/1/36_100.png','upload/user/1/36_150.png'),(37,'upload/user/1/37_50.png','upload/user/1/37_100.png','upload/user/1/37_150.png'),(38,'upload/user/1/38_50.png','upload/user/1/38_100.png','upload/user/1/38_150.png'),(39,'upload/user/1/39_50.png','upload/user/1/39_100.png','upload/user/1/39_150.png'),(40,'upload/user/1/40_50.png','upload/user/1/40_100.png','upload/user/1/40_150.png');
/*!40000 ALTER TABLE `hd_user_icon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_user_message`
--

DROP TABLE IF EXISTS `hd_user_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_user_message` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_uid` int(10) unsigned NOT NULL,
  `to_uid` int(10) unsigned NOT NULL,
  `content` varchar(255) NOT NULL DEFAULT '',
  `state` tinyint(1) NOT NULL COMMENT '是否查阅  1 已阅读  2 未读',
  `sendtime` int(10) NOT NULL COMMENT '发送时间',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=gbk COMMENT='短消息';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_user_message`
--

LOCK TABLES `hd_user_message` WRITE;
/*!40000 ALTER TABLE `hd_user_message` DISABLE KEYS */;
INSERT INTO `hd_user_message` VALUES (1,1,2,'欢迎访问HDPHP.COM',1,1397455894),(2,1,2,'Hello',0,1397458413),(3,1,6,'在哪发图不显示呀？',0,1397463553),(4,18,1,'模板还是没有设置对，就是启用新的，然后再启用原来的，就全部显示在使用中',1,1397465383),(5,1,18,'那看来是有问题，我一会看一下。我会在你的问题，说明解决方法的。！',1,1397465513),(6,18,1,'我现在是把原来简历的模板删除了，重新命名，哈哈。不然全部是在使用中。晚上我准备拿来做个网站出来。多测试下，看看其他功能正常不',1,1397465840),(7,1,18,'你说的问题确实存在，是个BUG，马上修复。谢谢你',1,1397465958),(8,18,1,'',1,1397466143),(9,18,1,'不客气，我们应该感谢您！为这付出那么多！',1,1397466183),(10,18,1,'老师，模板的邮件没有显示@qq.com \r\n仿大前端模板\r\n作者: 后盾网\r\nEmail: houdunwan\r\n目录: jiang',1,1397467341),(11,1,18,'问题已经修复，但是GIT推不动。一会回来，我推一下，今晚要打针，先闪了。',1,1397467881),(12,1,18,'已经提交了，谢谢你发现的问题',1,1397468353),(13,1,24,'欢迎来到HDPHP',1,1397478654),(14,24,1,'老师   ，你会开HDCMS的课吗',1,1397480194),(15,18,1,'',1,1397485780),(16,18,1,'还有，向老师。\r\n怎么点击分页（上一页，下一页），出来的列表模版是一个单独的搜搜页面模版，\r\n怎么不继承原来的列表模版？\r\n这样，文章列表和产品图片列表，都是一个模版了，我要怎么操作？求指点。',1,1397485959),(17,1,24,'本周五的V5课堂，讲解HDCMS使用与插件开发的',0,1397535565),(18,1,18,'你不需要操作的，就是继承的呀，今晚我再测试一下。按理说，这个问题不应该出现的。',1,1397535626),(19,18,1,'',0,1397538732),(20,18,1,'因为我看你的列表模板和搜索模板是一样的，所以测试的时候可能看不出，有什么不一样。你把搜索模板改动一下，测试看看。我昨晚找了好歌时候。',0,1397538794);
/*!40000 ALTER TABLE `hd_user_message` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-15 20:48:12
