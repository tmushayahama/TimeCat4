<?php
/* @var $this NameTitleController */
/* @var $model NameTitle */

$this->breadcrumbs=array(
	'Name Titles'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NameTitle', 'url'=>array('index')),
	array('label'=>'Create NameTitle', 'url'=>array('create')),
	array('label'=>'View NameTitle', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage NameTitle', 'url'=>array('admin')),
);
?>

<h1>Update NameTitle <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>