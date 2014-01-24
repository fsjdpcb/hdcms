<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo C("webname");?></title>
<meta content="<?php echo C("keywords");?>" name="keywords" />
<meta content="<?php echo C("description");?>" name="description" />
<link rel="stylesheet" type="text/css" href="http://localhost/hdcms/template/white/css/css.css" />
</head>
<body >
<!--顶部-->
<div id="doc">
	<div id="hd">
		<div class="clearfix pagetitle">
			<h1 class="sitename">
				<a href="http://localhost/hdcms" title=""><img  class="ifixpng" src="http://localhost/hdcms/template/white/img/logo.gif"  /></a>
			</h1>
			<div class="language">
				<div class="language-inner">&nbsp;</div>
				<form class="search clearfix" method="post" action="<?php echo U('Search/Search/search');?>">
					<input id="ipt-keywords" name="search" maxlength="16" class="enter" type="text" value="请输入关键字..." />
					<button class="btn" type="submit"></button>
				</form>
				</div>
		</div>
		
		<div class="clearfix sitenav">
			<div class="clearfix menu-main">
				<ul id="menuSitenav" class="clearfix">
					<li class="first-item">
			 			<a href="http://localhost/hdcms" class="home"><span>首页</span></a>
					</li>
					        <?php
        $where = '';$type=strtolower(trim('top'));$cid=str_replace(' ','','');
        if(empty($cid)){
            $cid=Q('cid',NULL,'intval');
        }
        $db = M("category");
        if ($type == 'top') {
            $where = ' pid=0 ';
        }else if($cid) {
            switch ($type) {
                case 'current':
                    $where = " cid in(".$cid.")";
                    break;
                case "son":
                    $where = " pid IN(".$cid.") ";
                    break;
                case "self":
                    $pid = $db->where(intval($cid))->getField('pid');
                    $where = ' pid='.$pid;
                    break;
            }
        }
        $result = $db->where($where)->where("cat_show=1")->order()->order("catorder DESC")->limit(10)->all();
        //无结果
        if($result){
            //当前栏目,用于改变样式
            $_self_cid = isset($_GET['cid'])?$_GET['cid']:0;
            foreach ($result as $field):
                //当前栏目样式
                $field['class']=$_self_cid==$field['cid']?"":"";
                $field['url'] = get_category_url($field['cid']);?>
					<li>
			            <a href="<?php echo $field['url'];?>" target="_self"><span><?php echo $field['catname'];?></span></a> 
					</li>
					        <?php
            endforeach;
            }
        ?>	
                </ul>
			</div>	
		</div>
	
	</div>      
</div>
  
<!--banner--> 
<div id="banner-block">
	<div class="banner-block-width"><div id="sys-banner"><div id="banner-main" class="banner banner-main"><div class="banner-inner"><a href="http://localhost/hdcms" target="_self"><img src="http://localhost/hdcms/template/white/img/6011.png" width="100%" alt="" /></a></div></div>
</div>
	</div>
