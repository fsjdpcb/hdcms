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
