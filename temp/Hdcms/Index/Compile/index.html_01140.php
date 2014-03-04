<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php echo C("webname");?></title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>

    <link href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
      <!--[if lt IE 9]>
<script type="text/javascript" src="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/html5shiv.js"></script>
<![endif]-->
    <link rel="stylesheet" href="http://localhost/hdcms/template/hdphp/css/index.css"/>
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

    <div class="list-article">
        <div id="ad">HDPHP.COM是开源技术交流与HDPHP及HDCMS项目交流平台</div>
        <div class="gbtitle">
            <h4>动态</h4>
            <div class="recos">
                <ul>
                            <?php $mid="1";$cid ='3';$flag='';$aid='';
            //没有设置栏目属性时取get值
            if(empty($cid)){
                $cid= Q('cid',NULL,'intval');
            }
            //没有设置属性也没有$_GET['cid']时取所有栏目
            if(empty($cid)){
                $tmp = M('category')->where('mid=1')->getField('cid',true);
                if($tmp)
                    $cid=implode(',',$tmp);
            }
            //存在栏目时进行数据读取操作
            if($cid){
            $cid = explode(',',preg_replace('@\s@','',$cid));
            //取一个cid为了实例化模型
            import('Content.Model.ContentViewModel');
            $db = K('ContentView',array('cid'=>$cid[0]));
                //主表
                $table=$db->tableFull;
                if(!empty($flag)){
                    $db->in(array("fid" => $flag));
                }
                $db->where = $table.'.cid in('.implode(',',$cid).')';
                //指定文章
                if ($aid) {
                    $db->where=$table.'.aid IN('.$aid.')';
                }
                $db->where=$table.'.state=1';
                $db->group=$table.'.aid';
                $db->limit(3);
                $field = "*,$table.cid,$table.aid";
                $db->field($field);
                $result = $db->join('category,content_flag')->order('arc_sort ASC,updatetime DESC')->all();

                if($result){
                    foreach($result as $index=>$field):
                        $field['index']=$index+1;
                        $field['caturl']=U('category',array('cid'=>$field['cid']));
                        $field['url']=Url::get_content_url($field);
                        $field['time']=date("Y-m-d",$field['updatetime']);
                        $field['thumb']='http://localhost/hdcms'.'/'.$field['thumb'];
                        $field['title']=mb_substr($field['title'],0,80,'utf8');
                        $field['title']=$field['color']?"<span style='color:".$field['color']."'>".$field['title']."</span>":$field['title'];
                        $field['description']=mb_substr($field['description'],0,80,'utf-8');
                ?>
                        <li>
                            <a href='<?php echo $field['url'];?>'><?php echo $field['title'];?></a>
                        </li>
                    <?php endforeach;}}?>
                </ul>
            </div>
        </div>
        <div class="tab-nav">
            <a href="" class="current">最新的</a>
            <a href="">最热的</a>
        </div>
        <div class="article">
            <ul>
                <li class="list">
                    <div class="pic">
                        <img src="http://localhost/hdcms/template/hdphp/image/pic.png" alt=""/>
                    </div>
                    <div class="content">
                        <h2 class="title">
                            <a href="">Web Debelopment with Clojure CH2（1） —— 简介 &amp; Ring</a>
                        </h2>

                        <div class="info">
                            <a href="">
                                <i class="focus"></i> 7小时前
                            </a>
                            &nbsp;
                            <a href="">
                                <i class="comment"></i>8条评论
                            </a>
                        </div>
                    </div>
                    <div class="article-right">
                        <ul>
                            <li>
                                <i class="collection"></i> 1&nbsp;收藏
                            </li>
                            <li>
                                <i class="browse"></i>89&nbsp;浏览
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="list-right">
        <div class="wrap">
            <h3>热门收藏</h3>
            <ul>
                <li>
                    <a href="">github中可以访问系统粘贴板里的图片是怎么实现的？</a>
                    <span>10个回答</span>
                </li>
                <li>
                    <a href="">github中可以访问系统粘贴板里的图片是怎么实现的？</a>
                    <span>10个回答</span>
                </li>
                <li>
                    <a href="">github中可以访问系统粘贴板里的图片是怎么实现的？</a>
                    <span>10个回答</span>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--底部-->
<div id="footer">



		Power By <a href="http://www.hdphp.com">HDPHP</a> &
    <a href="http://www.hdcms.com">HDCMS</a>
&nbsp;&nbsp;
备案号：<?php echo C("icp");?>  &nbsp;&nbsp;
本站由
<a target="_blank" href="https://www.houdunwang.com">后盾网</a>
提供技术支持。
</div>

</body>
</html>