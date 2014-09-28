<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."content (`aid`,`cid`,`uid`,`title`,`flag`,`new_window`,`seo_title`,`thumb`,`click`,`redirecturl`,`html_path`,`addtime`,`updatetime`,`color`,`template`,`url_type`,`arc_sort`,`content_status`,`readpoint`,`keywords`,`description`)
						VALUES('1','19','1','HDPHP下载','','0','','','100','','','1411889739','1411889750','','download_hdphp.html','3','100','1','','','')");
$db->exe("REPLACE INTO ".$db_prefix."content (`aid`,`cid`,`uid`,`title`,`flag`,`new_window`,`seo_title`,`thumb`,`click`,`redirecturl`,`html_path`,`addtime`,`updatetime`,`color`,`template`,`url_type`,`arc_sort`,`content_status`,`readpoint`,`keywords`,`description`)
						VALUES('2','19','1','HDCMS下载','','0','','','100','','','1411889752','1411889760','','download_hdcms.html','3','100','1','','','')");
