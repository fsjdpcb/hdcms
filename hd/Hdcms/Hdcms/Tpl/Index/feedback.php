<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>HDCMS快速建站利器</title>
    <hdjs/>
    <css file="__CONTROL_TPL__/css/welcome.css"/>
</head>
<body>
<div class="wrap">
    <div class="title-header">温馨提示</div>
    <table class="table2">
        <tr>
            <td style="color:red">
                HDCMS系统为Beta版本，不提供升级服务。请关注正式版本发布！
            </td>
        </tr>
    </table>

    <div class="title-header">安全提示</div>
    <table class="table2">
        <tr>
            <td>1. 默认应用组目录hdphp(及子目录)设置为750,文件设置为640</td>
        </tr>
        <tr>
            <td>2. 建议删除安装目录install</td>
        </tr>
    </table>
    <div style="height:10px;overflow: hidden">&nbsp;</div>
    <div class="title-header">HDCMS动态</div>
    <table class="table2">
        <tr>
            <td><a href="#">[2013-2-22] 增加DISCUZ论坛整合</a></td>
        </tr>
        <tr>
            <td><a href="#">[2013-2-22] 增加SINA接口整合</a></td>
        </tr>
    </table>
    &nbsp;&nbsp;&nbsp;<a href="http://www.hdphp.com">>>查看所有动态</a>

    <div style="height:10px;overflow: hidden">&nbsp;</div>
    <div class="title-header">系统信息</div>
    <table class="table2">
        <tr>
            <td class="w80">HDCMS版本</td>
            <td>
                {$hd.config.VERSION}
            </td>
        </tr>
        <tr>
            <td class="w80">核心框架</td>
            <td>
                <a href="http://www.hdphp.com" target="_blank">HDPHP</a>
            </td>
        </tr>
        <tr>
            <td>PHP版本</td>
            <td>
                <?php echo PHP_OS; ?>
            </td>
        </tr>
        <tr>
            <td>运行环境</td>
            <td>
                {$hd.SERVER.SERVER_SOFTWARE}
            </td>
        </tr>
        <tr>
            <td>允许上传大小</td>
            <td>
                <?php echo ini_get("upload_max_filesize"); ?>
            </td>
        </tr>
        <tr>
            <td>剩余空间</td>
            <td>
                <?php echo get_size(disk_free_space(".")); ?>
            </td>
        </tr>
    </table>
    <div style="height:10px;overflow: hidden">&nbsp;</div>
    <div class="title-header">程序团队</div>
    <table class="table2">
        <tr>
            <td class="w80">版权所有</td>
            <td>
                <a href="http://www.houdunwang.com" target="_blank">后盾网</a> &
                <a href="http://www.hdphp.com/hdcms" target="_blank">HDCMS</a>
            </td>
        </tr>
        <tr>
            <td>项目负责人</td>
            <td>
                向军
            </td>
        </tr>
        <tr>
            <td>鸣谢</td>
            <td>
                <a href="http://bbs.houdunwang.com" target="_blank">后盾网所有盾友</a>

            </td>
        </tr>
    </table>
    <div style="height:10px;overflow: hidden">&nbsp;</div>

</div>
</body>
</html>