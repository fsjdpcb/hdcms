<div class="top">
    <div class="top_warp">
        <div class="logo">
            <a href="{|U:'Member/Index/index'}">
                <img src="__VIEW__/Public/static/image/member_logo.png" alt=""/>
            </a>
        </div>
        <div class="top_menu">
            <a href="__ROOT__">首页</a>
            <a href="{|U:'Space/index',array('uid'=>$_SESSION['user']['uid'])}">个人空间</a>
            <a href="{|U:'Index/index'}" class="login">
                <img src="{$hd.session.user.icon}" class="user"/>
                {$hd.session.user.username}
            </a>
        </div>
    </div>
</div>
