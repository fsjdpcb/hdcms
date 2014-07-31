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
<include file="__PUBLIC__/block/top_menu"/>
<article class="center-block main">
    <!--左侧导航start-->
    <include file="__PUBLIC__/block/left_menu"/>
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
                    <div class="article" style="width: 680px;">
                    	<a href='javascript:;'  onclick="hd_ajax('{|U:'del'}',{fid:{$d.fid}})" style="float: right">删除</a>
                        <a href="{|U:'Index/Index/content',array(mid=>$d['mid'],cid=>$d['cid'],aid=>$d['aid'])}" target="_blank" class="title">
                            {$d.title}
                        </a>
                        <a  target="_blank" href="<?php echo Url::getCategoryUrl($d);?>" class="category">
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
<include file="__PUBLIC__/block/footer"/>
</body>
</html>