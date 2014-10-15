<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."addon_comment (`comment_id`,`userid`,`username`,`comment_status`,`content`,`create_time`,`reply`,`ip`,`direction`,`mid`,`cid`,`aid`)
						VALUES('1','2','lisi','1','fsd','1413299327','0','0.0.0.0','3','1','11','11')");
$db->exe("REPLACE INTO ".$db_prefix."addon_comment (`comment_id`,`userid`,`username`,`comment_status`,`content`,`create_time`,`reply`,`ip`,`direction`,`mid`,`cid`,`aid`)
						VALUES('2','2','lisi','1','<div class=\"comment-content\"><span class=\"comment-info\">lisi 于 2014-10-14 23:08:47发布</span>fsd</div><span></span>55665','1413299332','1','0.0.0.0','0','1','11','11')");
$db->exe("REPLACE INTO ".$db_prefix."addon_comment (`comment_id`,`userid`,`username`,`comment_status`,`content`,`create_time`,`reply`,`ip`,`direction`,`mid`,`cid`,`aid`)
						VALUES('3','2','lisi','1','<div class=\"comment-content\"><div class=\"comment-content\"><span class=\"comment-info\">lisi 于 2014-10-14 23:08:47发布</span>fsd</div><span class=\"comment-info\">lisi 于 2014-10-14 23:08:52发布</span>55665</div>999999999999999999','1413299344','1','0.0.0.0','0','1','11','11')");
