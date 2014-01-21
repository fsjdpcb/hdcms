<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>栏目管理</title>
    <hdjs/>
    <js file="__GROUP__/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<form action="{|U:add}" method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index}');">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'index'}">栏目列表</a></li>
                <li><a href="javascript:;" class="action">添加栏目</a></li>
                <li><a href="javascript:hd_ajax('{|U:update_cache}')">更新栏目缓存</a></li>
            </ul>
        </div>
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
                            <th class="w100">内容模型</th>
                            <td>
                                <select name="mid" class="w200">
                                    <list from="$model" name="m">
                                        <option value="{$m.mid}">
                                            {$m.model_name}
                                        </option>
                                    </list>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>上级</th>
                            <td>
                                <select name="pid" class="w200">
                                    <option value="0">一级栏目</option>
                                    <list from="$category" name="c">
                                        <option value="{$c.cid}" <if value="$hd.get.pid==$c.cid">selected='selected'</if>>{$c._name}</option>
                                    </list>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>栏目名称</th>
                            <td>
                                <input type="text" name="catname" class="w200"/>
                            </td>
                        </tr>

                        <tr>
                            <th>静态目录</th>
                            <td>
                                <input type="text" name="catdir" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th>生成静态</th>
                            <td>
                                <label class="checkbox inline">
                                    <input type="radio" name="urltype" value="1" checked="checked"/> 静态访问</label>
                                <label class="checkbox inline">
                                    <input type="radio" name="urltype" value="2"/> 动态访问</label>
                            </td>
                        </tr>
                        <tr>
                            <th>栏目类型</th>
                            <td>
                                <label><input type="radio" name="cattype" checked="checked" value="1"/> 普通栏目</label>
                                <label><input type="radio" name="cattype" value="2"/> 频道封面</label>
                                <label><input type="radio" name="cattype" value="3"/> 外部链接(在跳转Url处填写网址)</label>
                            </td>
                        </tr>
                        <tr>
                            <th>在导航显示</th>
                            <td>
                                <label><input type="radio" name="cat_show" value="1" checked="checked"/> 是</label>
                                <label><input type="radio" name="cat_show" value="0"/> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <th>跳转Url</th>
                            <td>
                                <input type="text" name="cat_redirecturl" class="w300"/>
                            </td>
                        </tr>
                        <tr>
                            <th>栏目关键字</th>
                            <td>
                                <input type="text" name="keyworks" class="w300"/>
                                <span class="message">SEO关键字</span>
                            </td>
                        </tr>
                        <tr>
                            <th>栏目描述</th>
                            <td>
                                <textarea name="description" class="w350 h80"></textarea>
                                <span class="message">不能超过100字</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="tpl">
                    <table class="table1">
                        <tr>
                            <th class="w100">封面模板</th>
                            <td>
                                <input type="text" name="index_tpl" class="w200" id="index_tpl"
                                       value="{style}/article_index.html" onclick="select_template('index_tpl');"/>
                                <button type="button" onclick="select_template('index_tpl');" class="btn btn-small hd-cancel">
                                    选择封面模板
                                </button>
                                <span class="message">{style}指模板目录</span>
                            </td>
                        </tr>
                        <tr>
                            <th>列表页模板</th>
                            <td>
                                <input type="text" name="list_tpl" id="list_tpl" class="w200"
                                       value="{style}/article_list.html" onclick="select_template('list_tpl');"/>
                                <button type="button" onclick="select_template('list_tpl');" class="btn btn-small hd-cancel">选择列表模板
                                </button>
                                <span class="message">{style}指模板目录</span>
                            </td>
                        </tr>
                        <tr>
                            <th>内容页模板</th>
                            <td>
                                <input type="text" name="arc_tpl" id="arc_tpl" class="w200"
                                       value="{style}/article_default.html" onclick="select_template('arc_tpl');"/>
                                <button type="button" onclick="select_template('arc_tpl');" class="btn btn-small hd-cancel">选择内容页模板
                                </button>
                                <span class="message">{style}指模板目录</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="html">
                    <table class="table1">
                        <tr>
                            <th class="w100">栏目生成Html</th>
                            <td>
                                <label><input type="radio" class="radio" name="is_cat_html" value="1"
                                              checked="checked"/> 是</label>
                                <label><input type="radio" class="radio" name="is_cat_html" value="0"/> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <th>内容页生成Html</th>
                            <td>
                                <label><input type="radio" class="radio" name="is_arc_html" value="1"
                                              checked="checked"/> 是</label>
                                <label><input type="radio" class="radio" name="is_arc_html" value="0"/> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <th>栏目页URL规则</th>
                            <td>
                                <input type="text" name="list_html_url" class="w200"
                                       value="{catdir}/list_{cid}_{page}.html"/>
                        <span class="message">
                        {cid} 栏目ID,
                        {catdir} 栏目目录,
                        {page} 列表的页码
                        </span>
                            </td>
                        </tr>
                        <tr>
                            <th>内容页URL规则</th>
                            <td>
                                <input type="text" name="arc_html_url" class="w200"
                                       value="{catdir}/{y}/{m}{d}/{aid}.html"/>
                        <span class="message">
                        {y}、{m}、{d} 年月日,
                        {timestamp}UNIX时间戳,
                        {aid} 文章ID,
                        {catdir} 栏目目录
                        </span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="seo">
                    <table class="table1">
                        <tr>
                            <th class="w100">SEO标题</th>
                            <td>
                                <input type="text" name="cat_seo_title" class="w350"/>
                            </td>
                        </tr>
                        <tr>
                            <th>SEO描述</th>
                            <td>
                                <textarea name="cat_seo_description" class="w350 h150"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <div class="h60"></div>
    </div>
    <div class="position-bottom">
        <input type="submit" class="hd-success" value="确定"/>
        <input type="button" class="hd-cancel" value="取消" onclick="location.href='__CONTROL__'"/>
    </div>
</form>

</body>
</html>