<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-user"></span>
            <span class="glyphicon glyphicon-cloud-download"></span>
        </a>
        <if value="$hd.session.uid">
            <ul class="dropdown-menu">
                <li><a href="__WEB__?a=Home&c=User&m=edit&g=Member">修改资料</a></li>
                <li><a href="__WEB__?a=Home&c=Content&m=index&g=Member">我的文章</a></li>
                <li><a href="__WEB__?a=Home&c=Content&m=index&g=Member">我的消息</a></li>
                <li><a href="__WEB__?a=Home&c=Favorite&m=index&g=Member">我的收藏</a></li>
                <li><a href="__WEB__?a=Login&c=login&m=quit&g=Member">退出</a></li>
            </ul>
            <else>
                <ul class="dropdown-menu">
                    <li><a href="__WEB__?a=Login&c=Login&m=login&g=Member">登录</a></li>
                    <li><a href="__WEB__?a=Login&c=Login&m=reg&g=Member">注册</a></li>
                </ul>
        </if>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">后盾网 <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="http://www.houdunwang.com">后盾网</a></li>
            <li><a href="http://bbs.houdunwang.com">论坛</a></li>
        </ul>
    </li>
</ul>