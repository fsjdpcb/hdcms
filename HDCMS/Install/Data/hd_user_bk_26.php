<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`nickname`,`username`,`password`,`code`,`email`,`regtime`,`logintime`,`regip`,`lastip`,`user_status`,`lock_end_time`,`qq`,`sex`,`credits`,`rid`,`signature`,`spec_num`,`icon`)
						VALUES(1,'admin','admin','72a269a0efb5b057beeb0e673e97595c','8069bb5e6b','2300071698@qq.com',1411231589,1412304194,'0.0.0.0','0.0.0.0',1,0,'',1,10000,1,'这家伙很懒什么也没有写...',2,'HDCMS/Static/image/user.png')");
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`nickname`,`username`,`password`,`code`,`email`,`regtime`,`logintime`,`regip`,`lastip`,`user_status`,`lock_end_time`,`qq`,`sex`,`credits`,`rid`,`signature`,`spec_num`,`icon`)
						VALUES(2,'后盾向军','hdxj','4e764fb445e661b9cf68bffb77bb2526','90d8adf4ab','houdunwangxj@gmail.com',1411913167,1411913167,'0.0.0.0','0.0.0.0',1,0,'',1,100,4,'这家伙很懒什么也没写...',0,'HDCMS/Static/image/user.png')");
