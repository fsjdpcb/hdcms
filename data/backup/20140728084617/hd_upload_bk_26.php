<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."upload (`id`,`name`,`filename`,`basename`,`path`,`ext`,`image`,`size`,`uptime`,`status`,`uid`,`mid`)
						VALUES('11','1','16781406263157.jpg','upload/16781406263157.jpg','upload/16781406263157.jpg','jpg','1','130684','1406263157','0','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."upload (`id`,`name`,`filename`,`basename`,`path`,`ext`,`image`,`size`,`uptime`,`status`,`uid`,`mid`)
						VALUES('12','1','55561406263164.jpg','upload/55561406263164.jpg','upload/55561406263164.jpg','jpg','1','130684','1406263164','1','1','25')");
