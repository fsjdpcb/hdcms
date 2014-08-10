<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`nickname`,`username`,`password`,`code`,`email`,`regtime`,`logintime`,`regip`,`lastip`,`user_status`,`lock_end_time`,`qq`,`sex`,`credits`,`rid`,`signature`,`domain`,`spec_num`,`icon`)
						VALUES('1','admin','admin','5241cb9dc7fa1ecedd06ed1c96c6a19c','eff6bbc40e','houdunwangxj@gmail.com','1405397800','1407659444','0.0.0.0','0.0.0.0','1','0','','1','10000','1','','admin','0','')");
