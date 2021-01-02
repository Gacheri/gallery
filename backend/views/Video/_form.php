<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Videos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="videos-form">
    <div class="row">
        <div class="col-md-8">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>
        
        </div>
        <div class="col-md-4">
            video
            
            <?= $form->field($model, 'status')->textInput() ?>
        </div>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
