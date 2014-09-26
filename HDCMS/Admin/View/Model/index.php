<include file="__PUBLIC__/header.php"/>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li>
                <a href="{|U:'index'}" class="action">
                    模型列表
                </a>
            </li>
            <li>
                <a href="{|U:'add'}">
                    添加模型
                </a>
            </li>
            <li>
                <a href="javascript:;" onclick="hd_ajax('{|U:updateCache}')">
                    更新缓存
                </a>
            </li>
        </ul>
    </div>
    <div class="content">
        <table class="table2 table-title">
            <thead>
            <tr>
                <td class="w30">mid</td>
                <td>模型名称</td>
                <td class="w100">主表</td>
                <td class="w100">系统模型</td>
                <td class="w100">前台投稿</td>
                <td class="w30">状态</td>
                <td class="w150">操作</td>
            </tr>
            </thead>
            <tbody>
            <list from="$model" name="m">
                <tr>
                    <td>{$m.mid}</td>
                    <td>{$m.model_name}</td>
                    <td>{$m.table_name}</td>
                    <td>
                        <if value='$m.is_system eq 1'>
                            <font color="red">√</font>
                            <else>
                                <font color="blue">×</font>
                        </if>
                    </td>

                    <td class="w30">
                        <if value='$m.contribute eq 1'>
                            <font color="red">√</font>
                        <else>
                            <font color="blue">×</font>
                        </if>
                    </td>
                    <td>
                        <if value="$m['enable']">
                            <font color="red">√</font>
                        <else>
                             <font color="blue">×</font>
                        </if>
                    </td>
                    <td>
                        <a href="{|U:'Field/index',array('mid'=>$m['mid'])}">
                            字段管理
                        </a> |
                        <a href="{|U:'edit',array('mid'=>$m['mid'])}">
                            修改
                        </a>
                        |
                        <if value="$m.is_system==1">
                            删除
                            <else>
                                <a href="javascript:hd_confirm('确证删除吗？',function(){hd_ajax('{|U:'del'}', {mid: {$m.mid}})})">
                                    删除
                                </a>
                        </if>
                    </td>
                </tr>
            </list>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>