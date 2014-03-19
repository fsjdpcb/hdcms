<!DOCTYPE html>
<html>
<head>
    <title>仿大前端首页</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <jquery/>
    <bootstrap/>
    <link rel="stylesheet/less" href="__CONTROL_TPL__/css/reg.less?ver=1.0 "/>
    <less/>
    <js file="__CONTROL_TPL__/js/js.js"/>
</head>
<body>
<div class="header container">
    <a href="#">
        后盾网 人人做后盾
    </a>
</div>
<div class="content container">
    <header>
        <span>求职者注册</span>

        <p>海量名企职位，拓展人脉关系，体验社交招聘，让伯乐主动联系你</p>
        <strong>客户服务邮箱 <a href="mailto:{$hd.config.email}">{$hd.config.email}</a></strong>
    </header>
    <article class="row">

        <div class="field col-md-8">
            <div class="alert alert-warning hide"></div>
            <form class="form-horizontal" role="form" method="post" action="__URL__" onsubmit="return false;">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">帐　号：</label>
                    <div class="col-sm-7">
                        <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="请输入帐号，不能小于5位" title='不能小于5位' pattern="\w{5,}" required=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">邮　箱：</label>
                    <div class="col-sm-7">
                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">密　码：</label>
                    <div class="col-sm-7">
                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">确认密码：</label>
                    <div class="col-sm-7">
                        <input type="password" name="password_c" class="form-control" id="inputPassword3" placeholder="Password" required=""/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" class="btn btn-primary btn-lg">会员登录</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="field col-md-4">
            > 已经有 账号？ <a href="?login">立即登录</a>
        </div>
    </article>
</div>
</body>
</html>