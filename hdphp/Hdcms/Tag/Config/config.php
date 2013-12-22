<?php

if (!defined("HDPHP_PATH")) exit('No direct script access allowed');
return array_merge(
    array(
        //标签
        "TPL_TAGS" => array('Content.Tag.ContentTag'),
        //过滤函数
        "FILTER_FUNCTION" => array("strip_tags", "trim", "htmlspecialchars", "addslashes")
    )
);

?>