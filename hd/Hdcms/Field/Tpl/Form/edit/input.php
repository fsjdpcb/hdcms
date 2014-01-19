<!--表单验证-->
<script type="text/javascript" src="<?php echo __TPL__.'/Field/js/input.js'?>"></script>
<!--表单验证-->
<table class="table1">
    <tr class="input action">
        <th class="w100">参数</th>
        <td>
            <table class="table1">
                <tr>
                    <td class="w100">文本框显示长度</td>
                    <td><input type="text" name="set[size]" value="<?php echo $field['set']['size'];?>" class="w100"/></td>
                </tr>
                <tr>
                    <td>默认值</td>
                    <td><input type="text" name="set[default]"  value="<?php echo $field['set']['default'];?>" class="w200"/></td>
                </tr>
                <tr>
                    <td>是否为密码</td>
                    <td>
                        <label><input type="radio" name="set[ispasswd]" value="0" <?php if($field['set']['ispasswd']==0){?>checked="checked"<?php }?>/> 否</label>
                        <label><input type="radio" name="set[ispasswd]" value="1" <?php if($field['set']['ispasswd']==1){?>checked="checked"<?php }?>/> 是</label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <th>表单样式名</th>
        <td>
            <input type="text" name="set[css]" class="w100" value="<?php echo $field['set']['css'];?>"/>
        </td>
    </tr>
    <tr>
        <th>表单验证</th>
        <td>
            <input type="text" name="set[validation]" class="w250" value="<?php echo $field['set']['validation'];?>"/>
            <select id="field_check">
                <option value="">验证规则</option>
                <option value="/^\d+$/">数字</option>
                <option value="/^(http[s]?:)?(\/{2})?([a-z0-9]+\.)?[a-z0-9]+(\.(com|cn|cc|org|net|com.cn))$/i">
                    网址
                </option>
                <option value="/(?:\(\d{3,4}\)|\d{3,4}-?)\d{8}/">电话</option>
                <option value="/^\d{11}$/">手机</option>
                <option value="/^[0-9]{1,20}$/">QQ</option>
            </select>
            <span id="hd_input_validation"></span>
        </td>
    </tr>
    <tr>
        <th>必须输入</th>
        <td>
            <label><input type="radio" name="set[required]" value="1" <?php if($field['set']['required']==1){?>checked="checked"<?php }?>/> 是</label>
            <label><input type="radio" name="set[required]" value="0" <?php if($field['set']['required']==0){?>checked="checked"<?php }?>/> 否</label>
        </td>
    </tr>
    <tr>
        <th>错误提示</th>
        <td>
            <input type="text" name="set[error]" value="<?php echo $field['set']['error'];?>" class="w300"/>
        </td>
    </tr>
</table>