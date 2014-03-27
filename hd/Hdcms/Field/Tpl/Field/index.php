<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>模型字段管理</title>
    <hdjs/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'Model/Model/index'}">模型列表</a></li>
            <li><a href="javascript:;" class="action">字段列表</a></li>
            <li><a href="{|U('add',array('mid'=>$_GET['mid']))}">添加字段</a></li>
            <li><a href="javascript:;" onclick="hd_ajax('{|U:update_cache}',{mid:{$hd.get.mid}})">更新字段缓存</a></li>
        </ul>
    </div>
    <table class="table2 hd-form">
        <thead>
        <tr>
            <td class="w50">排序</td>
            <td class="w50">Fid</td>
            <td class="w200">描述</td>
            <td>字段名</td>
            <td class="w100">类型</td>
            <td class="w80">系统</td>
            <td class="w80">主表</td>
            <td class="w100">操作</td>
        </tr>
        </thead>
        <tbody>
        <list from="$field" name="f">
            <tr>
                <td>
                    <input type="text" name="fieldsort[{$f.fid}]" class="w30" value="{$f.fieldsort}"/>
                </td>
                <td>
                    {$f.fid}
                </td>
                <td>{$f.title}</td>
                <td>{$f.field_name}</td>
                <td>{$f.type_name}</td>
                <td>
                    <if value="{$f.is_system}">是
                        <else>否
                    </if>
                </td>
                <td>
                    <if value="{$f.is_main_table}">是
                        <else>否
                    </if>
                </td>
                <td>
                    <a href="{|U:'edit',array('mid'=>$f['mid'],'fid'=>$f['fid'])}">修改</a>
                    |
                    <a href="javascript:"
                       onclick="return confirm('确定删除【{$f.title}】字段吗？')?hd_ajax('{|U:del}',{mid:{$f['mid']},fid:{$f['fid']}}):false;">删除</a>
                </td>
            </tr>
        </list>
        </tbody>
    </table>
    <div class="position-bottom">
        <input type="button" class="hd-success" id="updateSort" value="排序"/>
    </div>
</div>
</body>
</html>