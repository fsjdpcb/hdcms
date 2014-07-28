<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>搜索关键词</title>
    <hdjs/>
    <js file="__CONTROLLER_TPL__/js/manage.js"/>
    <css file="__PUBLIC__/common.css"/>
    <script>
        $(function(){
            $('form').validate({
               word:{rule:{required:true},error:{required:'不能为空'}},
               total:{rule:{required:true,regexp:/^\d+$/},error:{required:'输入数字',regexp:'输入数字'}}
            })
        })
    </script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}">搜索词列表</a></li>
            <li><a href="javascript:;" class="action">修改关键词</a></li>
        </ul>
    </div>
    <div class="title-header">修改搜索词</div>
    <form action="{|U:'edit'}" method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index}');">
        <input type="hidden" name="sid" value="{$field.sid}"/>
        <table class="table1">
            <tr>
                <th class="w100">搜索关键词</th>
                <td>
                    <input type="text" name="word" value="{$field.word}" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">搜索次数</th>
                <td>
                    <input type="text" name="total" value="{$field.total}" class="w200"/>
                </td>
            </tr>
        </table>
        <div class="position-bottom">
            <input type="submit" class="hd-success" value="确定"/>
        </div>
    </form>
</div>
</body>
</html>