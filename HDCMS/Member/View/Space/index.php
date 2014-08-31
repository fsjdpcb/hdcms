<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人空间</title>
    <bootstrap/>
    <css file="__CONTROLLER_VIEW__/css/space.css"/>
</head>
<body>
<div class="wrap">
    <div class="content">
        <div class="top_pic">
            空间顶图
        </div>
        <div class="about">
            <div class="feeb">
                <img src="__CONTROLLER_VIEW__/image/feebd134.jpeg" alt=""/>
            </div>
            <div class="userinfo">
                <div class="username">
                    <span class="userinfo_username">{$user.nickname}</span>
                </div>
                <div class="userinfo_userdata">
                    <span>签名: {$hd.session.user.signature}</span>
                    <span class="userinfo_split"></span>
                </div>
            </div>
            <div class="userinfo_shortcut">
                <a href="__ROOT__">返回首页</a> |
                <a href="{|U:'Member/Index/index'}">会员中心</a>
            </div>
        </div>
        <div class="content_wrap">
            <div class="article_list">
                <h1 class="list_title">文章</h1>
                <ul>
                    <list from="$data" name="d">
                    <li>
                        <div class="addtime">{$d.addtime|date:"Y-m-d",@@}</div>
                        <div class="article_content">
                            <span class="post_ico"></span>
                            <span class="post_content">
                                <a href="{|U:'Index/Index/Content',array('mid'=>$d['mid'],'cid'=>$d['cid'],'aid'=>$d['aid'])}">{$d.title}</a>
                            </span>
                        </div>
                    </li>
                    </list>
                </ul>
                <div class="page1">
                    {$page}
                </div>
            </div>
            <div class="follow">
                <h1 class="ihome_aside_title">最近来访</h1>
                <ul>
                    <list from="$guest" name="g">
                        <li>
                            <a href="{|U:'index',array('uid'=>$g['uid'])}">
                                <img src="__ROOT__/{$g.icon}" alt="{$g.nickname}" title="{$g.nickname}"/>
                            </a>
                        </li>
                    </list>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright">
        {$hd.config.copyright}
    </div>
</div>

</body>
</html>