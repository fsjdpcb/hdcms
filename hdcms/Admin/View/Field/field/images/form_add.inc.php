<script type="text/javascript" src="<?php echo __CONTROLLER_TPL__.'/field/'.$field_type;?>/validate.js"></script>
<table class="table1">
    <tr class="input action">
        <th class="w400">参数</th>
        <td>
            <table class="table1">
                <tr>
                    <td class="w100">允许上传大小</td>
                    <td>
                        <label><input type="text" class="w100" name="set[allow_size]" value="2"/> MB</label>
                    </td>
                </tr>
                <tr>
                    <td>允许上传的个数</td>
                    <td>
                        <input type="text" class="w100" name="set[num]" value="10"/>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>