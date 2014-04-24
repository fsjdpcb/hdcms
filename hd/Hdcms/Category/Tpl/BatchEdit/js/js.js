$(function(){
	alert_div();
})

function alert_div(){
	var _h = $(window).height()-180;
	$("div.category").css({height:_h+'px'});
}
$(window).resize(function(){
	alert_div();
})

$(function(){
	$('input[type=radio]').dblclick(function(e){
		var tr_index =$($(this).parents('tr')).index();
		var label_index =$($(this).parent()).index();
		$("table.category").each(function(){
			$(this).find('tr').eq(tr_index).find('label').eq(label_index).find('input').attr('checked','checked');
		})
	})
	$('label').dblclick(function(e){
		var tr_index =$($(this).parents('tr')).index();
		var label_index =$(this).index();
		$("table.category").each(function(){
			$(this).find('tr').eq(tr_index).find('label').eq(label_index).find('input').attr('checked','checked');
		})
	})
})
