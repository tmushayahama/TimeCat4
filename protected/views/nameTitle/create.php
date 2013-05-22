<?php
/* @var $this NameTitleController */
/* @var $model NameTitle */

$this->breadcrumbs=array(
	'Name Titles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NameTitle', 'url'=>array('index')),
	array('label'=>'Manage NameTitle', 'url'=>array('admin')),
);
?>

<h1>Create NameTitle</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>