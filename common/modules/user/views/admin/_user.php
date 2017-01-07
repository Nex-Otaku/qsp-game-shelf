<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

/**
 * @var yii\widgets\ActiveForm      $form
 * @var dektrium\user\models\User   $user
 */
$module = $this->context->module;
?>

<?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>
<?php if (!$module->useEmailAsUsername): ?>
<?= $form->field($user, 'username')->textInput(['maxlength' => 255]) ?>
<?php endif; ?>
<?= $form->field($user, 'password')->passwordInput() ?>
