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
                <a href="{|U:'Admin/index'}">
                    广告位
                </a>
            </li>
            <li>
                <a href="{|U:'Admin/add'}">
                    添加广告位
                </a>
            </li>
            <li>
                <a href="{|U:'Ad/index'}" class="action">
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
                <td class="w50">id</td>
                <td>广告名称</td>
                <td>所属广告位</td>
                <td class="w100">显示类型</td>
                <td>开始时间</td>
                <td>结束时间</td>
                <td class="w50">启动</td>
                <td class="w150">操作</td>
            </tr>
            </thead>
            <tbody>
            <list from="$data" name="d">
                <tr>
                    <td>{$d.id}</td>
                    <td>{$d.adtitle}</td>
                    <td>
                        {$d.posname}
                    </td>
                    <td>
                        <if value="$d.show_type eq 1">
                            图片
                            <else>
                                轮换广告
                        </if>
                    </td>
                    <td>{$d.start_time|date:"Y-m-d H:i",@@}</td>
                    <td>{$d.end_time|date:"Y-m-d H:i",@@}</td>
                    <td>
                        <if value="{$d.status}">
                            <font color="red">√</font>
                            <else>
                                <font color="blue">×</font>
                        </if>
                    </td>
                    <td>
                        <a href="{|U:'showAd',array('id'=>$d['id'])}" target="_blank">预览广告<a> |
                        <a href="{|U:'edit',array('id'=>$d['id'])}">修改<a> |
                        <a href="javascript:delAd({$d.id})">删除</a>
                    </td>
                </tr>
            </list>
            </tbody>
        </table>
    </div>
</div>
<script>
   function delAd(id){
       if(confirm('确定删除吗？')){
           location.href='{|U:'del',array('id'=>$d['id'])}';
       }
   }
</script>
</body>
</html>