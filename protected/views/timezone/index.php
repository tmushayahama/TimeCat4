<?php
/* @var $this TimezoneController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Timezones',
);

$this->menu=array(
	array('label'=>'Create Timezone', 'url'=>array('create')),
	array('label'=>'Manage Timezone', 'url'=>array('admin')),
);
?>

<h1>Timezones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
