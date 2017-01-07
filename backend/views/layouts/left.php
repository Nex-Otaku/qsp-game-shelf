<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    // Общее для всех проектов.
                    ['label' => Yii::t('app', 'Development'), 'options' => ['class' => 'header']],
                    ['label' => Yii::t('app', 'Gii'), 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => Yii::t('app', 'Debug'), 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    
                    // Специфично для проекта.
                    ['label' => Yii::t('app', 'Admin'), 'options' => ['class' => 'header']],
                    ['label' => Yii::t('app', 'Feeds'), 'icon' => 'fa fa-file-code-o', 'url' => ['feed/index']],
                    ['label' => Yii::t('app', 'Users'), 'icon' => 'fa fa-user', 'url' => ['/user/admin/index']],
                    
                    // Примеры для пунктов меню.
                    /*
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Same tools',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'fa fa-circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                     */
                ],
            ]
        ) ?>

    </section>

</aside>
