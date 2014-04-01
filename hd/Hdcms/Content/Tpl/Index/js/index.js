//显示左侧栏目列表TREE
function get_category_tree() {
    $.post(CONTROL + '&m=ajax_category_ztree', function (data) {
        var setting = {
            data: {
                simpleData: {
                    enable: true
                }
            }
        };
        var zNodes = data;
        $(document).ready(function () {
            $.fn.zTree.init($("#treeDemo"), setting, zNodes);
        });
    }, 'json');
}

//======================点击move标签DIV时改变div布局===============
$(function(){
    $("div#move").toggle(function(){
        $("div#category_tree").stop().animate({
            left:'-200px'
        },500);
        $(this).find('span').attr('class','right').end().stop().animate({
            left:'0px'
        },500);
        $('div#content').stop().animate({
            left:'20px'
        },500);
    },function(){
        $("div#category_tree").stop().animate({
            left:'0px'
        },500);
        $(this).find('span').attr('class','left').end().stop().animate({
            left:'191px'
        },500);
        $('div#content').stop().animate({
            left:'197px'
        },500);
    })
})