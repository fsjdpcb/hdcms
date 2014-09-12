<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`nickname`,`username`,`password`,`code`,`email`,`regtime`,`logintime`,`regip`,`lastip`,`user_status`,`lock_end_time`,`qq`,`sex`,`credits`,`rid`,`signature`,`spec_num`,`icon`)
						VALUES('1','admin','admin','a5d5f4caa06c1a543c0c68b906625dd1','fe7116b307','sdf@df.com','1410271664','1410529760','0.0.0.0','0.0.0.0','1','0','','1','10000','1','这家伙很懒什么也没有写...','2','HDCMS/Static/image/user.png')");
