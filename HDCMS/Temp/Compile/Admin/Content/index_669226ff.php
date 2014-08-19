<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if (!defined('HDPHP_PATH')) exit(); ?>
<!doctype html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <title>系统后台 - <?php echo C("webname");?> - by HDCMS</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
HOST = '<?php echo $GLOBALS['user']['HOST'];?>';
ROOT = '<?php echo $GLOBALS['user']['ROOT'];?>';
WEB = '<?php echo $GLOBALS['user']['WEB'];?>';
URL = '<?php echo $GLOBALS['user']['URL'];?>';
APP = '<?php echo $GLOBALS['user']['APP'];?>';
COMMON = '<?php echo $GLOBALS['user']['COMMON'];?>';
HDPHP = '<?php echo $GLOBALS['user']['HDPHP'];?>';
HDPHPDATA = '<?php echo $GLOBALS['user']['HDPHPDATA'];?>';
HDPHPEXTEND = '<?php echo $GLOBALS['user']['HDPHPEXTEND'];?>';
MODULE = '<?php echo $GLOBALS['user']['MODULE'];?>';
CONTROLLER = '<?php echo $GLOBALS['user']['CONTROLLER'];?>';
ACTION = '<?php echo $GLOBALS['user']['ACTION'];?>';
STATIC = '<?php echo $GLOBALS['user']['STATIC'];?>';
HDPHPTPL = '<?php echo $GLOBALS['user']['HDPHPTPL'];?>';
VIEW = '<?php echo $GLOBALS['user']['VIEW'];?>';
PUBLIC = '<?php echo $GLOBALS['user']['PUBLIC'];?>';
CONTROLLERVIEW = '<?php echo $GLOBALS['user']['CONTROLLERVIEW'];?>';
HISTORY = '<?php echo $GLOBALS['user']['HISTORY'];?>';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
<div class="wrap">
    <div id="category_tree">
        <div id="tree_title">
            <span></span>
            <a href="javascript:;" onclick="get_category_tree();" target="content">刷新栏目</a>
        </div>
        <ul id="treeDemo" class="ztree" style="top:25px;position: absolute;"></ul>
    </div>
    <div id="move">
        <span class="left"></span>
    </div>
    <div id="content">
        <iframe src="<?php echo U('Index/welcome');?>" name="content" scrolling="auto" frameborder="0" style="height:100%;width: 100%;"></iframe>
    </div>
</div>
<link rel="stylesheet" href="http://localhost/hdcms/HDCMS/Admin/View/Content/ztree/css/zTreeStyle/zTreeStyle.css" type="text/css">
<script type="text/javascript" src="http://localhost/hdcms/HDCMS/Admin/View/Content/ztree/js/jquery.ztree.all-3.5.min.js"></script>
<style type="text/css">
    div#tree_title a {
        color: #333;
    }

    /*左侧栏目*/
    div#category_tree {
        width: 190px;
        position: fixed;
        top: 0px;
        bottom: 0px;
        left: 0px;
        overflow-x: hidden;
        overflow-y: auto;
        border-right: solid 1px #DDDDDD;
    }

    div#move {
        width: 5px;
        background: #EEEEEE;
        position: fixed;
        left: 191px;
        top: 0px;
        bottom: 0px;
        border-right: solid 1px #DDDDDD;
        cursor: pointer;
    }

    div#move span {
        font-size: 16px;
        color: #999;
        display: block;
        height: 15px;
        width: 15px;
        position: absolute;
        top: 50%;
        margin-top: -15px;
        z-index: 1000;
    }

    div#move span.left {
        background: url("http://localhost/hdcms/HDCMS/Admin/View/Content/img/ico_left.gif") no-repeat;
        left: -10px;
    }

    div#move span.right {
        background: url("http://localhost/hdcms/HDCMS/Admin/View/Content/img/ico_right.gif") no-repeat;
        left: 5px;
    }

    /*右侧内容显示区*/
    div#content {
        position: fixed;
        left: 197px;
        right: 0px;
        bottom: 0px;
        top: 0px;
    }

    #tree_title {
        position: absolute;
        top: 10px;
        left: 10px;
    }

    #tree_title span {
        display: block;
        background: url("http://localhost/hdcms/HDCMS/Admin/View/Content/ztree/css/zTreeStyle/img/diy/1_open.png");
        width: 15px;
        height: 15px;
        float: left;
        margin-right: 5px;
    }
</style>
<script type="text/javascript" charset="utf-8">
    //显示左侧栏目列表TREE
    function get_category_tree() {
        $.post(CONTROLLER + '&a=ajaxCategoryZtree', function (data) {
            $("#category_tree").hide();
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
            $("#category_tree").slideDown(1000);
        }, 'json');
    }
    get_category_tree();
    //======================点击move标签DIV时改变div布局===============
    $(function () {
        $("div#move").toggle(function () {
            $("div#category_tree").stop().animate({
                left: '-200px'
            }, 500);
            $(this).find('span').attr('class', 'right').end().stop().animate({
                left: '0px'
            }, 500);
            $('div#content').stop().animate({
                left: '20px'
            }, 500);
        }, function () {
            $("div#category_tree").stop().animate({
                left: '0px'
            }, 500);
            $(this).find('span').attr('class', 'left').end().stop().animate({
                left: '191px'
            }, 500);
            $('div#content').stop().animate({
                left: '197px'
            }, 500);
        })
    })
</script>
</body>
</html>