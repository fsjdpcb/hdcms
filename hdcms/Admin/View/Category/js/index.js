//展开栏目
$(function(){
    $(".explodeCategory").click(function () {
        var action = parseInt($(this).attr("action"));
        var tr = $(this).parents('tr').eq(0);
        switch (action) {
            case 1://展示
                $(tr).nextUntil('.top').show();
                $(this).attr('action', 2);
                $(this).attr('src', CONTROLLERTPL+"/img/contract.gif");
                break;
            case 2://收缩
                $(tr).nextUntil('.top').hide();
                $(this).attr('action', 1);
                $(this).attr('src', CONTROLLERTPL+"/img/explode.gif");
                break;
        }
    })
})
//全部收起子栏目
function explodeCategory(){
    $(".explodeCategory").each(function(i){
        $(this).trigger('click');
    })
}
//更新排序
function updateOrder() {
    //栏目检测
    if ($("input[type='text']").length == 0) {
        alert('没有栏目用于排序');
        return false;
    }
    var post = $("input[type='text']").serialize();
    hd_ajax(CONTROLLER + '&a=updateOrder', post);
}
//点击input表单实现 全选或反选
$(function () {
    //全选
    $("input.select_all").click(function () {
        $("[type='checkbox']").attr("checked", $(this).attr('checked') == 'checked');
    })
})
//全选复选框
function select_all(state) {
    if (state == 1) {
        $("[type='checkbox']").attr("checked", state);
    } else {
        $("[type='checkbox']").attr("checked", function () {
            return !$(this).attr('checked')
        });
    }
}
//指量编辑
function BulkEdit() {
    //栏目检测
    if ($("input[type='checkbox']:checked").length == 0) {
        alert('请选择栏目');
        return false;
    }
    var cid = '';
    $("[name='cid[]']:checked").each(function (i) {
        cid += $(this).val() + '|';
    })
    cid = cid.slice(0, -1);
    var url = CONTROLLER + '&a=BulkEdit&cids=' + cid;
    location.href = url;
}