<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."addon_crontab (`id`,`title`,`classname`,`username`,`mday`,`hours`,`minutes`)
						VALUES(1,'更新文章','AutoSendArticle','admin',0,0,10)");
$db->exe("REPLACE INTO ".$db_prefix."addon_crontab (`id`,`title`,`classname`,`username`,`mday`,`hours`,`minutes`)
						VALUES(2,'生成首页静态','CreateIndexHtml','admin',0,0,10)");
