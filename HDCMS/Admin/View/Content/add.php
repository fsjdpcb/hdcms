<include file="__PUBLIC__/header.php"/>
<body>
<form method="post" onsubmit="return false;" id="add" class="hd-form">
    <input type="hidden" name="mid" value="{$hd.get.mid}"/>
    <div class="wrap">
        <!--右侧缩略图区域-->
        <div class="content_right">
            <table class="table1">
                <?php foreach ($form['nobase'] as $field): ?>
                    <tr>
                        <th>{$field['title']}</th>
                    </tr>
                    <tr>
                        <td>
                            {$field['form']}
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="content_left">
            <div class="title-header">添加文章</div>
            <table class="table1">
                <?php foreach ($form['base'] as $field): ?>
                    <tr>
                        <th class="w80">{$field['title']}</th>
                            <td>
                                {$field['form']}
                            </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" class="hd-success" value="发表"/>
        <input type="button" class="hd-cancel" onclick="hd_close_window()" value="关闭"/>
    </div>
</form>
<script type="text/javascript">
    $('form').validate({$formValidate});
</script>
<js file="__CONTROLLER_VIEW__/js/addEdit.js"/>
<css file="__CONTROLLER_VIEW__/css/css.css"/>
</body>
</html>