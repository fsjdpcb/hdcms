<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."navigation (`nid`,`title`,`pid`,`target`,`state`,`list_order`,`url`) VALUES('1','首页','0','_self','0','1','')");
$db->exe("REPLACE INTO ".$db_prefix."navigation (`nid`,`title`,`pid`,`target`,`state`,`list_order`,`url`) VALUES('2','后盾网','0','_self','1','100','http://www.houdunwang.com')");
$db->exe("REPLACE INTO ".$db_prefix."navigation (`nid`,`title`,`pid`,`target`,`state`,`list_order`,`url`) VALUES('3','ab','0','_blank','1','100','?a=Index&c=Article&m=content&cid=10&aid=17')");
