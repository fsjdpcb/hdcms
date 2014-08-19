<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`nickname`,`username`,`password`,`code`,`email`,`regtime`,`logintime`,`regip`,`lastip`,`user_status`,`lock_end_time`,`qq`,`sex`,`credits`,`rid`,`signature`,`domain`,`spec_num`,`icon`)
						VALUES('1','admin','admin','ea038f6915e2a950d016220b197d7aa7','4865dfb852','houdunwangxj@gmail.com','1405397800','1408463978','0.0.0.0','0.0.0.0','1','0','','1','10000','1','','admin','0','')");
