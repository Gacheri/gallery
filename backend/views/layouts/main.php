<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
$this->beginContent('@backend/views/layouts/base.php')
?>

<div class="h-100 wrap d-flex flex-column">
    
    <main class="d-flex" id="main">

        <?php echo $this->render('sidebar')?>
        
        <div class="content-wrapper p-3">
            <div class="d-flex">
            <?= Alert::widget() ?>
            <?= $content ?>
            </div>
        </div>
    </main>

</div>
<?php $this->endContent() ?>


