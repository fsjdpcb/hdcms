<!DOCTYPE html>
<html>
<head>
    <title>我的收藏</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <hdjs/>
    <bootstrap/>
    <link rel="stylesheet/less" href="__CONTROL_TPL__/css/favorite.less?ver=1.0 "/>
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
        <a href="__ROOT__/index.php?<?php echo $_SESSION['domain']?$_SESSION['domain']:$_SESSION['uid'];?>" target="_blank">个人主页</a>
        <a href="__ROOT__/index.php?a=Login&c=Login&m=quit&g=Member" class="pull-right">退出</a>
    </div>
</nav>
<article class="center-block main">
    <section class="menu">
        <div class="center-block user">
            <a href="__ROOT__/index.php?<?php echo $_SESSION['domain']?$_SESSION['domain']:$_SESSION['uid'];?>" target="_blank">
                <img src="{$hd.session.icon150}" title="个人空间"/>
            </a>

            <p class="nickname">
                <span class="glyphicon glyphicon-user"></span> <b>{$hd.session.nickname}</b></p>

            <p class="edit-nickname" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-cog"></span> 修改昵称

            </p>
            <p>
                金币：{$hd.session.credits} <br/>
            </p>
            <!--修改昵称 start--->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog"  >
                    <div class="modal-content" style="height:200px;">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">修改昵称</h4>
                        </div>
                        <div class="modal-body" style="margin-left: 100px;margin-top:20px;">
                            <form method="post" class="hd-form" id="edit_nickname" onsubmit="return false;">
                                <input type="text" name="nickname" value="{$hd.session.nickname}" class="h40 w300"/>
                                <button type="submit" class="btn btn-primary">保存</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <script>
                //修改昵称
                $("#edit_nickname").submit(function(){
                    var nickname = $.trim($("input[name=nickname]").val());
                    if(!nickname){
                        alert('昵称不能为空');
                        return false;
                    }
                    $('#myModal').modal('hide');
                    $.post("{|U:'Home/User/edit_nickname',array('g'=>'Member')}",$(this).serialize(),function(data){
                        if(data.state==1){
                            $('p.nickname b').html(nickname);
                            $('input[name=nickname]').val(nickname);
                        }
                    },'json')
                })
            </script>
            <!--修改昵称 end--->
        </div>
        <nav>
            <a href="__ROOT__/index.php?a=Home&c=User&m=edit&g=Member">
                <span class="glyphicon glyphicon-fire"></span>
                修改资料
            </a>
            <a href="__ROOT__/index.php?a=Home&c=Content&m=index&g=Member">
                <span class="glyphicon glyphicon-book"></span>
                我的文章
            </a>
            <a href="__ROOT__/index.php?a=Home&c=Message&m=index&g=Member">
                <span class="glyphicon glyphicon-comment"></span>
                我的消息
                <span class="badge">{$message_count}</span>
            </a>
            <a href="__ROOT__/index.php?a=Home&c=Favorite&m=index&g=Member">
                <span class="glyphicon glyphicon-folder-open"></span>
                我的收藏
            </a>
        </nav>
    </section>
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