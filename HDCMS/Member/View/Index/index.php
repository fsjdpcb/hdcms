<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta http-equiv="Cache-Control" content="no-cache"/>
    <css file="__PUBLIC__/static/css/common.css"/>
    <jquery/>
    <bootstarp/>
</head>
<body>
<div class="top">
    <div class="top_warp">
        <div class="logo">
            <img src="__CONTROLLER_VIEW__/image/member_logo.png" alt=""/>
        </div>
        <div class="top_menu">
            <include file="__PUBLIC__/block/top_menu.php"/>
        </div>
    </div>
</div>
<div class="wrap">
    <div class="menu">
        <include file="__PUBLIC__/block/left_menu.php"/>
    </div>

    <div class="content">
        <div class="member_info">
            <div class="user-icon">
                <img src="{$hd.session.user.icon}"/>
            </div>
            <div class="user-info">
                <div class="top-info">
                    <div class="username">{$hd.session.user.username}</div>
                    <div class="role">{$hd.session.user.rname}</div>
                </div>
                <div class="logintime">
                    本次登录时间：{$hd.session.user.logintime|date:"Y-m-d H:i",@@}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;本次登录IP： {$hd.session.user.lastip}
                </div>
            </div>
        </div>
        <div class="list">
            <div class="header">
                收藏夹
            </div>
            <div class="article">
                <table class="table2 hd-form">
                    <thead>
                    <tr>
                        <td>文章标题</td>
                        <td width="100">栏目</td>
                        <td width="50">点击</td>
                        <td width="100">发布时间</td>
                    </tr>
                    </thead>
                    <list from="$data" name="c">
                        <tr>
                            <td>
                                <a href="{|U:'Index/Index/content',array('mid'=>$c['mid'],'cid'=>$c['cid'],'aid'=>$c['aid'])}"
                                   target="_blank">
                                    {$c.title}
                                </a>
                            </td>
                            <td>
                                {$c.catname}
                            </td>
                            <td>{$c.click}</td>
                            <td>{$c.addtime|date:"Y-m-d",@@}</td>
                        </tr>
                    </list>
                </table>
                <div class="page1">
                    {$page}
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>