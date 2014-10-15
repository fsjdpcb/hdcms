<?php

/**
 * HDCMS标签库
 * Class ContentTag
 * @author hdxj <houdunwangxj@gmail.com>
 */
class ContentTag
{
    public $tag = array(
        'tag' => array('block' => 1, 'level' => 4),
        'channel' => array('block' => 1, 'level' => 4),
        'schannel' => array('block' => 1, 'level' => 4),
        'arclist' => array('block' => 1, 'level' => 4),
        'pagelist' => array('block' => 1, 'level' => 4),
        'pageshow' => array('block' => 0),
        'pagenext' => array('block' => 0),
        'location' => array('block' => 0),
        'user' => array('block' => 1, 'level' => 4),
    );

    //显示标签云
    public function _tag($attr, $content)
    {
        $type = isset($attr['type']) ? $attr['type'] : 'hot';
        $row = isset($attr['row']) ? intval($attr['row']) : 10;
        $php = <<<str
        <?php
        \$type= '$type';
        \$row =$row;
        \$db=M('tag');
        switch(\$type){
            case 'new':
                \$result = \$db->order('tid DESC')->limit(\$row)->all();
                break;
			case 'hot':
			default:
                \$result = \$db->order('total DESC')->limit(\$row)->all();
                break;
        }
        foreach(\$result as \$field):
            \$field['url']=U('Search/Index/index',array('g'=>'Addons','type'=>'tag','wd'=>\$field['tag']));
        ?>
str;
        $php .= $content;
        $php .= "<?php endforeach;?>";
        return $php;
    }

