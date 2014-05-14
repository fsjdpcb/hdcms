<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user_guest (`gid`,`guest_uid`,`uid`) VALUES('1','1','2')");
