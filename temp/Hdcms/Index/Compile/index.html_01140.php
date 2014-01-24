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
</div><!--中间区块-->
<h1>-------------标签测试开始--------------</h1>
<hr/>
<h1>------channel[手册标签调用写错了 $filed:url]------</h1>
<ul>
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
        $result = $db->where($where)->where("cat_show=1")->order()->order("catorder DESC")->limit(8)->all();
        //无结果
        if($result){
            //当前栏目,用于改变样式
            $_self_cid = isset($_GET['cid'])?$_GET['cid']:0;
            foreach ($result as $field):
                //当前栏目样式
                $field['class']=$_self_cid==$field['cid']?"":"";
                $field['url'] = get_category_url($field['cid']);?>
	<li><a href='<?php echo $field['url'];?>'><?php echo $field['catname'];?></a> </li> 
        <?php
            endforeach;
            }
        ?>
</ul>
<h1>------arclist[调用没有效果,手册写错误，标签闭合写成了 {]------</h1>
<ul>
        <?php $mid="1";$cid ='0';$flag='';$aid='';
            if(empty($cid)){
                $cid= Q('cid',NULL,'intval');
                if($cid){
                    $tmp = M('category')->where('mid=1')->getField('cid',true);
                    if($tmp)
                        $cid=implode(',',$tmp);
                }
            }
            //去除空白
            if($cid){
            $cid = explode(',',preg_replace('@\s@','',$cid));
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
                $db->limit(10);
                $field = "*,$table.cid,$table.aid";
                $db->field($field);
                $result = $db->join('category,content_flag')->order('arc_sort ASC,updatetime DESC')->all();
                if($result){
                foreach($result as $field):
                    $field['caturl']=U('category',array('cid'=>$field['cid']));
                    $field['url']=get_content_url($field);
                    $field['time']=date("Y-m-d",$field['updatetime']);
                    $field['thumb']='http://localhost/hdcms'.'/'.$field['thumb'];
                    $field['title']=mb_substr($field['title'],0,80,'utf8');
                    $field['title']=$field['color']?"<span style='color:".$field['color']."'>".$field['title']."</span>":$field['title'];
                    $field['description']=mb_substr($field['description'],0,80,'utf-8');
                ?>
	<a href='<?php echo $field['url'];?>'><?php echo $field['title'];?></a>
<?php endforeach;}}?>
</ul>
<h1>------single[调用结果如下，手册写错误，标签闭合写成了{]------</h1>
        $db = M("content_single");
        $db->where = "aid IN (5)";
        $result = $db->order("arc_sort ASC,aid DESC")->all();
        foreach ($result as $field):
            $field['url'] = get_single_url($field);
            $field['time'] = date("Y-m-d", $field['updatetime']);
            $field['thumb'] = 'http://localhost/hdcms' . '/' . $field['thumb'];
            $field['title'] = $field['color'] ? "<span style='color:" . $field['color'] . "'>" . $field['title'] . "</span>" : $field['title'];
            $php .= 
	<a href='<?php echo $field['url'];?>'><?php echo $field['title'];?></a>
;
        endforeach;
<h1>------nav[没有效果]------</h1>
            <?php
            $nid='1,2,3';
            $db = M('navigation');
            if($nid){
                $db->where='nid IN('.$nid.')';
            }
            $result = $db->order('list_order ASC,nid DESC')->where('state=1')->all();
            if($result):
                foreach($result as $field):
                  $field['link']='<a href="'.$field['url'].'" target="'.$field['target'].'">'.$field['title'].'</a>';
                ?>
	<a href='<?php echo $field['url'];?>'><?php echo $field['title'];?></a>
<?php endforeach;endif;?>
<h1>------searchkey[后台没有找到添加搜索关键词的地方]------</h1>
                <?php
                $db = M("search");
                $result = $db->limit(10)->all();
                if(!empty($result)):
                foreach($result as $field):
                $field['url']='http://localhost/hdcms/index.php?a=Search&c=Search&m=search&search='.$field['name'];
                ?><?php echo $field['name'];?></a>
<?php endforeach;endif;?>



































<hr/>
<h1>-------------标签测试结束--------------</h1>
<div id="content-block">
    <div class="content-block-width">
        <div id="bd">
            <div id="homepg" class="bd-inner">
                <!--检查这里是否为一样-->
                <div class="clearfix layout-home three-cols">
                    <div class="col-main">
                        <div class="main-wrap">
                            <div class="block first-block block-diy " id="block-diy-108092" rel="108092">
                                <div class="block-head">
                                    <div class="head-inner">
                                        <h2 class="title">关于我们</h2>
                                    </div>
                                </div>
                                <div class="block-content clearfix">
                                    <div class="content-text">
                                        <p align="justify">
                                            <p align="left">
                                                <?php echo C("description");?>
                                                <br/>
                                                <br/>
                                                <br/>
                                                <br/>
                                            </p>
                                        </p>
                                    </div>
                                </div>
                                <div class="block-foot">
                                    <div>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block last-block block-products list-410" id="block-products-108103" rel="108103">
                                <div class="block-head">
                                    <div class="head-inner">
                                        <h2 class="title">产品展示</h2>
                                        <div class="links">
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
        $result = $db->where($where)->where("cat_show=1")->order()->order("catorder DESC")->limit(1)->all();
        //无结果
        if($result){
            //当前栏目,用于改变样式
            $_self_cid = isset($_GET['cid'])?$_GET['cid']:0;
            foreach ($result as $field):
                //当前栏目样式
                $field['class']=$_self_cid==$field['cid']?"":"";
                $field['url'] = get_category_url($field['cid']);?>
                                                <a class="more" href="<?php echo $field['url'];?>">更多</a>
                                                    <?php
            endforeach;
            }
        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-content clearfix">
                                    <ul class="list-gallery clearfix">
                                                <?php $mid="1";$cid ='12';$flag='';$aid='';
            if(empty($cid)){
                $cid= Q('cid',NULL,'intval');
                if($cid){
                    $tmp = M('category')->where('mid=1')->getField('cid',true);
                    if($tmp)
                        $cid=implode(',',$tmp);
                }
            }
            //去除空白
            if($cid){
            $cid = explode(',',preg_replace('@\s@','',$cid));
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
                $db->limit(10);
                $field = "*,$table.cid,$table.aid";
                $db->field($field);
                $result = $db->join('category,content_flag')->order('arc_sort ASC,updatetime DESC')->all();
                if($result){
                foreach($result as $field):
                    $field['caturl']=U('category',array('cid'=>$field['cid']));
                    $field['url']=get_content_url($field);
                    $field['time']=date("Y-m-d",$field['updatetime']);
                    $field['thumb']='http://localhost/hdcms'.'/'.$field['thumb'];
                    $field['title']=mb_substr($field['title'],0,5,'utf8');
                    $field['title']=$field['color']?"<span style='color:".$field['color']."'>".$field['title']."</span>":$field['title'];
                    $field['description']=mb_substr($field['description'],0,80,'utf-8');
                ?>
                                            <li>
                                                <div class="thumb">
                                                    <a href="<?php echo $field['url'];?>"><img src="<?php echo $field['thumb'];?>" alt="<?php echo strip_tags($field['title']);?>" width="100%" height="100%" /></a>
                                                </div>
                                                <div class="des">
                                                    <p class="default">
                                                        <a href="<?php echo $field['url'];?>"><?php echo strip_tags($field['title']);?></a>
                                                    </p>
                                                </div>
                                            </li>
                                        <?php endforeach;}}?>
                                    </ul>
                                </div>
                                <div class="block-foot">
                                    <div>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sub">
                        <div class="block first-block block-products  list-270" id="block-products-108101" rel="108101">
                            <div class="block-head">
                                <div class="head-inner">
                                    <h2 class="title">产品分类</h2>
                                </div>
                            </div>
                            <div class="block-content clearfix">
                                <div class="item-list">
                                    <ul class="clearfix">
                                                <?php
        $where = '';$type=strtolower(trim('son'));$cid=str_replace(' ','','11');
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
                        <div class="block last-block block-diy list-270" id="block-diy-108102" rel="108102">
                            <div class="block-head">
                                <div class="head-inner">
                                    <h2 class="title">联系我们</h2>
                                </div>
                            </div>
                            <div class="block-content clearfix">
                                <div class="content-text">
                                    <div style="color:#3C3C3C;">
                                        <span style="white-space:nowrap;">QQ：<?php echo C("qq");?></span>
                                        <br/>
                                        <span style="white-space:nowrap;">新浪微博：<?php echo C("weibo");?></span>
                                        <br/>
                                        <span style="white-space:nowrap;">邮箱：<?php echo C("email");?></span>
                                        <br/>
                                        <span style="white-space:nowrap;">联系电话:<?php echo C("tel");?></span>
                                        <br/>
                                    </div>
                                </div>
                            </div>
                            <div class="block-foot">
                                <div>
                                    <div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-extra">
                        <div class="block first-block block-articles list-250" id="block-articles-108093" rel="108093">
                            <div class="block-head">
                                <div class="head-inner">
                                    <h2 class="title">最新资讯</h2>
                                </div>
                            </div>
                            <div class="block-content clearfix">
                                <div class="item-list">
                                    <ul class="clearfix">
                                                <?php $mid="1";$cid ='0';$flag='4';$aid='';
            if(empty($cid)){
                $cid= Q('cid',NULL,'intval');
                if($cid){
                    $tmp = M('category')->where('mid=1')->getField('cid',true);
                    if($tmp)
                        $cid=implode(',',$tmp);
                }
            }
            //去除空白
            if($cid){
            $cid = explode(',',preg_replace('@\s@','',$cid));
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
                $db->limit(10);
                $field = "*,$table.cid,$table.aid";
                $db->field($field);
                $result = $db->join('category,content_flag')->order('arc_sort ASC,updatetime DESC')->all();
                if($result){
                foreach($result as $field):
                    $field['caturl']=U('category',array('cid'=>$field['cid']));
                    $field['url']=get_content_url($field);
                    $field['time']=date("Y-m-d",$field['updatetime']);
                    $field['thumb']='http://localhost/hdcms'.'/'.$field['thumb'];
                    $field['title']=mb_substr($field['title'],0,80,'utf8');
                    $field['title']=$field['color']?"<span style='color:".$field['color']."'>".$field['title']."</span>":$field['title'];
                    $field['description']=mb_substr($field['description'],0,80,'utf-8');
                ?>
                                            <li>
                                                <a title="<?php echo strip_tags($field['title']);?>" href="<?php echo $field['url'];?>"><?php echo strip_tags($field['title']);?></a>
                                            </li>
                                        <?php endforeach;}}?>
                                    </ul>
                                </div>
                            </div>
                            <div class="block-foot">
                                <div>
                                    <div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block last-block block-articles  list-250" id="block-articles-108104" rel="108104">
                            <div class="block-head">
                                <div class="head-inner">
                                    <h2 class="title">热门文章</h2>
                                    <div class="links">
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
        $result = $db->where($where)->where("cat_show=1")->order()->order("catorder DESC")->limit(1)->all();
        //无结果
        if($result){
            //当前栏目,用于改变样式
            $_self_cid = isset($_GET['cid'])?$_GET['cid']:0;
            foreach ($result as $field):
                //当前栏目样式
                $field['class']=$_self_cid==$field['cid']?"":"";
                $field['url'] = get_category_url($field['cid']);?>
                                            <a class="more" href="<?php echo $field['url'];?>">更多</a>
                                                <?php
            endforeach;
            }
        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content clearfix">
                                <div class="item-list">
                                    <ul class="clearfix">
                                                <?php $mid="1";$cid ='0';$flag='1';$aid='';
            if(empty($cid)){
                $cid= Q('cid',NULL,'intval');
                if($cid){
                    $tmp = M('category')->where('mid=1')->getField('cid',true);
                    if($tmp)
                        $cid=implode(',',$tmp);
                }
            }
            //去除空白
            if($cid){
            $cid = explode(',',preg_replace('@\s@','',$cid));
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
                                        <?php endforeach;}}?>
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
                    <div class="main-layout clearfix">
                        <div class="block first-block block-products list-960" id="block-products-108105" rel="108105">
                            <div class="block-head">
                                <div class="head-inner clearfix">
                                    <h2 class="title">最新产品</h2>
                                    <div class="links">
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
        $result = $db->where($where)->where("cat_show=1")->order()->order("catorder DESC")->limit(1)->all();
        //无结果
        if($result){
            //当前栏目,用于改变样式
            $_self_cid = isset($_GET['cid'])?$_GET['cid']:0;
            foreach ($result as $field):
                //当前栏目样式
                $field['class']=$_self_cid==$field['cid']?"":"";
                $field['url'] = get_category_url($field['cid']);?>
                                            <a class="more" href="<?php echo $field['url'];?>">更多</a>
                                                <?php
            endforeach;
            }
        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content clearfix">
                                <div class="sys-scroll-left-wrap">
                                    <div class="sys-scroll-left" id="sys-scroll-left-108105">
                                        <table>
                                            <tr>
                                                <td id="sys-scroll-left-108105-a" class="sys-scroll-left-a">
                                                    <table>
                                                        <tr>
                                                                    <?php $mid="1";$cid ='0';$flag='';$aid='';
            if(empty($cid)){
                $cid= Q('cid',NULL,'intval');
                if($cid){
                    $tmp = M('category')->where('mid=1')->getField('cid',true);
                    if($tmp)
                        $cid=implode(',',$tmp);
                }
            }
            //去除空白
            if($cid){
            $cid = explode(',',preg_replace('@\s@','',$cid));
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
                $db->limit(6);
                $field = "*,$table.cid,$table.aid";
                $db->field($field);
                $result = $db->join('category,content_flag')->order('arc_sort ASC,updatetime DESC')->all();
                if($result){
                foreach($result as $field):
                    $field['caturl']=U('category',array('cid'=>$field['cid']));
                    $field['url']=get_content_url($field);
                    $field['time']=date("Y-m-d",$field['updatetime']);
                    $field['thumb']='http://localhost/hdcms'.'/'.$field['thumb'];
                    $field['title']=mb_substr($field['title'],0,80,'utf8');
                    $field['title']=$field['color']?"<span style='color:".$field['color']."'>".$field['title']."</span>":$field['title'];
                    $field['description']=mb_substr($field['description'],0,80,'utf-8');
                ?>
                                                                <td>
                                                                    <div class="thumb">
                                                                        <a href="<?php echo $field['url'];?>" title="<?php echo $field['title'];?>"><img src="<?php echo $field['thumb'];?>"/></a>
                                                                    </div>
                                                                    <div class="title">
                                                                        <a href="<?php echo $field['url'];?>" title="<?php echo $field['title'];?>"><?php echo $field['title'];?></a>
                                                                    </div>
                                                                </td>
                                                            <?php endforeach;}}?>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td id="sys-scroll-left-108105-b" class="sys-scroll-left-b">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="block-foot">
                                <div>
                                    <div>
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