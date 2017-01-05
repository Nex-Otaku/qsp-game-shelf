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
 * @var \yii\web\View $this
 * @var \dektrium\user\models\Profile $profile
 */

$this->title = empty($profile->name) ? Html::encode($profile->user->username) : Html::encode($profile->name);
$this->params['breadcrumbs'][] = $this->title;
$module = $this->context->module;
?>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <?php if ($module->enableGravatar): ?>
                <?= Html::img($profile->getAvatarUrl(230), [
                    'class' => 'img-rounded img-responsive',
                    'alt'   => $profile->user->username,
                ]) ?>
                <?php endif; ?>
            </div>
            <div class="col-sm-6 col-md-8">
                <h4><?= $this->title ?></h4>
                <ul style="padding: 0; list-style: none outside none;">
                    <?php if (in_array('location', $module->profileFields) && !empty($profile->location)): ?>
                        <li><i class="glyphicon glyphicon-map-marker text-muted"></i> <?= Html::encode($profile->location) ?></li>
                    <?php endif; ?>
                    <?php if (in_array('website', $module->profileFields) && !empty($profile->website)): ?>
                        <li><i class="glyphicon glyphicon-globe text-muted"></i> <?= Html::a(Html::encode($profile->website), Html::encode($profile->website)) ?></li>
                    <?php endif; ?>
                    <?php if (in_array('public_email', $module->profileFields) && !empty($profile->public_email)): ?>
                        <li><i class="glyphicon glyphicon-envelope text-muted"></i> <?= Html::a(Html::encode($profile->public_email), 'mailto:' . Html::encode($profile->public_email)) ?></li>
                    <?php endif; ?>
                    <li><i class="glyphicon glyphicon-time text-muted"></i> <?= Yii::t('user', 'Joined on {0, date}', $profile->user->created_at) ?></li>
                </ul>
                <?php if (in_array('bio', $module->profileFields) && !empty($profile->bio)): ?>
                    <p><?= Html::encode($profile->bio) ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
