<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."navigation (`nid`,`title`,`pid`,`target`,`state`,`list_order`,`url`) VALUES('1','中国','0','_self','1','100','baidu.com')");
$db->exe("REPLACE INTO ".$db_prefix."navigation (`nid`,`title`,`pid`,`target`,`state`,`list_order`,`url`) VALUES('2','香港','1','_blank','1','100','xg')");
