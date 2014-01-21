<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."content_data (`aid`,`content`) VALUES('1','<p>aa<br/></p>')");
$db->exe("REPLACE INTO ".$db_prefix."content_data (`aid`,`content`) VALUES('2','<p>sdfsfd<br/></p>')");
$db->exe("REPLACE INTO ".$db_prefix."content_data (`aid`,`content`) VALUES('3','<p>sdfsfd<br/></p>')");
$db->exe("REPLACE INTO ".$db_prefix."content_data (`aid`,`content`) VALUES('4','<p>fff<br/></p>')");
