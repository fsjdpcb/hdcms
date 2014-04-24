<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."content_tag (`mid`,`cid`,`aid`,`tid`,`uid`) VALUES('1','5','1','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."content_tag (`mid`,`cid`,`aid`,`tid`,`uid`) VALUES('1','5','1','2','1')");
$db->exe("REPLACE INTO ".$db_prefix."content_tag (`mid`,`cid`,`aid`,`tid`,`uid`) VALUES('1','15','22','5','1')");
