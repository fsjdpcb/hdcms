<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('1','HDCMS内容管理系统','HDCMS内容管理系统','site','网站名称','text','','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('2','ICP','京ICP备12048441号-3','site','ICP备案号','text','','7','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('3','HTML_PATH','h','content','静态html目录','text','','2','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('4','COPYRIGHT','Copyright © 2012-2014  HDPHP&HDCMS来自后盾网 | 国内唯一一家教育机构推出的开源产品','site','网站版权信息','text','','6','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('5','KEYWORDS','php培训,php实训,后盾网','site','网站关键词','text','','4','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('6','DESCRIPTION','后盾网顶尖PHP培训 内容全面 全程实战!业内顶级讲师亲自授课,千余课时独家视频教程免费下载,超百G原创视频资源,实力不容造假!010-64825057','site','网站描述','text','','5','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('7','sdf@df.com','houdunwangxj@gmail.com','site','管理员邮箱','text','','8','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('73','DEFAULT_GROUP','4','member','默认会员组','group','','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('9','WEB_OPEN','1','site','网站开启','radio','','2','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('63','UPLOAD_PATH','upload','upload','上传目录','text','','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('20','ALLOW_TYPE','jpg,jpeg,png,bmp,gif,zip,rar,doc','upload','允许上传文件类型','text','','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('21','ALLOW_SIZE','10480000','upload','允许上传大小（字节）','text','','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('22','WATER_ON','1','upload','图片文件加水印','radio','','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('64','TEL','010-64825057','site','联系电话','text','','9','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('41','WATER_TEXT','houdunwang.com','water','水印文字','text','','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('42','WATER_TEXT_SIZE','16','water','文字大小','text','','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('43','WATER_IMG','static/image/water.png','water','水印图像','text','','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('44','WATER_PCT','80','water','水印图片透明度','text','','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('45','WATER_QUALITY','90','water','图片压缩比','text','','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('46','WATER_POS','9','water','水印位置','waterpos','','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('47','DEL_CONTENT_MODEL','0','content','删除文章标记为未审核','radio','','4','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('67','CREATE_INDEX_HTML','0','content','首页生成静态','radio','','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('48','DOWN_REMOTE_PIC','0','content','下载远程图片','radio','','5','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('49','AUTO_DESC','1','content','截取内容为摘要','radio','','6','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('50','AUTO_THUMB','1','content','提取内容图片为缩略图','radio','','7','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('32','MEMBER_OPEN','1','member','开启会员中心','radio','','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('11','WEB_CLOSE_MESSAGE','网站维护中，请稍候访问...','site','网站关闭提示信息','text','','3','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('12','WEB_STYLE','default','template','网站模板','text','','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('33','INIT_CREDITS','100','member','会员初始积分','text','','2','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('53','CACHE_INDEX','0','optimize','首页缓存时间','text','单位秒，0为不缓存','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('54','CACHE_CATEGORY','0','optimize','栏目缓存时间','text','单位秒，0为不缓存','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('55','CACHE_CONTENT','0','optimize','文章缓存时间','text','单位秒，0为不缓存','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('57','REWRITE_ENGINE','0','rewrite','开启伪静态','radio','1:服务器需要支持Rewrtie <br/>2:根目录下存在.htaccess文件','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('35','EMAIL_USERNAME','hdcms@houdunwang.com','email','邮箱用户名','text','使用126或qq邮箱','3','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('36','EMAIL_PASSWORD','admin521','email','邮箱密码','password','邮箱的密码','4','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('37','EMAIL_HOST','smtp.exmail.qq.com','email','smtp地址','text','如smtp.gmail.com','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('38','EMAIL_PORT','25','email','smtp端口','text','qq,126为25，gmail为465','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('39','EMAIL_FROMNAME','后盾网','email','发送人','text','发送人发件箱显示的用户名','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`,`status`)
						VALUES('72','EMAIL_FORMMAIL','hdcms@houdunwang.com','email','发件人','text','发送人发件箱显示的邮箱址址','1','1')");
