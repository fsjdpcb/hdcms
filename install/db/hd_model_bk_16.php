<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."model (`mid`,`model_name`,`table_name`,`enable`,`description`,`type`,`is_submit`,`m_order`,`is_system`,`app_group`,`app`,`control`,`method`) VALUES('1','普通文章','content','1','','1','0','0','1','Hdcms','Content','Content','index')");
$db->exe("REPLACE INTO ".$db_prefix."model (`mid`,`model_name`,`table_name`,`enable`,`description`,`type`,`is_submit`,`m_order`,`is_system`,`app_group`,`app`,`control`,`method`) VALUES('2','单文章','single','1','','1','1','0','1','Hdcms','Single','Content','edit')");
