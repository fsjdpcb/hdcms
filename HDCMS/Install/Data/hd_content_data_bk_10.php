<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."content_data (`aid`,`content`)
						VALUES(1,'')");
$db->exe("REPLACE INTO ".$db_prefix."content_data (`aid`,`content`)
						VALUES(2,'')");
