<!DOCTYPE html>
<html>
<head>
    <title>搜索</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <jquery/>
    <bootstrap/>
    <link rel="stylesheet" type="text/css" href="__CONTROL_TPL__/css/style.css?ver=1.0"/>
    <hdcms/>
</head>
<body>
<article class="header container">
    <h1>网站LOGO</h1>
    <!--导航-->
    <nav class=".navbar-fixed-top" role="navigation">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="__ROOT__">首页</a></li>
                <channel type="top">
                    <li><a href='{$field.url}'>{$field.catname}</a></li>
                </channel>
            </ul>
            <form class="navbar-form navbar-left" role="search" method="post" action="__WEB__?g=Hdcms&a=Search&c=Search&m=search">
                <div class="form-group">
                    <input type="hidden" name='type' class="form-control" value="tag">
                    <input type="text" name='word' class="form-control" placeholder="输入关键字搜索" required="">
                </div>
                <button type="submit" class="btn btn-primary">搜索</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                        <span class="glyphicon glyphicon-cloud-download"></span>
                    </a>
                    <if value="$hd.session.uid">
                        <ul class="dropdown-menu">
                            <li><a href="__WEB__?g=Member&a=Home&c=Home&m=index">我的文章</a></li>
                        </ul>
                        <else>
                            <ul class="dropdown-menu">
                                <li><a href="?login">登录</a></li>
                                <li><a href="?reg">注册</a></li>
                            </ul>
                    </if>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">后盾网 <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="http://www.hdphp.com">HDPHP框架</a></li>
                        <li><a href="http://www.hdphp.com">HDCMS系统</a></li>
                        <li><a href="http://www.kuaixuewang.com">快学网</a></li>
                        <li><a href="http://bbs.houdunwang.com">论坛</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</article>
<!--最新消息-->
<div class="message container">
    <span>最新消息：</span>
    <arclist cid="2" row="1" titlelen=20>
        <a href='{$field.url}'>{$field.title}</a>
    </arclist>
</div>
<!--内容主体-->
<div class="content container">
    <div class="row">
        <div class="col-md-8">
            <!--置顶推荐-->
            <article class="top">
                <header>置顶推荐</header>
                <ul>
                    <arclist row="2" fid="2,4" titlelen="15" infolen="50" type="rand">
                        <li class="col-md-6">
                            <a href="{$field.url}">
                                <img src="{$field.thumb}" class="img-rounded sticky"/>

                                <h3 class="title">{$field.title}</h3>

                                <p>
                                    {$field.description}
                                </p>
                            </a>
                        </li>
                    </arclist>
                </ul>
            </article>
            <!--内容列表-->
            <div class="article-list">
                <header>搜索结果</header>
                <list from="$data" name="$field">
                    <div class="article">
                        <h3>
                        <span>
                            {$field.catname}
                            <i class="glyphicon glyphicon-play"></i>
                        </span>
                            <a href="{$field.url}">{$field.title|mb_substr:0,32,'utf-8'}</a>
                        </h3>
                        <div class="author">
                            <a href="{$field.member}">{$field.username}</a>
                            发表于 {$field.addtime|date_before}
                        </div>
                        <p> {$field.description} </p>
                    </div>
                </list>
                <div class="page">
                    {$page}
                </div>
            </div>
        </div>
        <!--右侧列表-->
        <div class="right-list col-md-4">
            <!--热门标签-->
            <article class="tag">
                <header>
                    标签云
                </header>
                <div>
                    <tag row="30" type="hot">
                        <a href="{$field.url}">{$field.tag}</a>
                    </tag>
                </div>
                <!--Tag随机变色-->
                <script>
                    $(".tag div a ").each(function (i) {
                        var color = ['red', '#428BCA', '#5CB85C', '#D9534F', '#567E95', '#FF8433', '#4A4A4A', '#5CB85C', '#B433FF', '#33BBBA', '#C28F5B'];
                        var t = Math.floor(Math.random() * color.length);
                        $(this).css({'background-color': color[t]});
                    })
                </script>
            </article>
            <!--精英-->
            <article class="reader">
                <header>精英</header>
                <section>
                    <user row="14">
                        <a href="{$field.url}">
                            <img src="{$field.icon}" title="{$field.nickname}"
                                 onmouseover="user.show(this,{$field.uid})"
                                 style="width: 50px;height: 50px;border-radius: 10%;"/>
                        </a>
                    </user>
                </section>
            </article>
            <!--最新评论-->
            <article class="comment">
                <header>最新评论</header>
                <comment row="6" contentlen="20">
                    <section>
                        <a href="{$field.url}">
                            <img src="{$field.icon}" style="width: 36px;height: 36px;border-radius: 50%;" onmouseover="user.show(this,{$field.uid})"/>

                            <p class="man">
                                <span>{$field.nickname}</span> {$field.pubtime}说：
                            </p>

                            <p class="content">
                                {$field.content}
                            </p>
                        </a>
                    </section>
                </comment>

            </article>
            <!--猜你喜欢-->
            <article class="news">
                <header>
                    猜你喜欢
                </header>
                <arclist type="rand" row="5" titlelen="22">
                    <section>
                        <a href="{$field.url}">
                            <h3>{$field.title}</h3>

                            <p>
                                {$field.time}
                            </p>
                        </a>
                    </section>
                </arclist>
            </article>
        </div>
    </div>
</div>
<!--copyright-->
<footer class="container">
    后盾网PHP培训是唯一拥有开源框架与开源CMS系统的培训机构！ © 2014 <a href="http://www.houdunwang.com">后盾网</a>
</footer>
</body>
</html>