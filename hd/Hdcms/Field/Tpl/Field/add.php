<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加字段</title>
    <hdjs/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <script type="text/javascript">
        var mid = '{$hd.get.mid}';
        //获得字段模板类型
        var tpl_type = "add";
    </script>
</head>
<body>
<form action="__METH__" method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index,array('mid'=>$_GET['mid'])}');">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'Model/Model/index'}">模型列表</a></li>
                <li><a href="{|U('index',array('mid'=>$_GET['mid']))}">字段列表</a></li>
                <li><a href="javascript:;" class="action">添加字段</a></li>
            </ul>
        </div>
        <div class="title-header">
            添加字段
        </div>
        <input type="hidden" name="mid" value="{$model.mid}"/>
        <table class="table1">
            <tr>
                <th class="w100">模型</th>
                <td>
                    {$model.model_name}
                </td>
            </tr>
            <tr>
                <th>类型</th>
                <td>
                    <select id="field_type" name="show_type">
                        <option value="input">单行文本</option>
                        <option value="textarea">多行文本</option>
                        <option value="number">数字</option>
                        <option value="select">选项</option>
                        <option value="editor">编辑器</option>
                        <option value="image">图片</option>
                        <option value="images">多图片</option>
                        <option value="date">日期与时间</option>
                        <option value="files">文件</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>
                    字段标题<span class="star">*</span>
                </th>
                <td>
                    <input type="text" name="title" class="w200"/>
                </td>
            </tr>
            <tr>
                <th>
                    字段名<span class="star">*</span>
                </th>
                <td>
                    <input type="text" name="field_name" class="w200"/>
                </td>
            </tr>
            <tr>
                <th>输入提示</th>
                <td>
                    <input type="text" name="set[message]" class="w200"/>
                </td>
            </tr>
            <table class="table1">
                <tr>
                    <th class="w100">
                        会员中心显示
                    </th>
                    <td>
                        <label><input type="radio" name="member_show" value="1" checked="checked"/> 是</label>
                        <label><input type="radio" name="member_show" value="0"/> 否</label>
                    </td>
                </tr>
            </table>
        </table>
        <div class="field_tpl">

        </div>

        <div class="position-bottom">
            <input type="submit" value="确定" class="hd-success"/>
        </div>
    </div>
</form>
</body>
</html>