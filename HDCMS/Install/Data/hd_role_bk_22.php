<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`title`,`admin`,`system`,`creditslower`,`comment_state`,`allowsendmessage`)
						VALUES(1,'超级管理员','超级管理员',1,1,10000,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`title`,`admin`,`system`,`creditslower`,`comment_state`,`allowsendmessage`)
						VALUES(2,'编辑','内容编辑',1,1,10000,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`title`,`admin`,`system`,`creditslower`,`comment_state`,`allowsendmessage`)
						VALUES(3,'发布人员','发布人员',1,1,10000,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`title`,`admin`,`system`,`creditslower`,`comment_state`,`allowsendmessage`)
						VALUES(4,'幼儿园','新手上路',0,1,100,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`title`,`admin`,`system`,`creditslower`,`comment_state`,`allowsendmessage`)
						VALUES(5,'小学生','小学生',0,1,250,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`title`,`admin`,`system`,`creditslower`,`comment_state`,`allowsendmessage`)
						VALUES(6,'中学生','中学生',0,1,450,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`title`,`admin`,`system`,`creditslower`,`comment_state`,`allowsendmessage`)
						VALUES(7,'高中生','高中生',0,0,700,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`title`,`admin`,`system`,`creditslower`,`comment_state`,`allowsendmessage`)
						VALUES(8,'大学生','大学生',0,0,1050,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`title`,`admin`,`system`,`creditslower`,`comment_state`,`allowsendmessage`)
						VALUES(9,'研究生','研究生',0,0,1450,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`title`,`admin`,`system`,`creditslower`,`comment_state`,`allowsendmessage`)
						VALUES(10,'博士','博士',0,0,2000,1,1)");