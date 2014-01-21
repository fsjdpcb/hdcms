<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>单文章列表</title>
    <hdjs/>
    <js file="__GROUP__/static/js/js.js"/>
    <js file="__TPL__/Content/js/content.js"/>
    <css file="__TPL__/Content/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'content',array('cid'=>$_GET['cid'],'state'=>1)}" class="action">内容列表</a></li>
            <li><a href="javascript:;" onclick="window.open('{|U:add,array('cid'=>$_GET['cid'])}')">添加内容</a></li>
        </ul>
    </div>
    <table class="table2 hd-form">
        <thead>
        <tr>
            <td class="w30">aid</td>
            <td width="30">排序</td>
            <td>标题</td>
            <td class="w50">状态</td>
            <td class="w80">作者</td>
            <td class="w80">修改时间</td>
            <td class="w100">操作</td>
        </tr>
        </thead>
        <list from="$data" name="c">
            <tr>
                <td>{$c.aid}</td>
                <td>
                    <input type="text" class="w30" value="{$c.arc_sort}" name="arc_order[{$c.aid}]"/>
                </td>
                <td><a href="{|U:edit,array('aid'=>$c['aid'],'cid'=>$_GET['cid'])}" target="_blank">{$c.title}</a>
                    {$c.flag}
                </td>
                <td>
                    <if value="$c.state==1">已审核<else>未审核</if>
                </td>
                <td>
                    {$c.author}
                </td>
                <td>
                    {$c.updatetime|date:"Y-m-d",@@}
                </td>
                <td align="right">
                    <a href="{|U:'Content/Index/content',array('aid'=>$c['aid'],'cid'=>$_GET['cid'])}" target="_blank">访问</a><span
                        class="line">|</span>
                    <a href="javascript:;" onclick="window.open('{|U:edit,array('aid'=>$c['aid'])}')">编辑</a><span
                        class="line">|</span>
                    <a href="javascript:;" onclick="del({$hd.get.cid},{$c.aid})">删除</a>
<!--                    <span class="line">|</span><a href="">评论</a>-->
                </td>
            </tr>
        </list>
    </table>
    <div class="page1">
        {$page}
    </div>
</div>
</body>
</html>