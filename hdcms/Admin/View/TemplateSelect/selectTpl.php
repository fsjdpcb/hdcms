<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>选择模板</title>
    <hdjs/>
    <js file="__CONTROLLER_VIEW__/js/selectTpl.js"/>
    <css file="__CONTROLLER_VIEW__/css/selectTpl.css"/>
    <script type="text/javascript" charset="utf-8">
    	var fieldName ="{$hd.get.name}" ;
    </script>
</head>
<body>
<div id="select_tpl" style="overflow-y: auto;height:315px;">

</div>
<script type="text/javascript" charset="utf-8">
	$(function(){
		getFileList('{|U:'getFileList'}');
	});
</script>
</body>
</html>