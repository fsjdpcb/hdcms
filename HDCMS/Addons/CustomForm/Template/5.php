<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{$group.gname}</title>
    <style type="text/css">
        body{
            background: #f3f3f3;
        }
        div.form-wrap{
            padding: 20px;
            border: solid 3px #E6E6E6;
        }
        div.form-title{
            font-size:18px;

        }
        table,th,td{
            border-collapse: collapse;
            border:solid 1px #999999;
        }
        table{
            width: 100%;
        }
        th{
            width: 100px;
            text-align: right;
        }
        th,td{
            padding: 8px;
        }
    </style>
    <jquery/>
    <hdvalidate/>
</head>
<body>
<div class="form-wrap">
    <div class="form-title">{$group.gname}</div>
    <form action="" method="post">
        <input type="hidden" name="gid" value="{$group.gid}"/>
        <table>
            <list from="$field" name="f">
            <tr>
                <th>
                    {$f.title}
                    <if value="$f.isrequired eq 1">
                        <span style="color:#f00f00;">*</span>
                    </if>
                </th>
                <td>
                    {$f._html}
                </td>
            </tr>
            </list>
            <tr>
                <td colspan="2">
                    <input type="submit" value="提交表单"/>
                </td>
            </tr>
        </table>
    </form>
</div>
{$validate}
</body>
</html>