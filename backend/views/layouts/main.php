<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
$dirAssests=Yii::$app->assetManager->getPublishedUrl('@backend/views/myassets');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BizVentur - Admin Dashboard</title>

    
    
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $dirAssests?>/images/favicon.png">
    <?php $this->head() ?>
    <?php $this->registerCsrfMetaTags() ?>
    
</head>
<body>
<?php $this->beginBody() ?>

 <!--*******************
        Preloader start
    ********************-->
    <?=$this->render('preloader', [    
        'dirAssests' => $dirAssests,
    ]);
    ?>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?=$this->render('nav-header', [    
        'dirAssests' => $dirAssests,
        ]);
        ?> 
        <!--**********************************
            Nav header end
        ***********************************-->
        
        <!--**********************************
            Chat box start
        ***********************************-->
        <?=$this->render('chatbox', [    
        'dirAssests' => $dirAssests,
        ]);
        ?>
        <!--**********************************
            Chat box End
        ***********************************-->
        
        <!--**********************************
            Header start
        ***********************************-->
        <?=$this->render('header', [    
        'dirAssests' => $dirAssests,
        ]);
        ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?=$this->render('sidebar', [    
        'dirAssests' => $dirAssests,
        ]);
        ?>
        <!--**********************************
            Sidebar end
        ***********************************-->
        
        <!--**********************************
            Content body start
        ***********************************-->
         <?= $this->render(
            'content-body.php',
            ['content' => $content, 'dirAssests' => $dirAssests]
        ) ?>
        <!--**********************************
            Content body end
        ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


    <!--**********************************
        Scripts
    ***********************************-->
    
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
