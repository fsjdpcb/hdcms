<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."addon_content_keywords (`id`,`word`,`replace_word`,`nums`)
						VALUES(1,'中国','sina',1)");
