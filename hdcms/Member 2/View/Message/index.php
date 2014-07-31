<!DOCTYPE html>
<html>
<head>
    <title>我的消息</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <hdjs/>
    <bootstrap/>
    <link rel="stylesheet" type="text/css" href="__CONTROLLER_TPL__/css/message.css?ver=1.0"/>
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
            <h2>
                我的消息
            </h2>
        </header>
        <ul>
            <list from="$data" name="d">
                <li>
                    <div class="article">
                        <a href="__ROOT__/index.php?a=Member&c=Message&m=show&from_uid={$d.from_uid}" class="title">
                            {$d.nickname} : {$d.content|mb_substr:0,30,'utf-8'}
                        </a>
                    <span class="time">
                        {$d.sendtime|date:'Y-m-d H:i:s',@@}
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
<include file="__PUBLIC__/block/footer"/>
</body>
</html>