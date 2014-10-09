<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>计划任务</title>
    <hdjs/>
</head>
<body>
<form action="{|U:'edit'}" method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index}')">
    <input type="hidden" name="id" value="{$field.id}"/>
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li>
                    <a href="{|U:'Admin/index'}">
                        任务列表
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="action">
                        修改任务
                    </a>
                </li>
            </ul>
        </div>
        <div class="title-header">温馨提示</div>
        <div class="help">
            <ul>
                <li>
                    添加过多的计划任务有可能会造成系统运行缓慢
                </li>
            </ul>
        </div>
        <div class="title-header">
            添加计划任务
        </div>
        <div class="right_content">
            <table class="table1">
                <tr>
                    <th class="w100">任务名称</th>
                    <td>
                        <input type="text" name="title" class="w200" value="{$field.title}"/>
                    </td>
                </tr>
                <tr>
                    <th>执行时间</th>
                    <td>
                        <select name="mday">
                            <?php for ($i = 0; $i <= 10; $i++) { ?>
                                <option value="<?php echo $i; ?>" <if value="$i eq $field.mday">selected=""</if>>每隔 <?php echo $i; ?> 天</option>
                            <?php } ?>
                        </select>
                        <select name="hours">
                            <?php for ($i = 0; $i <= 10; $i++) { ?>
                                <option value="<?php echo $i; ?>" <if value="$i eq $field.hours">selected=""</if>>每隔 <?php echo $i; ?> 小时</option>
                            <?php } ?>
                        </select>
                        <select name="minutes">
                            <?php for ($i = 1; $i <= 60; $i++) { ?>
                                <option value="<?php echo $i; ?>" <if value="$i eq $field.minutes">selected=""</if>>每隔 <?php echo $i; ?> 分钟</option>
                            <?php } ?>
                        </select>
                        <span class="validate-message">
                           当为0时表示忽略这个单位，如：每隔0天,每隔0小时,每隔1分钟，表示每分钟执行
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>执行程序</th>
                    <td>
                        <select name="classname" class="w150">
                            <list from="$class" name="$c">
                                <option value="{$c.class}" <if value="$c.class eq $field.classname">selected=""</if>>{$c.title}</option>
                            </list>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" value="确定" class="hd-success"/>
    </div>
</form>
<js file="__CONTROLLER_VIEW__/Js/validate.js"/>
</body>
</html>