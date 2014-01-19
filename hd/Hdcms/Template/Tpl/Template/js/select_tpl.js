$(function () {
    $('td div a').click(function () {
        var type = $(this).attr('class');
        //父级窗口input表单id
        var input_id=$(this).attr('input_id');;
        //当前文件或目录的path地址
        var path=$(this).attr('path');
        switch (type) {
            //目录
            case 'dir':
                /**
                 * 根据选择目录刷新当前页
                 */
                var url = METH+'&input_id='+input_id+'&path='+path;
                location.href=url;
                break;

            case 'file':
                /**
                 * 根据当前点击的a标签的input_id属性找到父级input元素
                 * 改变父级input框的值
                 */
                $(parent.document).find("#" + input_id).val(path);
                //关闭父级modal对话框
                parent.close_select_template();
                break;
        }
    })
//    $(".dir").click(function () {
//       var url = METH+'&input_id＝'+$()
//    })
//    //选择文件
//    $(".file").click(function () {
//        var input_id = $(this).attr("input_id");alert(3);
//        $(parent.document).find("#" + input_id).val($(this).attr("path"));
//        $(parent.document).find("[class*='modal']").remove();
//        return false;
//    })
})