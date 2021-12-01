<?php 

$web = Yii::getAlias('@web');
?>
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Hatchniaga @ Consultation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Doot - Responsive Chat App Template in HTML. A fully featured HTML chat messenger template in Bootstrap 5" name="description" />
        <meta name="keywords" content="Doot chat template, chat, web chat template, chat status, chat template, communication, discussion, group chat, message, messenger template, status"/>
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?=$web?>/chat/images/favicon.ico">

        <!-- glightbox css -->
        <link rel="stylesheet" href="<?=$web?>/chat/libs/glightbox/css/glightbox.min.css">

        <!-- swiper css -->
        <link rel="stylesheet" href="<?=$web?>/chat/libs/swiper/swiper-bundle.min.css">

        
        <!-- Bootstrap Css -->
        <link href="<?=$web?>/chat/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?=$web?>/chat/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?=$web?>/chat/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


    </head>

    <body>

        <?=$content?>
        <!-- end  layout wrapper -->



      
    </body>
</html>
