<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`nickname`,`username`,`password`,`code`,`email`,`validatecode`,`regtime`,`logintime`,`regip`,`lastip`,`user_state`,`lock_end_time`,`qq`,`sex`,`favicon`,`credits`,`rid`,`allow_user_set_credits`,`signature`,`domain`,`spec_num`,`icon`) VALUES('1','admin','admin','a108675cee7ad44cd9d08c0abfe8d744','3093594356','houdunwang@gmail.com','','1399632212','1401084670','0.0.0.0','0.0.0.0','1','0','2300071698','1','','10078','4','1','','admin','12','')");
