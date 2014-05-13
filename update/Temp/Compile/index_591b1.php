<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <script type='text/javascript' src='http://localhost/hdcms/hd/HDPHP/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdcms/hd/HDPHP/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdcms/hd/HDPHP/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdcms/hd/HDPHP/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdcms/hd/HDPHP/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms/update';
		WEB = 'http://localhost/hdcms/update/index.php';
		URL = 'http://localhost/hdcms/update';
		HDPHP = 'http://localhost/hdcms/hd/HDPHP/hdphp';
		HDPHPDATA = 'http://localhost/hdcms/hd/HDPHP/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdcms/hd/HDPHP/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdcms/hd/HDPHP/hdphp/Extend';
		APP = 'http://localhost/hdcms/update/index.php';
		CONTROL = 'http://localhost/hdcms/update/index.php/Index';
		METH = 'http://localhost/hdcms/update/index.php/Index/index';
		TPL = 'http://localhost/hdcms/update/./Tpl';
		CONTROLTPL = 'http://localhost/hdcms/update/./Tpl/Index';
		STATIC = 'http://localhost/hdcms/update/Static';
		PUBLIC = 'http://localhost/hdcms/update/./Tpl/Public';
</script>
    </head>
    <body>
	<div class="wrap">
		<div class="title-header">温馨提示</div>
		<table class="table2">
			<tbody>
				<tr>
					<td style="color:red;font-weight: bold;font-size:14px;">
						请备份网站数据后更新！
					</td>
				</tr>
				<tr>
					<td>
						没有操作过更新的盾友请登录<a href="http://www.hdphp.com">hdphp.com</a>了解更新知识。
					</td>
				</tr>
			</tbody>
		</table>
		<div class="title-header">更新信息</div>
		<table class="table2">
			<tbody>
				<tr>
					<td>
						本次更新将升级HDCMS至<?php echo C("NEW_VERSION");?>，请确定你的HDCMS版本低于<?php echo C("NEW_VERSION");?>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="title-header">鸣谢</div>
		<table class="table2">
			<tbody>
				<tr>
					<td>
						感谢所有后盾网盾友，一如既往对后盾网的支持，我们会带给大家更多优秀的开源产品与高质量学习资源!
					</td>
				</tr>
			</tbody>
		</table>
		<br/>
		<form action="<?php echo U('update');?>" method="post">
			<input type="submit" value="开始更新" class="hd-success"/>
		</form>
	</div>
    </body>
</html>