<?php
/* @var $this NameTitleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Name Titles',
);

$this->menu=array(
	array('label'=>'Create NameTitle', 'url'=>array('create')),
	array('label'=>'Manage NameTitle', 'url'=>array('admin')),
);
?>

<h1>Name Titles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
