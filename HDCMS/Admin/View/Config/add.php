<include file="__PUBLIC__/header.php"/>
<body>
<form method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:webConfig}')">
	<input type="hidden" name="type" value="custom"/>
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'webConfig'}">网站配置</a></li>
                <li><a href="{|U:'add'}" class="action">添加配置</a></li>
            </ul>
        </div>
        <div class="title-header">
           	 添加配置
        </div>
        <div>
            <table class="table1">
            	<tr>
                    <th class="w100">标题（中文）</th>
                    <td>
                        <input type="text" name="title" class="w200" />
                    </td>
                </tr>
                <tr>
                    <th class="w100">变量名(英文)</th>
                    <td>
                        <input type="text" name="name" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>提示信息</th>
                    <td>
                        <textarea name="message" class="w350 h80"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>配置组</th>
                    <td>
                        <select name="cgid" class="w200">
                            <list from="$configGroup" name="$g">
                                <option value="{$g.cgid}">{$g.cgtitle}</option>
                            </list>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>显示方法</th>
                    <td>
                        <label>
                            <input type="radio" name="show_type" value="text" checked=""/> text
                        </label>
                        <label>
                            <input type="radio" name="show_type" value="radio"/> radio
                        </label>
                        <label>
                            <input type="radio" name="show_type" value="textarea"/> textarea
                        </label>
                        <label>
                            <input type="radio" name="show_type" value="select"/> select
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>配置值</th>
                    <td>
                        <input type="text" name="value" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>参数（对radio与select有效)</th>
                    <td>
                        <textarea name="info" class="w350 h100"></textarea>
                    </td>
                </tr>

                </table>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" value="确定" class="hd-success"/>
    </div>
</form>
<js file="__CONTROLLER_VIEW__/Js/validate.js"/>
</body>
</html>