<!DOCTYPE html>
<html>
<head>
    <title>我的文章</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <hdjs/>
    <bootstrap/>
    <link rel="stylesheet/less" href="__CONTROL_TPL__/css/dynamic.less?ver=1.0 "/>
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
                会员动态
            </h2>
            <h2 class="disab">
                <a href="{|U:'friend',array('g'=>'Member')}">好友动态</a>
            </h2>
        </header>
        <ul>
            <list from="$data" name="d">
                <li>
                    <div class="article">
                       {$d.content}

                    </div>
                    <div class="right-action">
                        <span class="time"> {$d.addtime|date_before}</span>
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