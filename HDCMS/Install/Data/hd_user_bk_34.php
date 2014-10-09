<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`nickname`,`username`,`password`,`code`,`email`,`regtime`,`logintime`,`regip`,`lastip`,`user_status`,`lock_end_time`,`qq`,`sex`,`credits`,`rid`,`signature`,`spec_num`,`icon`)
						VALUES(1,'admin','admin','3ba2c876f62818177bc23ddd0ca4157e','df4189db94','2300071698@qq.com',1412614136,1412851335,'0.0.0.0','0.0.0.0',1,0,'',1,10000,1,'这家伙很懒什么也没有写...',2,'HDCMS/Static/image/user.png')");
