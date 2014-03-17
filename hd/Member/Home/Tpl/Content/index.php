<!DOCTYPE html>
<html>
<head>
    <title>文章管理</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <jquery/>
    <bootstrap/>
    <link rel="stylesheet/less" href="__CONTROL_TPL__/css/content_list.less?ver=1.0 "/>
    <less/>
</head>
<body>
<header class="header center-block">
    <h1>
        <a href="#">后盾网 人人做后盾</a>
    </h1>
</header>
<nav class="top-menu">
    <div class="nav center-block">
        <a href="__ROOT__" target="_blank">首页</a>
        <a href="#">我的文章</a>
        <a href="#">个人主页</a>

        <a href="?quit" class="pull-right">退出</a>
    </div>
</nav>
<article class="center-block main">
    <section class="menu">
        <div class="center-block user">
            <img src="{$hd.session.favicon}150.jpg" title="点击修改头像"/>

            <p class="nickname">后盾网向军</p>

            <p class="edit-nickname">
                <span></span>
                修改昵称
            </p>

            <p>
                积 分：10 <br/>
                经验值：14
            </p>
        </div>
        <nav>
            <a href="#">
                <span class="glyphicon glyphicon-fire"></span>
                修改资料
            </a>
            <a href="#">
                <span class="glyphicon glyphicon-book"></span>
                我的文章
            </a>
            <a href="#">
                <span class="glyphicon glyphicon-comment"></span>
                我的消息
            </a>
            <a href="#">
                <span class="glyphicon glyphicon-envelope"></span>
                我的私信
            </a>
            <a href="#">
                <span class="glyphicon glyphicon-folder-open"></span>
                我的收藏
            </a>
        </nav>
    </section>
    <section class="article">
        <header>
            <h2>
                我的文章
                <span>(3)</span>
                <a href="{|U:'add',array('g'=>'Member')}" class="send">发表</a>
            </h2>
        </header>
        <ul>
            <li>
                <div class="article">
                    <a href="#" class="title">
                        小明和小涵各买了三束花，他们把花捆在一起，准备送给老师，那么老师收到几束花？
                    </a>
                    <a href="#" class="category">
                        PHP技术论坛
                    </a>
                    <span class="time">
                        2012-06-11
                    </span>
                </div>
                <div class="right-action">
                    <button type="button" class="btn btn-default btn-sm">修改</button>
                    <button type="button" class="btn btn-default btn-sm">删除</button>
                </div>
            </li>
            <li>
                <div class="article">
                    <a href="#" class="title">
                        小明和小涵各买了三束花，他们把花捆在一起，准备送给老师，那么老师收到几束花？
                    </a>
                    <a href="#" class="category">
                        PHP技术论坛
                    </a>
                    <span class="time">
                        2012-06-11
                    </span>
                </div>
                <div class="right-action">
                    <button type="button" class="btn btn-default btn-sm">修改</button>
                    <button type="button" class="btn btn-default btn-sm">删除</button>
                </div>
            </li>
        </ul>
    </section>
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