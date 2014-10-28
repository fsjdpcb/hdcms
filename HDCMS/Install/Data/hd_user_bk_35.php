<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`nickname`,`username`,`password`,`code`,`email`,`regtime`,`logintime`,`regip`,`lastip`,`user_status`,`lock_end_time`,`qq`,`sex`,`credits`,`rid`,`signature`,`spec_num`,`icon`)
						VALUES(1,'admin','admin','a145d9e5198530d263ff299a770df02f','dec9d8ca62','houdunwangxj@gmail.com',1414417002,1414509845,'0.0.0.0','0.0.0.0',1,0,'',1,10000,1,'这家伙很懒什么也没有写...',2,'HDCMS/Static/image/user.png')");