</div>
    <!--中间区块-->
    <div id="content-block">
        <div class="content-block-width">
            <div id="bd">
                <div id="innerpg" class="bd-inner">
                    <!--检查这里是否为一样-->
                    <div class="clearfix layout-innerpg ">
                        <div class="col-main">
                            <div class="main-wrap">
                                <div id='article-view' class="block first-block block-article-view">
                                    <div class="block-head">
                                        <div class="head-inner">
                                            <h2 class="title">公司新闻</h2>
                                        </div>
                                    </div>
                                    <div class="block-content clearfix">
                                        <div class="article-head">
                                            <h1 class="title"><?php echo $hdcms['title'];?></h1>
                                            <div class="meta">
                                                <span class="item">作者：<span class="yellow"><?php echo $hdcms['username'];?></span></span>
                                                <span class="item">来源：<?php echo $hdcms['source'];?></span>
                                                <span class="item">发布：<span class="grey"><?php echo date('Y-m-d',$hdcms['updatetime']);?></span></span>
                                            </div>
                                        </div>
                                        <div class="article-content clearfix" style="padding-top:20px;">
                                            <?php echo $hdcms['content'];?> 
                                        </div>
                                        <style>
                                            #guanlian {
                                                width: 100%;
                                                height: 30px;
                                                border-top: 1px solid #DEDEDE;
                                            }
                                            
                                            #guanlian li {
                                                width: 50%;
                                                float: left;
                                                height: 30px;
                                                line-height: 30px;
                                                overflow: hidden;
                                            }
                                        </style>
                                        <div class="pages2" id="guanlian">
                                                    <?php
        $aid = Q('aid',NULL,'intval');
        $db = K('ContentView');
        $php = '';
        //上一篇
        $field = $db->join()->trigger()->field("aid,cid,title")->where("aid<$aid")->order("aid desc")->find();
        if ($field) {
            $url = get_content_url($field);
            $str .= "<li>上一篇: <a href='$url'>" . $field['title'] . "</a></li>";
        } else {
            $str .= "<li>上一篇: <span>没有了</span></li>";
        }
        //下一篇
        $field = $db->join()->trigger()->field("aid,cid,title")->where("aid>$aid")->order("aid asc")->find();
        if ($field) {
            $url = get_content_url($field);
            $str .= "<li>下一篇: <a href='$url'>" . $field['title'] . "</a></li>";
        } else {
            $str .= "<li>下一篇: <span>没有了</span></li>";
        }
        echo $str;
        ?>
                                        </div>
                                    </div>
                                    <div class="block-foot">
                                        <div>
                                            <div>
                                                -
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sub">
                            <div class="block first-block block-products  list-240" id="block-products-108108" rel="108108">
                                <div class="block-head">
                                    <div class="head-inner">
                                        <h2 class="title">产品分类</h2>
                                    </div>
                                </div>
                                <div class="block-content clearfix">
                                    <div class="item-list">
                                        <ul class="clearfix">
                                                    <?php
        $where = '';$type=strtolower(trim('top'));$cid=str_replace(' ','','');
        if(empty($cid)){
            $cid=Q('cid',NULL,'intval');
        }
        $db = M("category");
        if ($type == 'top') {
            $where = ' pid=0 ';
        }else if($cid) {
            switch ($type) {
                case 'current':
                    $where = " cid in(".$cid.")";
                    break;
                case "son":
                    $where = " pid IN(".$cid.") ";
                    break;
                case "self":
                    $pid = $db->where(intval($cid))->getField('pid');
                    $where = ' pid='.$pid;
                    break;
            }
        }
        $result = $db->where($where)->where("cat_show=1")->order()->order("catorder DESC")->limit(10)->all();
        //无结果
        if($result){
            //当前栏目,用于改变样式
            $_self_cid = isset($_GET['cid'])?$_GET['cid']:0;
            foreach ($result as $field):
                //当前栏目样式
                $field['class']=$_self_cid==$field['cid']?"":"";
                $field['url'] = get_category_url($field['cid']);?>
                                                <li>
                                                    <a href="<?php echo $field['url'];?>"><?php echo $field['catname'];?></a>
                                                </li>
                                                    <?php
            endforeach;
            }
        ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="block-foot">
                                    <div>
                                        <div>
                                            -
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block last-block block-articles  list-240" id="block-articles-108109" rel="108109">
                                <div class="block-head">
                                    <div class="head-inner">
                                        <h2 class="title">最新文章</h2>
                                    </div>
                                </div>
                                <div class="block-content clearfix">
                                    <div class="item-list">
                                        <ul class="clearfix">
                                                    <?php $mid="1";$cid ='0';$flag='1';$aid='';
            if(empty($cid)){
                $cid= Q('cid',NULL,'intval');
                if($cid==0){
                    $tmp = M('category')->where('mid=1')->getField('cid',true);
                    $cid=implode(',',$tmp);
                }
            }
            //去除空白
            $cid = explode(',',preg_replace('@\s@','',$cid));
            if(empty($cid))return '';
            //取一个cid为了实例化模型
            $_REQUEST['cid']=$cid[0];
            import('Content.Model.ContentViewModel');
            $db = K('ContentView');
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
                $db->limit(5);
                $field = "*,$table.cid,$table.aid";
                $db->field($field);
                $result = $db->join('category,content_flag')->order('arc_sort ASC,updatetime DESC')->all();
                if($result){
                foreach($result as $field):
                    $field['caturl']=U('category',array('cid'=>$field['cid']));
                    $field['url']=get_content_url($field);
                    $field['time']=date("Y-m-d",$field['updatetime']);
                    $field['thumb']='http://localhost/hdcms'.'/'.$field['thumb'];
                    $field['title']=mb_substr($field['title'],0,15,'utf8');
                    $field['title']=$field['color']?"<span style='color:".$field['color']."'>".$field['title']."</span>":$field['title'];
                    $field['description']=mb_substr($field['description'],0,80,'utf-8');
                ?>
                                                <li>
                                                    <a title="<?php echo strip_tags($field['title']);?>" href="<?php echo $field['url'];?>"><?php echo strip_tags($field['title']);?></a>
                                                </li>
                                            <?php endforeach;}?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="block-foot">
                                    <div>
                                        <div>
                                            -
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--底部--><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--底部-->
<div id="ft">
	<div class="ft-inner">
		<div class="ft-menu"  id="ft-menu">
			 Copyright @ 2011-2015 www.hdphp.com All Right Reserved <?php echo C("webname");?>
		</div>
		<div class="siteinfo" id="ft-siteinfo">
			<a href="http://www.houdunwang.com"></a>
		</div> 
	</div>
</div>
</body>
 <!--[if IE 6]>
<script type="text/javascript" src="http://localhost/hdcms/template/white/js/iepng.js"></script>
<script type="text/javascript">
	DD_belatedPNG.fix('*','background');
</script>
<![endif]-->
</html>