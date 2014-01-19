
//全选
function select_all(obj) {
    $("input[name*='bid']").attr("checked",$(obj).attr("checked") == "checked");
}
