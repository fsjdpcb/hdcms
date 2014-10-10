<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."addon_advertising_ad (`id`,`adtitle`,`posid`,`data`,`show_type`,`start_time`,`end_time`,`status`,`ad_width`,`ad_height`,`action_time`)
						VALUES(1,'aaaaa',1,'a:2:{i:0;a:3:{s:5:\"title\";s:45:\"图片（多图时只显示第一张图片）\";s:3:\"url\";s:2:\"aa\";s:5:\"image\";s:24:\"upload/8931412861799.jpg\";}i:1;a:3:{s:5:\"title\";s:45:\"图片（多图时只显示第一张图片）\";s:3:\"url\";s:2:\"bb\";s:5:\"image\";s:25:\"upload/51541412861766.jpg\";}}',2,1412818240,2145931200,1,'600','300',3)");
