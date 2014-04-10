<!DOCTYPE html>
<html>
<head>
    <title>添加文章</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <hdjs/>
    <bootstrap/>
    <link rel="stylesheet/less" href="__CONTROL_TPL__/css/content.less?ver=1.0 "/>
    <less/>
    <js file="__GROUP__/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <link rel="stylesheet" type="text/css" href="__ROOT__/hd/static/css/common.css"/>

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
                <p>{$hd.session.nickname}</p>
                <span class="time">{|date:"Y-m-d"} </span>

            </div>
        </div>
        <form method="post" onsubmit="return false;">
            <input type="hidden" name="cid" value=" {$category.cid}"/>
            <table>
                <tr>
                    <th>简&nbsp;&nbsp;&nbsp;&nbsp;述</th>
                    <td>
                        <input type="text" name="title" class="w300"/>
                    </td>
                </tr>
                <tr>
                    <th>栏&nbsp;&nbsp;&nbsp;&nbsp;目</th>
                    <td>
                        <select name="cid">
                      <list from="$category" name="c">
                          <option value="{$c.cid}" {$c.disabled}>{$c._name}</option>
                      </list>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>缩&nbsp;略&nbsp;图</th>
                    <td>
                        <upload name="thumb" limit="1" alt="false" waterbtn="false" message="false"/>
                    </td>
                </tr>
                <tr>
                    <th>摘&nbsp;&nbsp;&nbsp;&nbsp;要</th>
                    <td>
                        <textarea name="description"></textarea>
                    </td>
                </tr>
                    <tr>
                        <th>内&nbsp;&nbsp;&nbsp;&nbsp;容</th>
                        <td>
                            <keditor name="content" style="2"/>
                            <span class="hd_content validate-message">请点击全屏编辑</span>
                        </td>
                    </tr>
                <tr>
                    <th>标&nbsp;&nbsp;&nbsp;&nbsp;签</th>
                    <td>
                        <input type="text" name="tag" class="w300"/>
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
                标签是可选项，多个标签使用空格分隔
            </li>
        </ul>
    </div>
</div>
</body>
</html>