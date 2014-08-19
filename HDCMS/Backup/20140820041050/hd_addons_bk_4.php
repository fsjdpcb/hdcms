<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."addons (`id`,`name`,`title`,`description`,`status`,`config`,`author`,`version`,`create_time`,`has_adminlist`)
						VALUES('164','Backup','数据备份','数据备份与恢复功能','1','a:0:{}','后盾网向军','1.0','1408476818','1')");
