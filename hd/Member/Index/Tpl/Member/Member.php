<ul class="nav navbar-nav navbar-right">
    <if value="$hd.session.uid">
        <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 12px;padding-bottom: 0px;padding-right:0px;">
                    <img src="__ROOT__/{$hd.session.icon50}" style="width:30px;height:30px;border-radius: 50%;vertical-align: middle"/>
                    {$hd.session.nickname}
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="__WEB__?a=Message&c=Message&m=index&g=Member"> <span class="glyphicon glyphicon-envelope"></span> 我的消息</a></li>
                    <li><a href="__WEB__?a=Favorite&c=Favorite&m=index&g=Member"> <span class="glyphicon glyphicon-star-empty"></span> 我的收藏</a></li>
                    <li><a href="__WEB__?a=Follow&c=Follow&m=fans&g=Member"> <span class="glyphicon glyphicon-heart"></span> 我的粉丝</a></li>
                    <li><a href="__WEB__?a=Follow&c=Follow&m=follow&g=Member"> 我的关注</a></li>
                    <li><a href="__WEB__?a=Content&c=Content&m=index&g=Member&mid=1">我的文章</a></li>
                    <li><a href="__WEB__?{$hd.session.domain}">个人主页</a></li>
                    <li><a href="__WEB__?a=User&c=User&m=edit&g=Member">修改资料</a></li>
                    <li><a href="__WEB__?a=Login&c=login&m=quit&g=Member">退出</a></li>
                </ul>
        </li>
        <li class="dropdown">
            <a href="__WEB__?a=Message&c=Message&m=index&g=Member" class="message" style="padding-left:5px !important;">
                <span class="badge">{$message_count}条消息</span>
            </a>
            <style>
                a.message:hover{
                    background: none !important;
                }
            </style>
        </li>
    <else>
        <li>
            <a href="__WEB__?a=Login&c=Login&m=login&g=Member">登录</a>
        </li>
        <li>
            <a href="__WEB__?a=Login&c=Login&m=reg&g=Member">注册</a>
        </li>
    </if>
</ul>