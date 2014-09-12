<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`nickname`,`username`,`password`,`code`,`email`,`regtime`,`logintime`,`regip`,`lastip`,`user_status`,`lock_end_time`,`qq`,`sex`,`credits`,`rid`,`signature`,`spec_num`,`icon`)
						VALUES(1,'admin','admin','ba01680ec9b1443bd435cfe8d114d332','84f62b1136','admin@houdunwang.com',1410271664,1410540143,'0.0.0.0','0.0.0.0',1,0,'',1,10000,1,'这家伙很懒什么也没有写...',2,'HDCMS/Static/image/user.png')");
