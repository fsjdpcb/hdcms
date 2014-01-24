<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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