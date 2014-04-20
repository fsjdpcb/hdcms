<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."search (`sid`,`mid`,`word`,`total`) VALUES('1','1','国内','1')");
$db->exe("REPLACE INTO ".$db_prefix."search (`sid`,`mid`,`word`,`total`) VALUES('2','1','国内，顶尖','1')");
$db->exe("REPLACE INTO ".$db_prefix."search (`sid`,`mid`,`word`,`total`) VALUES('3','1','国内顶尖','1')");
