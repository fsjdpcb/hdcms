<!DOCTYPE html>
<html>
<head>
    <title>我的收藏</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <hdjs/>
    <bootstrap/>
    <link rel="stylesheet" type="text/css" href="__CONTROL_TPL__/css/favorite.css?ver=1.0"/>
    <hdcms/>
</head>
<body>
<load file="__GROUP__/Member/Public/block/top_menu.php"/>
<article class="center-block main">
    <!--左侧导航start-->
    <load file="__GROUP__/Member/Public/block/left_menu.php"/>
    <!--左侧导航end-->
    <section class="article">
        <header>
            <h2>
                我的收藏
                <span>({$count})</span>
            </h2>
        </header>
        <ul>
            <list from="$data" name="d">
                <li>
                    <div class="article">
                        <a href="{|U:'Index/Article/show',array(mid=>$d['mid'],cid=>$d['cid'],aid=>$d['aid'])}" target="_blank" class="title">
                            {$d.title}
                        </a>
                        <a href="#" class="category">
                            {$d.catname}
                        </a>
                    <span class="time">
                        {$d.updatetime|date:'Y-m-d H:i:s',@@}
                    </span>
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