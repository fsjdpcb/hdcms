<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>修改栏目</title>
    <hdjs/>
    <js file="__GROUP__/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<form action="{|U:edit}" method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index}')">
    <input type="hidden" value="{$field.cid}" name="cid"/>
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'index'}">栏目列表</a></li>
                <li><a href="javascript:;" class="action">修改栏目</a></li>
                <li><a href="javascript:hd_ajax('{|U:update_cache}')">更新栏目缓存</a></li>
            </ul>
        </div>
        <input type="hidden" name="mid" value="{$field.mid}"/>
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
                                    <list from="$category" name="c">
                                        <option value="{$c.cid}"
                                        {$c.selected} {$c.disabled}>
                                        {$c._name}
                                        </option>
                                    </list>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>栏目名称</th>
                            <td>
                                <input type="text" name="catname" value="{$field.catname}" class="w300"/>
                            </td>
                        </tr>
                        <tr>
                            <th>栏目类型</th>
                            <td>
                                <label>
                                    <input type="radio" name="cattype" value="1" <if value="$field.cattype==1">checked="checked"</if>/> 普通栏目
                                </label>
                                <label>
                                    <input type="radio" name="cattype" value="2" <if value="$field.cattype==2">checked="checked"</if>/> 频道封面
                                </label>
                                <label>
                                    <input type="radio" name="cattype" value="3" <if value="$field.cattype==3">checked="checked"</if>/> 外部链接(在跳转Url处填写网址)
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th>静态目录</th>
                            <td>
                                <input type="text" name="catdir" value="{$field.catdir}" class="w300"/>
                            </td>
                        </tr>
                        <tr>
                            <th>跳转Url</th>
                            <td>
                                <input type="text" name="cat_redirecturl" value="{$field.cat_redirecturl}" class="w300"/>
                                <span class="message">栏目类型选择为“外部链接”才有效</span>
                            </td>
                        </tr>
                        <tr>
                            <th>栏目访问</th>
                            <td>
                                <label>
                                    <input type="radio" name="cat_url_type" value="1" <if value="$field.cat_url_type==1">checked="checked"</if>/> 静态
                                </label>
                                <label>
                                    <input type="radio" name="cat_url_type" value="2" <if value="$field.cat_url_type==2">checked="checked"</if>/> 动态
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th>文章访问</th>
                            <td>
                                <label>
                                    <input type="radio" name="arc_url_type" value="1" <if value="$field.arc_url_type==1">checked="checked"</if>/> 静态
                                </label>
                                <label>
                                    <input type="radio" name="arc_url_type" value="2" <if value="$field.arc_url_type==2">checked="checked"</if>/> 动态
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th>在导航显示</th>
                            <td>
                                <label>
                                    <input type="radio" name="cat_show" value="1" <if value="$field.cat_show==1">checked="checked"</if>/> 是
                                </label>
                                <label>
                                    <input type="radio" name="cat_show" value="2" <if value="$field.cat_show==0">checked="checked"</if>/> 否
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
                                <input type="text" name="index_tpl" class="w200" id="index_tpl" value="{$field.index_tpl}" onclick="select_template('index_tpl')"/>
                                <button type="button" class="hd-cancel" onclick="select_template('index_tpl')">选择首页模板</button>
                                <span class="message">{style}指模板风格</span>
                            </td>
                        </tr>
                        <tr>
                            <th>列表页模板</th>
                            <td>
                                <input type="text" name="list_tpl" id="list_tpl" class="w200" value="{$field.list_tpl}" onclick="select_template('list_tpl')"/>
                                <button type="button" class="hd-cancel" onclick="select_template('list_tpl')">选择列表模板</button>
                                <span class="message">{style}指模板风格</span>
                            </td>
                        </tr>
                        <tr>
                            <th>内容页模板</th>
                            <td>
                                <input type="text" name="arc_tpl" id="arc_tpl" class="w200" value="{$field.arc_tpl}" onclick="select_template('arc_tpl')"/>
                                <button type="button" class="hd-cancel" onclick="select_template('arc_tpl')">选择内容页模板</button>
                                <span class="message">{style}指模板风格</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="html" class="con">
                    <table class="table1">
                        <tr>
                            <th class="w100">栏目生成Html</th>
                            <td>
                                <label>
                                    <input type="radio" class="radio" name="is_cat_html" value="1"<if value="$field.is_cat_html==1">checked="checked"</if>/> 是
                                </label>
                                <label>
                                    <input type="radio" class="radio" name="is_cat_html" value="0"<if value="$field.is_cat_html==0">checked="checked"</if>/> 否
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th>内容页生成Html</th>
                            <td>
                                <label><input type="radio" class="radio" name="is_arc_html" value="1"<if value="$field.is_arc_html==1">checked="checked"</if>/> 是</label>
                                <label><input type="radio" class="radio" name="is_arc_html" value="0" <if value="$field.is_arc_html==0">checked="checked"</if>/> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <th>栏目页URL规则</th>
                            <td>
                                <input type="text" name="cat_html_url" class="w200" value="{$field.cat_html_url}"/>
                                <span class="message">{cid} 栏目ID, {catdir} 栏目目录, {page} 列表的页码</span>
                            </td>
                        </tr>
                        <tr>
                            <th>内容页URL规则</th>
                            <td>
                                <input type="text" name="arc_html_url" class="w200" value="{$field.arc_html_url}"/>
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
                                <input type="text" name="cat_keyworks" value="{$field.cat_keyworks}" class="w350"/>
                            </td>
                        </tr>
                        <tr>
                            <th>描述</th>
                            <td>
                                <textarea name="cat_description" class="w350 h100">{$field.cat_description}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th class="w100">SEO标题</th>
                            <td>
                                <input type="text" name="cat_seo_title" value="{$field.cat_seo_title}" class="w350"/>
                            </td>
                        </tr>
                        <tr>
                            <th>SEO描述</th>
                            <td>
                                <textarea name="cat_seo_description" class="w400 h150">{$field.cat_seo_description}</textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" class="hd-success" value="确定"/>
        <input type="button" class="hd-cancel" value="取消" onclick="location.href='__CONTROL__'"/>
    </div>
</form>
</body>
</html>