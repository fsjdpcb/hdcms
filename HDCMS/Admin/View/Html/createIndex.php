<include file="__PUBLIC__/header.php"/>
	<body>
		<form method="post" class="hd-form">
			<div class="wrap">
				<div class="title-header">
					温馨提示
				</div>
				<div class="help">
					建议创建计划任务，自动更新首页
				</div>

                <?php if(C('CREATE_INDEX_HTML')){?>
                    <div class="title-header">
                        生成网站首页html文件
                    </div>
                    <br/>
				    <input type="submit" value="开始更新" class="hd-success"/>
                    <?php }else{?>
                    <div class="alert alert-danger" role="alert">首页生成已经关闭，请修改配置项开启</div>
                <?php }?>
			</div>
		</form>
        <style type="text/css">
            div.alert{
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
                padding: 15px;
                margin-bottom: 20px;
                border: 1px solid transparent;
                border-radius: 4px;
            }
        </style>
	</body>
</html>