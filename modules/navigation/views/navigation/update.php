<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model vendor\kuakling\yii2cms\modules\navigation\models\Navigation */

$this->title = 'Update Navigation: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Navigations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="navigation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
