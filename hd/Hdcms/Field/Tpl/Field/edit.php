<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>修改字段</title>
    <hdjs/>
    <js file="__GROUP__/static/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <script type="text/javascript">
        var mid = '{$hd.get.mid}';
    </script>
</head>
<body>
<form action="{|U:'edit'}" method="post" class="hd-form">
    <input type="hidden" name="fid" value="{$hd.get.fid}"/>

    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'Hdcms/Model/index'}">模型列表</a></li>
                <li><a href="{|U('index',array('mid'=>$_GET['mid']))}">字段列表</a></li>
                <li><a href="javascript:;" class="action">修改字段</a></li>
            </ul>
        </div>
        <div class="title-header">
            修改字段
        </div>
        <input type="hidden" name="mid" value="{$hd.get.mid}"/>
        <table class="table1">
            <tr>
                <th class="w100">模型</th>
                <td>
                    <input type="text" disabled="disabled" value="{$model.model_name}"/>
                </td>
            </tr>
            <tr>
                <th>标题<span class="star">*</span></th>
                <td>
                    <input type="text" name="title" class="w200" value="{$field.title}"/>
                </td>
            </tr>
            <tr>
                <th>会员中心显示</th>
                <td>
                    <label><input type="radio" name="ismember" value="1"
                        <if value='$field.ismember==1'>checked="checked"</if>
                        /> 是</label>
                    <label><input type="radio" name="ismember" value="0"
                        <if value='$field.ismember==0'>checked="checked"</if>
                        /> 否</label>
                </td>
            </tr>
            <tr>
                <th>提示</th>
                <td>
                    <input type="text" name="set[message]" class="w350"/>
                </td>
            </tr>
        </table>
        <div class="field_tpl">
            <?php require TPL_PATH . '/Form/edit/' . $field['show_type'] . '.php'; ?>
        </div>
        <div class="h60"></div>
    </div>
    <div class="position-bottom">
        <input type="submit" value="确定" class="hd-success"/>
    </div>
</form>
</body>
</html>