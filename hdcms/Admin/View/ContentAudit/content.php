<include file="__PUBLIC__/header.php"/>

<body>
<div class="wrap">
    <form id="search"  class="hd-form" method="get">
        <input type="hidden" name="m" value="{$hd.get.m}"/>
        <input type="hidden" name="c" value="{$hd.get.c}"/>
        <input type="hidden" name="a" value="{$hd.get.a}"/>
        <div class="search">
            模型：
            <select name="mid" class="w100">
                <list from='$model' name="m">
                <option value="{$m.mid}" <if value="$mid eq $m.mid">selected=''</if>>{$m.model_name}</option>
                </list>
            </select>
        </div>
    </form>
    <script>
        $("[name='mid']").change(function(){
            $("#search").trigger('submit');
        })
    </script>
    <div class="menu_list">
        <ul>
            <li>
                <a href="{|U:'content',array('mid'=>$_REQUEST['mid'])}" class="action">文章列表</a>
            </li>
        </ul>
    </div>
    <table class="table2 hd-form">
        <thead>
        <tr>
            <td class="w30">
                <input type="checkbox" id="select_all"/>
            </td>
            <td class="w30">aid</td>
            <td>标题</td>
            <td class="w100">栏目</td>
            <td class="w100">作者</td>
            <td class="w80">修改时间</td>
            <td class="w50">操作</td>
        </tr>
        </thead>
        <list from="$data" name="d">
            <tr>
                <td><input type="checkbox" name="aid[]" value="{$d.aid}"/></td>
                <td>{$d.aid}</td>
                <td>
                    <a href="{|U:'Index/Index/Content',array('mid'=>$mid,'cid'=>$d['cid'],'aid'=>$d['aid'])}" target="_blank">{$d.title}</a>
                </td>
                <td>
                    {$d.catname}
                </td>
                <td>
                    <a href="__ROOT__/index.php?{$d.uid}" target="_blank">{$d.username}</a>
                    </td>
                <td>{$d.updatetime|date:"Y-m-d",@@}</td>
                <td>
                    <a href="{|U:'Index/Article/show',array('mid'=>$mid,'cid'=>$d['cid'],'aid'=>$d['aid'])}" target="_blank">
                        访问</a>
                </td>
            </tr>
        </list>
    </table>
    <div class="page1">
        {$page}
    </div>
</div>

<div class="position-bottom">
    <input type="button" class="hd-cancel" value="全选" onclick="select_all('.table2')"/>
    <input type="button" class="hd-cancel" value="反选" onclick="reverse_select('.table2')"/>
    <input type="button" class="hd-cancel" onclick="del({$hd.get.mid})" value="批量删除"/>
    <input type="button" class="hd-cancel" onclick="audit({$mid},1)" value="审核"/>
</div>
<script>
    //全选
    $("input#select_all").click(function () {
        $("[type='checkbox']").attr("checked", $(this).attr("checked") == "checked");
    })
    //全选文章
    function select_all() {
        $("[type='checkbox']").attr("checked", "checked");
    }
    //反选文章
    function reverse_select() {
        $("[type='checkbox']").attr("checked", function () {
            return !$(this).attr("checked") == 1;
        });
    }
    /**
     * 删除文章
     * @param mid
     */
    function del(mid) {
        var ids = $("input:checked").serialize();
        if (ids) {
            hd_confirm('确定要删除文章吗', function () {
                $.ajax({
                    type: "POST",
                    url: CONTROLLER + "&a=del&mid=" + mid,
                    dataType: "JSON",
                    cache: false,
                    data: ids,
                    success: function (data) {
                        if (data.status == 1) {
                            $.dialog({
                                message: "删除文章成功",
                                type: "success",
                                timeout: 3,
                                close_handler: function () {
                                    location.href = URL;
                                }
                            });
                        } else {
                            $.dialog({
                                message: data.message,
                                type: "error",
                                close_handler: function () {
                                    location.href = URL;
                                }
                            });
                        }
                    }
                })
            });
        } else {
            alert("请选择删除的文章");
        }
    }
    //设置状态
    function audit(mid, status) {
        //单文章删除
        var ids = $("input:checked").serialize();
        if (ids) {
            $.ajax({
                type: "POST",
                url: CONTROLLER + "&a=audit" + "&status=" + status + "&mid=" + mid,
                dataType: "JSON",
                cache: false,
                data: ids,
                success: function (data) {
                    if (data.status == 1) {
                        $.dialog({
                            message: "设置文章成功",
                            type: "success",
                            timeout: 3,
                            close_handler: function () {
                                location.href = URL;
                            }
                        });
                    } else {
                        $.dialog({
                            message: data.message,
                            type: "error",
                            close_handler: function () {
                                location.href = URL;
                            }
                        });
                    }
                }
            })
        } else {
            alert("请选择设置的文章");
        }
    }
</script>
</body>
</html>