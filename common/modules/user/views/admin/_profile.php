<?php

/*
 * This file is part of the Dektrium project
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View                    $this
 * @var dektrium\user\models\User       $user
 * @var dektrium\user\models\Profile    $profile
 */

$module = $this->context->module;
?>

<?php $this->beginContent('@dektrium/user/views/admin/update.php', ['user' => $user]) ?>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-9',
        ],
    ],
]); ?>

<?php if (in_array('name', $module->profileFields)): ?><?= $form->field($profile, 'name') ?><?php endif; ?>
<?php if (in_array('public_email', $module->profileFields)): ?><?= $form->field($profile, 'public_email') ?><?php endif; ?>
<?php if (in_array('website', $module->profileFields)): ?><?= $form->field($profile, 'website') ?><?php endif; ?>
<?php if (in_array('location', $module->profileFields)): ?><?= $form->field($profile, 'location') ?><?php endif; ?>
<?php if (in_array('gravatar_email', $module->profileFields)): ?><?= $form->field($profile, 'gravatar_email') ?><?php endif; ?>
<?php if (in_array('bio', $module->profileFields)): ?><?= $form->field($profile, 'bio')->textarea() ?><?php endif; ?>


<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <?= Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-block btn-success']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

<?php $this->endContent() ?>
