<!DOCTYPE html>
<html>
<head>
    <title>文章管理</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <jquery/>
    <bootstrap/>
    <link rel="stylesheet/less" href="__CONTROL_TPL__/css/content.less?ver=1.0 "/>
    <less/>
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
                <img src="{$hd.session.favicon}50.jpg"/>
            </div>
            <div class="username">
                <p>后盾向军</p>
                <span class="time">2013-02-12</span>
            </div>
        </div>
        <form method="post">
            <table>
                <tr>
                    <th>简&nbsp;&nbsp;&nbsp;&nbsp;述</th>
                    <td colspan="2">
                        <input type="text" name="title"/>
                    </td>
                </tr>
                <tr>
                    <th>栏&nbsp;&nbsp;&nbsp;&nbsp;目</th>
                    <td colspan="2">
                        <select>
                            <list from="$category" name="c">
                                <option value="{$c.cid}">{$c._name}</option>
                            </list>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>摘&nbsp;&nbsp;&nbsp;&nbsp;要</th>
                    <td colspan="2">
                        <textarea name="description"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>标&nbsp;&nbsp;&nbsp;&nbsp;签</th>
                    <td>
                        <input type="text" name="title"/>
                    </td>
                    <td>
                        <span>用空格分隔</span>
                    </td>
                </tr>
                <if value="$model.mid=1">
                    <tr>
                        <th>内&nbsp;&nbsp;&nbsp;&nbsp;容</th>
                        <td colspan="2">
                            <keditor name="content" style="2"/>
                        </td>
                    </tr>
                </if>
                <tr>
                    <th></th>
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