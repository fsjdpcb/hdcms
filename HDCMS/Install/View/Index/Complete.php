<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{$hd.config.HDCMS_NAME}</title>
    <link type="text/css" href="__CONTROLLER_VIEW__/css/css.css" rel="stylesheet"/>
</head>
<body>
<div class="step4 step">
    <div class="title">完装完毕</div>
    <div class="process">
        <ul>
            <li>许可协议</li>
            <li>环境检测</li>
            <li>数据库设定</li>
            <li>生成数据</li>
            <li class="current">安装完成</li>
        </ul>
    </div>
    <div class="install">
        <div class="success">
            <h2>
                非常感谢使用HDCMS!
                <span>请进入后台后，更新全站缓存</span>
            </h2>

            <div class="link">
                <a href="__WEB__">访问首页</a>
                <a href="{|U:'Admin/Index/index'}">登录后台</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>