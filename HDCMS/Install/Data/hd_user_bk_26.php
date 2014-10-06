<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`nickname`,`username`,`password`,`code`,`email`,`regtime`,`logintime`,`regip`,`lastip`,`user_status`,`lock_end_time`,`qq`,`sex`,`credits`,`rid`,`signature`,`spec_num`,`icon`)
						VALUES(1,'admin','admin','3ba2c876f62818177bc23ddd0ca4157e','df4189db94','2300071698@qq.com',1412614136,1412620814,'0.0.0.0','0.0.0.0',1,0,'',1,10000,1,'这家伙很懒什么也没有写...',2,'HDCMS/Static/image/user.png')");
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`nickname`,`username`,`password`,`code`,`email`,`regtime`,`logintime`,`regip`,`lastip`,`user_status`,`lock_end_time`,`qq`,`sex`,`credits`,`rid`,`signature`,`spec_num`,`icon`)
						VALUES(4,'hdxj','hdxj','a4b8934beaa35580684bc5cb562e2343','a3fbfce2a8','houdunwangxj@gmail.com',1412619420,1412619420,'0.0.0.0','0.0.0.0',1,0,'',1,100,5,'这家伙很懒什么也没写...',0,'HDCMS/Static/image/user.png')");
