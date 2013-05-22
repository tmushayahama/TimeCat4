<?php
/* @var $this TimezoneController */
/* @var $model Timezone */

$this->breadcrumbs=array(
	'Timezones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Timezone', 'url'=>array('index')),
	array('label'=>'Create Timezone', 'url'=>array('create')),
	array('label'=>'Update Timezone', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Timezone', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Timezone', 'url'=>array('admin')),
);
?>

<h1>View Timezone #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'location',
		'gmt_time_offset',
		'description',
	),
)); ?>
