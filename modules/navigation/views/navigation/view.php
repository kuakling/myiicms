<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model vendor\kuakling\yii2cms\modules\navigation\models\Navigation */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Navigations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="navigation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'title',
            'detail:ntext',
            'user_id',
            'post_date',
            'update_date',
            'attr_extra',
            'display',
            'parent_id',
            'sort',
        ],
    ]) ?>

</div>
