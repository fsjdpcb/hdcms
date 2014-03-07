<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>注册 - {$hd.config.webname}</title>
    <hdjs/>
    <bootstrap/>
    <script type="text/javascript" src="__TEMPLATE__/js/reg.js"></script>
    <link rel="stylesheet" href="__TEMPLATE__/css/reg.css"/>
</head>
<body>
<div class="top">
    <div class="top-menu">
        <a href="" class="logo">后盾网</a>
        <ul>
            <li>
                <a href="">首页</a>
            </li>
            <li>
                <a href="">提问</a>
            </li>
        </ul>
    </div>
</div>
<!--内容主体-->
<div class="reg">
    <div class="info" >
        <h1>登录</h1>
        <p>
            没有帐号？请注册
            <a href="">注册</a>
        </p>
        <div class="reg">
            <form role="form" method="post">
                <div class="form-group">
                    <input type="text" class="form-control input-lg" id="email" name="username" required='' placeholder="帐号">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control input-lg" id="email" name="email" required='' placeholder="Email 地址">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control input-lg" id="password" name="password" required='' placeholder="登录密码">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control input-lg" id="name" required='' name="nickname" placeholder="呢称或真名">
                </div>
                <div class="row">
                    <div class="col-md-8">您将同意并接受<a href="#">《服务条款》</a></div>
                    <div class="col-md-4"><button type="submit" class="btn btn-primary">&nbsp;&nbsp;注册&nbsp;&nbsp;</button></div>
                </div>

            </form>


        </div>
    </div>
</div>
<!--内容主体-->
</body>
</html>