<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加关键词</title>
    <hdjs/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li>
                <a href="{|U:'index'}">关键词列表</a>
            </li>
            <li>
                <a href="{$hd.get._URL__}" class="action">修改关键词</a>
            </li>
        </ul>
    </div>
    <div class="title-header">
        添加关键词
    </div>
    <form action="" class="hd-form" method="post">
        <input type="hidden" name="id" value="{$field.id}"/>
    <table class="table1 hd-form">
        <tr>
            <th class="w100">关键词</th>
            <td>
                <input type="text" name="word" class="w300" value="{$field.word}"/>
            </td>
        </tr>
        <tr>
            <th>替换词</th>
            <td>
                <input type="text" name="replace_word" class="w300" value="{$field.replace_word}"/>
            </td>
        </tr>
        <tr>
            <th>替换次数</th>
            <td>
                <input type="text" name="nums" class="w300" value="{$field.nums}"/>
            </td>
        </tr>
    </table>
    <div class="position-bottom">
        <input type="submit" value="增加" class="hd-success"/>
    </div>
    </form>
</div>
</body>
</html>