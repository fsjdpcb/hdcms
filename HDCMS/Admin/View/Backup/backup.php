<include file="__PUBLIC__/header.php"/>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'backup'}" class="action">备份数据</a></li>
            <li><a href="{|U:'Backup/index'}">备份列表</a></li>
        </ul>
    </div>
    <form action="{|U:'backup_db'}" method="post"  class="hd-form" onsubmit="return backup();">
        <table class="table2">
            <thead>
            <tr>
                <td width="50">数据备份</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <table class="table" width="100%">
                        <tr>
                            <td class="w100">分卷大小</td>
                            <td>
                                <input type="text" class="w150" name="size" value="200"/> KB
                            </td>
                        </tr>
                        <tr>
                            <td class="w100"></td>
                            <td>
                                <label>
                                    <input type="checkbox" name="structure" value="1" checked="checked">
                                    备份表结构
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="w100">&nbsp;</td>
                            <td>
                                <input type="submit" class="hd-cancel" value="开始备份"/>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
        <table class="table2" id="table_list">
            <thead>
            <tr>
                <td width="50">
                    <label><input type="checkbox" class="s_all_ck"/> 全选</label>
                </td>
                <td>表名</td>
                <td>类型</td>
                <td>编码</td>
                <td>记录数</td>
                <td>使用空间</td>
                <td>碎片</td>
                <td width="200">操作</td>
            </tr>
            </thead>
            <tbody>
            <list from="$table.table" name="t">
                <tr>
                    <td>
                        <input type="checkbox" name="table[]" value="{$t.tablename}"/>
                    </td>
                    <td>{$t.tablename}</td>
                    <td>{$t.engine}</td>
                    <td>{$t.charset}</td>
                    <td>{$t.rows}</td>
                    <td>{$t.size}</td>
                    <td>{$t.data_free|default:0}</td>
                    <td>
                        <a href="javascript:hd_ajax('{|U:optimize}',{table:['{$t.tablename}']})">优化</a> |
                        <a href="javascript:hd_ajax('{|U:repair}',{table:['{$t.tablename}']})">修复</a>
                    </td>
                </tr>
            </list>
            </tbody>
        </table>
    </form>
</div>
<div class="position-bottom">
    <input type="button" class="hd-cancel" onclick="select_all('#table_list')" value="全选"/>
    <input type="button" class="hd-cancel" onclick="reverse_select('#table_list')" value="反选"/>
    <input type="button" class="hd-cancel" onclick="optimize()" value="批量优化"/>
    <input type="button" class="hd-cancel" onclick="repair()" value="批量修复"/>
</div>
<script>
    //全选与反选  checkbox
    $(".s_all_ck").click(function () {
        $("[name='table[]']").attr("checked", !!$(this).attr("checked"));
    })
    //备份数据库
    function backup() {
        if ($("[name*='table']:checked").length == 0) {
            alert("你还没有选择表");
            return false;
        }
        return true;
    }

    //检查有没有选择备份目录
    function check_select_table() {
        if ($("[name*='table']:checked").length == 0) {
            alert("你还没有选择表");
            return false;
        }
        return true;
    }

    //优化表
    function optimize() {
        if (check_select_table()) {
            hd_ajax(CONTROLLER + '&a=optimize', $("[name*='table']:checked").serialize());
        }
    }
    //修复表
    function repair() {
        if (check_select_table()) {
            hd_ajax(CONTROLLER + '&a=repair', $("[name*='table']:checked").serialize());
        }
    }
</script>
</body>
</html>