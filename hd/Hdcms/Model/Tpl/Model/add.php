<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>模型管理</title>
    <hdjs/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <js file="__CONTROL_TPL__/js/validate.js"/>
</head>
<body>
<form action="{|U:'add'}" method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index}')">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'index'}">模型列表</a></li>
                <li><a href="javascript:;" class="action">添加模型</a></li>
            </ul>
        </div>
        <div class="title-header">温馨提示</div>
        <div class="help">
            <ul>
                <li>如果对模型没有足够了解请不要设置</li>
                <li>应用组、应用、控制器名称首字母必须大写</li>
            </ul>
        </div>
        <div class="title-header">
            添加模型
        </div>
        <div class="right_content">
            <table class="table1">
                <tr>
                    <th class="w100">模型名称</th>
                    <td>
                        <input type="text" name="model_name" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>表名</th>
                    <td>
                        <input type="text" name="table_name" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>允许前台投稿</th>
                    <td>
                        <label><input type="radio" name="is_submit" value="1"/> 允许</label>
                        <label><input type="radio" name="is_submit" value="0" checked="checked"/>
                            不允许</label>
                    </td>
                </tr>
                <tr>
                    <th>模型描述</th>
                    <td>
                        <textarea name="description" class="w350 h80"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>应用组</th>
                    <td>
                        <input type="text" name="app_group" value="Hdcms" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>应用</th>
                    <td>
                        <input type="text" name="app" value="Content" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>控制器</th>
                    <td>
                        <input type="text" name="control" value="Content" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>方法</th>
                    <td>
                        <input type="text" name="method" value="index" class="w200"/>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" value="确定" class="hd-success"/>
    </div>
</form>
</body>
</html>