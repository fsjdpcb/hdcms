<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."navigation (`nid`,`title`,`pid`,`target`,`status`,`list_order`,`url`)
						VALUES('7','cc','6','_self','1','100','http://www.sina.com.cn')");
$db->exe("REPLACE INTO ".$db_prefix."navigation (`nid`,`title`,`pid`,`target`,`status`,`list_order`,`url`)
						VALUES('6','a','4','_self','1','100','http://baidu.com')");
$db->exe("REPLACE INTO ".$db_prefix."navigation (`nid`,`title`,`pid`,`target`,`status`,`list_order`,`url`)
						VALUES('4','首页','0','_blank','1','100','http://baidu.com')");
$db->exe("REPLACE INTO ".$db_prefix."navigation (`nid`,`title`,`pid`,`target`,`status`,`list_order`,`url`)
						VALUES('8','f','7','_self','1','100','f')");
