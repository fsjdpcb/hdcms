<?php

/**
 * 模板风格选择
 * @author hdxj<houdunwangxj@gmail.com>
 */
class TemplateStyleController extends AuthController
{
    //模板风格列表
    public function styleList()
    {
        $style = array();
        $dirs = Dir::tree('template');
        foreach ($dirs as $tpl) {
            if ($tpl['name'] == 'system') continue;
            //说明文档
            $readme = $tpl['path'] . "/readme.txt";
            if (is_file($readme) && is_readable($readme)) {
                $tmp = preg_split('@\n@', file_get_contents($readme));
                $config['name'] = mb_substr($tmp[0], 0, 8, 'utf-8');
                $config['author'] = mb_substr($tmp[1], 0, 8, 'utf-8');
                $config['email'] = mb_substr($tmp[2], 0, 9, 'utf-8');
            } else {
                $config = array("name" => "HDCMS免费模板", "author" => "后盾网", "email" => "houdunwang.com");
            }
            //模板目录名
            $config['dir_name'] = $tpl['name'];
            //模板缩略图
            $template_img = $tpl['path'] . "/template.jpg";
            if (is_file($template_img)) {
                $template_img = str_replace(ROOT_PATH, '', $template_img);
                $config['template_img'] = __ROOT__ . '/' . $template_img;
            } else {
                $config['template_img'] = __CONTROL_TPL__ . '/img/default.jpg';
            }
            //正在使用的模板
            if (strtolower(C("WEB_STYLE")) == strtolower($tpl['name'])) {
                $config['current'] = true;
            } else {
                $config['current'] = false;
            }
            $style[] = $config;
        }
        $this->style = $style;
        $this->display();
    }

    //选择模板风格（使用模板）
    public function selectStyle()
    {
        $dir_name = Q("dir_name");
        if ($dir_name) {
            import('Config.Model.ConfigModel');
            $Model = K("Config");
            $Model->where("name='WEB_STYLE'")->save(array("value" => $dir_name));
            //更新配置文件
            $Model->updateCache();
            //删除前台编译文件
            is_dir("./temp/hdcms/Content/Compile") and Dir::del("./temp/hdcms/Content/Compile");
            //删除编译文件
            is_dir('temp/Hdcms/Index') and dir::del('temp/Hdcms/Index');
            $this->success('操作成功');
        }
    }

}