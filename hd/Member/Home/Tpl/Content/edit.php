<!DOCTYPE html>
<html>
<head>
    <title>修改文章</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <hdjs/>
    <bootstrap/>
    <link rel="stylesheet" type="text/css" href="__CONTROL_TPL__/css/content.css?ver=1.0"/>
    <js file="__GROUP__/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
</head>
<body>
<header class="header center-block">
    <h1>
        <a href="#">后盾网 人人做后盾</a>
    </h1>
</header>
<nav class="top-menu">
    <div class="nav center-block">
        <a href="__ROOT__">首页</a>
        <a href="__ROOT__/index.php?a=Home&c=Content&m=index&g=Member">我的文章</a>
        <a href="__ROOT__?{$hd.session.domain}" target="_blank">个人空间</a>
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
        <form method="post" onsubmit="return false;">
            <input type="hidden" name="aid" value="{$field.aid}"/>
            <table>
                <tr>
                    <th>简&nbsp;&nbsp;&nbsp;&nbsp;述</th>
                    <td>
                        <input type="text" name="title" class="w300" value="{$field.title}"/>
                    </td>
                </tr>
                <tr>
                    <th>栏&nbsp;&nbsp;&nbsp;&nbsp;目</th>
                    <td>
                        <input type="hidden" name="cid" value="{$field.cid}"/>
                        {$field.catname}
                    </td>
                </tr>
                <tr>
                    <th>缩&nbsp;略&nbsp;图</th>
                    <td>
                        <upload name="thumb" limit="1" alt="false" waterbtn="false" data="$thumb" message="false"/>
                    </td>
                </tr>
                <tr>
                    <th>摘&nbsp;&nbsp;&nbsp;&nbsp;要</th>
                    <td>
                        <textarea name="description">{$field.description}</textarea>
                    </td>
                </tr>
                    <tr>
                        <th>内&nbsp;&nbsp;&nbsp;&nbsp;容</th>
                        <td>
                            <keditor name="content" style="2" content="{$field.content}"/>
                            <span class="hd_content validate-message">请点击全屏编辑</span>
                        </td>
                    </tr>
                <tr>
                    <th>标&nbsp;&nbsp;&nbsp;&nbsp;签</th>
                    <td>
                        <input type="text" name="tag" class="w300" value="{$field.tag}"/>
                    </td>
                </tr>
                {$custom_field}
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn btn-primary" value="提交"/>
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
                 标签必选项，多个标签使用逗号分隔
            </li>
        </ul>
    </div>
</div>
</body>
</html>