<?php if (!defined('HDPHP_PATH')) exit(); ?>
<!doctype html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <title>系统后台 - {$hd.config.webname} - by HDCMS</title>
    <hdjs/>
    <css file="__PUBLIC__/common.css"/>
</head>
<body>
<form class="hd-form" method="post" onsubmit="return hd_submit(this)">
    <div class="wrap">
        <div class="title-header">友情提示</div>
        <div class="help">程序用于批量替换数据库中某字段的内容，此操作极为危险，请小心使用。</div>
        <div class="title-header">数据库内容替换</div>
        <table class="table1">
            <tr>
                <th class="w150">选择数据表与字段</th>
                <td>
                    <select name="table" id="tables" size="10" class="w500">
                        <list from="$tables" name="table">
                            <option value="{$table.tablename}">{$table.tablename}</option>
                        </list>
                    </select>

                    <div id="tablefieldlist"></div>
                    要替换的字段：<input type="text" name="field" class="w200" readonly=""/>
                </td>
            </tr>
            <tr>
                <th>搜索内容</th>
                <td>
                    <textarea name="searchcontent" class="w500 h80"></textarea>
                </td>
            </tr>
            <tr>
                <th>替换内容</th>
                <td>
                    <textarea name="replacecontent" class="w500 h80"></textarea>
                </td>
            </tr>
            <tr>
                <th>替换条件</th>
                <td>
                    <textarea name="replacewhere" class="w500 h80"></textarea>
                </td>
            </tr>
            <tr>
                <th>安全验证</th>
                <td>
                    <input type="text" name="code" class="w150"/>
                    <img src="{|U:'code'}" onclick="this.src='{|U:'code'}&_'+Math.random()" style="cursor: pointer"/>
                    <span id="hd_code"></span>
                </td>
            </tr>
        </table>
    </div>
    <div class="position-bottom">
        <input type="submit" class="hd-success" value="确定"/>
    </div>
</form>
<style type="text/css">
    div#tablefieldlist {
        margin: 10px 0px;
        padding: 10px;
    }

    div#tablefieldlist a {
        display: inline-block;
        margin-right: 5px;
        border: solid 1px #dcdcdc;
        padding: 3px 6px;
        margin-bottom: 5px;
    }

    div#tablefieldlist a.select {
        background: #006DCC;
        color: #fff;
    }
</style>
<script type="text/javascript">
    $(function () {
        $('form').validate({
            table: {
                rule: {required: true},
                error: {required: '请选择表'}
            },
            field: {
                rule: {required: true},
                error: {required: '字段不能为空'}
            },
            searchcontent: {
                rule: {required: true},
                error: {required: '不能为空'}
            },
            replacecontent: {
                rule: {required: true},
                error: {required: '不能为空'}
            },
            replacewhere: {
                rule: {required: false},
                message: 'SQL语句中WHERE关键字后内容'
            },
            code: {
                rule: {required: true, ajax: {url: '{|U:'checkCode'}'}},
                error: {required: '不能为空', ajax: '验证码错误'}
            }
        })
    });
    $(function () {
        //选择表时获取字段
        $("#tables").change(function () {
            var tablesJson = {$tablesJson};
            var fieldHtml = '';
            var table = $(this).val();
            for (var field in tablesJson[table]['field']) {
                fieldHtml += '<a href="javascript:;" onclick="selectField(\'' + field + '\')" id=\'' + field + '\'>' + field + '</a>';
            }
            $("#tablefieldlist").css('background', '#ffffff').html(fieldHtml);
        })
    })
    function selectField(field) {
        $("#tablefieldlist a").removeClass('select');
        $("#" + field).addClass('select');
        $("input[name=field]").val(field);
    }
</script>
</body>
</html>