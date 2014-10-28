<?php
//标签类文件命名规范：Addon插件名Tag
class AddonContentKeywordsTag
{
    //声明标签
    public $tag = array(
        'addon_ContentKeywords_test' => array('block' => 1, 'level' => 4),
    );
     //示例标签
     //a) 标签命名规范：_addon_插件名_标签
     //b) 插件安装后才可以使用标签
     //c) 模板使用<addon_ContentKeywords_test> </addon_ContentKeywords_test>调用
    public function _addon_ContentKeywords_test($attr, $content)
    {
        return '这是标签测试结果';
    }
}