<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model vendor\kuakling\yii2cms\modules\navigation\models\NavigationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="navigation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'detail') ?>

    <?= $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'post_date') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <?php // echo $form->field($model, 'attr_extra') ?>

    <?php // echo $form->field($model, 'display') ?>

    <?php // echo $form->field($model, 'parent_id') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
