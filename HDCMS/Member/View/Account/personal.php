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
<include file="__PUBLIC__/block/top_menu.php"/>
<div class="wrap">
    <div class="menu">
        <include file="__PUBLIC__/block/left_menu.php"/>
    </div>
    <div class="content">
        <div class="list">
            <div class="header">
                更新个人资料
            </div>
            <div class="article">
                <div class="form">
                    <form method="post">
                        <label>昵称</label>
                        <input type="text" name="nickname" value="{$field.nickname}" placeholder="请输入昵称" required="">
                        <label>邮箱</label>
                        <input type="email" name="email" value="{$field.email}" placeholder="请输入邮箱" required="">
                        <label>QQ</label>
                        <input type="text" name="qq" value="{$field.qq}" placeholder="请输入QQ号" required="">
                        <input type="submit" value="保存修改"/>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>