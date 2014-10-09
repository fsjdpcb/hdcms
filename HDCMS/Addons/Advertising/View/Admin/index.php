<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>广告位</title>
    <hdjs/>
    <style type="text/css">
        div.hd-search {
            padding: 10px;
        }

        div.hd-search td {
            padding-right: 5px;
        }
    </style>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li>
                <a href="{|U:'Admin/index'}" class="action">
                    广告位
                </a>
            </li>
            <li>
                <a href="{|U:'Admin/add'}">
                    添加广告位
                </a>
            </li>
            <li>
                <a href="{|U:'Ad/index'}">
                    所有广告
                </a>
            </li>
            <li>
                <a href="{|U:'Ad/add'}">
                    添加广告
                </a>
            </li>
        </ul>
    </div>

    <div class="content">
        <table class="table2 table-title">
            <thead>
            <tr>
                <td class="w50">posid</td>
                <td>广告位</td>
                <td class="w100">操作</td>
            </tr>
            </thead>
            <tbody>
            <list from="$data" name="d">
                <tr>
                    <td>{$d.posid}</td>
                    <td>{$d.posname}</td>
                    <td>
                        <a href="{|U:'edit',array('posid'=>$d['posid'])}">修改<a> |
                        <a href="javascript:hd_confirm('确证删除吗？',function(){hd_ajax(CONTROLLER + '&g=addons&a=del', {posid: {$d.posid}})})">删除</a>
                    </td>
                </tr>
            </list>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>