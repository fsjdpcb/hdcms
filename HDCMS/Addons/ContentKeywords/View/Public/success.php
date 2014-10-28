<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>操作成功</title>
    <link rel="stylesheet" type="text/css" href="__HDPHP_TPL__/static/css.css"/>
    <style>
        div.wrap {
            margin-top: 0px !important;
            top:20px;
        }
    </style>
</head>
<body>
<div class="wrap">
    <div class="title">
        操作成功
    </div>
    <div class="content">
        <div class="icon"></div>
        <div class="message">
            <div style="margin-top:10px;margin-bottom:15px;">
                {$message}
            </div>
            <a href="javascript:{$url}" class="hd-cancel">
                返回
            </a>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.setTimeout("{$url}", {$time} * 1000);
</script>
</body>
</html>