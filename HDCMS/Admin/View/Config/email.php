<include file="__PUBLIC__/header.php"/>
<body>
<form method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:'email'}')">
    <div class="wrap">
        <div class="title-header">温馨提示</div>
        <div class="help">
            设置邮箱后，请检测发送是否成功
        </div>
        <div class="tab">
            <ul class="tab_menu">
                <li lab="web"><a href="#">水印设置</a></li>
            </ul>
            <div class="tab_content">
                <div id="web">
                    <table class="table1">
                        <tr style="background: #E6E6E6;">
                            <th class="w200">标题</th>
                            <th>配置</th>
                            <th class="w300">变量</th>
                            <th class="w300">描述</th>
                        </tr>
                        <foreach from="$config" key="$key" value="$val">
                                <tr>
                                    <td>{$val.title}</td>
                                    <td>
                                        <input type="text" name="{$val.name}" value="{$val.value}" class="w200"/>
                                    </td>
                                    <td>{$val.name}</td>
                                    <td>{$val.message}</td>
                                </tr>
                        </foreach>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" class="hd-success" value="确定"/>
        <button class="hd-cancel-small" type="button" onclick="checkEmail();">发邮件测试</button>
    </div>
</form>
<script type="text/javascript" charset="utf-8">
    function checkEmail(){
        $.post("{|U:'checkEmail'}",$('form').serialize(),function(json){
            if(json.state){
                alert(json.message);
            }else{
                alert(json.message);
            }
        },'json');
    }
</script>
</body>
</html>