//删除角色 角色列表页
function del(rid) {
    if (confirm("确定删除角色吗？")) {
        hd_ajax(CONTROL + '&m=del&rid=' + rid, CONTROL);
    }
}




































