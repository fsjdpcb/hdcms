//点击input表单实现 全选或反选
$(function () {
    //全选
    $("input#select_all").click(function () {
        $("[type='checkbox']").attr("checked", $(this).attr("checked") == "checked");
    })
})
//全选文章
function select_all() {
    $("[type='checkbox']").attr("checked", "checked");
}
//反选文章
function reverse_select() {
    $("[type='checkbox']").attr("checked", function () {
        return !$(this).attr("checked") == 1;
    });
}
//更新排序
function order(mid,cid) {
    if ($("input[type='text']").length == 0) {
        alert('没有文章用来排序！');
        return false;
    }
    var data = $("input[type='text']").serialize();
    hd_ajax(CONTROLLER + "&a=order&mid="+mid+"&cid=" + cid, data);
}
/**
 * 删除文章
 * @param mid
 * @param cid
 * @param aid
 */
function del(mid,cid,aid) {
    //单文章删除
    if (aid) {
        var ids = {aid: aid}
    } else {//多文章删除
        var aids = $("input:checked").serialize();
    }
    if (aids) {
        hd_confirm('确定要删除文章吗?',function(){
            $.ajax({
                type: "POST",
                url: CONTROLLER + "&a=del" + "&mid=" + mid+"&cid="+cid,
                dataType: "JSON",
                cache: false,
                data: aids,
                success: function (data) {
                    if (data.status == 1) {
                        $.dialog({
                            message: data.message,
                            type: "success",
                            close_handler: function () {
                                location.href = URL;
                            }
                        });
                    } else {
                        $.dialog({
                            message: data.message,
                            type: "error",
                            close_handler: function () {
                                location.href = URL;
                            }
                        });
                    }
                }
            })
        })
    } else {
        $.dialog({message: '请选择文章', type: "error"});
    }
}
//设置状态
function audit(mid,cid, state) {
    //单文章删除
    var ids = $("input:checked").serialize();
    if (ids) {
        $.ajax({
            type: "POST",
            url: CONTROLLER + "&a=audit" + "&status=" + state + "&mid="+mid+"&cid=" + cid,
            dataType: "JSON",
            cache: false,
            data: ids,
            success: function (data) {
                if (data.status == 1) {
                    $.dialog({
                        message: data.message,
                        type: "success",
                        close_handler: function () {
                            location.href = URL;
                        }
                    });
                } else {
                    $.dialog({
                        message: data.message,
                        type: "error",
                        close_handler: function () {
                            location.href = URL;
                        }
                    });
                }
            }
        })
    } else {
        $.dialog({message: '请选择文章', type: "error"});
    }
}
/**
 * 移动文章
 * @param mid 模型mid
 * @param cid 当前栏目
 */
function move(mid,cid) {
    var aid = '';
    $("input[name*=aid]:checked").each(function (i) {
        aid += $(this).val() + "|";
    })
    aid = aid.slice(0, -1);
    if (aid) {
        $.modal({
            width: 600, height: 420,
            title: '移动文章',
            content: '<iframe style="width: 100%;height: 99%;" src="' + CONTROLLER + '&a=move&mid='+mid+'&cid=' + cid + '&aid=' + aid + '" frameborder="0"></iframe>'
        })
    } else {
        $.dialog({message: '请选择文章', type: "error"});
    }
}















