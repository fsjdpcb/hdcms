<include file="__PUBLIC__/header.php"/>
<body>
<form method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:'edit'}')">
    <div class="wrap">
        <div class="title-header">温馨提示</div>
        <div class="help">
            1 模板中使用配置项方法为{ $hd.config.变量名}<br>
            2 请仔细修改配置项，不当设置将影响网站的性能与安全 <br>
            3 在不了解配置项意义时，请不要随意修改
        </div>
        <div class="tab">
            <ul class="tab_menu">
                <li lab="web"><a href="#">站点配置</a></li>
                <li><li lab="rewrite"><a href="#">伪静态</a></li></li>
                <li lab="upload"><a href="#">上传配置</a></li>
                <li lab="member"><a href="#">会员配置</a></li>
                <li lab="content"><a href="#">内容相关</a></li>
                <li lab="water"><a href="#">水印配置</a></li>
                <li lab="safe"><a href="#">安全配置</a></li>
                <li lab="optimize"><a href="#">性能优化</a></li>
                <li lab="email"><a href="#">邮箱配置</a></li>
                <li lab="cookie"><a href="#">COOKIE配置</a></li>
                <li lab="session"><a href="#">SESSION配置</a></li>
                <li lab="custom"><a href="#">自定义</a></li>
            </ul>
            <div class="tab_content">
                <div id="web">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w50">排序</th>
                    		<th  class="w150">标题</th>
                    		<th>配置</th>
                    		<th class="w300">变量</th>
                    		<th class="w300">描述</th>
                    	</tr>
                        <list from="$config" name="c">
                        	<if value="$c.type eq '站点配置'">
                        		<tr>
                        			<td>
                        				<input type="text" value="{$c.order_list}" class="w30" name="order_list[{$c.name}]"/>
                        			</td>
	                        		<td>{$c.title}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="rewrite">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w50">排序</th>
                    		<th  class="w150">标题</th>
                    		<th>配置</th>
                    		<th class="w300">变量</th>
                    		<th class="w300">描述</th>
                    	</tr>
                        <list from="$config" name="c">
                        	<if value="$c.type eq '伪静态'">
                        		<tr>
                        			<td>
                        				<input type="text" value="{$c.order_list}" class="w30" name="order_list[{$c.name}]"/>
                        			</td>
	                        		<td>{$c.title}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="upload">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w50">排序</th>
                    		<th  class="w150">标题</th>
                    		<th>配置</th>
                    		<th class="w300">变量</th>
                    		<th class="w300">描述</th>
                    	</tr>
                       <list from="$config" name="c">
                        	<if value="$c.type eq '上传配置'">
                        		<tr>
                        			<td>
                        				<input type="text" value="{$c.order_list}" class="w30" name="order_list[{$c.name}]"/>
                        			</td>
	                        		<td>{$c.title}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="member">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w50">排序</th>
                    		<th  class="w150">标题</th>
                    		<th>配置</th>
                    		<th class="w300">变量</th>
                    		<th class="w300">描述</th>
                    	</tr>
                    	<list from="$config" name="c">
                        	<if value="$c.type eq '会员配置'">
                        		<tr>
                        			<td>
                        				<input type="text" value="{$c.order_list}" class="w30" name="order_list[{$c.name}]"/>
                        			</td>
	                        		<td>{$c.title}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="content">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w50">排序</th>
                    		<th  class="w150">标题</th>
                    		<th>配置</th>
                    		<th class="w300">变量</th>
                    		<th class="w300">描述</th>
                    	</tr>
                    	<list from="$config" name="c">
                        	<if value="$c.type eq '内容相关'">
                        		<tr>
                        			<td>
                        				<input type="text" value="{$c.order_list}" class="w30" name="order_list[{$c.name}]"/>
                        			</td>
	                        		<td>{$c.title}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="water">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w50">排序</th>
                    		<th  class="w150">标题</th>
                    		<th>配置</th>
                    		<th class="w300">变量</th>
                    		<th class="w300">描述</th>
                    	</tr>
                    	<list from="$config" name="c">
                        	<if value="$c.type eq '水印配置'">
                        		<tr>
                        			<td>
                        				<input type="text" value="{$c.order_list}" class="w30" name="order_list[{$c.name}]"/>
                        			</td>
	                        		<td>{$c.title}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="safe">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w50">排序</th>
                    		<th  class="w150">标题</th>
                    		<th>配置</th>
                    		<th class="w300">变量</th>
                    		<th class="w300">描述</th>
                    	</tr>
                    	<list from="$config" name="c">
                        	<if value="$c.type eq '安全配置'">
                        		<tr>
                        			<td>
                        				<input type="text" value="{$c.order_list}" class="w30" name="order_list[{$c.name}]"/>
                        			</td>
	                        		<td>{$c.title}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="optimize">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w50">排序</th>
                    		<th  class="w150">标题</th>
                    		<th>配置</th>
                    		<th class="w300">变量</th>
                    		<th class="w300">描述</th>
                    	</tr>
                    	<list from="$config" name="c">
                        	<if value="$c.type eq '性能优化'">
                        		<tr>
                        			<td>
                        				<input type="text" value="{$c.order_list}" class="w30" name="order_list[{$c.name}]"/>
                        			</td>
	                        		<td>{$c.title}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="email">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w50">排序</th>
                    		<th  class="w150">标题</th>
                    		<th>配置</th>
                    		<th class="w300">变量</th>
                    		<th class="w300">描述</th>
                    	</tr>
                    	<list from="$config" name="c">
                        	<if value="$c.type eq '邮箱配置'">
                        		<tr>
                        			<td>
                        				<input type="text" value="{$c.order_list}" class="w30" name="order_list[{$c.name}]"/>
                        			</td>
	                        		<td>{$c.title}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message}</td>
                        		</tr>
                            </if>
                        </list>
                        <tr>
                        	<td colspan="4">
                        		<button class="hd-cancel-small" id="checkEmail" type="button">发邮件测试</button>
                        	</td>
                        </tr>
                    </table>
                </div>
                <div id="cookie">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w50">排序</th>
                    		<th  class="w150">标题</th>
                    		<th>配置</th>
                    		<th class="w300">变量</th>
                    		<th class="w300">描述</th>
                    	</tr>
                    	<list from="$config" name="c">
                        	<if value="$c.type eq 'COOKIE配置'">
                        		<tr>
                        			<td>
                        				<input type="text" value="{$c.order_list}" class="w30" name="order_list[{$c.name}]"/>
                        			</td>
	                        		<td>{$c.title}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="session">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w50">排序</th>
                    		<th  class="w150">标题</th>
                    		<th>配置</th>
                    		<th class="w300">变量</th>
                    		<th class="w300">描述</th>
                    	</tr>
                    	<list from="$config" name="c">
                        	<if value="$c.type eq 'SESSION配置'">
                        		<tr>
                        			<td>
                        				<input type="text" value="{$c.order_list}" class="w30" name="order_list[{$c.name}]"/>
                        			</td>
	                        		<td>{$c.title}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="custom">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w50">排序</th>
                    		<th  class="w150">标题</th>
                    		<th>配置</th>
                    		<th class="w300">变量</th>
                    		<th class="w300">描述</th>
                    		<th class="w100">操作</th>
                    	</tr>
                    	<list from="$config" name="c">
                        	<if value="$c.type eq '自定义'">
                        		<tr>
                        			<td>
                        				<input type="text" value="{$c.order_list}" class="w30" name="order_list[{$c.name}]"/>
                        			</td>
	                        		<td>{$c.title}</td>
	                        		<td>
	                        			{$c.html}
	                        		</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message}</td>
	                        		<td>
	                        			<a href="javascript:hd_confirm('确证删除吗？',function(){hd_ajax('{|U:'del'}', {id: {$c.id}})})">
	                        				删除
	                        			</a>
	                        		</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" class="hd-success" value="确定"/>
        <a href="{|U:'add'}" class="hd-cancel">添加配置</a>
    </div>
</form>
<script type="text/javascript" charset="utf-8">
	$("#checkEmail").click(function(){
		$.post("{|U:'checkEmail'}",$('form').serialize(),function(json){
				if(json.state){
					alert(json.message);
				}else{
					alert(json.message);
				}
			},'json');
	})
</script>
</body>
</html>