<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."content_tag (`mid`,`cid`,`aid`,`tid`)
						VALUES('1','10','8','3')");
$db->exe("REPLACE INTO ".$db_prefix."content_tag (`mid`,`cid`,`aid`,`tid`)
						VALUES('1','10','8','4')");
$db->exe("REPLACE INTO ".$db_prefix."content_tag (`mid`,`cid`,`aid`,`tid`)
						VALUES('1','10','8','5')");
