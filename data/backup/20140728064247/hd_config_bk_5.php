<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('1','WEBNAME','HDCMS内容管理系统','站点配置','网站名称','文本','','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('2','ICP','京ICP备12048441号-3','站点配置','ICP备案号','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('3','HTML_PATH','h','站点配置','静态html目录','文本','','8')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('4','COPYRIGHT','Copyright © 2012-2014 HDCMS 后盾网','站点配置','网站版权信息','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('5','KEYWORDS','php培训,php实训,后盾网','站点配置','网站关键词','文本','','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('6','DESCRIPTION','后盾网顶尖PHP培训 内容全面 全程实战!业内顶级讲师亲自授课,千余课时独家视频教程免费下载,超百G原创视频资源,实力不容造假!010-64825057','站点配置','网站描述','多行文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('7','EMAIL','sdf@fd.com','站点配置','管理员邮箱','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('8','BACKUP_DIR','backup','内容相关','数据备份目录','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('9','WEB_OPEN','1','站点配置','网站开启','布尔(1/0)','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('10','AUTH_KEY','houdunwang.com','安全配置','cookie加密KEY','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('63','UPLOAD_PATH','upload','上传配置','上传目录','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('19','UPLOAD_IMG_PATH','img','上传配置','上传图片目录','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('20','ALLOW_TYPE','jpg,jpeg,png,bmp,gif','上传配置','允许上传文件类型','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('21','ALLOW_SIZE','10480000','上传配置','允许上传大小（字节）','数字','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('22','WATER_ON','1','上传配置','上传文件加水印','布尔(1/0)','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('24','MEMBER_VERIFY','1','会员配置','会员注册不需要审核','布尔(1/0)','','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('25','REG_SHOW_CODE','1','会员配置','会员注册显示验证码','布尔(1/0)','','2')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('68','WEB_TITLE','后盾网PHP开源项目','站点配置','网站标题','文本','','2')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('27','REG_INTERVAL','0','会员配置','2次注册间隔间间','数字','单位秒，0为不限','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('28','DEFAULT_MEMBER_GROUP','4','会员配置','新注册会员初始组','数字','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('29','TOKEN_ON','0','会员配置','表单使用令牌验证','布尔(1/0)','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('30','LOG_KEY','houdunwang.com','安全配置','日志文件加密KEY','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('61','SESSION_NAME','hdsid','SESSION配置','SESSION_NAME值','文本','一般不用更改','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('17','super_admin_key','SUPER_ADMIN','高级配置','站长令牌名称','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('64','TEL','010-64825057','站点配置','联系电话','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('41','WATER_TEXT','houdunwang.com','水印配置','水印文字','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('42','WATER_TEXT_SIZE','16','水印配置','文字大小','数字','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('43','WATER_IMG','data/water/water.png','水印配置','水印图像','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('44','WATER_PCT','80','水印配置','水印图片透明度','数字','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('45','WATER_QUALITY','90','水印配置','图片压缩比','数字','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('46','WATER_POS','9','水印配置','水印位置','数字','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('47','DEL_CONTENT_MODEL','0','内容相关','删除文章标记为未审核','布尔(1/0)','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('67','CREATE_INDEX_HTML','0','站点配置','首页生成静态','布尔(1/0)','','9')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('31','REPLY_CREDITS','1','会员配置','评论奖励积分','文本','会员提交回复奖励积分','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('48','DOWN_REMOTE_PIC','1','内容相关','下载远程图片','布尔(1/0)','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('49','AUTO_DESC','1','内容相关','截取内容为摘要','布尔(1/0)','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('50','AUTO_THUMB','1','内容相关','提取内容图片为缩略图','布尔(1/0)','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('51','UPLOAD_IMG_MAX_WIDTH','2000','内容相关','图片最大宽度','数字','上传图片宽度超过此值，进行缩放','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('52','UPLOAD_IMG_MAX_HEIGHT','2000','内容相关','图片 最大高度','数字','上传图片高度超过此值，进行缩放','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('32','MEMBER_OPEN','1','会员配置','开启会员中心','布尔(1/0)','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('11','WEB_CLOSE_MESSAGE','网站维护中，请稍候访问...','站点配置','网站关闭提示信息','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('12','WEB_STYLE','default','站点配置','网站模板','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('13','QQ','1455067020','站点配置','QQ号','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('14','WEIBO','houdunwangxj@gmail.com','站点配置','新浪微博','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('15','TWEIBO','houdunwang@gmail.com','站点配置','腾讯微博','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('16','ENTERPRISE_EMAIL','houdunwangxj@gmail.com','站点配置','企业邮箱','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('33','INIT_CREDITS','100','会员配置','初始积分','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('53','CACHE_INDEX','10','性能优化','首页缓存时间','文本','单位秒，0为不缓存','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('54','CACHE_CATEGORY','10','性能优化','栏目缓存时间','文本','单位秒，0为不缓存','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('55','CACHE_CONTENT','10','性能优化','文章缓存时间','文本','单位秒，0为不缓存','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('34','COMMENT_STEP_TIME','10','会员配置','评论间隔时间','文本','必须大于1（单位秒)','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('56','PATHINFO_TYPE','0','伪静态','开启伪静态','布尔(1/0)','需要环境支持','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('57','OPEN_REWRITE','0','伪静态','开启Rewrite','布尔(1/0)','1:服务器需要支持Rewrtie 2:将HDCMS根目录中的htaccess.txt改名为.htaccess','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('35','EMAIL_USERNAME','admin','邮箱配置','邮箱用户名','文本','使用126或qq邮箱','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('36','EMAIL_PASSWORD','admin888','邮箱配置','邮箱密码','文本','邮箱的密码','0')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('37','EMAIL_HOST','smtp.exmail.qq.com','邮箱配置','smtp地址','文本','如smtp.gmail.com','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('38','EMAIL_PORT','25','邮箱配置','smtp端口','文本','qq,126为25，gmail为465','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('39','EMAIL_FROMNAME','后盾网','邮箱配置','发送人','文本','发件箱显示的用户名','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('58','COOKIE_EXPIRE','','COOKIE配置','Coodie有效期','文本','单位秒','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('59','COOKIE_DOMAIN','','COOKIE配置','Cookie域名','文本','','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('60','COOKIE_PATH','/','COOKIE配置','Cookie路径','文本','有效路径','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('62','SESSION_DOMAIN','','SESSION配置','SESSION域名','文本','如.hdphp.com 设置错误将导致无法登录后台','100')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`name`,`value`,`type`,`title`,`show_type`,`message`,`order_list`)
						VALUES('65','MEMBER_EMAIL_VALIDATE','0','会员配置','注册时验证邮件','布尔(1/0)','需填写邮箱配置，开启后会员注册审核功能无效','3')");
