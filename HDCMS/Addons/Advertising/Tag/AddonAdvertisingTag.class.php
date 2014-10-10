<?php

//标签类文件命名规范：Addon插件名Tag
class AddonAdvertisingTag
{
    //声明标签
    public $tag = array(
        'addon_Advertising' => array('block' => 0, 'level' => 4),
    );

    /**
     * 广告调用
     * @param $attr
     * @param $content
     * @return string
     */
    public function _addon_Advertising($attr, $content)
    {
        //广告ID
        $id = isset($attr['id'])?$attr['id']:Q('id', 0, 'intval');
        $posid=isset($attr['posid'])?$attr['posid']:0;
        $php = <<<php
        <?php
                require_cache('HDCMS/Addons/Advertising/Model/AdModel.class.php');
                \$id=$id;\$posid=$posid;
                \$map['status']=array('EQ',1);
                \$map['_string']='start_time<='.time().' AND end_time>='.time();
                \$ad=null;
                if(\$id){
                    \$map['id']=array('EQ',\$id);
                    \$ad = K('Ad')->where(\$map)->find();
                }else if(\$posid){
                    \$map['_string']="addon_advertising_ad.posid=\$posid";
                    \$ad= K('Ad')->where(\$map)->order('id ASC')->find();
                }
                if(!\$ad){
                    echo '暂无广告..';
                }else{
                \$ad['data'] = unserialize(\$ad['data']);
                switch (\$ad['show_type']) {
                    case 1://图片
                        \$data = current(\$ad['data']);
                        echo "<a href='".\$data['url']."'>
                        <img src='".\$data['image']."' style='width:".\$ad['ad_width']."px;height:".\$ad['ad_height']."px'/>
                        </a>";
                        break;
                    case 2://轮换
                        \$data = \$ad['data'];
                        \$js = "<script>$(function () {
                                $('#flash').slide({
                                    width:".\$ad['ad_width']." ,
                                    height: ".\$ad['ad_height'].",
                                    timeout: 3,
                                    bgcolor:'#333'
                                });
                            })
                         </script>
                         <div id='flash'>";
                         foreach(\$data as \$d){
                            \$js.="<a href='".\$d['url']."'  title='".\$d['title']."' target='_blank'><img src='__ROOT__/".\$d['image']."'width='".\$ad['ad_width']."' height='".\$ad['ad_width']."'/></a>";
                         }
                         \$js.="</div>";
                         echo \$js;
                        break;
                    }
                }
                unset(\$map);unset(\$ad);unset(\$data);unset(\$js);
        ?>
php;
        return $php;
    }
}