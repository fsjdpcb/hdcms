<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title><?php echo $hdcms['catname'];?>.<?php echo C("webname");?></title>
<link rel="stylesheet" href="http://localhost/hdcms/template/guanwang/css/common.css" />
<link rel="stylesheet" href="http://localhost/hdcms/template/guanwang/css/list.css" />
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
            <?php
        $type=strtolower('son');
        $cid=Q('cid',NULL,'intval');
        import('Content.Model.ContentViewModel');
        $db = K('ContentView');
        //查询条件
        switch($type){
            case 'son':
                //获得所有子栏目
                $child=Data::channelList(F('category'),$cid);
                if($child){
                    foreach($child as $c)
                        $cid.=','.$c['cid'];
                    //去除尾部逗号
                    $cid=substr($cid,0,-1);
                }
                $where=$db->tableFull.".cid In($cid) and state=1";
                break;
            case 'current':
            default:
                $where=$db->tableFull.".cid In($cid) and state=1";
        }
        $count = $db->join(NULL)->where($where)->count();
        $page= new Page($count,10);
        $result= $db->join("category")->where($where)->limit($page->limit())->all();
        if($result):
            //有结果集时处理
            foreach($result as $field):
                    $field['caturl']=U('category',array('cid'=>$field['cid']));
                    $field['url']=Url::get_content_url($field);
                    $field['thumb']='http://localhost/hdcms'.'/'.$field['thumb'];
                    $field['title']=mb_substr($field['title'],0,80,'utf8');
                    $field['title']=$field['color']?"<span style='color:".$field['color']."'>".$field['title']."</span>":$field['title'];
                    $field['time']=date("Y-m-d",$field['addtime']);
                    $field['description']=mb_substr($field['description'],0,80,'utf-8');
            ?>
      <div class="txt_box"> <a href="<?php echo $field['url'];?>" class="tit"><?php echo $field['title'];?></a>
        <p class="content"> <?php echo hd_substr($field['description'],10);?> </p>
      </div>
    <?php endforeach;endif?>
    
    <!--分页-->
    <div id="pagelist">
              <?php if(is_object($page))
            echo $page->show(2,10);
        ?>
    </div>
    <!--分页结束--> 
  </div>
  <!-- 内容区域左边盒子结束 -->
  
  <?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!-- 内容区域右边盒子开始 -->

<div class="right_box"> 
  
  <!-- 本文相关品牌车系开始 -->
  <div class="atte_box2">
    <div class="tit_public">
      <h3>推荐资讯</h3>
    </div>
    <ul>
              <?php $mid="1";$cid ='15,16,17,18,20,24,29,30,25';$flag='4,3';$aid='';
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
                $db->limit(4);
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
        <li> <a href="<?php echo $field['url'];?>" class="pic"> <img src="<?php echo $field['thumb'];?>" alt="" /> </a> <a href="<?php echo $field['url'];?>" class="name"><?php echo $field['title'];?></a> </li>
      <?php endforeach;}}?>
    </ul>
  </div>
  <!-- 本文相关品牌车系结束-->
  <div class="atte_box3">
    <div class="tit_public">
      <h3>热门资讯</h3>
    </div>
    <ul>
              <?php $mid="1";$cid ='15,16,17,18,20,21,22,23,24,26,27,29,30,25';$flag='3';$aid='';
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
                $db->limit(15);
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
      <li> <a href="<?php echo $field['url'];?>"><?php echo $field['title'];?></a></li>
      <?php endforeach;}}?>
    </ul>
  </div>
</div>
<!-- 内容区域右边盒子结束 --> 
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