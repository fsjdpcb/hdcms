<?php
if (!defined("HDPHP_PATH")) exit;
$tags = require './data/config/tag.inc.php';
return array(
    //标签
    'TPL_TAGS' => array(
        '@@.Hdcms.Index.Tag.ContentTag'
    ),
    //自动加载文件
    'AUTO_LOAD_FILE' => array(
        'Functions.php'
    )
);
?>