<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user_icon (`user_uid`,`icon50`,`icon100`,`icon150`) VALUES('1','data/image/user/50.png','data/image/user/100.png','data/image/user/150.png')");
