<include file="__PUBLIC__/header.php"/>
<body>
<form method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:'webConfig'}')">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'webConfig'}" class="action">网站配置</a></li>
                <li><a href="{|U:'add'}">添加配置</a></li>
                <li><a href="javascript:hd_ajax('{|U:updateCache}')">更新缓存</a></li>
            </ul>
        </div>
        <div class="title-header">温馨提示</div>
        <div class="help">
            <ul>
                <li>模板中使用配置项方法为<literal>{$hd.config.变量名}</literal>，请仔细修改配置项，不当设置将影响网站的性能与安全</li>
            </ul>
        </div>
        <div class="tab">
            <ul class="tab_menu">
                <list from="$data" name="$d">
                    <li lab="{$d.cgname}"><a href="#">{$d.cgtitle}</a></li>
                </list>
            </ul>
            <div class="tab_content">
                <list from="$data" name="$d">
                    <div id="{$d.cgname}">
                        <table class="table1">
                            <tr style="background: #E6E6E6;">
                                <th class="w50">排序</th>
                                <th class="w200">标题</th>
                                <th>配置</th>
                                <th class="w300">变量</th>
                                <th class="w300">描述</th>
                            </tr>
                            <list from="$d._config" name="c">
                                <tr>
                                    <td>
                                        <input type="text" name="config[{$c.id}][order_list]" value="{$c.order_list}"
                                               class="w30"/>
                                        <input type="hidden" name="config[{$c.id}][id]" value="{$c['id']}"/>
                                    </td>
                                    <td>{$c.title}
                                        <if value="$c.system eq 0">
                                            <a href="javascript:hd_confirm('确证删除吗？',function(){hd_ajax(CONTROLLER + '&a=del', {id: {$c.id}})})">删除</a>
                                        </if>
                                    </td>
                                    <td>{$c._html}</td>
                                    <td>{$c.name}</td>
                                    <td>{$c.message}</td>
                                </tr>
                            </list>
                        </table>
                    </div>
                </list>
            </div>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" class="hd-success" value="确定"/>
    </div>
</form>
</body>
</html>