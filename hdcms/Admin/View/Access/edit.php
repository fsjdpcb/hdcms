<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>设置权限</title>
    <hdjs/>
    <js file="__CONTROLLER_TPL__/js/js.js"/>
    <css file="__CONTROLLER_TPL__/css/css.css"/>
    <css file="__PUBLIC__/common.css"/>
</head>
<body>
<form method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:'Role/index'}')">
    <input type="hidden" name="rid" value="{$rid}"/>

    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'Role/index'}">角色列表</a></li>
                <li><a href="javascript:;" class="action">设置权限</a></li>
            </ul>
        </div>
        <div class="access">
            <ul>
                <list from="$access" name="a">
                    <li class="li1">
                        <h3> {$a.checkbox}</h3>
                        <?php if ($a['_data']): ?>
                            <ul class="level2">
                                <list from="$a._data" name="b">
                                    <li class="li2">
                                        <h4> {$b.checkbox}</h4>
                                        <?php if ($b['_data']): ?>
                                            <ul class="level3">
                                                <list from="$b._data" name="c">
                                                    <li>
                                                        {$c.checkbox}
                                                    </li>
                                                </list>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                </list>
                            </ul>
                        <?php endif; ?>
                    </li>
                </list>
            </ul>
        </div>

    </div>
    <div class="position-bottom">
        <input type="submit" class="hd-success" value="确定"/>
    </div>
</form>
</body>
</html>