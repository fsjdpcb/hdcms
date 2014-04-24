<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user_dynamic (`did`,`uid`,`content`,`addtime`) VALUES('1','1','发表了文章: <a href=\"http://localhost/hdcms/index.php?a=Index&c=Article&m=show&mid=1&cid=15&aid=21\" target=\"_blank\">11111111111</a>','1398351540')");
$db->exe("REPLACE INTO ".$db_prefix."user_dynamic (`did`,`uid`,`content`,`addtime`) VALUES('2','1','发表了文章: <a href=\"http://localhost/hdcms/index.php?a=Index&c=Article&m=show&mid=1&cid=15&aid=22\" target=\"_blank\">222222222222222</a>','1398351621')");
$db->exe("REPLACE INTO ".$db_prefix."user_dynamic (`did`,`uid`,`content`,`addtime`) VALUES('3','1','发表了文章: <a href=\"http://localhost/hdcms/index.php?a=Index&c=Article&m=show&mid=1&cid=10&aid=23\" target=\"_blank\">5555555</a>','1398352608')");
