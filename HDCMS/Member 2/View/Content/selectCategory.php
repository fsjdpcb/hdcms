<!DOCTYPE html>
<html>
<head>
    <title>我的文章</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <hdjs/>
    <bootstrap/>
    <link rel="stylesheet" type="text/css" href="__CONTROL_TPL__/css/article-list.css?ver=1.0"/>
    <hdcms/>
</head>
<body>
<include file="__PUBLIC__/block/top_menu"/>
<article class="center-block main">
    <!--左侧导航start-->
    <include file="__PUBLIC__/block/left_menu"/>
    <!--左侧导航end-->
    <section class="article">
        <header>
            <h2> 选择发表栏目
              
            </h2>
        </header>
        <form action="{|U:'add'}">
        	<input type="hidden" name="a" value="Member"/>
        	<input type="hidden" name="c" value="Content"/>
        	<input type="hidden" name="m" value="add"/>
        	<p style="margin-top:20px;">
        	<select name="cid" size="10" style="width:300px;height:290px;" size="100">
        		<list from="$category" name="d">
        		<option value="{$d.cid}" <if value="$d.cattype!=1">disabled=''</if>>{$d._name}</option>
        		</list>
        	</select>
        	</p>
        	<input type="submit" class="hd-success" value="确定"/>
        </form>
    </section>
</article>
<include file="__PUBLIC__/block/footer"/>
</body>
</html>