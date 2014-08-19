<script type="text/javascript" src="<?php echo __CONTROLLER_TPL__.'/field/'.$field['field_type'];?>/validate.js"></script>
<table class="table1">
    <tr class="input action">
        <th class="w400">参数</th>
        <td>
            <table class="table1">
                <tr>
                    <td class="w60">高度</td>
                    <td><input type="text" name="set[height]" class="w100 editor_height" value="<?php echo $field['set']['height'];?>" class="w100"/> px</td>
                </tr>
                <tr>
                    <td>默认值</td>
                    <td><textarea class="w300 h60" name="set[default]"><?php echo $field['set']['default'];?></textarea></td>
                </tr>
                <tr>
                    <td>样式</td>
                    <td>
                        <label><input type="radio" name="set[style]" value="1" <?php if($field['set']['style']==1)echo "checked=''";?>/> 完整版</label>
                        <label><input type="radio" name="set[style]" value="2" <?php if($field['set']['style']==2)echo "checked=''";?>/> 精简版</label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>