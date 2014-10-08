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
<form action="{|U:'audit'}" method="post">
    <input type="hidden" name="id" value="{$data.id}"/>
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
            <tr>
                <th>审核</th>
                <td>
                    <label>
                        <input type="radio" name="status" value="1" <if value="$data.status eq 1">checked=""</if>/> 已审核
                    </label>
                    <label>
                        <input type="radio" name="status" value="0" <if value="$data.status eq 0">checked=""</if>/> 未审核
                    </label>
                </td>
            </tr>
        </table>
        <div class="position-bottom">
            <input type="submit" class="hd-success" value="提交"/>
        </div>
    </div>
</form>
</body>
</html>