<?php
/* @var $this TimezoneController */
/* @var $model Timezone */

$this->breadcrumbs=array(
	'Timezones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Timezone', 'url'=>array('index')),
	array('label'=>'Create Timezone', 'url'=>array('create')),
	array('label'=>'View Timezone', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Timezone', 'url'=>array('admin')),
);
?>

<h1>Update Timezone <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>