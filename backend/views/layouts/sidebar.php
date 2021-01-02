<?php
    use yii\bootstrap4\Nav;
?>
<aside>
<?= Nav::widget([
    'items'=>[
        [
            'label'=>'Dashboard',
            'url'=>['site/index']
        ],
        [
            'label'=>'Videos',
            'url'=>['video/index']
        ]
    ],
    'options'=>[
        'class'=>'flex-column d-flex shadow side'
    ]

])?>
</aside>
