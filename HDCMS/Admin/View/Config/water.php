<include file="__PUBLIC__/header.php"/>
<body>
<form method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:'water'}')">
    <div class="wrap">
        <div class="title-header">温馨提示</div>
        <div class="help">
            图片类型为jpg或png格式
        </div>
        <div class="tab">
            <ul class="tab_menu">
                <li lab="web"><a href="#">水印设置</a></li>
            </ul>
            <div class="tab_content">
                <div id="web">
                    <table class="table1">
                        <tr style="background: #E6E6E6;">
                            <th class="w200">标题</th>
                            <th>配置</th>
                            <th class="w300">变量</th>
                            <th class="w300">描述</th>
                        </tr>
                        <foreach from="$config" key="$key" value="$val">
                            <if value="$key neq 'WATER_POS'">
                                <tr>
                                    <td>{$val.title}</td>
                                    <td>
                                        <input type="text" name="{$val.name}" value="{$val.value}" class="w200"/>
                                    </td>
                                    <td>{$val.name}</td>
                                    <td>{$val.message}</td>
                                </tr>
                            <else>
                                <tr>
                                    <td>{$val.title}</td>
                                    <td>
                                        <table class="w300 table3">
                                            <tr>
                                                <td>
                                                    <label><input type="radio" name="WATER_POS" value="1" <?php if ($val['value'] == 1){ ?>checked="checked"<?php } ?>/> 左上</label>
                                                </td>
                                                <td>
                                                    <label><input type="radio" name="WATER_POS" value="2" <?php if ($val['value'] == 2){ ?>checked="checked"<?php } ?>/> 上中</label>
                                                </td>
                                                <td>
                                                    <label><input type="radio" name="WATER_POS" value="3" <?php if ($val['value'] == 3){ ?>checked="checked"<?php } ?>/> 上右</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label><input type="radio" name="WATER_POS" value="4" <?php if ($val['value'] == 4){ ?>checked="checked"<?php } ?>/> 中左</label>
                                                </td>
                                                <td>
                                                    <label><input type="radio" name="WATER_POS" value="5" <?php if ($val['value'] == 5){ ?>checked="checked"<?php } ?>/> 中间</label>
                                                </td>
                                                <td>
                                                    <label><input type="radio" name="WATER_POS" value="6" <?php if ($val['value'] == 6){ ?>checked="checked"<?php } ?>/> 中右</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label><input type="radio" name="WATER_POS" value="7" <?php if ($val['value'] == 7){ ?>checked="checked"<?php } ?>/> 下左</label>
                                                </td>
                                                <td>
                                                    <label><input type="radio" name="WATER_POS" value="8" <?php if ($val['value'] == 8){ ?>checked="checked"<?php } ?>/> 下中</label>
                                                </td>
                                                <td>
                                                    <label><input type="radio" name="WATER_POS" value="9" <?php if ($val['value'] == 9){ ?>checked="checked"<?php } ?>/> 下右</label>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>{$val.name}</td>
                                    <td>{$val.message}</td>
                                </tr>
                            </if>
                        </foreach>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" class="hd-success" value="确定"/>
    </div>
</form>
</body>
</html>