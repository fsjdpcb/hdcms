<script type="text/javascript" src="<?php echo __CONTROLLER_VIEW__.'/field/'.$field_type;?>/validate.js"></script>
<table class="table1">
    <tr class="input action">
        <th class="w400">参数</th>
        <td>
            <table class="table1">
                <tr>
                    <td class="w100">上传大小</td>
                    <td>
                        <label><input type="text" class="w100" name="set[allow_size]" value="2"/> MB</label>
                    </td>
                </tr>
                <tr>
                    <td class="w100">上传的个数</td>
                    <td>
                        <input type="text" class="w100" name="set[num]" value="10"/>
                    </td>
                </tr>
                <tr>
                    <td class="w100">上传文件类型</td>
                    <td>
                        <input type="text" class="w200" name="set[filetype]" value="zip,rar,doc,ppt"/>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>