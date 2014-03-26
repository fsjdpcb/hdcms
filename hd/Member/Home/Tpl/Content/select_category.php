<!DOCTYPE html>
<html>
<head>
    <title>文章管理</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <hdjs/>
    <bootstrap/>
    <link rel="stylesheet/less" href="__CONTROL_TPL__/css/content.less?ver=1.0 "/>
    <less/>
    <css file="__CONTROL_TPL__/css/select_category.css"/>
</head>
<body>
<header class="header center-block">
    <h1>
        <a href="#">后盾网 人人做后盾</a>
    </h1>
</header>
<nav class="top-menu">
    <div class="nav center-block">
        <a href="#">首页</a>
        <a href="#">我的文章</a>
        <a href="#">个人主页</a>
    </div>
</nav>
<div class="main center-block">
    <div class="form">
        <div class="user">
            <div class="face">
                <img src="{$hd.session.icon50}"/>
            </div>
            <div class="username">
                <p>后盾向军</p>
                <span class="time">{|date:"Y-m-d"}</span>
            </div>
        </div>
        <form method="get" action="{|U:'add',array('g'=>'Member')}">
            <input type="hidden" name="a" value="Home"/>
            <input type="hidden" name="c" value="Content"/>
            <input type="hidden" name="m" value="add"/>
            <input type="hidden" name="g" value="Member"/>
            <table>
                <tr>
                    <th>栏&nbsp;&nbsp;&nbsp;&nbsp;目</th>
                    <td colspan="2">
                        <select name="cid" multiple="multiple" size="10" style="width:500px;padding:10px;color:#333;font-size:14px;">
                            <list from="$data" name="d">
                                <option value="{$d.cid}" state="{$d.state}" {$d.disabled}>{$d._name}</option>
                            </list>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td colspan="2">
                        <input type="submit" class="btn btn-primary" value="确定"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="help">
        <h1>提示</h1>
        <ul>
            <li>
                在确认提交代码前，请检查标题和内容是否已经填写完整
            </li>
            <li>
                附件需要被打包成ZIP或RAR压缩文件后才能上传
            </li>
            <li>
                标签是可选项，多个标签使用空格分隔
            </li>
        </ul>
    </div>
</div>
</body>
</html>