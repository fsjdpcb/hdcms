<!DOCTYPE html>
<html>
<head>
    <title>我的文章</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <hdjs/>
    <bootstrap/>
    <link rel="stylesheet" type="text/css" href="__CONTROL_TPL__/css/article-list.css?ver=1.0"/>
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
            <h2> 我的文章
                <a href="javascript:;" onclick="hd_open_window('{|U:'add',array('g'=>'Member','mid'=>$_GET['mid'])}')"
                   class="send">发表</a>
            </h2>

        </header>
        <ul>
            <list from="$data" name="d">
                <li>
                    <div class="article">
                        <a href="{|U:'Index/Article/show',array(mid=>$d['mid'],cid=>$d['cid'],aid=>$d['aid'])}" target="_blank" class="title">
                            {$d.title|mb_substr:0,35,'utf-8'}
                        </a>
                        <a href="{|U:'Index/Category/category',array(cid=>$d['cid'])}" target="_blank" class="category" style="display: inline-block;">
                            {$d.catname}
                            <span class="time">
                        {$d.updatetime|date:'Y-m-d H:i:s',@@}
                    </span>
                        </a>
                        <a href="javascript:;" onclick="hd_open_window('{|U:'add',array('g'=>'Member','mid'=>$d['mid'],'cid'=>$d['cid'])}')" style="display: inline-block;">
                            	发表
                            </a>

                    </div>
                    <div class="right-action">
                        <a href="javascript:;" onclick="hd_open_window('{|U:'edit',array('g'=>'Member','mid'=>$d['mid'],'cid'=>$d['cid'],'aid'=>$d['aid'])}')" class="btn btn-default btn-sm">修改</a>
                        <a href="javascript:confirm('确定删除吗？')?hd_ajax('{|U:'del',array('g'=>'Member','mid'=>$d['mid'],'cid'=>$d['cid'],'aid'=>$d['aid'])}'):false;" class="btn btn-default btn-sm">删除</a>
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