<include file="__PUBLIC__/header.php"/>
<body>
<div class="wrap">
	<form id="search" class="hd-form" onsubmit="return false;">
        <div class="search" id="search">
            模型：
            <select name="mid" class="w100">
                <list from='$model' name="m">
                <option value="{$m.mid}" <if value="$hd.request.mid eq $m.mid">selected=''</if>>{$m.model_name}</option>
                </list>
            </select>
        </div>
    </form>
    <script>
        $("[name='mid']").change(function(){
        	var mid = $(this).val();
           location.href="{|U:'index'}&mid="+mid;
        })
    </script>
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">属性管理</a></li>
            <li><a href="{|U:'add',array('mid'=>$_REQUEST['mid'])}">添加属性</a></li>
            <li><a href="javascript:hd_ajax('{|U:updateCache}',{mid:{$hd.request.mid}})">更新缓存</a></li>
        </ul>
    </div>
    <form action="{|U:'edit'}" method="post" id="edit_form" class="hd-form" onsubmit="return hd_submit(this);">
    	<input type="hidden" name="mid" value="{$hd.request.mid}" />
        <table class="table2">
            <thead>
            <tr>
                <td class="w30">fid</td>
                <td>属性名称</td>
                <td width="50">操作</td>
            </tr>
            </thead>
            <tbody>
            <list from="$flag" name="name">
                <tr>
                    <td class="w100">
                        {$name}
                    </td>
                    <td>
                        <input type="text" name="flag[]" value="{$name}"/>
                    </td>
                    <td>
                            <a href="javascript:;" onclick="hd_confirm('确认删除吗？',function(){hd_ajax('{|U:del}',{mid:{$hd.get.mid},number:<?php echo $hd['list']['name']['index'] - 1; ?>})})">删除
                               </a>
                    </td>
                </tr>
            </list>
            </tbody>
        </table>
        <div class="position-bottom">
            <input type="submit" class="hd-success" id="updateSort" value="修改"/>
        </div>
    </form>
</div>
<style type="text/css">
    div.search {
        border: 1px solid #FFBE7A;
        background: none repeat scroll 0 0 #FFFCED;
        line-height: 20px;
        padding: 8px 10px;
    }
</style>
</body>
</html>