<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`title`,`admin`,`system`,`creditslower`,`allowpost`,`allowpostverify`,`allowsendmessage`) VALUES('1','超级管理员','超级管理员','1','1','0','1','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`title`,`admin`,`system`,`creditslower`,`allowpost`,`allowpostverify`,`allowsendmessage`) VALUES('2','编辑','内容编辑','1','1','0','1','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`title`,`admin`,`system`,`creditslower`,`allowpost`,`allowpostverify`,`allowsendmessage`) VALUES('3','发布人员','发布人员','1','1','0','1','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`title`,`admin`,`system`,`creditslower`,`allowpost`,`allowpostverify`,`allowsendmessage`) VALUES('4','新手上路','新手上路','0','1','100','1','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`title`,`admin`,`system`,`creditslower`,`allowpost`,`allowpostverify`,`allowsendmessage`) VALUES('5','中级会员','中级会员','0','1','200','1','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`,`title`,`admin`,`system`,`creditslower`,`allowpost`,`allowpostverify`,`allowsendmessage`) VALUES('6','高级会员','高级会员','0','1','300','1','1','1')");
