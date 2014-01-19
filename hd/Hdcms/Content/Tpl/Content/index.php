<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>内容管理</title>
    <hdjs/>
    <css file="__CONTROL_TPL__/css/index.css"/>
    <js file="__CONTROL_TPL__/js/index.js"/>
    <link rel="stylesheet" href="__GROUP__/static/ztree/css/zTreeStyle/zTreeStyle.css" type="text/css">
    <script type="text/javascript" src="__GROUP__/static/ztree/js/jquery.ztree.all-3.5.min.js"></script>
    <base target="content"/>
</head>
<body>
<div class="wrap">
    <div id="category_tree">
        <div id="tree_title">
            <span></span>
            <a href="javascript:;" onclick="get_category_tree();">刷新栏目</a>
        </div>
        <ul id="treeDemo" class="ztree" style="top:25px;position: absolute;"></ul>
    </div>
    <div id="content">
        <iframe src="{|U:'Hdcms/Index/feedback'}" name="content" scrolling="auto" frameborder="0"
                style="height:100%;width: 100%;"></iframe>
    </div>
</div>
<script type="text/javascript">
    //加载目录树
    get_category_tree();
</script>
</body>
</html>