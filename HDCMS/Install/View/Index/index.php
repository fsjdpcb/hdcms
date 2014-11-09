<?php if (!defined("HDPHP_PATH")) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>{$hd.config.HDCMS_NAME}</title>
    <link type="text/css" href="__CONTROLLER_VIEW__/css/css.css" rel="stylesheet"/>
    <hdjs/>
</head>
<body>
<!--<div class="wrap">-->
    <div class="step">
        <div class="index">
            <h1>
                {$hd.config.HDCMS_NAME} {$hd.config.HDCMS_VERSION}
            </h1>
            <p>
                百分百免费，无论任何网站都可以免费使用
            </p>
            <div class="btn">
                <button class="hd-success" onclick="location.href='{|U:'copyright'}'">开始安装</button>
            </div>
        </div>
        <div class="bg"></div>
    </div>
<!--</div>-->
</body>
</html>