<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`nickname`,`username`,`password`,`code`,`email`,`regtime`,`logintime`,`regip`,`lastip`,`user_status`,`lock_end_time`,`qq`,`sex`,`credits`,`rid`,`signature`,`spec_num`,`icon`)
						VALUES(1,'admin','admin','2341e915192eb5950721e563fdbc75bd','3985dce0e6','houdunwangxj@gmail.com',1405397800,1409848593,'0.0.0.0','0.0.0.0',1,0,'23000121211',1,10000,1,'这家伙很懒什么也没有写...',51,'upload/user/2014/08/31/40341409493938.jpg')");
