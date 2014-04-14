<!DOCTYPE html>
<html>
<head>
    <title>我的关注</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <hdjs/>
    <bootstrap/>
    <link rel="stylesheet/less" href="__CONTROL_TPL__/css/follow.less?ver=1.0 "/>
    <script type="text/javascript" src="__ROOT__/hd/static/js/hdcms.js"></script>
    <link rel="stylesheet/less" href="__ROOT__/hd/static/css/hdcms.less?ver=1.0 "/>
    <less/>
</head>
<body>
<header class="header center-block">
    <h1>
        <a href="__ROOT__">后盾网  人人做后盾</a>
    </h1>
</header>
<nav class="top-menu">
    <div class="nav center-block">
        <a href="__ROOT__">首页</a>
        <a href="__ROOT__/index.php?a=Home&c=Content&m=index&g=Member">我的文章</a>
        <a href="__ROOT__?{$hd.session.domain}" target="_blank">个人空间</a>
        <a href="__ROOT__/index.php?a=Login&c=Login&m=quit&g=Member" class="pull-right">退出</a>
    </div>
</nav>
<article class="center-block main">
    <!--左侧导航start-->
    <load file="__TPL__/Public/block/left_menu.php"/>
    <!--左侧导航end-->
    <section class="article">
        <header>
            <h2>
                我的粉丝
            </h2>
        </header>
        <ul>
            <list from="$data" name="d">
                <li>
                    <div class="icon">
                       <img src="{|get_user_icon:$d['uid'],100}" onmouseover="user.show(this,{$d.uid})"/>
                    </div>
                    <div class="info">
                        <p class="nickname">{$d.nickname}</p>
                        <p>关系：<a href="javascript:;" onclick="user.follow(this,{$d.uid})" >{$d.follow}</a></p>
                        <p>最后登录：{$field.logintime|date:"Y-m-d",@@}</p>
                        <p>
                            <a href="javascript:;" onclick="message.show({$d.uid},'{$d.nickname}')">发消息</a>
                            <a href="__WEB__?{$d.domain}" target="_blank">访问主页</a>
                        </p>
                    </div>
                </li>
            </list>
        </ul>
    </section>
    <div class="page1 h30">
        {$page}
    </div>
</article>
<footer class="container">
    <nav>
        <a href="#">PHP培训</a>
        <a href="#">HDPHP框架</a>
        <a href="#">论坛</a>
    </nav>
    Copyright © 2014 so.com All Rights Reserved <a href="#">京公安网备11000000000006</a>
</footer>
</body>
</html>