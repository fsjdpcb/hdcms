<include file="__PUBLIC__/header.php"/>
<body>
<div class="wrap">
    <form action="" class="hd-form">
        <div class="menu_list">
            <ul>
                <li>
                    <a href="{|U:'index'}" class="action">插件列表</a>
                </li>
                <li>
                    <a href="{|U:'add'}">创建插件</a>
                </li>
            </ul>
        </div>
        <table class="table2">
            <thead>
            <tr>
                <td class="w150">名称</td>
                <td class="w100">标识</td>
                <td>描述</td>
                <td class="w60">安装</td>
                <td class="w100">作者</td>
                <td class="w50">版本</td>
                <td class="w180">操作</td>
            </tr>
            </thead>
            <tbody>
            <list from="$data" name="d">
                <tr>
                    <td>
                        {$d.name}
                    </td>
                    <td>{$d.title}</td>
                    <td>{$d.description}</td>
                    <td><if value="$d.status"><font color="red">√</font><else><font color="blue">×</font></if></td>
                    <td>{$d.author}</td>
                    <td>{$d.version}</td>
                    <td>
                        <a href="javascript:hd_ajax('{|U:'package'}', {addon: '{$d.name}'})">打包</a>
                        <if value="$d.install">
                            <if value="$d.config">
                                <a href="{|U:'config',array('id'=>$d['id'])}">设置</a>
                            <else>
                                设置
                            </if>
                            <if value="$d.status">
                                <a href="{|U:'disabled',array('addon'=>$d['name'])}">禁用</a>
                            <else>
                                <a href="{|U:'enabled',array('addon'=>$d['name'])}">启用</a>
                            </if>
                            <a href="javascript:hd_confirm('确证卸载 【{$d['title']}】 插件吗？',function(){location.href='{|U:'uninstall',array('addon'=>$d['name'])}';})">
                            卸载</a>
                        <else>
                            <a href="javascript:location.href='{|U:'install',array('addon'=>$d['name'])}'">安装</a>
                        </if>
                        <if value="$d.IndexAction">
                            <a href="{$d.IndexAction}" target="_blank">前台</a>
                        <else>
                            前台
                        </if>
                        <if value="$d.help">
                            <a href="{$d.help}" target="_blank">帮助</a>
                        <else>
                            帮助
                        </if>
                    </td>
                </tr>
            </list>
            </tbody>
        </table>
    </form>
</div>

</body>
</html>