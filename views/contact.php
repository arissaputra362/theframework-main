<?php

/** @var $this \ti2018b\phpmvc\View */
/** @var $model \app\models\ContactForm */

use ti2018b\phpmvc\form\TextareaField;

$this->title = 'Contact';

?>

<h1>Contact</h1>

<?php $form = \ti2018b\phpmvc\form\Form::begin('', 'post') ?>

<?php echo $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo new TextareaField($model, 'body') ?>
<button type="submit" class="btn btn-primary">Submit</button>

<?php \ti2018b\phpmvc\form\Form::end(); ?>