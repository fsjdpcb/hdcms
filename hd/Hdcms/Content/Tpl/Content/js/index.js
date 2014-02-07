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
        $("div#category_tree").hide();
        $(this).css({left:0}).find('span').attr('class','right');
        $('div#content').css({left:'10px'})
    },function(){
        $("div#category_tree").show();
        $(this).css({left:191}).find('span').attr('class','left');
        $('div#content').css({left:'197px'})
    })
})