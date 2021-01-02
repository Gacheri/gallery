<?php

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class'=>'shadow-sm navbar-light navbar-expand-lg'
        ],
    ]);
    $menuItems = [
        ['label' => 'Create', 'url' => ['/video/create']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
                'label'=>'logout ('.Yii::$app->user->identity->username.')',
                'url'=>['site/logout'],
                'linkOptions'=>[
                    'data-method'=>'post',
                ]
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'ml-auto'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>