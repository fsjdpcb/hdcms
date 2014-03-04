<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php echo $hdcms['title'];?></title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>

    <link href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
      <!--[if lt IE 9]>
<script type="text/javascript" src="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/html5shiv.js"></script>
<![endif]-->
    <link rel="stylesheet" href="http://localhost/hdcms/template/hdphp/css/article.css"/>
</head>
<body>
<div id="top">
    <div class="nav">
        <ul class="site-nav">
                        <?php
            $nid='';
            $db = M('navigation');
            if($nid){
                $db->where='nid IN('.$nid.')';
            }
            $result = $db->order('list_order ASC,nid DESC')->where('state=1')->all();
            if($result):
                foreach($result as $field):
                  $field['url']=str_ireplace('[ROOT]','http://localhost/hdcms',$field['url']);
                  $field['link']='<a href="'.$field['url'].'" target="'.$field['target'].'">'.$field['title'].'</a>';
                ?>
                <li>
                    <a href='<?php echo $field['url'];?>'><?php echo $field['title'];?></a>
                </li>
            <?php endforeach;endif;?>
        </ul>
        <ul class="log">
            <li>
                <a id="login-link" href="http://segmentfault.com/user/login">登录</a>
            </li>
            <li>
                <a href="http://segmentfault.com/user/register">注册</a>
            </li>
        </ul>
    </div>
</div>
<!--顶部-->
<div id="wrap">
    <div class="content">
        <h1>
            <?php echo $hdcms['title'];?>
        </h1>
        <div class="info">
            <a href="#" class="author"><?php echo $hdcms['author'];?></a>
            <!--帐号信息-->
            <div id="user_info" style="display: none;">
                <img src="image/face.jpg"/><b>df</b>
            </div>
            ·
            <span>浏览：<?php echo $hdcms['click'];?> 发布日期：<?php echo $hdcms['time'];?> </span>
            <span>分类：</span> <a href=""><?php echo $hdcms['catname'];?></a>
            <a class="reply" href="#content">回复</a>
        </div>
        <p>
            <?php echo $hdcms['content'];?>
        </p>
    </div>
    <div class="list-right">
        <div class="wrap">
            <h3>热点推荐</h3>
            <ul>
                <li>
                    <a href="">github中可以访问系统粘贴板里的图片是怎么实现的？</a>
                    <span>1小时前</span>
                </li>
                <li>
                    <a href="">github中可以访问系统粘贴板里的图片是怎么实现的？</a>
                    <span>1小时前</span>
                </li>
                <li>
                    <a href="">github中可以访问系统粘贴板里的图片是怎么实现的？</a>
                    <span>1小时前</span>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>