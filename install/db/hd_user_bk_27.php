<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`nickname`,`username`,`password`,`code`,`email`,`regtime`,`logintime`,`regip`,`lastip`,`state`,`lock_end_time`,`qq`,`sex`,`favicon`,`credits`,`rid`,`allow_user_set_credits`,`signature`,`domain`,`spec_num`) VALUES('1','admin','admin','2d5cc312a2a8db50a28e88934c40756a','458f9cbdf6','houdunwangxj@gmail.com','1397452628','1398314399','101.38.68.62','0.0.0.0','1','0','','1','','10008','1','1','后盾网  人人做后盾','1','286')");
