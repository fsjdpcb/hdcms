<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title><?php echo $hdcms['title'];?>_<?php echo C("webname");?></title>
<link rel="stylesheet" href="http://localhost/hdcms/template/guanwang/css/common.css" />
<link rel="stylesheet" href="http://localhost/hdcms/template/guanwang/css/kechengpage.css" />
</head>
<body>
<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!-- 头部开始 -->
<div id="head">
  <div class="head_box"> 
    <!-- logo开始 -->
    <div class="logo"> <a href=""> <img src="http://localhost/hdcms/template/guanwang/images/279_4957059228_20131008114748.jpg" alt="" /> </a> </div>
    <!-- logo结束 -->
    <ul>
      <li><a href="http://localhost/hdcms">首页</a></li>
      <li><a href="http://vip.houdunwang.com/" target="_blank">抢购VIP</a></li>
      <li><a href="http://localhost/hdcms/index.php?a=Index&amp;c=Category&amp;m=category&amp;cid=19">学员作品</a></li>
      <li><a href="http://localhost/hdcms/index.php?a=Index&c=Article&m=content&cid=31&aid=179">课程介绍</a></li>
      <li><a href="http://localhost/hdcms/index.php?a=Index&c=Article&m=content&cid=31&aid=166">报名流程</a></li>
      <li><a href="http://localhost/hdcms/index.php?a=Index&c=Article&m=content&cid=31&aid=167">联系我们</a></li>
      <li><a href="http://localhost/hdcms/index.php?a=Index&c=Article&m=content&cid=31&aid=168">ITAT教育工程</a></li>
      <li><a href="http://bbs.houdunwang.com" target="_blank">论坛</a></li>
<!--      <li><a href="">学员评价</a></li>-->
    </ul>
  </div>
</div>
<!-- 头部结束 --> 
<!-- 头部下方灰色导航条 -->
<div class="nav_box">
  <p>三分钟让你了解后盾 四个月让你感谢后盾 一辈子让你感恩后盾！</p>
</div>
<!-- 头部下方灰色导航条结束	 --> 

<!-- 内容区域大盒子开始 -->
<div id="content"> 
  
  <!-- 内容区域左边盒子开始 -->
  <div class="left_box">
    <h3><?php echo $hdcms['title'];?></h3>
    <!--<div class="time"> <?php echo date('Y-m-d',$field['time']);?></div>-->
    <div class="con_box"> <?php echo $hdcms['content'];?> 
      
      <!--百度分享-->
      <div class="fenxiang"> 
        <!-- JiaThis Button BEGIN -->
        <div class="jiathis_style_32x32"> <a class="jiathis_button_qzone"></a> <a class="jiathis_button_tsina"></a> <a class="jiathis_button_tqq"></a> <a class="jiathis_button_renren"></a> <a class="jiathis_button_kaixin001"></a> <a class="jiathis_button_weixin"></a> <a class="jiathis_button_fav"></a> <a class="jiathis_button_douban"></a> <a class="jiathis_button_cqq"></a> <a class="jiathis_button_meilishuo"></a> <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a> <a class="jiathis_counter_style"></a> </div>
        <script type="text/javascript" >
var jiathis_config={
	summary:"",
	shortUrl:false,
	hideMore:false
}
</script> 
        <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script> 
        <!-- JiaThis Button END --> 
        
      </div>
      <!--百度分享结束--> 
    </div>
  </div>
  <!-- 内容区域左边盒子结束 --> 
  
</div>
<!-- 内容区域大盒子结束 -->

<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!-- 页脚开始 -->

<div class="footer">
  <div class="title_box"></div>
  <div class="copyright"> 版权所有：后盾网 京ICP备12048441号-3 <br />
    All rights reserved, houdunwang.com services for Beijing 2008-2014 
    <script src="http://s15.cnzz.com/stat.php?id=2297926&web_id=2297926" language="JavaScript"></script> 
    
    <!--流量统计--> 
    <script language="javascript" type="text/javascript" src="http://js.users.51.la/14829824.js"></script>
    <noscript>
    <a href="http://www.51.la/?14829824" target="_blank"><img alt="&#x6211;&#x8981;&#x5566;&#x514D;&#x8D39;&#x7EDF;&#x8BA1;" src="http://img.users.51.la/14829824.asp" style="border:none" /></a>
    </noscript>
    <!--流量统计--> 
    
  </div>
</div>
<!-- 页脚结束 --> 

<!--53客服--> 
<script type='text/javascript' src='http://chat.53kf.com/kf.php?arg=houdunwang&style=1'></script> 
<!--53客服-->
</body>
</html>