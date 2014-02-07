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