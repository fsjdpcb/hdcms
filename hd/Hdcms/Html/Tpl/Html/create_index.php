<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>生成首页</title>
    <hdjs/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<form method="post" action="__METH__" class="hd-form" target="_iframe" onsubmit="return $.modalShow();">
    <div class="wrap">
        <div class="title-header">温馨提示</div>
        <div class="help">
            建议创建计划任务，自动更新首页
        </div>
        <div class="title-header">生成网站首页html文件</div>
        <br/>
        <input type="submit" value="开始更新" class="hd-success"/>
    </div>
</form>
<script>
    $.modal({title: '生成首页', button_cancel: '关闭', width: 450, height: 200, show: false,
        content: "<iframe name='_iframe' scrolling='no' frameborder='0' style='height:110px;'></iframe>",
        cancel: function () {
            window.location.reload(true);
        }
    })
</script>
</body>
</html>