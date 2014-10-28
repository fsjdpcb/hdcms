<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>内容关键词添加</title>
    <hdjs/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li>
                <a href="" class="action">关键词列表</a>
            </li>
            <li>
                <a href="{|U:'add'}">添加关键词</a>
            </li>
        </ul>
    </div>
        <table class="table2">
            <thead>
                <tr>
                    <td class="w50">id</td>
                    <td class="w200">关键词</td>
                    <td>替换</td>
                    <td class="w50">替换次数</td>
                    <td class="w80">操作</td>
                </tr>
            </thead>
            <list from="$data" name="$d">
            <tr>
                <td>{$d.id}</td>
                <td>{$d.word}</td>
                <td>{$d.replace_word|htmlspecialchars}</td>
                <td>{$d.nums}</td>
                <td>
                    <a href="{|U:'edit',array('id'=>$d['id'])}">编辑</a> |
                    <a href="{|U:'del',array('id'=>$d['id'])}" onclick="return confirm('确定删除吗');">删除</a>
                </td>
            </tr>
            </list>
        </table>

</div>
</body>
</html>