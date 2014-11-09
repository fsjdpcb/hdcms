<?php if (!defined("HDPHP_PATH")) exit; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link type="text/css" href="__CONTROLLER_VIEW__/css/css.css" rel="stylesheet"/>
    <hdjs/>
    <!--    <script type="text/javascript" src="__CONTROLLER_VIEW__/js/js.js"></script>-->
</head>
<body>
<div class="step">
    <div class="bg"></div>
    <div class="database">
        <div class="title">HDCMS 安装向导</div>
        <div class="process">
            <ul>
                <li>许可协议</li>
                <li>环境检测</li>
                <li class="current">数据库设定</li>
                <li>生成数据</li>
                <li>安装完成</li>
            </ul>
        </div>
        <!--协议说明-->
        <form action="__ACTION__" method="post" class="hd-form" onsubmit="return false;">
            <div class="check set">
                <h3>数据库配置</h3>
                <table>
                    <tr>
                        <td width="150">数据库主机</td>
                        <td>
                            <input type="text" name="DB_HOST" value="127.0.0.1" class="w200"/>
                        </td>
                    </tr>
                    <tr>
                        <td>数据库用户</td>
                        <td>
                            <input type="text" name="DB_USER" value="root" class="w200"/>
                        </td>
                    </tr>
                    <tr>
                        <td>数据库密码</td>
                        <td>
                            <input type="text" name="DB_PASSWORD" value="" class="w200"/>
                        </td>
                    </tr>
                    <tr>
                        <td>数据表前缀</td>
                        <td>
                            <input type="text" name="DB_PREFIX" value="hd_" class="w200"/>
                        </td>
                    </tr>
                    <tr>
                        <td>数据库名称</td>
                        <td>
                            <input type="text" name="DB_DATABASE" value="hdcms" class="w200"/>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="check set">
                <h3>管理员初始密码</h3>
                <table width="100%">
                    <tr>
                        <td width="150">超级管理员</td>
                        <td>
                            <input type="text" name="ADMIN" value="admin" class="w200"/>
                        </td>
                    </tr>
                    <tr>
                        <td>密　码</td>
                        <td>
                            <input type="password" name="PASSWORD" class="w200"/>
                        </td>
                    </tr>
                    <tr>
                        <td>确认密码</td>
                        <td>
                            <input type="password" name="C_PASSWORD" class="w200"/>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="check set">
                <h3>网站设置</h3>
                <table width="100%">
                    <tr>
                        <td width="150">网站名称</td>
                        <td>
                            <input type="text" name="WEBNAME" value="HDCMS内容管理系统" class="w200"/>
                        </td>
                    </tr>
                    <tr>
                        <td>站长邮箱</td>
                        <td>
                            <input type="text" name="EMAIL" value="" class="w200"/>
                        </td>
                    </tr>
                </table>
            </div>
            <!--协议说明-->
            <div class="btn">
                <button class="hd-cancel" type="button" onclick="location.href='{|U:'environment'}'">上一步</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="hd-success" type="submit">下一步</button>
            </div>
        </form>
    </div>
</div>
<script>
    //表单不能为空
    function IsNull(name) {
        var obj = $("[name='" + name + "']");
        var val = obj.val().trim();
        obj.parent().find('span').remove();
        if (!val) {
            var span = "<span class='validate-error'>不能为空</span>";
            obj.parent().append(span);
            return false;
        }
        return true;
    }
    $("form").submit(function () {
        var DB_HOST = $("[name='DB_HOST']").val();
        var DB_USER = $("[name='DB_USER']").val();
        var DB_PASSWORD = $("[name='DB_PASSWORD']").val();
        var DB_PREFIX = $("[name='DB_PREFIX']").val();
        var DB_DATABASE = $("[name='DB_DATABASE']").val();
        var ADMIN = $("[name='ADMIN']").val();
        var PASSWORD = $("[name='PASSWORD']").val();
        var C_PASSWORD = $("[name='C_PASSWORD']").val();
        var WEBNAME = $("[name='WEBNAME']").val();
        var EMAIL = $("[name='EMAIL']").val();
        var field = ['DB_HOST', 'DB_USER', 'DB_PASSWORD', 'DB_PREFIX', 'DB_DATABASE', 'ADMIN', 'PASSWORD',
            'C_PASSWORD', 'WEBNAME', 'EMAIL'];
        //验证不能为空
        for (var name in field) {
            !IsNull(field[name]);
        }
        if ($(".validate-error").length == 0) {
            //异步验证数据库连接
            $.post(ACTION,$(this).serialize(),function(json){
                if(json.status==1){
                    location.href=CONTROLLER+"&a=Complete";
                }else{
                    alert(json.message);
                }
            },'json');
            return false;
        }
        return false;
    })
</script>
</body>
</html>