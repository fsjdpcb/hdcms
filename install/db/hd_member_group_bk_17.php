<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."member_group (`gid`,`is_system`,`point`,`allowpost`,`allowpostverify`,`allowsendmessage`,`description`,`gname`) VALUES('1','1','100','1','1','1','','普通会员')");
