<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."favorite (`fid`,`mid`,`cid`,`aid`,`uid`)
						VALUES('1','1','10','8','1')");
$db->exe("REPLACE INTO ".$db_prefix."favorite (`fid`,`mid`,`cid`,`aid`,`uid`)
						VALUES('2','1','10','11','7')");
$db->exe("REPLACE INTO ".$db_prefix."favorite (`fid`,`mid`,`cid`,`aid`,`uid`)
						VALUES('3','1','10','8','7')");
