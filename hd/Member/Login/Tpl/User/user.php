<ul class="nav navbar-nav navbar-right">
    <if value="$hd.session.uid">
        <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 12px;padding-bottom: 0px;">
                    <img src="{$hd.session.icon50}" style="width:30px;height:30px;border-radius: 50%;vertical-align: middle"/>
                    {$hd.session.nickname}
                </a>
                <ul class="dropdown-menu">
                        <li><a href="__WEB__?a=Home&c=User&m=edit&g=Member">修改资料</a></li>
                        <li><a href="__WEB__?a=Home&c=Content&m=index&g=Member">我的文章</a></li>
                        <li><a href="__WEB__?a=Home&c=Content&m=index&g=Member">我的消息</a></li>
                        <li><a href="__WEB__?a=Home&c=Favorite&m=index&g=Member">我的收藏</a></li>
                        <li><a href="__ROOT__?{$hd.session.domain}">个人主页</a></li>
                        <li><a href="__WEB__?a=Login&c=login&m=quit&g=Member">退出</a></li>
                </ul>
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