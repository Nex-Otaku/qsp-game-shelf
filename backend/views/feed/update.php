<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Feed */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
   'modelClass' => 'Feed',
]) . $model->slug;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Feeds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->slug, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="feed-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
