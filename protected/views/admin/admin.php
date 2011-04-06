<?php
$this->breadcrumbs=array(
	'Admins',
);

$this->menu=array(
	array('label'=>'List Admin', 'url'=>array('index')),
	array('label'=>'Create Admin', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('admin-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Admins</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<!-- start comment advance search -->
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); 
?>
<div class="search-form" style="display:none">
<?php // $this->renderPartial('_search',array('model'=>$model,)); 
?>
</div><!-- search-form -->
<!-- end comment advance search -->

<?php
echo "<div>[ ".CHtml::link('Create Admin', array('admin/create'),array())." ] </div>\n";

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'lastname',
		'firstname',
		'email',
		'phone',
		'username',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
?>
