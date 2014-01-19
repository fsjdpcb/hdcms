//点击菜单时选中所有子集
$(function () {
    $("div.level2 input").click(function () {
        //一级input
        var c = $(this).attr("checked");
        //改变二级input选中状态
        $(this).parents("tr").find("td input").attr("checked", c != undefined);
    })
})