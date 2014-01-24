<?php

/**
 * Admin应用标签库
 * Class AdminTag
 * @author hdxj <houdunwangxj@gmail.com>
 */
class ContentTag
{
    public $tag = array(
        'treeview' => array('block' => 0),
        'channel' => array('block' => 1, 'level' => 4),
        'arclist' => array('block' => 1, 'level' => 4),
        'comment' => array('block' => 1, 'level' => 4),
        'pagelist' => array('block' => 1, 'level' => 4),
        'pageshow' => array('block' => 0),
        'pagepath' => array('block' => 0),
        'pagenext' => array('block' => 0),
        'include' => array('block' => 0)
    );

    //加载模板标签
    public function _include($attr, $content)
    {
        if (!empty($attr['file'])) {
            $file = "template/" . C("WEB_STYLE") . "/" . $attr['file'];
            if (is_file($file)) {
                $view = new HdView();
                $view->fetch($file);
                return $view->getCompileContent();
            }
        }
    }

    //评论显示标签
    public function _comment($attr, $content)
    {
        $row = isset($attr['row']) ? $attr['row'] : 10;
        $php = <<<str
            <?php \$db = K("comment");
        \$result = \$db->limit($row)->field("user.uid,username,realname,comment_id,comment,aid,cid")->where("c_status=1")->order("comment_id DESC")->all();
        foreach (\$result as \$field):
        \$field['url'] = '__WEB__?a=Content&c=Index&m=content&cid='.\$field['cid'].'&aid='.\$field['aid'].'#'.\$field['comment_id'];?>
str;
        $php .= $content;
        $php .= <<<str
        <?php
        endforeach;
        ?>
str;
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
        $cid = isset($attr['cid']) ? $attr['cid'] : NULL;
        //当前栏目的class样式
        $class = isset($attr['class']) ? $attr['class'] : "";
        $php = <<<str
        <?php
        \$where = '';\$type=strtolower(trim('$type'));\$cid=str_replace(' ','','$cid');
        if(empty(\$cid)){
            \$cid=Q('cid',NULL,'intval');
        }
        \$db = M("category");
        if (\$type == 'top') {
            \$where = ' pid=0 ';
        }else if(\$cid) {
            switch (\$type) {
                case 'current':
                    \$where = " cid in(".\$cid.")";
                    break;
                case "son":
                    \$where = " pid IN(".\$cid.") ";
                    break;
                case "self":
                    \$pid = \$db->where(intval(\$cid))->getField('pid');
                    \$where = ' pid='.\$pid;
                    break;
            }
        }
        \$result = \$db->where(\$where)->where("cat_show=1")->order()->order("catorder DESC")->limit($row)->all();
        //无结果
        if(\$result){
            //当前栏目,用于改变样式
            \$_self_cid = isset(\$_GET['cid'])?\$_GET['cid']:0;
            foreach (\$result as \$field):
                //当前栏目样式
                \$field['class']=\$_self_cid==\$field['cid']?"$class":"";
                \$field['url'] = get_category_url(\$field['cid']);?>
str;
            $php .= $content;
            $php .= <<<str
        <?php
            endforeach;
            }
        ?>
str;
        return $php;

    }

    //单页面
    public function _single($attr, $content)
    {
        $aid = $attr['aid'];
        $php = <<<str
        \$db = M("content_single");
        \$db->where = "aid IN ($aid)";
        \$result = \$db->order("arc_sort ASC,aid DESC")->all();
        foreach (\$result as \$field):
            \$field['url'] = get_single_url(\$field);
            \$field['time'] = date("Y-m-d", \$field['updatetime']);
            \$field['thumb'] = '__ROOT__' . '/' . \$field['thumb'];
            \$field['title'] = \$field['color'] ? "<span style='color:" . \$field['color'] . "'>" . \$field['title'] . "</span>" : \$field['title'];
            \$php .= $content;
        endforeach;
str;
        return $php;
    }

