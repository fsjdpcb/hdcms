<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>            <?php
            $nid='1,2';
            $db = M('navigation');
            if($nid){
                $db->where='nid IN('.$nid.')';
            }
            $result = $db->order('list_order ASC,nid DESC')->where('state=1')->all();
            if($result):
                foreach($result as $field):
                  $field['link']='<a href="'.$field['url'].'" target="'.$field['target'].'">'.$field['title'].'</a>';
                ?>
    <?php echo $field['link'];?>
<?php endforeach;endif;?>