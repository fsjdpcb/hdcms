<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."tag (`tid`,`tag`,`total`)
						VALUES(1,'中国',6)");
$db->exe("REPLACE INTO ".$db_prefix."tag (`tid`,`tag`,`total`)
						VALUES(2,'香港',6)");
$db->exe("REPLACE INTO ".$db_prefix."tag (`tid`,`tag`,`total`)
						VALUES(3,'美国',4)");
$db->exe("REPLACE INTO ".$db_prefix."tag (`tid`,`tag`,`total`)
						VALUES(4,'后盾网',3)");
