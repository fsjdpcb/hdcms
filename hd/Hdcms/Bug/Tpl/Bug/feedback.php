<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>HDCMS反馈</title>
    <hdjs/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <js file="__CONTROL_TPL__/js/feedback.js"/>
</head>
<body>
<form action="?a=Bug&c=BugSuggest&m=suggest" method="post" class="hd-form">
    <div class="wrap">
        <div class="title-header">反馈HDCMS问题或建议</div>
        <a name="bug"></a>
        <table class="table2">
            <tr>
                <td class="w80">类型</td>
                <td>
                    <select name="type">
                        <option value="1">BUG反馈</option>
                        <option value="2">功能建议</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="w80">反馈者</td>
                <td>
                    <input type="text" name="username"/>
                </td>
            </tr>
            <tr>
                <td class="w80">邮箱</td>
                <td>
                    <input type="text" name="email"/>
                </td>
            </tr>
            <tr>
                <td class="w80">内容描述</td>
                <td>
                    <textarea name="content" class="w500 h200"></textarea>
                </td>
            </tr>
        </table>

    </div>
    <div class="position-bottom">
        <input type="submit" value="提交" class="hd-success"/>
    </div>
</form>
</body>
</html>