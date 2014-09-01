<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta http-equiv="Cache-Control" content="no-cache"/>
    <css file="__PUBLIC__/static/css/common.css"/>
    <hdjs/>
    <bootstarp/>
    <js file="__CONTROLLER_VIEW__/js/addEdit.js"/>
    <css file="__CONTROLLER_VIEW__/css/css.css"/>
    <script>
        var mid ='{$hd.get.mid}';
    </script>
    <style type="text/css">
        th{
          color:#226bb0;padding: 0px;;
        }
    </style>

</head>
<body>
<include file="__PUBLIC__/block/top_menu.php"/>
<div class="wrap">
    <div class="menu">
        <include file="__PUBLIC__/block/left_menu.php"/>
    </div>
    <div class="content">
        <div class="list">
            <div class="header">
                发表文章
            </div>
            <div class="article">
                <div class="form">
                    <form method="post" id="add" class="hd-form">
                        <input type="hidden" name="mid" value="{$hd.get.mid}"/>
                        <input type="hidden" name="aid" value="{$hd.get.aid}"/>
                            <!--右侧缩略图区域-->
                            <table class="table1">
                                <?php foreach ($form as $field): ?>
                                    <tr>
                                        <th width="100">{$field['title']}</th>
                                        <td>
                                            {$field['form']}
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <input type="submit" class="btn" value="确定"/>
                    </form>
                    <script type="text/javascript">
                        $('form').validate({$formValidate});
                    </script>

                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>