<include file="__PUBLIC__/header.php"/>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'Model/index'}">模型列表</a></li>
            <li><a href="{|U:'index',array('mid'=>$_GET['mid'])}" class="action">字段列表</a></li>
            <li><a href="{|U('add',array('mid'=>$_GET['mid']))}">添加字段</a></li>
            <li><a href="javascript:;" onclick="hd_ajax('{|U:updateCache}',{mid:{$hd.get.mid}})">更新缓存</a></li>
        </ul>
    </div>
    <table class="table2 hd-form">
        <thead>
        <tr>
            <td class="w50">排序</td>
            <td class="w50">Fid</td>
            <td class="w200">描述</td>
            <td>字段名</td>
            <td class="w200">表名</td>
            <td class="w100">类型</td>
            <td class="w80">系统</td>
            <td class="w80">必填</td>
            <td class="w80">搜索</td>
            <td class="w80">投稿</td>
            <td class="w120">操作</td>
        </tr>
        </thead>
        <tbody>
        <list from="$field" name="f">
            <tr>
                <td>
                    <input type="text" name="fieldsort[{$f.fid}]" class="w30" value="{$f.fieldsort}"/>
                </td>
                <td>
                    {$f.fid}
                </td>
                <td>{$f.title}</td>
                <td>{$f.field_name}</td>
                <td>{$f.table_name}</td>
                <td>{$f.field_type}</td>
                <td>
                    <if value="{$f.is_system}">
                        <font color="red">√</font>
                        <else><font color="blue">×</font>
                    </if>
                </td>
                <td>
                    <if value="{$f.required}">
                        <font color="red">√</font>
                        <else><font color="blue">×</font>
                    </if>
                </td>
                <td>
                    <if value="{$f.issearch}">
                        <font color="red">√</font>
                        <else><font color="blue">×</font>
                    </if>
                </td>
                <td>
                    <if value="{$f.isadd}">
                        <font color="red">√</font>
                        <else><font color="blue">×</font>
                    </if>
                </td>
                <td>
                    <a href="{|U:'edit',array('mid'=>$f['mid'],'fid'=>$f['fid'])}">修改</a>
                    |
                    <?php if (in_array($f['field_name'], $noallowforbidden)) { ?>
                        <span style='color:#666'>禁用</span>
                    <?php } else if ($f['status'] == 1) { ?>
                        <a href="javascript:hd_ajax('{|U:forbidden}',{fid:{$f.fid},status:0,mid:{$f.mid}})">禁用</a>
                    <?php } else { ?>
                        <a href="javascript:hd_ajax('{|U:forbidden}',{fid:{$f.fid},status:1,mid:{$f.mid}},'__URL__')"
                           style='color:red'>启用</a>
                    <?php } ?>
                    |
                    <?php if (in_array($f['field_name'], $noallowdelete)): ?>
                        <span style='color:#666'>删除</span>
                    <?php else: ?>
                        <a href="javascript:"
                           onclick="return confirm('确定删除【{$f.title}】字段吗？')?hd_ajax('{|U:del}',{mid:{$f['mid']},fid:{$f['fid']}}):false;">删除</a>
                    <?php endif; ?>

                </td>
            </tr>
        </list>
        </tbody>
    </table>
    <div class="position-bottom">
        <input type="button" class="hd-success" onclick="update_sort({$hd.get.mid});" value="排序"/>
    </div>
</div>
<script>
    //===========================更新字段缓存
    function update_cache(mid) {
        $.ajax({
            type: "POST",
            url: CONTROLLER + "&a=updateCache",
            data: {mid: mid},
            dataType: "JSON",
            success: function (stat) {
                if (stat == 1) {
                    $.dialog({
                        message: "缓存更新成功",
                        type: "success",
                        timeout: 3,
                        close_handler: function () {
                            location.href = URL;
                        }
                    });
                } else {
                    $.dialog({
                        message: "缓存更新失败",
                        type: "error",
                        timeout: 3
                    });
                }
            }
        })
    }

    //=================================删除字段
    function del_field(mid, fid) {
        $.ajax({
            type: "POST",
            url: CONTROL + "&m=del_field",
            data: {fid: fid, mid: mid},
            dataType: "JSON",
            success: function (stat) {
                if (stat == 1) {
                    $.dialog({
                        message: "删除成功",
                        type: "success",
                        close_handler: function () {
                            location.href = URL;
                        }
                    });
                } else {
                    $.dialog({
                        message: "删除失败",
                        type: "error"
                    });
                }
            }
        })
    }
    //===========================排序
    function update_sort(mid) {
        $.ajax({
            type: "POST",
            url: CONTROLLER + "&a=updateSort&mid=" + mid,
            data: $('input').serialize(),
            dataType: "JSON",
            success: function (data) {
                if (data.status == 1) {
                    $.dialog({
                        message: data.message,
                        type: "success",
                        close_handler: function () {
                            location.href = URL;
                        }
                    });
                } else {
                    $.dialog({
                        message: data.message,
                        type: "error"
                    });
                }
            }
        })
    }
</script>
</body>
</html>