<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."content (`aid`,`cid`,`uid`,`title`,`flag`,`new_window`,`seo_title`,`thumb`,`click`,`redirecturl`,`html_path`,`addtime`,`updatetime`,`color`,`template`,`url_type`,`arc_sort`,`content_status`,`readpoint`,`keywords`,`description`)
						VALUES(1,19,1,'HDCMS内容管理系统','',0,'','',103,'','',1410536597,1410536674,'','download_hdcms.html',3,100,1,0,'','')");
$db->exe("REPLACE INTO ".$db_prefix."content (`aid`,`cid`,`uid`,`title`,`flag`,`new_window`,`seo_title`,`thumb`,`click`,`redirecturl`,`html_path`,`addtime`,`updatetime`,`color`,`template`,`url_type`,`arc_sort`,`content_status`,`readpoint`,`keywords`,`description`)
						VALUES(2,19,1,'HDPHP开源框架','',0,'','',100,'','',1410540146,1410540160,'','download_hdphp.html',3,100,1,0,'','')");
