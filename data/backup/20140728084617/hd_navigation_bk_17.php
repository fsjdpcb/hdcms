<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."navigation (`nid`,`title`,`pid`,`target`,`status`,`list_order`,`url`)
						VALUES('4','首页','0','_blank','1','100','http://baidu.com')");
