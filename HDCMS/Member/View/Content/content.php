<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{$hd.config.webname}</title>
    <meta http-equiv="Cache-Control" content="no-cache"/>
    <css file="__PUBLIC__/static/css/common.css"/>
    <jquery/>
    <bootstarp/>

</head>
<body>
<include file="__PUBLIC__/block/top_menu.php"/>
<div class="wrap">
    <div class="menu">
        <include file="__PUBLIC__/block/left_menu.php"/>
    </div>
    <div class="content">
        <div class="list">
            <div class="header">
                {$model.model_name}
            </div>
            <div class="article_menu">
                <a href="{|U:'add',array('mid'=>$_GET['mid'])}">发表文章</a>
            </div>
            <div class="article">
                <table class="table2 hd-form">
                    <thead>
                    <tr>
                        <td>文章标题</td>
                        <td width="100">栏目</td>
                        <td width="50">状态</td>
                        <td width="50">点击</td>
                        <td width="100">发布时间</td>
                        <td width="100">操作</td>
                    </tr>
                    </thead>
                    <list from="$data" name="c">
                        <tr>
                            <td>
                                <a href="{|U:'Index/Index/content',array('mid'=>$_GET['mid'],'cid'=>$_GET['cid'],'aid'=>$c['aid'])}" target="_blank">
                                    {$c.title}
                                </a>
                            </td>
                            <td>
                                {$c.catname}
                            </td>
                            <td>
                                <if value="$c.content_status eq 1">
                                    已审核
                                <else>
                                    未审核
                                </if>
                            </td>
                            <td>{$c.click}</td>
                            <td>{$c.addtime|date:"Y-m-d",@@}</td>
                            <td>
                                <a href="<?php echo Url::getContentUrl($c);?>" target="_blank">
                                    访问
                                </a>
                                <span class="line">|</span>
                                <a href="{|U:edit,array('cid'=>$c['cid'],'mid'=>$c['mid'],'aid'=>$c['aid'])}">
                                    编辑
                                </a>
                                <span class="line">|</span>
                                <a href="javascript:;" onclick="confirm('确定删除吗？')?location.href='{|U:del,array('cid'=>$c['cid'],'mid'=>$c['mid'],'aid'=>$c['aid'])}':''">
                                    删除
                                </a>
                            </td>
                        </tr>
                    </list>
                </table>
                <div class="page1">
                    {$page}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>