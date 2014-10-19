<?php

/**
 * 插件配置，下面是示例
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
return array(
    'VOTE' => array(//配置在表单中的键名 ,这个会是config[title]
        'title' => '显示"正、反、中"选项:', //表单的文字
        'type' => 'radio',
        'options' => array(
            '1' => '显示',
            '0' => '不显示'
        ),
        'value' => '1'
    ),
    'TOURISTS_COMMENT' => array(
        'title' => '游客评论:',
        'type' => 'radio',
        'options' => array(
            '1' => '开启',
            '0' => '关闭'
        ),
        'value' => '1'
    )
);
