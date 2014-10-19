<?php

/**
 * 插件配置，下面是示例
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
return array(
    'update_time_step' => array(//配置在表单中的键名 ,这个会是config[title]
        'title' => '更新时间:', //表单的文字
        'type' => 'text', //表单的类型：text、textarea、checkbox、radio、select等
        'value' => '15', //表单的默认值
        'style' => "width:200px;", //表单样式
        'message'=>'分钟'
    )
);
