<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(1,1,'WEBNAME','HDCMS内容管理系统','网站名称','text','后盾网','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(2,1,'ICP','京ICP备12048441号-3','ICP备案号','text','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(3,6,'HTML_PATH','h','静态html目录','text','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(4,1,'COPYRIGHT','Copyright © 2012-2014  HDPHP&HDCMS来自后盾网 | 国内唯一一家教育机构推出的开源产品','网站版权信息','text','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(5,1,'KEYWORDS','php培训,php实训,后盾网','网站关键词','text','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(6,1,'DESCRIPTION','后盾网顶尖PHP培训 内容全面 全程实战!业内顶级讲师亲自授课,千余课时独家视频教程免费下载,超百G原创视频资源,实力不容造假!010-64825057','网站描述','textarea','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(7,1,'EMAIL','2300071698@qq.com','管理员邮箱','text','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(73,3,'DEFAULT_GROUP','幼儿园','默认会员组','group','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(9,1,'WEB_OPEN','1','网站开启','radio','1|开启,0|关闭','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(63,2,'UPLOAD_PATH','upload','上传目录','text','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(20,2,'ALLOW_TYPE','jpg,jpeg,png,bmp,gif,zip,rar,doc','允许上传文件类型','text','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(21,2,'ALLOW_SIZE','10480000','允许上传大小（字节）','text','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(22,2,'WATER_ON','1','图片文件加水印','radio','1|加水印,0|不加水印','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(64,1,'TEL','010-64825057','联系电话','text','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(41,5,'WATER_TEXT','houdunwang.com','水印文字','text','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(42,5,'WATER_TEXT_SIZE','16','文字大小','text','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(43,5,'WATER_IMG','static/image/water.png','水印图像','text','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(44,5,'WATER_PCT','80','水印图片透明度','text','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(45,5,'WATER_QUALITY','90','图片压缩比','text','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(46,5,'WATER_POS','9','水印位置','text','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(47,6,'DEL_CONTENT_MODEL','0','删除文章标记为未审核','radio','1|审核,0|未审核','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(67,6,'CREATE_INDEX_HTML','1','首页生成静态','radio','1|生成,0|不生成','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(48,6,'DOWN_REMOTE_PIC','0','下载远程图片','radio','1|下载,0|不下载','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(49,6,'AUTO_DESC','1','截取内容为摘要','radio','1|是,0|否','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(50,6,'AUTO_THUMB','1','提取内容图片为缩略图','radio','1|是,0|否','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(32,3,'MEMBER_OPEN','1','开启会员中心','radio','1|开启,0|关闭','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(11,1,'WEB_CLOSE_MESSAGE','网站维护中，请稍候访问...','网站关闭提示信息','text','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(12,9,'WEB_STYLE','default','网站模板','text','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(33,3,'INIT_CREDITS','100','会员初始积分','text','','',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(53,7,'CACHE_INDEX','0','首页缓存时间','text','','单位秒，0为不缓存',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(54,7,'CACHE_CATEGORY','0','栏目缓存时间','text','','单位秒，0为不缓存',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(55,7,'CACHE_CONTENT','0','文章缓存时间','text','','单位秒，0为不缓存',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(57,8,'REWRITE_ENGINE','0','开启伪静态','radio','1|开启,0|关闭','1:服务器需要支持Rewrtie <br/>2:根目录下存在.htaccess文件',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(35,4,'EMAIL_USERNAME','hdcms@houdunwang.com','邮箱用户名','text','','使用126或qq邮箱',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(36,4,'EMAIL_PASSWORD','admin521','邮箱密码','text','','邮箱的密码',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(37,4,'EMAIL_HOST','smtp.exmail.qq.com','smtp地址','text','','如smtp.gmail.com',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(38,4,'EMAIL_PORT','25','smtp端口','text','','qq,126为25，gmail为465',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(39,4,'EMAIL_FROMNAME','后盾网','发送人','text','','发送人发件箱显示的用户名',100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`cgid`,`name`,`value`,`title`,`show_type`,`info`,`message`,`order_list`,`status`,`system`)
						VALUES(72,4,'EMAIL_FORMMAIL','hdcms@houdunwang.com','发件人','text','','发送人发件箱显示的邮箱址址',100,1,1)");
