<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."addon_comment (`comment_id`,`userid`,`username`,`comment_status`,`content`,`create_time`,`reply`,`ip`,`direction`,`mid`,`cid`,`aid`)
						VALUES(1,1,'admin',1,'sdf',1409763870,0,'0.0.0.0',3,1,51,13)");
