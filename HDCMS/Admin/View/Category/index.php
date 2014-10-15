<include file="__PUBLIC__/header.php"/>
<body>
<form action=""{|U:'BulkEdit'}" method="post">
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li>
                <a href="{|U:index}" class="action">
                    栏目列表
                </a>
            </li>
            <li>
                <a href="{|U:'add'}">
                    添加顶级栏目
                </a>
            </li>
            <li>
                <a href="javascript:hd_ajax('{|U:updateCache}')">
                    更新栏目缓存
                </a>
            </li>
        </ul>
    </div>
    <table class="table2 hd-form">
        <thead>
        <tr>
            <td class="w30">
                <input type="checkbox" class="select_all"/>
            </td>
            <td class="w30">CID</td>
            <td class="w50">排序</td>
            <td>栏目名称</td>
            <td class="w100">类型</td>
            <td class="w100">模型</td>
            <td class="w180">操作</td>
        </tr>
        </thead>
        <tbody>
        <list from="$category" name="c">
            <tr <if value="$c.pid eq 0">class="top"</if>>
            <td>
                <input type="checkbox" name="cid[]" value="{$c.cid}"/>
            </td>
            <td>{$c.cid}</td>
            <td>
                <input type="text" class="w30" value="{$c.catorder}" name="list_order[{$c.cid}]"/>
            </td>
            <td>
                <if value="$c.pid eq 0 && Data::hasChild(S('category'),$c.cid)">
                    <img src="__APP__/Static/image/contract.gif" action="2" class="explodeCategory"/>
                </if>
               <if value="$c.pid eq 0"><strong>{$c._name}</strong><else>{$c._name}</if>
            </td>
            <td>{$c.cat_type_name}</td>
            <td>{$c.model_name}</td>
            <td>
                <a href="{|U:'Index/Index/category',array('mid'=>$c['mid'],'cid'=>$c['cid'])}" target="_blank">
                    访问
                </a>
                <span class="line">|</span>
                <a href="{|U:'add',array('pid'=>$c['cid'],'mid'=>$c['mid'])}">
                    添加子栏目
                </a>
                <span class="line">|</span>
                <a href="{|U:'edit',array('cid'=>$c['cid'])}">
                    修改
                </a>
                <span class="line">|</span>
                <a href="javascript:hd_confirm('将删除子目录及文章，确证删除吗？',function(){hd_ajax(CONTROLLER + '&a=del', {cid: {$c.cid},mid: {$c.mid}})})">
                    删除
                </a></td>
            </tr>
        </list>
        </tbody>
    </table>
    <div class="h60"></div>
</div>
<div class="position-bottom">
    <input type="button" class="hd-cancel" onclick="select_all(1)" value='全选'/>
    <input type="button" class="hd-cancel" onclick="select_all(0)" value='反选'/>
    <input type="button" class="hd-cancel" onclick="explodeCategory()" value="收缩"/>
    <input type="button" class="hd-cancel" onclick="updateOrder()" value="更改排序"/>
    <input type="button" class="hd-cancel" onclick="BulkEdit()" value="批量编辑"/>
</div>
</form>
<style type="text/css">
    img.explodeCategory {
        cursor: pointer;
    }
</style>
<script>
    //展开栏目
    $(".explodeCategory").click(function () {
        var action = parseInt($(this).attr("action"));
        var tr = $(this).parents('tr').eq(0);
        switch (action) {
            case 1://展示
                $(tr).nextUntil('.top').show();
                $(this).attr('action', 2);
                $(this).attr('src', APP + "/Static/image/contract.gif");
                break;
            case 2://收缩
                $(tr).nextUntil('.top').hide();
                $(this).attr('action', 1);
                $(this).attr('src', APP + "/Static/image/explode.gif");
                break;
        }
    })
    //关闭栏目子栏目（隐藏子栏目）
    $(".explodeCategory").trigger('click');
    //全部收起子栏目
    function explodeCategory() {
        $(".explodeCategory").each(function (i) {
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
    //全选
    $("input.select_all").click(function () {
        $("[type='checkbox']").attr("checked", $(this).attr('checked') == 'checked');
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
</script>
</body>
</html>