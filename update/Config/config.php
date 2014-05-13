<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
$dbConfig = require '../data/config/db.inc.php';
return array_merge($dbConfig,array(
	'NEW_VERSION'=>'2014.05.13',
));
?>