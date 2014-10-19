<?php
/**
 * BaiduNews 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class BaiduNewsAddon extends Addon
{

    //插件信息
    public $info = array(
        'name' => 'BaiduNews',
        'title' => '百度新闻地图',
        'description' => '百度新闻地图',
        'status' => 1,
        'author' => '后盾网向军',
        'version' => '1.0',
        'has_adminlist' => 0,
    );

    //安装
    public function install()
    {
        return true;
    }

    //卸载
    public function uninstall()
    {
        return true;
    }
    //实现的APP_BEGIN钩子方法
    public function APP_BEGIN($param){
        $time= S('BADINEWS_UPDATETIME');
        //获得配置项
        $config = $this->getConfig();
        //XML文件更新时间
        $updateTime = $time+($config['update_time_step']*60);
        if($updateTime>time())return;
        $xml['webSite']=C('WEBNAME');
        $xml['webMaster']=C('EMAIL');
        $xml['updatePeri']=$config['update_time_step'];
        $content= ContentViewModel::getInstance(1);
        $data = $content->limit(50)->all();
        if($data){
            foreach ($data as $id=>$d) {
                $item=array();
                $item['title']=$d['title'];
                $item['link']=$d['title'];
                $item['description']=$d['title'];
                $item['text']=$d['title'];
                $item['image']=$d['thumb']?__ROOT__.'/'.$d['thumb']:'';
                $item['keywords']=$d['keywords'];
                $item['category']=$d['description'];
                $item['author']=$d['username'];
                $item['source']=C('WEBNAME');
                $item['pubDate']=date("Y-m-d H:i",$d['addtime']);
                $xml[]=$item;
            }

        }
        S('BADINEWS_UPDATETIME',time());
        header("Content-type:text/xml");
        $file = xml::create($xml,'document');
        file_put_contents(APP_ADDON_PATH.'BaiduNews/Data/baidunews.xml',$file);
    }
}