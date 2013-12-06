<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>网站配置</title>
    <jquery/>
    <jsconst/>
    <hdui/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<form action="{|U:edit}" method="post">
    <div class="wrap">
        <div class="tab">
            <ul class="tab_menu">
                <li lab="web"><a href="#">站点配置</a></li>
                <li lab="upload"><a href="#">上传设置</a></li>
                <li lab="member"><a href="#">会员设置</a></li>
                <li lab="content"><a href="#">内容相关</a></li>
                <li lab="water"><a href="#">水印设置</a></li>
                <li lab="safe"><a href="#">安全配置</a></li>
                <li lab="grand"><a href="#">高级配置</a></li>
            </ul>
            <div class="tab_content">
                <div id="web">
                    <table class="table1">
                        <tr>
                            <th class="w150">{$field[1].title}</th>
                            <td>
                                <input type="text" name="c{$field[1].id}" value="{$field[1].value}" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th>{$field[2].title}</th>
                            <td>
                                <input type="text" name="c{$field[2].id}" value="{$field[2].value}" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th>{$field[3].title}</th>
                            <td>
                                <input type="text" name="c{$field[3].id}" value="{$field[3].value}" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th>{$field[4].title}</th>
                            <td>
                                <input type="text" name="c{$field[4].id}" value="{$field[4].value}" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th>{$field[5].title}</th>
                            <td>
                                <input type="text" name="c{$field[5].id}" value="{$field[5].value}" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th>{$field[6].title}</th>
                            <td>
                                <textarea class="w400 h80" name="c{$field[6].id}">{$field[6].value}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>{$field[8].title}</th>
                            <td>
                                <input type="text" name="c{$field[8].id}" value="{$field[8].value}" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th>{$field[10].title}</th>
                            <td>
                                <label><input type="radio" name="c{$field[10].id}" value="1" <if value="$field[10].value==1">checked="checked"</if>/> 开</label>
                                <label><input type="radio" name="c{$field[10].id}" value="0" <if value="$field[10].value==0">checked="checked"</if>/> 关</label>
                            </td>
                        </tr>
                        <tr>
                            <th>{$field[150].title}</th>
                            <td>
                                <textarea name="c{$field[150].id}" class="w400 h80">{$field[150].value}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>{$field[127].title}</th>
                            <td>
                                <input type="text" name="c{$field[127].id}" value="{$field[127].value}" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th>{$field[114].title}</th>
                            <td>
                                <select name="c{$field[114].id}">
                                    <list from="$template" name="t">
                                    <option value="{$t}" <if value="$t==$field[114].value">selected='selected'</if>>{$t}</option>
                                    </list>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="upload">
                    <table class="table1">
                        <tr>
                            <th class="w150">{$field[16].title}</th>
                            <td>
                                <input type="text" name="c{$field[16].id}" value="{$field[16].value}" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[18].title}</th>
                            <td>
                                <input type="text" name="c{$field[18].id}" value="{$field[18].value}" class="w250"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[19].title}</th>
                            <td>
                                <input type="text" name="c{$field[19].id}" value="<?php echo $field[19]['value']/1024;?>" class="w250"/>
                                <span class="message"> 单位:KB</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="member">
                    <table class="table1">
                        <tr>
                            <th class="w150">{$field[149].title}</th>
                            <td>
                                <label><input type="radio" name="c{$field[149].id}" value="1" <if value="$field[149].value==1">checked="checked"</if>/> 开启</label>
                                <label><input type="radio" name="c{$field[149].id}" value="0" <if value="$field[149].value==0">checked="checked"</if>/> 关闭</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[115].title}</th>
                            <td>
                                <label><input type="radio" name="c{$field[115].id}" value="1" <if value="$field[115].value==1">checked="checked"</if>/> 审核</label>
                                <label><input type="radio" name="c{$field[115].id}" value="0" <if value="$field[115].value==0">checked="checked"</if>/> 不审核</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[116].title}</th>
                            <td>
                                <label><input type="radio" name="c{$field[116].id}" value="1" <if value="$field[116].value==1">checked="checked"</if>/> 显示</label>
                                <label><input type="radio" name="c{$field[116].id}" value="0" <if value="$field[116].value==0">checked="checked"</if>/> 不显示</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[119].title}</th>
                            <td>
                                <label><input type="radio" name="c{$field[119].id}" value="1" <if value="$field[119].value==1">checked="checked"</if>/> 是</label>
                                <label><input type="radio" name="c{$field[119].id}" value="0" <if value="$field[119].value==0">checked="checked"</if>/> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[147].title}</th>
                            <td>
                                <label><input type="radio" name="c{$field[147].id}" value="1" <if value="$field[147].value==0">checked="checked"</if>/> 是</label>
                                <label><input type="radio" name="c{$field[147].id}" value="0" <if value="$field[147].value==1">checked="checked"</if>/> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[120].title}</th>
                            <td>
                                <input type="text" name="c{$field[120].id}" value="{$field[120].value}" class="w150"/>
                                <span class="message">分钟 (0为不限制)</span>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[121].title}</th>
                            <td>
                                <input type="text" name="c{$field[121].id}" value="{$field[121].value}" class="w150"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[137].title}</th>
                            <td>
                                <label><input type="radio" name="c{$field[137].id}" value="0" <if value="$field[137].value==0">checked="checked"</if>/> 是</label>
                                <label><input type="radio" name="c{$field[137].id}" value="1" <if value="$field[137].value==1">checked="checked"</if>/> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">会员头像尺寸</th>
                            <td>
                                <label>宽度: <input type="text" name="c{$field[138].id}" value="{$field[138].value}" class="w30"/></label>&nbsp;&nbsp;&nbsp;
                                <label>高度: <input type="text" name="c{$field[139].id}" value="{$field[139].value}" class="w30"/></label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">新注册会员初始组</th>
                            <td>
                                <select name="c{$field[148].id}">
                                    <list from="$group" name="g">
                                    <option value="{$g.gid}" <if value="$field[148].value==$g.gid">selected="selected"</if>>{$g.gname}</option>
                                    </list>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="content">
                    <table class="table1">
                        <tr>
                            <th>{$field[134].title}</th>
                            <td>
                                <label><input type="radio" name="c{$field[134].id}" value="1" <if value="$field[134].value==1">checked="checked"</if>/> 直接删除</label>
                                <label><input type="radio" name="c{$field[134].id}" value="2" <if value="$field[134].value==0">checked="checked"</if>/> 放入回收站</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[142].title}</th>
                            <td>
                                <label><input type="radio" name="c{$field[142].id}" value="1" <if value="$field[142].value==1">checked="checked"</if>/> 是</label>
                                <label><input type="radio" name="c{$field[142].id}" value="0" <if value="$field[142].value==0">checked="checked"</if>/> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[143].title}</th>
                            <td>
                                <label><input type="radio" name="c{$field[143].id}" value="1" <if value="$field[143].value==1">checked="checked"</if>/> 是</label>
                                <label><input type="radio" name="c{$field[143].id}" value="0" <if value="$field[143].value==0">checked="checked"</if>/> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[144].title}</th>
                            <td>
                                <label><input type="radio" name="c{$field[144].id}" value="1" <if value="$field[144].value==1">checked="checked"</if>/> 是</label>
                                <label><input type="radio" name="c{$field[144].id}" value="0" <if value="$field[144].value==0">checked="checked"</if>/> 否</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">上传图片超过此值进行缩放</th>
                            <td>
                                <label>宽度: <input type="text" name="c{$field[145].id}" value="{$field[145].value}" class="w30"/> px</label>&nbsp;&nbsp;&nbsp;
                                <label>高度: <input type="text" name="c{$field[146].id}" value="{$field[146].value}" class="w30"/> px</label>
                            </td>
                        </tr>
                    </table>
                 </div>
                <div id="water">
                    <table class="table1">
                        <tr>
                            <th>{$field[20].title}</th>
                            <td>
                                <label><input type="radio" name="c{$field[20].id}" value="1" <if value="$field[20].value==1">checked="checked"</if>/> 开</label>
                                <label><input type="radio" name="c{$field[20].id}" value="0" <if value="$field[20].value==0">checked="checked"</if>/> 关</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[129].title}</th>
                            <td>
                                <input type="text" name="c{$field[129].id}" value="{$field[129].value}" class="w150"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[130].title}</th>
                            <td>
                                <input type="text" name="c{$field[130].id}" value="{$field[130].value}" class="w150"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[131].title}</th>
                            <td>
                                <input type="text" name="c{$field[131].id}" value="{$field[131].value}" class="w150"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[132].title}</th>
                            <td>
                                <input type="text" name="c{$field[132].id}" value="{$field[132].value}" class="w150"/> %
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[133].title}</th>
                            <td>
                                <table class="w300 table3">
                                    <tr>
                                        <td>
                                            <label><input type="radio" name="c{$field[133].id}" value="1" <if value="$field[133].value==1">checked="checked"</if>/> 左上</label>
                                        </td>
                                        <td>
                                            <label><input type="radio" name="c{$field[133].id}" value="2" <if value="$field[133].value==2">checked="checked"</if>/> 上中</label>
                                        </td>
                                        <td>
                                            <label><input type="radio" name="c{$field[133].id}" value="3" <if value="$field[133].value==3">checked="checked"</if>/> 上右</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label><input type="radio" name="c{$field[133].id}" value="4" <if value="$field[133].value==4">checked="checked"</if>/> 中左</label>
                                        </td>
                                        <td>
                                            <label><input type="radio" name="c{$field[133].id}" value="5" <if value="$field[133].value==5">checked="checked"</if>/> 中间</label>
                                        </td>
                                        <td>
                                            <label><input type="radio" name="c{$field[133].id}" value="6" <if value="$field[133].value==6">checked="checked"</if>/> 中右</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label><input type="radio" name="c{$field[133].id}" value="7" <if value="$field[133].value==7">checked="checked"</if>/> 下左</label>
                                        </td>
                                        <td>
                                            <label><input type="radio" name="c{$field[133].id}" value="8" <if value="$field[133].value==8">checked="checked"</if>/> 下中</label>
                                        </td>
                                        <td>
                                            <label><input type="radio" name="c{$field[133].id}" value="9" <if value="$field[133].value==9">checked="checked"</if>/> 下右</label>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>


                <div id="safe">
                    <table class="table1">

                        <tr>
                            <th class="w150">{$field[15].title}</th>
                            <td>
                                <input type="text" name="c{$field[15].id}" value="{$field[15].value}" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th>{$field[123].title}</th>
                            <td>
                                <label><input type="radio" name="c{$field[123].id}" value="1" <if value="$field[123].value==1">checked="checked"</if>/> 开</label>
                                <label><input type="radio" name="c{$field[123].id}" value="0" <if value="$field[123].value==0">checked="checked"</if>/> 关</label>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[124].title}</th>
                            <td>
                                <input type="text" name="c{$field[124].id}" value="{$field[124].value}" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[125].title}</th>
                            <td>
                                <input type="text" name="c{$field[125].id}" value="{$field[125].value}" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[126].title}</th>
                            <td>
                                <input type="text" name="c{$field[126].id}" value="{$field[126].value}" class="w200"/>
                            </td>
                        </tr>
                    </table>
                </div>

                <div id="grand">
                    <table class="table1">
                        <tr>
                            <th class="w150">{$field[9].title}</th>
                            <td>
                                <input type="text" name="c{$field[9].id}" value="{$field[9].value}" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[122].title}</th>
                            <td>
                                <input type="text" name="c{$field[122].id}" value="{$field[122].value}" class="w200"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">{$field[136].title}</th>
                            <td>
                                <input type="text" name="c{$field[136].id}" value="{$field[136].value}" class="w200"/>
                                <span class="message"> 单位:KB</span>
                            </td>
                        </tr>
                        <tr>
                            <th class="w150">图片超过这个尺寸进行缩放</th>
                            <td>
                                <label>宽度: <input type="text" name="c{$field[140].id}" value="{$field[140].value}" class="w30"/></label>&nbsp;&nbsp;&nbsp;
                                <label>高度: <input type="text" name="c{$field[141].id}" value="{$field[141].value}" class="w30"/></label>
                            </td>
                        </tr>
                    </table>
                </div>


            </div>
        </div>
    </div>
    <div class="btn_wrap">
        <input type="submit" class="btn" value="确定"/>
    </div>
</form>
</body>
</html>