<?php
use website\assets\AppAsset;
use yii\helpers\Html;
use backend\modules\website\models\Section;
use backend\modules\website\models\Introduction;

AppAsset::register($this);
$dirAssests=Yii::$app->assetManager->getPublishedUrl('@website/views/myassets');

$section = Section::find()->all();
$intro = Introduction::findOne(1);

?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8"/>

      <title><?=Yii::$app->params['appName']?> | Online Incubation Platform</title>
      <link rel = "icon" href ="<?= $dirAssests?>/icon/favicon.png" 
        type = "image/x-icon"> 

      <meta content="width=device-width, initial-scale=1" name="viewport"/>

     
      <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif]-->
    
    
      <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    
    
        <?php $this->head() ?>
        <?php $this->registerCsrfMetaTags() ?>




  <style>
.company-item .companies-image--black:first-of-type {
  transition: opacity .16s ease-in-out;
}
.company-item:hover .companies-image--black:first-of-type {
  opacity: 0;
}

.nectar_image_with_hotspots .nectar_hotspot_wrap{position:absolute!important; width:30px; height:30px}
.nectar_image_with_hotspots .nectar_hotspot_wrap .nttip{position:relative; display:block; opacity:0; z-index:900; cursor:default; background-color:#fff; padding:23px; max-width:250px; transition:opacity 0.3s; -webkit-transition:opacity 0.3s; line-height:22px; font-size:14px; color:#666; border-radius:10px; pointer-events:none}




.company-item {
    position: relative;
    width: 25%;
    padding: 10px;
    -webkit-box-flex: 0;
    -webkit-flex: 0 0 auto;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
}

.our-companies-col-panel {
    height: 325px;
    padding: 60px 30px;
    border: 1px solid #ddd;
    border-radius: 1px;
    background-color: #fff;
}

.company-link {
  position: relative;
  border: 1px solid #ddd;
}

.w-inline-block {
    max-width: 100%;
    display: inline-block;
}

.padding-tb-xl {
    padding-top: 60px;
    padding-bottom: 60px;
}
.container-layout {
    display: block;
    width: 100%;
    max-width: 1100px;
    padding-right: 60px;
    padding-left: 60px;
}
.margin-auto {
    position: relative;
    margin-right: auto;
    margin-left: auto;
}
.grid-container {
  display: grid;
  grid-auto-rows: 300px;
}
.grid-containerCol {
  display: grid;
  grid-template-columns: 1000px;
}
p.big {
  line-height: 1.8;
  font-family: "Neuzeit", "Arial", sans-serif;
}
.contact_btn {
    background-color: #aec6cf;
    display: block;
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: center;
    color: white;
    border-radius: 12px;
    width: 180px;
    margin: 0 auto;
}
div.d {
  text-align: justify;
}
.img-container {
        text-align: center;
      }


    </style>
   </head>
   <body class="body-3">
    <?php $this->beginBody() ?>


    <?=$this->render('header', [    
        'dirAssests' => $dirAssests,
        'intro' => $intro,
    ]);
    ?>
    
    <br /><br /><br /><br />
    <?php echo $content?>
<br /><br /><br />

       <?=$this->render('footer', [    

       ]);
       ?>

    

     
      <?php $this->endBody() ?>
   </body>
</html>

<?php $this->endPage() ?>