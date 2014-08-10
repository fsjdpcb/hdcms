<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."tag (`tid`,`tag`,`total`)
						VALUES('3','汽车','1')");
$db->exe("REPLACE INTO ".$db_prefix."tag (`tid`,`tag`,`total`)
						VALUES('4','上海','1')");
$db->exe("REPLACE INTO ".$db_prefix."tag (`tid`,`tag`,`total`)
						VALUES('5','太平洋汽车网','1')");
