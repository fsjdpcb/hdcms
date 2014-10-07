<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{$group.gname}</title>
    <hdjs/>
    <style type="text/css">
        body {
            background: #F3F3F3
        }
    </style>
</head>
<body>
<div class="wrap">
    <div class="title-header">
        查看表单
    </div>
    <table class="table1">
        <list from="$field" name="$f">
            <tr>
                <th class="w100">{$f.title}</th>
                <td>
                    {$f._html}
                </td>
            </tr>
        </list>
    </table>
    <div class="position-bottom">
        <input type="button" class="hd-success" onclick="hd_close_window()" value="关闭"/>
    </div>
</div>
</body>
</html>