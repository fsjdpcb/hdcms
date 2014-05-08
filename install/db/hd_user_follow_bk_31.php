<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user_follow (`uid`,`fans_uid`) VALUES('10','1')");
$db->exe("REPLACE INTO ".$db_prefix."user_follow (`uid`,`fans_uid`) VALUES('14','1')");
$db->exe("REPLACE INTO ".$db_prefix."user_follow (`uid`,`fans_uid`) VALUES('15','1')");
$db->exe("REPLACE INTO ".$db_prefix."user_follow (`uid`,`fans_uid`) VALUES('1','15')");
