<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Feed */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feed-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'default' => 'Default', 'sandbox' => 'Sandbox', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'api_version_min')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'api_version_max')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enabled')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
