<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Videos */

$this->title = 'Create Videos';
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="videos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'],
    ])?>

    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="upload-icon">
            <img src="../../images/photo.svg" alt="">
        </div>
        <p>Drag and drop a file you want to upload</p>
        <p class="text-muted">Your video will remain private until you publish it.
        </p>
        <button class="btn btn-file btn-primary "> Select a file
            <input type="file" id="upload-file" name="video">
        </button>
            
    </div>

    <?php ActiveForm::end()?>
</div>
