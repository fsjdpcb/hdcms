<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."addons (`id`,`name`,`title`,`description`,`status`,`config`,`author`,`version`,`create_time`,`has_adminlist`)
						VALUES('204','Backup','数据备份','数据备份还原插件','1','a:0:{}','后盾网向军','1.0','1412773789','1')");
$db->exe("REPLACE INTO ".$db_prefix."addons (`id`,`name`,`title`,`description`,`status`,`config`,`author`,`version`,`create_time`,`has_adminlist`)
						VALUES('178','Link','友情链接','友情链接','1','a:0:{}','后盾网向军','1.0','1408988196','1')");
$db->exe("REPLACE INTO ".$db_prefix."addons (`id`,`name`,`title`,`description`,`status`,`config`,`author`,`version`,`create_time`,`has_adminlist`)
						VALUES('179','Navigation','导航菜单','导航菜单','1','a:0:{}','后盾网向军','1.0','1408988221','1')");
$db->exe("REPLACE INTO ".$db_prefix."addons (`id`,`name`,`title`,`description`,`status`,`config`,`author`,`version`,`create_time`,`has_adminlist`)
						VALUES('197','Comment','评论','评论','1','a:0:{}','后盾网向军','1.0','1409763498','1')");
$db->exe("REPLACE INTO ".$db_prefix."addons (`id`,`name`,`title`,`description`,`status`,`config`,`author`,`version`,`create_time`,`has_adminlist`)
						VALUES('190','FieldReplace','数据库内容替换','数据库内容替换','1','a:0:{}','后盾网向军','1.0','1409580307','1')");
$db->exe("REPLACE INTO ".$db_prefix."addons (`id`,`name`,`title`,`description`,`status`,`config`,`author`,`version`,`create_time`,`has_adminlist`)
						VALUES('217','Search','前台搜索','前台搜索','1','a:0:{}','后盾网向军','1.0','1412813167','0')");
$db->exe("REPLACE INTO ".$db_prefix."addons (`id`,`name`,`title`,`description`,`status`,`config`,`author`,`version`,`create_time`,`has_adminlist`)
						VALUES('205','CustomForm','自定义表单','自定义表单','1','a:0:{}','后盾网向军','1.0','1412773870','1')");
$db->exe("REPLACE INTO ".$db_prefix."addons (`id`,`name`,`title`,`description`,`status`,`config`,`author`,`version`,`create_time`,`has_adminlist`)
						VALUES('210','Advertising','广告位','广告位','1','a:0:{}','后盾网向军','1.0','1412795895','1')");
$db->exe("REPLACE INTO ".$db_prefix."addons (`id`,`name`,`title`,`description`,`status`,`config`,`author`,`version`,`create_time`,`has_adminlist`)
						VALUES('218','Crontab','计划任务','计划任务','1','a:0:{}','后盾向军','1.0','1412859307','1')");
