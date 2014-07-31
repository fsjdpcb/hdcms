<ul class="nav navbar-nav navbar-right">
    <if value="$hd.session.uid">
        <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 12px;padding-bottom: 0px;padding-right:0px;">
                    <img src="{$hd.session.icon50}" style="width:30px;height:30px;border-radius: 50%;vertical-align: middle"/>
                    {$hd.session.nickname}
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="__WEB__?m=Member&c=Message&a=index"> <span class="glyphicon glyphicon-envelope"></span> 我的消息</a></li>
                    <li><a href="__WEB__?m=Member&c=Favorite&a=index"> <span class="glyphicon glyphicon-star-empty"></span> 我的收藏</a></li>
                    <li><a href="__WEB__?m=Member&c=Follow&a=fans_list"> <span class="glyphicon glyphicon-heart"></span> 我的粉丝</a></li>
                    <li><a href="__WEB__?m=Member&c=Follow&a=follow_list"> 我的关注</a></li>
                    <li><a href="__WEB__?m=Member&c=Content&a=index&mid=1">我的文章</a></li>
                    <li><a href="__WEB__?{$hd.session.domain}">个人主页</a></li>
                    <li><a href="__WEB__?m=Member&c=Profile&a=edit">修改资料</a></li>
                    <li><a href="__WEB__?m=Member&c=Login&a=quit">退出</a></li>
                </ul>
        </li>
        <li class="dropdown">
            <a href="__WEB__?m=Member&c=Message&a=index" class="message" style="padding-left:5px !important;">
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
            <a href="__WEB__?m=Member&c=Login&a=login">登录</a>
        </li>
        <li>
            <a href="__WEB__?m=Member&c=Login&a=reg">注册</a>
        </li>
    </if>
</ul>