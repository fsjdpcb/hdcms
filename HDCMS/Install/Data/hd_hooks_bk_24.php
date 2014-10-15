<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."hooks (`id`,`name`,`description`,`type`,`update_time`,`addons`)
						VALUES('17','pageHeader','页面header钩子，一般用于加载插件CSS文件和代码','1','0','')");
$db->exe("REPLACE INTO ".$db_prefix."hooks (`id`,`name`,`description`,`type`,`update_time`,`addons`)
						VALUES('18','pageFooter','页面footer钩子，一般用于加载插件JS文件和JS代码','1','0','')");
$db->exe("REPLACE INTO ".$db_prefix."hooks (`id`,`name`,`description`,`type`,`update_time`,`addons`)
						VALUES('19','APP_BEGIN','应用开始','1','0','Crontab')");
$db->exe("REPLACE INTO ".$db_prefix."hooks (`id`,`name`,`description`,`type`,`update_time`,`addons`)
						VALUES('20','content_edit_begin','内容编辑前','1','0','')");
$db->exe("REPLACE INTO ".$db_prefix."hooks (`id`,`name`,`description`,`type`,`update_time`,`addons`)
						VALUES('21','content_edit_end','内容编辑后','1','0','')");
$db->exe("REPLACE INTO ".$db_prefix."hooks (`id`,`name`,`description`,`type`,`update_time`,`addons`)
						VALUES('22','content_del','内容删除后','1','0','')");
$db->exe("REPLACE INTO ".$db_prefix."hooks (`id`,`name`,`description`,`type`,`update_time`,`addons`)
						VALUES('23','content_add_begin','内容添加前','1','0','')");
$db->exe("REPLACE INTO ".$db_prefix."hooks (`id`,`name`,`description`,`type`,`update_time`,`addons`)
						VALUES('24','content_add_end','内容添加后','1','0','')");
