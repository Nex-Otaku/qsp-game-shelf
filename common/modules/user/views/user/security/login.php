<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dektrium\user\widgets\Connect;

$this->title = Yii::t('app', 'Login in top100edu.ru Profile');
$this->params['breadcrumbs'][] = $this->title;
$this->params['css']['body']['class'] = 'account';

?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="row">
    <h1 class="t-center m-t-20"><?= Html::encode($this->title) ?></h1>
    <div class="col-sm-6 col-md-4 col-md-offset-4">

        <div class="account-wall">
            <i class="user-img icons-faces-users-03"></i>
            <div id="LoginFormContainer">
                <?php $form = ActiveForm::begin(['id' => 'LoginForm', 'class' => "form-signup"]); ?>
                    <div class="append-icon">
                        <?= $form->field($model, 'login', [
                            'inputOptions' => [
                                'id' => 'username',
                                'class' => 'form-control form-white username',
                                'placeholder' => $model->getAttributeLabel('login')
                            ],
                            'enableLabel' => false
                        ]); ?>
                        <i class="icon-user"></i>
                    </div>
                    <div class="append-icon m-b-20">
                        <?= $form->field($model, 'password', [
                            'inputOptions' => [
                                'type' => 'password',
                                'class' => 'form-control form-white password',
                                'placeholder' => $model->getAttributeLabel('password')
                            ],
                            'enableLabel' => false
                        ]); ?>
                        <i class="icon-lock"></i>
                    </div>

                    <?= Html::submitButton(Yii::t('app', 'Sign In'), ['id' => "submit-form", 'class' => 'btn btn-lg btn-danger btn-block', 'name' => 'login-button']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <?= Connect::widget([
            'baseAuthUrl' => ['/user/security/auth'],
            'options' => ['class' => 'social-buttons']
        ]); ?>
        
        <div>
            <?php if ($module->enablePasswordRecovery): ?>
            <p class="text-center">
                <?= Html::a(
                        Yii::t('user', 'Forgot password?'),
                        ['/user/recovery/request'],
                        ['tabindex' => '5']
                    ); ?>
            </p>
            <?php endif; ?>
            <?php if ($module->enableConfirmation): ?>
                <p class="text-center">
                    <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
                </p>
            <?php endif ?>
            <?php if ($module->enableRegistration): ?>
                <p class="text-center">
                    <?= Html::a(Yii::t('user', 'Don\'t have an account? Sign up!'), ['/user/registration/register']) ?>
                </p>
            <?php endif ?>
        </div>
    </div>
</div>
