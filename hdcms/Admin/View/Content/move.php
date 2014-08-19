<include file="__PUBLIC__/header.php"/>
<body>
<form method="post" onsubmit="return false" class="hd-form">
    <div class="wrap">
        <div class="title-header">温馨提示</div>
        <div class="help" style="margin-bottom:0px;"> 不能够跨模型移动文章</div>
        <div class="line"></div>
        <input type="hidden" name="mid" value="{$hd.get.mid}"/>
        <input type="hidden" name="cid" value="{$hd.get.cid}"/>
        <table style="table1">
            <tr>
                <td>指定来源</td>
                <td>目标栏目</td>
            </tr>
            <tr>
                <td>
                    <ul class="fromtype">
                        <li>
                            <label><input type="radio" name="from_type" value="1" checked="checked"/> 从指定aid </label>
                        </li>
                        <li>
                            <label> <input type="radio" name="from_type" value="2"/> 从指定栏目</label>
                        </li>
                    </ul>
                    <div id="t_aid">
                        <textarea name="aid" class="w250 h180">{$hd.get.aid}</textarea>
                    </div>
                    <div id="f_cat" style="display: none">
                        <select id="fromid" style="width:250px;height:180px;" multiple="multiple" size="2"
                                name="from_cid[]">
                            <list from="$category" name="c">
                                <option value="{$c.cid}"{$c.disabled}>{$c._name}</option>
                            </list>
                        </select>
                    </div>
                </td>
                <td>
                    <select id="fromid" style="width:250px;height:215px;" size="100" name="to_cid">
                        <list from="$category" name="c">
                            <option value="{$c.cid}"
                            {$c.disabled} {$c.selected}>
                            {$c._name}
                            </option>
                        </list>
                    </select>
                </td>
            </tr>
        </table>
        <div class="position-bottom">
            <input type="submit" class="hd-success" value="确定"/>
            <input type="button" class="hd-cancel" id="close_window" value="关闭"/>
        </div>
    </div>
</form>
<style type="text/css">
    li {
        float: left;
        height: 30px;
        margin-right:10px;
    }

    div {
        clear: both;
    }
    tr td{
        padding: 5px;
        vertical-align: top;
    }
    select {
        border: 1px solid #CCCCCC;
        box-shadow: 2px 2px 2px #F0F0F0 inset;
    }
</style>
<script>
    $("[name='from_type']").click(function () {
        var t = parseInt($("[name='from_type']:checked").val());
        $("div#t_aid,div#f_cat").hide().find("textarea,select").attr("disabled", "disabled");
        switch (t) {
            //文章移动
            case 1:
                $("div#t_aid").show().find("textarea").removeAttr("disabled");
                break;
            //栏目移动
            case 2:
                $("div#f_cat").show().find("select").removeAttr("disabled");
                break;
        }
    })
    //移动
    $("form").submit(function () {
        $.ajax({
            type: "POST",
            url: CONTROLLER + "&a=move",
            dataType: "JSON",
            cache: false,
            data: $(this).serialize(),
            success: function (data) {
                if (data.status == 1) {
                    $.dialog({
                        message: "移动成功",
                        type: "success",
                        close_handler: function () {
                            parent.location.reload();
                        }
                    });
                } else {
                    $.dialog({
                        message: data.message,
                        type: "error",
                        close_handler: function () {
                            parent.location.reload();
                        }
                    });
                }
            }
        })
    })
    //关闭窗口
    $("#close_window").click(function () {
        parent.location.reload();
    })
</script>
</body>
</html>