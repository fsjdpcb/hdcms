<script type="text/javascript" src="<?php echo __TPL__;?>/Field/js/image.js"></script>
<table class="table1">
    <tr class="input action">
        <th class="w100">参数</th>
        <td>
            <table class="table1">
                <tr>
                    <td class="w100">图片宽度</td>
                    <td>
                        <label>宽 <input type="text" class="w30 image_height" name="set[width]" value="<?php echo $field['set']['width'];?>"/> px</label>
                    </td>
                </tr>
                <tr>
                    <td class="w100">图片高度</td>
                    <td>
                        <label>高 <input type="text" class="w30 image_width" name="set[height]" value="<?php echo $field['set']['height'];?>"/> px</label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>