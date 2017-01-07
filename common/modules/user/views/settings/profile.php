<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $profile
 */

$this->title = Yii::t('user', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;

$module = $this->context->module;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Html::encode($this->title) ?>
            </div>
            <div class="panel-body">
                <?php $form = \yii\widgets\ActiveForm::begin([
                    'id' => 'profile-form',
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                        'labelOptions' => ['class' => 'col-lg-3 control-label'],
                    ],
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                    'validateOnBlur'         => false,
                ]); ?>

                <?php if (in_array('name', $module->profileFields)): ?>
                <?= $form->field($model, 'name') ?>
                <?php endif; ?>

                <?php if (in_array('public_email', $module->profileFields)): ?>
                <?= $form->field($model, 'public_email') ?>
                <?php endif; ?>

                <?php if (in_array('website', $module->profileFields)): ?>
                <?= $form->field($model, 'website') ?>
                <?php endif; ?>

                <?php if (in_array('location', $module->profileFields)): ?>
                <?= $form->field($model, 'location') ?>
                <?php endif; ?>

                <?php if (in_array('timezone', $module->profileFields)): ?>
                <?= $form
                    ->field($model, 'timezone')
                    ->dropDownList(
                        \yii\helpers\ArrayHelper::map(
                            \dektrium\user\helpers\Timezone::getAll(),
                            'timezone',
                            'name'
                        )
                    ); ?>
                <?php endif; ?>

                <?php if (in_array('gravatar_email', $module->profileFields)): ?>
                <?= $form
                    ->field($model, 'gravatar_email')
                    ->hint(
                        \yii\helpers\Html::a(
                            Yii::t('user', 'Change your avatar at Gravatar.com'),
                            'http://gravatar.com'
                        )
                    ) ?>
                <?php endif; ?>

                <?php if (in_array('bio', $module->profileFields)): ?>
                <?= $form->field($model, 'bio')->textarea() ?>
                <?php endif; ?>

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <?= \yii\helpers\Html::submitButton(
                            Yii::t('user', 'Save'),
                            ['class' => 'btn btn-block btn-success']
                        ) ?><br>
                    </div>
                </div>

                <?php \yii\widgets\ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
