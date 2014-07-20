<?php

/**
 * 栏目操作模型
 * Class CategoryModel
 */
class CategoryModel extends ViewModel
{
	public $table='category';
	public $view=array(
        'category'=>array('_type'=>'INNER'),
		'model'=>array('_type'=>'INNER','_on'=>'category.mid=model.mid'
		)
	);
	
}