<?php if (!defined("HDPHP_PATH")) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>{$hd.config.HDCMS_NAME}</title>
    <link type="text/css" href="__CONTROLLER_VIEW__/css/css.css" rel="stylesheet"/>
    <hdjs/>
    <style type="text/css">
        div.info{
            position: absolute;
            width: 800px;
            top:420px;
            text-align: center;
            font-family: '微软雅黑';
        }
        div.info h1{
            font-size:25px;
            font-weight: bold;
        }
        div.info p{
            margin-top:10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="wrap">
    <div class="step1 step">
        <div class="info">
            <h1>
                {$hd.config.HDCMS_NAME} {$hd.config.HDCMS_VERSION}
            </h1>
            <p>
                若要安装HDCMS请点按“继续”
            </p>
        </div>
        <div class="btn" style="position: absolute;top: 520px;">
            <button class="hd-success" onclick="location.href='{|U:'introduce'}'">继 续</button>
        </div>
    </div>
</div>
</body>
</html>