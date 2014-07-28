//------------------------------------------全选与反选  checkbox
$(function () {
    //checkbox选择
    $(".s_all_ck").click(function () {
        $("[name='table[]']").attr("checked", !!$(this).attr("checked"));
    })
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