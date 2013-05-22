<?php
/* @var $this NameTitleController */
/* @var $model NameTitle */

$this->breadcrumbs=array(
	'Name Titles'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List NameTitle', 'url'=>array('index')),
	array('label'=>'Create NameTitle', 'url'=>array('create')),
	array('label'=>'Update NameTitle', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NameTitle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NameTitle', 'url'=>array('admin')),
);
?>

<h1>View NameTitle #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
	),
)); ?>
