<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>选择模板</title>
    <hdjs/>
    <css file="__CONTROL_TPL__/css/select_tpl.css"/>
    <js file="__CONTROL_TPL__/js/select_tpl.js"/>
</head>
<body>
<div id="select_tpl">
    <if value="$hd.get.dir_name">
        <a href="javascript:window.history.back()" class="back">返回</a>
    </if>
    <table class="table2">
        <thead>
        <tr>
            <td>名称</td>
            <td class="w150">大小</td>
            <td class="w80">修改时间</td>
        </tr>
        </thead>
        <list from="$file" name="f">
            <tr>
                <td>
                    <div>
                        <a href="javascript:;" class="{$f.type}" input_id="{$hd.get.input_id}" path="{$f.path}">
                            <span class="{$f.type}">{$f.name}</span>
                            {$f.name}
                        </a>
                    </div>
                </td>
                <td>{$f.size|get_size}</td>
                <td>{$f.filemtime|date:"Y-m-d",@@}</td>
            </tr>
        </list>
    </table>
</div>
</body>
</html>