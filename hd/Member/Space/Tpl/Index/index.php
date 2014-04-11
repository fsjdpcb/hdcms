<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>{$user.nickname} - 个人主页</title>
		<link rel="stylesheet" type="text/css" href="__CONTROL_TPL__/css/style.css"/>
	</head>
	<body>
		<!--头部-->
		<div id="head_out">
			<div class="head">
				<img src="__ROOT__/{$user.icon150}" alt="" class="face" />

				<p class="name">
					{$user.nickname}
                    <if value="$hd.session.admin">
					<a href="__ROOT__/index.php?a=User&c=Lock&m=lock&uid={$user.uid}" class="attention" target="_blank">禁止</a>
                    </if>

				</p>
				<p class="page">
					个人主页：
					<a href="__ROOT__?{$user.domain}">
						__ROOT__?{$user.domain}
					</a>
                    <br/>
                    积分: {$user.credits}&nbsp;&nbsp;&nbsp;&nbsp;
                    访问：{$user.spec_num}次<br/>
                    会员组: {$user.rname}
                    <br/>
                    <span>
                        {$user.description}
                    </span>
				</p>
			</div>
		</div>
		<!--头部结束-->

		<!--主体-->
		<div id="main">

			<!--左侧-->
			<div class="left">
				<p class="title">
					{$user.nickname}的文章
				</p>
				<ul class="arc_list">
                    <list from="$data" name="$d">
					<li>
						<a href="{|U:'Index/Article/show',array('mid'=>1,'cid'=>$d['cid'],'aid'=>$d['aid'])}" target="_blank">
							<span>[{$d.addtime|date:'Y-m-d',@@}]</span> {$d.title|mb_substr:0,35,'utf-8'}
						</a>
					</li>
                    </list>
				</ul>
                <div class="page">
                    {$page}
                </div>
			</div>
			<!--左侧结束-->

			<!--右侧-->
			<div class="right">

				<div class="share">
					<!-- JiaThis Button BEGIN -->
					<div class="jiathis_style_32x32">
						<a class="jiathis_button_qzone"></a>
						<a class="jiathis_button_tsina"></a>
						<a class="jiathis_button_tqq"></a>
						<a class="jiathis_button_weixin"></a>
						<a class="jiathis_button_renren"></a>
						<a class="jiathis_button_fav"></a>
						<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
					</div>
					<script type="text/javascript" >
						var jiathis_config = {
							summary : "",
							shortUrl : false,
							hideMore : false
						}
					</script>
					<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
					<!-- JiaThis Button END -->
				</div>

				<p class="title">
					最近访客
				</p>
				<ul class="visitor_list">
                    <list from="$guest" name="g">
					<li>
						<a href="__ROOT__/index.php?{$g.domain}" class="face">
							<img src="__ROOT__/{$g.icon50}" alt="{$g.nickname}" />
						</a>
						<a href="__ROOT__/index.php?{$d.domain}" class="name">
							{$g.nickname}
						</a>
					</li>
                    </list>


				</ul>
			</div>
			<!--右侧结束-->

		</div>
		<!--主体结束-->
		
		 <!--底部-->
		 <div id="footer_out">
		 	<p>本网站基于国内最优秀的免费开源系统 <a href="">HDCMS</a></p>
		 	<p>All rights reserved, houdunwang.com services for Beijing 2008-2014</p>
		 </div>
		 <!--底部结束-->
		
	</body>
</html>








