//预览
function view(url) {
    $.modal({width:500,height:400,button_cancel:'关闭',
        content:"<div style='text-align:padding:10px; center'><img class='w450' src='" + url + "'/></div>"
    })
}