    //子栏目
    public function _schannel($attr,$content){
        $cid= $attr['cid'];
        $row=$attr['row'];
$php=<<<str
        <?php
        \$result = \$db->where("pid=$cid")->where("cat_show=1")->order("catorder ASC")->limit($row)->all();
        if(\$result){
            foreach (\$result as \$sfield):
                //当前栏目样式
                \$sfield['caturl'] = Url::getCategoryUrl(\$sfield);
                \$sfield['catimage']='__ROOT__'.\$sfield['catimage'];
                \$sfield['target'] = \$sfield['cattype']==3?' target="_blank" ':' target="_self" ';
            ?>
str;
        $php .= $content;
        $php .= '<?php endforeach;}?>';
        return $php;

    }
    //栏目标签
    public function _channel($attr, $content)
    {
        //类型  top 顶级 son 下级 self同级 current 指定的栏目
        $type = isset($attr['type']) ? $attr['type'] : "self";
        //显示条数
        $row = isset($attr['row']) ? $attr['row'] : 10;
        //指定的栏目cid
        $cid = isset($attr['cid']) ? ($attr['cid'][0]=='$'?$attr['cid']:"'{$attr['cid']}'") : 0;
        //当前栏目的class样式
        $class = isset($attr['class']) ? $attr['class'] : '';
        $php = <<<str
        <?php
        \$where = '';
        \$type=strtolower(trim('$type'));
        \$cid=str_replace(' ','',$cid);
        if(empty(\$cid)){
            \$cid=Q('cid',0,'intval');
        }
        \$db = M("category");
        \$categoryCache =S('category');
        if (\$type == 'top') {
            \$where['pid']=array('EQ',0);
        }else if(\$cid) {
            switch (\$type) {
                case 'current':
                    \$where['cid'] =array('IN',\$cid);
                    break;
                case "son":
                    \$where['pid'] =array('IN',\$cid);
                    break;
                case "self":
                    \$map['cid']=array('IN',array(\$cid));
                    \$pid = \$db->where(\$map)->getField('pid');
                    \$where['pid'] =array('IN',array(\$pid));
                    break;
            }
        }
        \$result = \$db->where(\$where)->where("cat_show=1")->order("catorder ASC")->limit($row)->all();
        if(\$result){
            //当前栏目,用于改变样式
            \$_self_cid = Q('cid',0,'intval');
            foreach (\$result as \$index=>\$field):
                \$field['_index']=\$index;
                \$field['_first']=\$index==0?true:false;
                \$field['_last']=\$index==(count(\$result)-1)?true:false;
                \$field['class']=\$_self_cid==\$field['cid']?"$class":'';
                \$field['caturl'] = Url::getCategoryUrl(\$field);
                \$field['catimage']='__ROOT__'.\$field['catimage'];
                \$field['target'] = \$field['cattype']==3?' target="_blank" ':' target="_self" ';
            ?>
str;
        $php .= $content;
        $php .= '<?php endforeach;}
                    unset($where);unset($result);unset($field);
                ?>';
        return $php;
    }


    //文章列表
    public function _arclist($attr, $content)
    {
        $cid = isset($attr['cid']) ? ($attr['cid'][0]=='$'?$attr['cid']:"'{$attr['cid']}'") : 0;
        $aid = isset($attr['aid']) ? trim($attr['aid']) : '';
        $mid = isset($attr['mid']) ? trim($attr['mid']) : '';
        $row = isset($attr['row']) ? trim($attr['row']) : 10;
        //简单长度
        $infolen = isset($attr['infolen']) ? trim($attr['infolen']) : 80;
        //标题长度
        $titlelen = isset($attr['titlelen']) ? trim($attr['titlelen']) : 80;
        //属性
        $flag = isset($attr['flag']) ? trim($attr['flag']) : '';
        //排序
        $order = isset($attr['order']) ? strtolower(trim($attr['order'])) : '';
        //排序属性
        $noflag = isset($attr['noflag']) ? trim($attr['noflag']) : '';
        //获取副表字段
        $subtable = isset($attr['subtable']) ? trim($attr['subtable']) : 0;
        //相关文章
        $relative = isset($attr['relative']) ? trim($attr['relative']) : 0;
        //获取子栏目文章
        $son_channel = isset($attr['son_channel']) ? trim($attr['son_channel']) : 0;
        $php = <<<str
        <?php
            \$categoryCache=S('category');
            \$mid='$mid';//模型mid
            \$mid = \$mid?intval(\$mid):Q('mid',1,'intval');
            \$cid =$cid;
            \$cid = \$cid?explode(',',str_replace(' ','',\$cid)):array(Q('cid',0,'intval'));
            //如果有栏目取栏目的mid为\$mid值
            if(\$cid && isset(\$categoryCache[current(\$cid)]['mid'])){
                \$mid=\$categoryCache[current(\$cid)]['mid'];
            }
            \$subtable =$subtable;//获取子表字段
            \$order ='$order';
            \$flag='$flag';//有此flag
            \$noflag='$noflag';//除了flag
            \$aid='$aid';
            \$son_channel=$son_channel;//包含子栏目数据
            \$relative='$relative';//相关文章
            //导入模型类
            \$db =ContentViewModel::getInstance(\$mid);
            //不获取副表字段
			if(empty(\$subtable)){
				\$db->relation(\$db->table.',category,user');
			}
            //---------------------------排序类型-------------------------------
            if(\$order){
                switch(\$order){
                    case 'hot':
                        //查看次数最多
                        \$db->order('click DESC');
                        break;
                    case 'rand':
                        //随机排序
                        \$db->order('rand()');
                        break;
                    default:
                        \$order= str_replace('aid', \$db->table.'.aid', \$order);
                        \$order= str_replace('cid', 'category.cid', \$order);
                        \$db->order(\$order);
                }
            }else{
                \$db->order('arc_sort ASC,updatetime DESC');
            }
            //---------------------------查询条件-------------------------------
                \$where=array();
                //相关文章
                if(\$relative){
                    //与本文相关的，按标签相关联的
                    if(\$currentAid=Q('aid',0,'intval')){
                        \$_tag = M('content_tag')->field('tid')->where("mid=\$mid AND aid=\$currentAid")->all();
                        if(\$_tag){
                            \$_tid=array();
                            foreach(\$_tag as \$tid){
                                \$_tid['tid'][]=\$tid['tid'];
                            }
                            \$_result = M('content_tag')->field('aid')->where(\$_tid)->where("aid <>\$currentAid")->group('aid')->limit($row)->all();
                            if(!empty(\$_result)){
                                \$_tag_aid=array();
                                foreach(\$_result as \$d){
                                    \$_tag_aid[]=\$d['aid'];
                                }
                                \$db->where(\$db->table.".aid IN(".implode(',',\$_tag_aid).")");
                            }
                        }
                    }
                }
                //子栏目处理
                if(!empty(\$cid)){
                    //查询条件
                    if(\$son_channel){
                        \$category=array();
                        foreach(\$cid as \$_cid){
                            \$_tmp = getCategory(\$_cid);
                            \$category=array_merge(\$category,\$_tmp);
                        }
                        \$where[]="category.cid IN(".implode(',',\$category).")";
                    }else{
                        \$where[]="category.cid IN(".implode(',',\$cid).")";
                    }
                }
                //指定筛选属性flag='1,2,3'时,获取指定属性的文章
		        if(\$flag){
		            \$flagCache =S('flag'.\$mid);
		            \$flag = explode(',',\$flag);
		            foreach(\$flag as \$f){
		                \$f=\$flagCache[\$f-1];
		                \$where[]="find_in_set('\$f',flag)";
		            }
		        }
		        //排除flag
		        if(\$noflag){
		            \$flagCache =S('flag'.\$mid);
		            \$noflag = explode(',',\$noflag);
		            foreach(\$noflag as \$f){
		                \$f=\$flagCache[\$f-1];
		                \$where[]="!find_in_set('\$f',flag)";
		            }
		        }
                //指定文章
                if (\$aid) {
                    \$where[]=\$db->table.".aid IN(\$aid)";
                }
                //已经审核的文章
                \$where[]='content_status=1';
                //---------------------------------指定显示条数--------------------------------------
                \$db->limit($row);
                //-----------------------------------获取数据----------------------------------------
                \$result = \$db->where(\$where)->all();
                if(\$result):
                    foreach(\$result as \$index=>\$field):
                        \$field=\$db->formatField(\$field);
                        \$field['_index']=\$index;
                        \$field['_first']=\$index==0?true:false;
                        \$field['_last']=\$index==(count(\$result)-1)?true:false;
                        \$field['title']=mb_substr(\$field['title'],0,$titlelen,'utf8');
                        \$field['title']=\$field['color']?"<span style='color:".\$field['color']."'>".\$field['title']."</span>":\$field['title'];
                        \$field['description']=mb_substr(\$field['description'],0,$infolen,'utf-8');
                         if(\$field['new_window'] || \$field['redirecturl']){
                        	\$field['link']='<a href="'.\$field['url'].'" target="_blank">'.\$field['title'].'</a>';
						}else{
							\$field['link']='<a href="'.\$field['url'].'">'.\$field['title'].'</a>';
						}
                ?>
str;
        $php .= $content;
        $php .= '<?php endforeach;endif;
                    unset($where);
                ?>';
        return $php;
    }

    //分页列表
    public function _pagelist($attr, $content)
    {
        $cid = isset($attr['cid']) ? trim($attr['cid']) : '';
        $aid = isset($attr['aid']) ? trim($attr['aid']) : '';
        $mid = isset($attr['mid']) ? intval($attr['mid']) : '';
        $row = isset($attr['row']) ? intval($attr['row']) : 10;
        //简单长度
        $infolen = isset($attr['infolen']) ? intval($attr['infolen']) : 80;
        //标题长度
        $titlelen = isset($attr['titlelen']) ? intval($attr['titlelen']) : 80;
        //属性
        $flag = isset($attr['flag']) ? trim($attr['flag']) : '';
        //排序
        $order = isset($attr['order']) ? trim($attr['order']) : '';
        //排序属性
        $noflag = isset($attr['noflag']) ? trim($attr['noflag']) : '';
        //获取副表字段
        $subtable = isset($attr['subtable']) ? intval($attr['subtable']) : 0;
        //获取子栏目文章
        $sub_channel = isset($attr['sub_channel']) ? intval($attr['sub_channel']) : 1;
        $php = <<<str
        <?php
            \$mid='$mid';\$cid ='$cid';
            \$subtable =$subtable;\$order ='$order';
            \$flag='$flag';\$noflag='$noflag';
            \$aid='$aid';
            \$sub_channel=$sub_channel;
            \$mid = \$mid?trim(\$mid):Q('mid',1,'intval');
            \$cid = \$cid?trim(\$cid):Q('cid',0,'intval');
            //导入模型类
            \$db =ContentViewModel::getInstance(\$mid);
            //关联表
            \$join=\$db->table.',category,user';
			\$db->relation(\$join);
            //---------------------------排序类型-------------------------------
             if(\$order){
                switch(\$order){
                    case 'hot':
                        //查看次数最多
                        \$db->order('click DESC');
                        break;
                    case 'rand':
                        //随机排序
                        \$db->order('rand()');
                        break;
                    default:
                        \$order= str_replace('aid', \$db->table.'.aid', \$order);
                        \$order= str_replace('cid', 'category.cid', \$order);
                        \$db->order(\$order);
                }
            }else{
                \$db->order('arc_sort ASC,updatetime DESC');
            }
            //---------------------------查询条件-------------------------------
                \$where=array();
                //指定栏目的文章,子栏目处理
                if(\$cid){
                    //查询条件
                    if(\$sub_channel){
                        \$category = getCategory(\$cid);
                        \$where[]="category.cid IN(".implode(',',\$category).")";
                    }else{
                        \$where[]="category.cid IN(\$cid)";
                    }
                }
                //指定筛选属性flag='1,2,3'时,获取指定属性的文章
		        if(\$flag){
		            \$flagCache =S('flag'.\$mid);
		            \$flag = explode(',',\$flag);
		            foreach(\$flag as \$f){
		                \$f=\$flagCache[\$f-1];
		                \$where[]="find_in_set('\$f',flag)";
		            }
		        }
		        //排除flag
		        if(\$noflag){
		            \$flagCache =S('flag'.\$mid);
		            \$noflag = explode(',',\$noflag);
		            foreach(\$noflag as \$f){
		                \$f=\$flagCache[\$f-1];
		                \$where[]="!find_in_set('\$f',flag)";
		            }
		        }
                //指定文章
                if (\$aid) {
                    \$where[]=\$this->table.".aid IN(\$aid)";
                }
                //已经审核的文章
                \$where[]='content_status=1';
                //总条数
                \$count = \$db->relation(\$join)->order("arc_sort ASC")->where(\$where)->count(\$db->table.'.aid');
                //栏目缓存
                \$categoryCache=S('category');
                //分页设置
                if(\$cid){
                    \$category=\$categoryCache[\$cid];
                    if(\$category['cat_url_type']==2){//动态
                        //开启伪静态模型
                        if(C('REWRITE_ENGINE')){
                            \$Url = "list_{mid}_{cid}_{page}.html";
                            \$pageUrl=str_replace(array('{mid}','{cid}'),array(\$category['mid'],\$category['cid']),\$Url);
                            \$ROOT_URL = C('URL_REWRITE')?'':'__WEB__?';
                            Page::\$staticUrl=\$ROOT_URL.\$pageUrl;
                        }
                    }else{//静态
                        \$html_path = C("HTML_PATH") ? C("HTML_PATH") . '/' : '';
                        Page::\$staticUrl='__ROOT__/'.\$html_path.str_replace(array('{catdir}','{cid}'),array(\$category['catdir'],\$category['cid']),\$category['cat_html_url']);
                    }
                }else{//首页
                    Page::\$staticUrl=U('Index/Index/index',array('page'=>'{page}'));
                }
                \$page= new Page(\$count,$row);
                //-----------------------------------获取数据----------------------------------------
                \$result= \$db->relation(\$join)->order("arc_sort ASC")->where(\$where)->order(\$order)->limit(\$page->limit())->all();
                if(\$result):
                    foreach(\$result as \$index=>\$field):
                        \$field=\$db->formatField(\$field);
                        \$field['_index']=\$index;
                        \$field['_first']=\$index==0?true:false;
                        \$field['_last']=\$index==(count(\$result)-1)?true:false;
                        \$field['title']=mb_substr(\$field['title'],0,$titlelen,'utf8');
                        \$field['title']=\$field['color']?"<span style='color:".\$field['color']."'>".\$field['title']."</span>":\$field['title'];
                        \$field['description']=mb_substr(\$field['description'],0,$infolen,'utf-8');
                         if(\$field['new_window'] || \$field['redirecturl']){
                        	\$field['link']='<a href="'.\$field['url'].'" target="_blank">'.\$field['title'].'</a>';
						}else{
							\$field['link']='<a href="'.\$field['url'].'">'.\$field['title'].'</a>';
						}
                ?>
str;
        $php .= $content;
        $php .= '<?php endforeach;endif;
                    unset($where);unset($result);
                ?>';
        return $php;
    }

    //页码
    public function _pageshow($attr, $content)
    {
        $style = isset($attr['style']) ? $attr['style'] : 2;
        $row = isset($attr['row']) ? intval($attr['row']) : 8;
        return <<<str
        <?php if(is_object(\$page))echo \$page->show($style,$row);?>
str;
    }

    //上一篇与下一篇
    public function _pagenext($attr, $content)
    {
        $type = isset($attr['type']) ? $attr['type'] : 'pre,next';
        $pre_str = isset($attr['pre']) ? $attr['pre'] : "上一篇: ";
        $next_str = isset($attr['next']) ? $attr['next'] : "上一篇: ";
        $titlelen = isset($attr['titlelen']) ? intval($attr['titlelen']) : 10;
        $php = <<<str
        <?php
        \$type='$type';\$titlelen = $titlelen;
        \$mid = Q('mid',0,'intval');
        //导入模型类
        \$db =ContentViewModel::getInstance(\$mid);
        \$aid = Q('aid',NULL,'intval');
        //上一篇
        if(strstr(\$type,'pre')){
            \$content = \$db->relation(\$db->table.',category')->where("aid<\$aid")->order("aid desc")->find();
            if (\$content) {
                \$content['title']=mb_substr(\$content['title'],0,\$titlelen,'utf-8');
                \$url = Url::getContentUrl(\$content);
                echo "$pre_str <a href='".\$url."'>" . \$content['title'] . "</a>";
            } else {
                echo "$pre_str <span>没有了</span></li>";
            }
        }
        //下一篇
        if(strstr(\$type,'next')){
            \$content = \$db->relation(\$db->table.',category')->where("aid>\$aid")->order("aid ASC")->find();
            if (\$content) {
                \$content['title']=mb_substr(\$content['title'],0,\$titlelen,'utf-8');
                \$url = Url::getContentUrl(\$content);
                echo "$next_str <a href='".\$url."'>" . \$content['title'] . "</a>";
            } else {
                echo "$next_str <span>没有了</span>";
            }
        }
        ?>
str;
        return $php;
    }

    //当前位置
    public function _location($attr, $content)
    {
        $sep = isset($attr['sep']) ? $attr['sep'] : ' > ';
        //分隔符
        $php = <<<str
        <?php
        \$sep = "$sep";
        if(!empty(\$_REQUEST['cid'])){
            \$cat = S("category");
            \$cat= array_reverse(Data::parentChannel(\$cat,\$_REQUEST['cid']));
            \$str = "<a href='__ROOT__'>首页</a>{$sep}";
            foreach(\$cat as \$c){
                \$str.="<a href='".Url::getCategoryUrl(\$c)."'>".\$c['catname']."</a>".\$sep;
            }
            echo substr(\$str,0,-(strlen(\$sep)));
        }
        ?>
str;
        return $php;
    }

    //获得用户
    public function _user($attr, $content)
    {
        $row = isset($attr['row']) ? $attr['row'] : 20;
        $php = <<<str
        <?php
            \$db=M('user');
            \$data = \$db->where("user_status=1")->order("logintime DESC")->limit($row)->all();
            foreach(\$data as \$field):
                \$field['url'] = U('Member/Space/index',array('uid'=>\$field['uid']));
                \$field['icon']='__ROOT__/'.\$field['icon'];
            ?>
str;
        $php .= $content;
        $php .= '<?php endforeach;
                    unset($data);
                ?>';
        return $php;

    }
}