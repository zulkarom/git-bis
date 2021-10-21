<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Breadcrumbs;
use backend\assets\HatchniagaAsset;
use backend\assets\AppAsset;

AppAsset::register($this);
HatchniagaAsset::register($this);


$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/hatchniaga');


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= $dirAssests?>/images/favicon.ico">
    <!-- <title>Husoe</title> -->
    <title><?= Html::encode($this->title) ?></title>

    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>

</head>

<body class="hold-transition light-skin theme-primary">
<?php $this->beginBody() ?>
<!-- Site wrapper -->
<div class="wrapper">

    <?=$this->render('header', [    
        'dirAssests' => $dirAssests,
    ]);
    ?>


    <?=$this->render('menu-expert', [    
        'dirAssests' => $dirAssests,
    ]);
    ?>

     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <div class="container-full">
        <!-- Content Header (Page header) -->
        <?php if(Yii::$app->controller->module->id != 'chatExpert'){
            ?>
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="w-p100 d-md-flex align-items-center justify-content-between">
                    <h3 class="page-title"><?= Html::encode($this->title) ?></h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <?php echo
                                     Breadcrumbs::widget(
                                         [
                                             'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                         ]
                                     ) 
                                ?>
                            </ol>
                        </nav>
                    </div>
                </div>
                
            </div>
        </div>
    <?php } ?>
        <!-- Main content -->
        <section class="content">
            <?= Alert::widget() ?>
            <?=$content?>
        </section>

        <!-- /.content -->
      </div>
  </div>
  <!-- /.content-wrapper -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>