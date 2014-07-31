<!DOCTYPE html>
<html>
<head>
    <title>我的文章</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <hdjs/>
    <bootstrap/>
    <link rel="stylesheet" type="text/css" href="__CONTROL_TPL__/css/dynamic.css?ver=1.0"/>
    <hdcms/>
</head>
<body>
<include file="__PUBLIC__/block/top_menu"/>
<article class="center-block main">
    <!--左侧导航start-->
    <include file="__PUBLIC__/block/left_menu"/>
    <!--左侧导航end-->
    <section class="article">
        <header>
            <h2 class="disab">
                <a href="{|U:'index'}">会员动态</a>
            </h2>
            <h2>
                好友动态
            </h2>
        </header>
        <ul>
            <list from="$data" name="d">
                <li>
                    <div class="article">
                    	<a href="__WEB__?{$d.domain}">
                      		<img src="{$d.icon|default:'__ROOT__/data/image/user/50.png'}" onmouseover="user.show(this,{$d.uid})"/>
                      	</a>
                      	<a href="__WEB__?{$d.domain}">
                      		{$d.username}
                      	</a>
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
<include file="__PUBLIC__/block/footer"/>
</body>
</html>