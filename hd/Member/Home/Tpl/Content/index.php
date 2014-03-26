<!DOCTYPE html>
<html>
<head>
    <title>文章管理</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <hdjs/>
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
<article class="center-block activity">
    <section class="menu">
        <div class="center-block user">
            <img src="{$hd.session.icon150}" title="点击修改头像"/>

            <p class="nickname">
                <span class="glyphicon glyphicon-user"></span> <b>{$hd.session.nickname}</b></p>

            <p class="edit-nickname" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-cog"></span> 修改昵称

            </p>
            <p>
                金  &nbsp; 币：{$hd.session.credits} <br/>
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
                $('#myModal').on('show.bs.modal', function (e) {
                    //设置昵称表单值
                    $('input[name=nickname]').val('{$hd.session.nickname}');
                })
                //修改昵称
                $("#edit_nickname").submit(function(){
                    $('#myModal').modal('hide');
                    var nickname = $.trim($("input[name=nickname]").val());
                    if(!nickname){
                        alert('昵称不能为空');
                        return false;
                    }
                    $.post("{|U:'Home/User/edit_nickname',array('g'=>'Member')}",$(this).serialize(),function(data){
                        if(data.state==1){
                            $.dialog({
                                "message": data.message,
                                "type": "success",
                                "close_handler": function () {
                                    $('p.nickname b').html(nickname);
                                }
                            });
                        }
                    },'json')
                })
            </script>
            <!--修改昵称 end--->
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
    <div id="right-wrap">
        <section class="article">
            <header>
                <h2>
                    我的文章
                    <span>(3)</span>
                    <a href="javascript:;" onclick="hd_open_window('{|U:'select_category',array('g'=>'Member')}')"
                       class="send">发表</a>
                </h2>
            </header>
            <ul>
                <list from="$data" name="d">
                    <li>
                        <div class="article">
                            <a href="#" class="title">
                                {$d.title}
                                <span>
                                    <if value="$d.state neq 1">(未审核)</if>
                                </span>
                            </a>
                            <a href="#" class="category">
                                {$d.catname}
                            </a>
                    <span class="time">
                        {$d.updatetime|date:'Y-m-d H:i:s',@@}
                    </span>
                        </div>
                        <div class="right-action">
                            <a href="javascript:;" onclick="hd_open_window('{|U:'edit',array('g'=>'Member','aid'=>$d['aid'],'cid'=>$d['cid'])}')" class="btn btn-default btn-sm">修改</a>
                            <a href="javascript:confirm('确定删除吗？')?hd_ajax('{|U:'del',array('g'=>'Member','aid'=>$d['aid'],'cid'=>$d['cid'])}'):false;" class="btn btn-default btn-sm">删除</a>
                        </div>
                    </li>
                </list>
            </ul>
        </section>
        <div class="page1 h30">
            {$page}
        </div>
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