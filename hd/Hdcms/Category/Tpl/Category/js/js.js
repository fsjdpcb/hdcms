//表单验证
$(function () {
    $("form").validate({
        //验证规则
        catname: {
            rule: {
                required: true
            },
            error: {
                required: "栏目名称不能为空"
            }
        },
        app: {
            rule: {
                required: true
            },
            error: {
                required: "项目不能为空"
            }
        },
        control: {
            rule: {
                required: true
            },
            error: {
                required: "模块不能为空"
            }
        },
        method: {
            rule: {
                required: true
            },
            error: {
                required: "方法不能为空"
            }

        }
    })
})
//获得静态目录(将目录名转为拼音)
$(function () {
    $("[name='catname']").blur(function () {
        //栏目名
        $catname = $.trim($("[name='catname']").val())
        //静态目录名
        $catdir = $.trim($("[name='catdir']").val());
        //静态目录名为空时获得
        if (!$catdir && $catname) {
            $.post(CONTROL + "&m=dir_to_pinyin", {catname: $(this).val()}, function (data) {
                $("[name='catdir']").val(data);
            })
        }
    })
})
/**
 * 删除栏目
 * @param cid 栏目id
 */
function del_category(cid) {
    if (confirm('删除栏目将删除栏目下所有文章，确定删除吗？'))
        hd_ajax(CONTROL + '&m=del_category', {cid: cid});
}

//更新排序
function update_order() {
    //栏目检测
    if ($("input[type='text']").length == 0) {
        alert('没有栏目用于排序');
        return false;
    }
    var post = $("input[type='text']").serialize();
    hd_ajax(CONTROL + '&m=update_order', post);
}