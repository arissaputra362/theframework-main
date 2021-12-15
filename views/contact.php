<?php

/** @var $this \ti2018b\phpmvc\View */
/** @var $model \app\models\ContactForm */

use ti2018b\phpmvc\form\TextareaField;

$this->title = 'Contact';

?>

<h1>Contact</h1>

<?php $form = \ti2018b\phpmvc\form\Form::begin('', 'post') ?>

<?php echo $form->field($model, 'username') ?>
<?php echo $form->field($model, 'nim') ?>
<button type="submit" class="btn btn-primary">Submit</button>

<?php \ti2018b\phpmvc\form\Form::end(); ?>