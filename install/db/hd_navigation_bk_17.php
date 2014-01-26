<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."navigation (`nid`,`title`,`pid`,`target`,`state`,`list_order`,`url`) VALUES('1','首页','0','_self','0','1','')");
$db->exe("REPLACE INTO ".$db_prefix."navigation (`nid`,`title`,`pid`,`target`,`state`,`list_order`,`url`) VALUES('2','后盾网','0','_self','1','100','http://www.houdunwang.com')");
$db->exe("REPLACE INTO ".$db_prefix."navigation (`nid`,`title`,`pid`,`target`,`state`,`list_order`,`url`) VALUES('6','a2','0','_self','1','100','[ROOT]/index.php?a=Navigation&c=Navigation&m=edit&nid=6')");