    //数据块
    public function _arclist($attr, $content)
    {
        $cid = isset($attr['cid']) ? trim($attr['cid']) : 0;
        $aid = isset($attr['aid']) ? $attr['aid'] : '';
        $mid = isset($attr['mid']) ? $attr['mid'] : 1;
        $row = isset($attr['row']) ? intval($attr['row']) : 10;
        //简单长度
        $infolen = isset($attr['infolen']) ? intval($attr['infolen']) : 80;
        //标题长度
        $titlelen = isset($attr['titlelen']) ? intval($attr['titlelen']) : 80;
        //属性
        $flag = isset($attr['flag']) ? intval($attr['flag']) : '';
        $php = <<<str
        <?php \$mid="$mid";\$cid ='$cid';\$flag='$flag';\$aid='$aid';
            if(empty(\$cid)){
                \$cid= Q('cid',NULL,'intval');
                if(\$cid){
                    \$tmp = M('category')->where('mid=1')->getField('cid',true);
                    if(\$tmp)
                        \$cid=implode(',',\$tmp);
                }
            }
            //去除空白
            if(\$cid){
            \$cid = explode(',',preg_replace('@\s@','',\$cid));
            //取一个cid为了实例化模型
            \$_REQUEST['cid']=\$cid[0];
            import('Content.Model.ContentViewModel');
            \$db = K('ContentView');
                //主表
                \$table=\$db->tableFull;
                if(!empty(\$flag)){
                    \$db->in(array("fid" => \$flag));
                }
                \$db->where = \$table.'.cid in('.implode(',',\$cid).')';
                //指定文章
                if (\$aid) {
                    \$db->where=\$table.'.aid IN('.\$aid.')';
                }
                \$db->where=\$table.'.state=1';
                \$db->group=\$table.'.aid';
                \$db->limit($row);
                \$field = "*,\$table.cid,\$table.aid";
                \$db->field(\$field);
                \$result = \$db->join('category,content_flag')->order('arc_sort ASC,updatetime DESC')->all();
                if(\$result){
                foreach(\$result as \$field):
                    \$field['caturl']=U('category',array('cid'=>\$field['cid']));
                    \$field['url']=get_content_url(\$field);
                    \$field['time']=date("Y-m-d",\$field['updatetime']);
                    \$field['thumb']='__ROOT__'.'/'.\$field['thumb'];
                    \$field['title']=mb_substr(\$field['title'],0,$titlelen,'utf8');
                    \$field['title']=\$field['color']?"<span style='color:".\$field['color']."'>".\$field['title']."</span>":\$field['title'];
                    \$field['description']=mb_substr(\$field['description'],0,$infolen,'utf-8');
                ?>
str;
        $php .= $content;
        $php .= '<?php endforeach;}}?>';
        return $php;
    }

    //分页列表
    public function _pagelist($attr, $content)
    {
        $row = isset($attr['row']) ? intval($attr['row']) : 10;
        //标题长度
        $titlelen = isset($attr['titlelen']) ? intval($attr['titlelen']) : 80;
        //简介长度
        $infolen = isset($attr['infolen']) ? intval($attr['infolen']) : 80;
        //类型 son 包含子栏目
        $type=isset($attr['type'])?$attr['type']:'son';
        $php = <<<str
        <?php
        \$type=strtolower('$type');
        \$cid=Q('cid',NULL,'intval');
        import('Content.Model.ContentViewModel');
        \$db = K('ContentView');
        //查询条件
        switch(\$type){
            case 'son':
                //获得所有子栏目
                \$child=Data::channelList(F('category'),\$cid);
                if(\$child){
                    foreach(\$child as \$c)
                        \$cid.=','.\$c['cid'];
                    //去除尾部逗号
                    \$cid=substr(\$cid,0,-1);
                }
                \$where=\$db->tableFull.".cid In(\$cid) and state=1";
                break;
            case 'current':
            default:
                \$where=\$db->tableFull.".cid In(\$cid) and state=1";
        }
        \$count = \$db->join(NULL)->where(\$where)->count();
        \$page= new Page(\$count,$row);
        \$result= \$db->join("category")->where(\$where)->limit(\$page->limit())->all();
        if(\$result):
            //有结果集时处理
            foreach(\$result as \$field):
                    \$field['caturl']=U('category',array('cid'=>\$field['cid']));
                    \$field['url']=get_content_url(\$field);
                    \$field['thumb']='__ROOT__'.'/'.\$field['thumb'];
                    \$field['title']=mb_substr(\$field['title'],0,$titlelen,'utf8');
                    \$field['title']=\$field['color']?"<span style='color:".\$field['color']."'>".\$field['title']."</span>":\$field['title'];
                    \$field['time']=date("Y-m-d",\$field['addtime']);
                    \$field['description']=mb_substr(\$field['description'],0,$infolen,'utf-8');
            ?>
str;
            $php .= $content;
        $php .= '<?php endforeach;endif?>';
        return $php;
    }

    public function _pageshow($attr, $content)
    {
        $style = isset($attr['style'])?$attr['style']:2;
        $row = isset($attr['row'])?$attr['row']:10;
        return <<<str
        <?php if(is_object(\$page))
            echo \$page->show($style,$row);
        ?>';
str;

    }

    //上下篇
    public function _pagenext($attr, $content)
    {
        $pre_str = isset($attr['pre']) ? $attr['pre'] : "上一篇: ";
        $next_str = isset($attr['next']) ? $attr['next'] : "上一篇: ";
        $php = <<<str
        <?php
        \$aid = Q('aid',NULL,'intval');
        \$db = K('ContentView');
        \$php = '';
        //上一篇
        \$field = \$db->join()->trigger()->field("aid,cid,title")->where("aid<\$aid")->order("aid desc")->find();
        if (\$field) {
            \$url = get_content_url(\$field);
            \$str .= "<li>$pre_str <a href='\$url'>" . \$field['title'] . "</a></li>";
        } else {
            \$str .= "<li>$pre_str <span>没有了</span></li>";
        }
        //下一篇
        \$field = \$db->join()->trigger()->field("aid,cid,title")->where("aid>\$aid")->order("aid asc")->find();
        if (\$field) {
            \$url = get_content_url(\$field);
            \$str .= "<li>$next_str <a href='\$url'>" . \$field['title'] . "</a></li>";
        } else {
            \$str .= "<li>$next_str <span>没有了</span></li>";
        }
        echo \$str;
        ?>
str;
        return $php;
    }

    //当前位置
    public function _pagepath($attr, $content)
    {
        $php = <<<str
        <?php
        if(!empty(\$_GET['cid'])){
            \$cat = F("category",false,CATEGORY_CACHE_PATH);
            \$cat= array_reverse(Data::parentChannel(\$cat,\$_GET['cid']));
            \$str = "<a href='__ROOT__'>首页</a> > ";
            foreach(\$cat as \$c){
                \$str.="<a href='".get_category_url(\$c['cid'])."'>".\$c['title'].'</a> > ';
            }
            echo \$str;
        }
        ?>
str;
        return $php;
    }

    //搜索关键词
    public function _searchkey($attr, $content)
    {
        $row = isset($attr['row']) ? $attr['row'] : 10;
        //显示搜索词数量
        $php = <<<str
                <?php
                \$db = M("search");
                \$result = \$db->limit($row)->all();
                if(!empty(\$result)):
                foreach(\$result as \$field):
                \$field['url']='__ROOT__/index.php?a=Search&c=Search&m=search&search='.\$field['name'];
                ?>
str;
        $php .= $content;
        $php .= "<?php endforeach;endif;?>";
        return $php;
    }
    //导航标签
    public function _nav($attr,$content){
        $nid=isset($attr['nid'])?$attr['nid']:'';
        $php=<<<str
            <?php
            \$nid='$nid';
            \$db = M('navigation');
            if(\$nid){
                \$db->where='nid IN('.\$nid.')';
            }
            \$result = \$db->order('list_order ASC,nid DESC')->where('state=1')->all();
            if(\$result):
                foreach(\$result as \$field):
                  \$field['link']='<a href="'.\$field['url'].'" target="'.\$field['target'].'">'.\$field['title'].'</a>';
                ?>
str;
        $php.=$content;
        $php.='<?php endforeach;endif;?>';
        return $php;
    }

}