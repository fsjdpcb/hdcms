<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."tag (`tid`,`tag`,`total`)
						VALUES(1,'TAG',1)");
