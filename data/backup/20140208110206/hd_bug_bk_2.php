<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."bug (`bid`,`username`,`addtime`,`email`,`content`,`reply`,`type`,`status`) VALUES('1','sdf','1391837541','sdf@df.com','dsfsdsdfsdfsdfsdfsdfsdf','感谢您的反馈，你的问题已经处理!','BUG反馈','未审核')");
