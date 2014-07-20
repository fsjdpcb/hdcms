<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>栏目列表</title>
		<hdjs/>
        <js file="__CONTROLLER_TPL__/js/index.js"/>
		<style type="text/css">
			img.explodeCategory{
				cursor: pointer;
			}
		</style>
	</head>
	<body>
		<form action='{|U:'BulkEdit'}' method="post">
			<div class="wrap">
				<div class="menu_list">
					<ul>
						<li>
							<a href="{|U:index}" class="action">
								栏目列表
							</a>
						</li>
						<li>
							<a href="{|U:'add'}">
								添加顶级栏目
							</a>
						</li>
						<li>
							<a href="javascript:hd_ajax('{|U:updateCache}')">
								更新栏目缓存
							</a>
						</li>
					</ul>
				</div>
				<table class="table2 hd-form">
					<thead>
						<tr>
							<td class="w30">
							<input type="checkbox" class="select_all"/>
							</td>
							<td class="w30">CID</td>
							<td class="w50">排序</td>
							<td>栏目名称</td>
							<td class="w100">类型</td>
							<td class="w100">模型</td>
							<td class="w180">操作</td>
						</tr>
					</thead>
					<tbody>
						<list from="$category" name="c">
							<tr <if value="$c.pid eq 0">class="top"</if>>
								<td>
									<input type="checkbox" name="cid[]" value="{$c.cid}"/>
								</td>
								<td>{$c.cid}</td>
								<td>
									<input type="text" class="w30" value="{$c.catorder}" name="list_order[{$c.cid}]"/>
								</td>
								<td>
									<if value="$c.pid eq 0">
										<img src="__CONTROLLER_TPL__/img/contract.gif" action="2" class="explodeCategory"/>
									</if>
									{$c._name}
								</td>
								<td>{$c.cat_type_name}</td>
								<td>{$c.model_name}</td>
								<td>
								<a href="<?php echo Url::getCategoryUrl($c)?>" target="_blank">
									访问
								</a>
									<span class="line">|</span>
								<a href="{|U:'add',array('pid'=>$c['cid'],'mid'=>$c['mid'])}">
									添加子栏目
								</a>
									<span class="line">|</span>
								<a href="{|U:'edit',array('cid'=>$c['cid'])}">
									修改
								</a>
									<span class="line">|</span>
								<a href="javascript:hd_confirm('确证删除吗？',function(){hd_ajax(CONTROLLER + '&a=del', {cid: {$c.cid},mid: {$c.mid}})})">
									删除
								</a></td>
							</tr>
						</list>
					</tbody>
				</table>
				<div class="h60"></div>
			</div>
			<div class="position-bottom">
				<input type="button" class="hd-cancel" onclick="select_all(1)" value='全选'/>
				<input type="button" class="hd-cancel" onclick="select_all(0)" value='反选'/>
				<input type="button" class="hd-cancel" onclick="updateOrder()" value="更改排序"/>
				<input type="button" class="hd-cancel" onclick="BulkEdit()" value="批量编辑"/>				
			</div>
		</form>
	</body>
</html>