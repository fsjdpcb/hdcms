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
<form method="post" onsubmit="return false;" id="add" class="hd-form">
    <input type="hidden" name="mid" value="<?php echo $_GET['mid'];?>"/>
    <div class="wrap">
        <!--右侧缩略图区域-->
        <div class="content_right">
            <table class="table1">
                <?php foreach ($form['nobase'] as $field): ?>
                    <tr>
                        <th><?php echo $field['title'];?></th>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $field['form'];?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th>已审核</th>
                </tr>
                <tr>
                    <td>
                        <label><input type="radio" name="content_status" value="1" checked="">是</label>
                        &nbsp;&nbsp;
                        <label><input type="radio" name="content_status" value="0">否</label>
                    </td>
                </tr>
            </table>
        </div>
        <div class="content_left">
            <div class="title-header">添加文章</div>
            <table class="table1">
                <?php foreach ($form['base'] as $field): ?>
                    <tr>
                        <th class="w80"><?php echo $field['title'];?></th>
                            <td>
                                <?php echo $field['form'];?>
                            </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" class="hd-success" value="确定"/>
        <input type="button" class="hd-cancel" onclick="hd_close_window()" value="关闭"/>
    </div>
</form>
<script type="text/javascript">
    $('form').validate(<?php echo $formValidate;?>);
</script>
<script type="text/javascript" src="http://localhost/hdcms/HDCMS/Admin/View/Content/js/addEdit.js"></script>
<link type="text/css" rel="stylesheet" href="http://localhost/hdcms/HDCMS/Admin/View/Content/css/css.css"/>
</body>
</html>