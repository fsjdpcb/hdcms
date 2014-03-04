<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>修改栏目</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Category&c=Category&m=edit&cid=1';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Category';
		CONTROL = 'http://localhost/hdcms/index.php?a=Category&c=Category';
		METH = 'http://localhost/hdcms/index.php?a=Category&c=Category&m=edit';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Category/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Category/Tpl/Category';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Category/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?a=Category&c=Category&m=index';
		HTTPREFERER = 'http://localhost/hdcms/index.php?a=Category&c=Category&m=index';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Category/Tpl/Category/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Category/Tpl/Category/css/css.css"/>
</head>
<body>
<form action="<?php echo U(edit);?>" method="post" class="hd-form" onsubmit="return hd_submit(this,'<?php echo U(index);?>')">
    <input type="hidden" value="<?php echo $field['cid'];?>" name="cid"/>
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="<?php echo U('index');?>">栏目列表</a></li>
                <li><a href="javascript:;" class="action">修改栏目</a></li>
                <li><a href="javascript:hd_ajax('<?php echo U(update_cache);?>')">更新栏目缓存</a></li>
            </ul>
        </div>
        <input type="hidden" name="mid" value="<?php echo $field['mid'];?>"/>
        <div class="tab">
            <ul class="tab_menu">
                <li lab="base"><a href="#">基本设置</a></li>
                <li lab="tpl"><a href="#">模板设置</a></li>
                <li lab="html"><a href="#">静态HTML设置</a></li>
                <li lab="seo"><a href="#">SEO</a></li>
            </ul>
            <div class="tab_content">
                <div id="base">
                    <table class="table1">
                        <tr>
                            <th class="w100">上级</th>
                            <td>
                                <select name="pid">
                                    <option value="0">一级栏目</option>
                                    <?php $hd["list"]["c"]["total"]=0;if(isset($category) && !empty($category)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($category));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($category,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

                                        <option value="<?php echo $c['cid'];?>"
                                        <?php echo $c['selected'];?> <?php echo $c['disabled'];?>>
                                        <?php echo $c['_name'];?>
                                        </option>
                                    <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>栏目名称</th>
                            <td>
                                <input type="text" name="catname" value="<?php echo $field['catname'];?>" class="w300"/>
                            </td>
                        </tr>
                        <tr>
                            <th>栏目类型</th>
                            <td>
                                <label>
                                    <input type="radio" name="cattype" value="1" <?php if($field['cattype']==1){?>checked="checked"<?php }?>/> 普通栏目
                                </label>
                                <label>
                                    <input type="radio" name="cattype" value="2" <?php if($field['cattype']==2){?>checked="checked"<?php }?>/> 频道封面
                                </label>
                                <label>
                                    <input type="radio" name="cattype" value="3" <?php if($field['cattype']==3){?>checked="checked"<?php }?>/> 外部链接(在跳转Url处填写网址)
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th>静态目录</th>
                            <td>
                                <input type="text" name="catdir" value="<?php echo $field['catdir'];?>" class="w300"/>
                            </td>
                        </tr>
                        <tr>
                            <th>跳转Url</th>
                            <td>
                                <input type="text" name="cat_redirecturl" value="<?php echo $field['cat_redirecturl'];?>" class="w300"/>
                                <span class="message">栏目类型选择为“外部链接”才有效</span>
                            </td>
                        </tr>
                        <tr>
                            <th>栏目访问</th>
                            <td>
                                <label>
                                    <input type="radio" name="cat_url_type" value="1" <?php if($field['cat_url_type']==1){?>checked="checked"<?php }?>/> 静态
                                </label>
                                <label>
                                    <input type="radio" name="cat_url_type" value="2" <?php if($field['cat_url_type']==2){?>checked="checked"<?php }?>/> 动态
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th>文章访问</th>
                            <td>
                                <label>
                                    <input type="radio" name="arc_url_type" value="1" <?php if($field['arc_url_type']==1){?>checked="checked"<?php }?>/> 静态
                                </label>
                                <label>
                                    <input type="radio" name="arc_url_type" value="2" <?php if($field['arc_url_type']==2){?>checked="checked"<?php }?>/> 动态
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th>在导航显示</th>
                            <td>
                                <label>
                                    <input type="radio" name="cat_show" value="1" <?php if($field['cat_show']==1){?>checked="checked"<?php }?>/> 是
                                </label>
                                <label>
                                    <input type="radio" name="cat_show" value="2" <?php if($field['cat_show']==0){?>checked="checked"<?php }?>/> 否
                                </label>
                                <span class="message">前台使用&lt;channel&gt;标签时是否显示</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="tpl" class="con">
                    <table class="table1">
                        <tr>
                            <th class="w100">封面模板</th>
                            <td>
                                <input type="text" name="index_tpl" class="w200" id="index_tpl" value="<?php echo $field['index_tpl'];?>" onclick="select_template('index_tpl')"/>
                                <button type="button" class="hd-cancel" onclick="select_template('index_tpl')">选择首页模板</button>
                                <span class="message">{style}指模板风格</span>
                            </td>
                        </tr>
                        <tr>
                            <th>列表页模板</th>
                            <td>
                                <input type="text" name="list_tpl" id="list_tpl" class="w200" value="<?php echo $field['list_tpl'];?>" onclick="select_template('list_tpl')"/>
                                <button type="button" class="hd-cancel" onclick="select_template('list_tpl')">选择列表模板</button>
                                <span class="message">{style}指模板风格</span>
                            </td>
                        </tr>
                        <tr>
                            <th>内容页模板</th>
                            <td>
                                <input type="text" name="arc_tpl" id="arc_tpl" class="w200" value="<?php echo $field['arc_tpl'];?>" onclick="select_template('arc_tpl')"/>
                                <button type="button" class="hd-cancel" onclick="select_template('arc_tpl')">选择内容页模板</button>
                                <span class="message">{style}指模板风格</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="html" class="con">
                    <table class="table1">
                        <tr>
                            <th>栏目页URL规则</th>
                            <td>
                                <input type="text" name="cat_html_url" class="w200" value="<?php echo $field['cat_html_url'];?>"/>
                                <span class="message">{cid} 栏目ID, {catdir} 栏目目录, {page} 列表的页码</span>
                            </td>
                        </tr>
                        <tr>
                            <th>内容页URL规则</th>
                            <td>
                                <input type="text" name="arc_html_url" class="w200" value="<?php echo $field['arc_html_url'];?>"/>
                                <span class="message">{y}、{m}、{d} 年月日,{timestamp}UNIX时间戳,{aid} 文章ID,{catdir} 栏目目录</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="seo">
                    <table class="table1">
                        <tr>
                            <th>关键字</th>
                            <td>
                                <input type="text" name="cat_keyworks" value="<?php echo $field['cat_keyworks'];?>" class="w350"/>
                            </td>
                        </tr>
                        <tr>
                            <th>描述</th>
                            <td>
                                <textarea name="cat_description" class="w350 h100"><?php echo $field['cat_description'];?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th class="w100">SEO标题</th>
                            <td>
                                <input type="text" name="cat_seo_title" value="<?php echo $field['cat_seo_title'];?>" class="w350"/>
                            </td>
                        </tr>
                        <tr>
                            <th>SEO描述</th>
                            <td>
                                <textarea name="cat_seo_description" class="w400 h150"><?php echo $field['cat_seo_description'];?></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" class="hd-success" value="确定"/>
        <input type="button" class="hd-cancel" value="取消" onclick="location.href='http://localhost/hdcms/index.php?a=Category&c=Category'"/>
    </div>
</form>
</body>
</html>