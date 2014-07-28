<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`nickname`,`username`,`password`,`code`,`email`,`validatecode`,`regtime`,`logintime`,`regip`,`lastip`,`user_state`,`lock_end_time`,`qq`,`sex`,`favicon`,`credits`,`rid`,`allow_user_set_credits`,`signature`,`domain`,`spec_num`,`icon`)
						VALUES('1','admin','admin','f3fe6e2dc1e81d046b3c7ff4779c8a59','937669cc00','sdf@fd.com','','1405397800','1406543310','0.0.0.0','0.0.0.0','1','0','','1','','0','1','1','','admin','0','')");
