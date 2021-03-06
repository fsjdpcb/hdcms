<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>广告位</title>
    <hdjs/>
    <js file="__CONTROLLER_VIEW__/Js/js.js"/>
</head>
<body>
<form action="{|U:'edit'}" method="post" class="hd-form">
    <input type="hidden" name="id" value="{$field.id}"/>
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li>
                    <a href="{|U:'Admin/index'}">
                        广告位
                    </a>
                </li>
                <li>
                    <a href="{|U:'Admin/add'}">
                        添加广告位
                    </a>
                </li>
                <li>
                    <a href="{|U:'Ad/index'}">
                        所有广告
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="action">
                        编辑广告
                    </a>
                </li>
            </ul>
        </div>
        <div class="title-header">
            添加广告位
        </div>
        <table class="table1">
            <tr>
                <th class="w100">广告标题</th>
                <td>
                    <input type="text" name="adtitle" class="w300" value="{$field.adtitle}"/>
            </td>
            </tr>
            <tr>
                <th class="w100">广告位</th>
                <td>
                    <select name="posid" class="w150">
                        <list from="$position" name="p">
                            <option value="{$p.posid}" <if value="$p.posid eq $field.posid"></if>>{$p.posname}</option>
                        </list>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="w100">显示类型</th>
                <td>
                    <label>
                        <input type="radio" name="show_type" value="1" <if value="$field.show_type eq 1">checked=""</if>/> 图片（多图时只显示第一张图片）
                    </label>
                    <label>
                        <input type="radio" name="show_type" value="2" <if value="$field.show_type eq 2">checked=""</if>/> 轮换图片
                    </label>
                </td>
            </tr>
            <tr>
                <th class="w100">广告参数</th>
                <td>
                    <div >
                        <table class="table1" id="pic">
                            <thead>
                            <tr>
                                <td width="220">标题</td>
                                <td width="220">URL地址</td>
                                <td width="380">图片</td>
                                <td align="left"><button type="button" class="hd-success" onclick="addAd();">添加</button></td>
                            </tr>
                            </thead>
                                <if value="empty($field['data'])">
                                    <tr class="pic_list">
                                        <td>
                                            <input type="text" name="data[title][]" class="w200"/>
                                        </td>
                                        <td>
                                            <input type="text" name="data[url][]" class="w200"/>
                                        </td>
                                        <td>
                                            <input id='image1' type='text' name='data[image][]' value='' src='' class='w300 images'
                                                   onmouseover='view_image(this)' readonly=''/>
                                            <button class='hd-cancel-small'  onclick='file_upload(this)' type='button'>上传图片
                                            </button>
                                            &nbsp;&nbsp;
                                            <button class='hd-cancel-small' onclick='remove_upload_one_img(this)' type='button'>
                                                删除
                                            </button>
                                            <span id='hd_image' class='image validate-message'></span>
                                        </td>
                                        <td></td>
                                    </tr>
                                <else>
                                <list from="$field.data" name="$d">
                                    <tr class="pic_list">
                                        <td>
                                            <input type="text" name="data[title][]" class="w200" value="{$d.title}"/>
                                        </td>
                                        <td>
                                            <input type="text" name="data[url][]" class="w200" value="{$d.url}"/>
                                        </td>
                                        <td>
                                            <input id='image1' type='text' name='data[image][]' value='{$d.image}' src='__ROOT__/{$d.image}' class='w200 images'
                                                   onmouseover='view_image(this)' readonly=''/>
                                            <button class='hd-cancel-small'  onclick='file_upload(this)' type='button'>上传图片
                                            </button>
                                            &nbsp;&nbsp;
                                            <button class='hd-cancel-small' onclick='remove_upload_one_img(this)' type='button'>
                                                删除
                                            </button>
                                            <span id='hd_image' class='image validate-message'></span>
                                        </td>
                                        <td></td>
                                    </tr>
                                </list>
                            </if>
                        </table>
                        </div>
                </td>
            </tr>
            <tr>
                <th class="w100">开始时间</th>
                <td>
                    <input type="text" readonly="readonly" id="start_time" name="start_time" value="{$field.start_time|date:'Y/m/d h:i:s',@@}" class="w150"/>
                    <script>
                        $('#start_time').calendar({format: 'yyyy/MM/dd HH:mm:ss'});
                    </script>
                </td>
            </tr>
            <tr>
                <th class="w100">结束时间</th>
                <td>
                    <input type="text" readonly="readonly" id="end_time" name="end_time" value="{$field.end_time|date:'Y/m/d h:i:s',@@}" class="w150"/>
                    <script>
                        $('#end_time').calendar({format: 'yyyy/MM/dd HH:mm:ss'});
                    </script>
                </td>
            </tr>
            <tr>
                <th class="w100">状态</th>
                <td>
                    <label>
                        <input type="radio" name="status" value="1" <if value="$field.status eq 1">checked=""</if>/> 开启
                    </label>
                    <label>
                        <input type="radio" name="status" value="0" <if value="$field.status eq 0">checked=""</if>/> 关闭
                    </label>
                </td>
            </tr>
            <tr>
                <th class="w100">广告宽度</th>
                <td>
                    <input type="text" name="ad_width" id='ad_width' class="w200" value="{$field.ad_width}"/>
                </td>
            </tr>
            <tr>
                <th class="w100">广告高度</th>
                <td>
                    <input type="text" name="ad_height" id='ad_width' class="w200" value="{$field.ad_height}"/>
                </td>
            </tr>
        </table>
    </div>
    <div class="position-bottom">
        <input type="submit" value="确定" class="hd-success"/>
    </div>
</form>
<script>
    changeImageInputId();
</script>
</body>
</html>