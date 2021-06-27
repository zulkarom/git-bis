    <?php
    use backend\models\Header;
    use yii\helpers\Html;
    ?>

    <header id="header" class="section">
         <div class="w-embed w-script">
            <script>
               if (window.NodeList && !NodeList.prototype.forEach) {
                 NodeList.prototype.forEach = function (callback, thisArg) {
                   thisArg = thisArg || window;
                   for (var i = 0; i < this.length; i++) {
                     callback.call(thisArg, this[i], i, this);
                   }
                 };
               }
            </script>
         </div>
         <div class="all-pages-styles w-embed">
            <style>
               html {
               font-size: 62.5%;
               }
               body {
               line-height: 1.56;
               color: #2d3239;
               font-size: 16px;
               background-color: #fff;
               text-rendering: geometricPrecision;
               -webkit-font-smoothing: antialiased;
               font-family: "Adriane", "Times new Roman", serif;
               }
               a {
               font-family: "Neuzeit", "Arial", sans-serif;
               color: #2d3239;
               }
               .animated {
               animation-duration: 2s;
               animation-fill-mode: both;
               }
               .animated.infinite {
               animation-iteration-count: infinite;
               -webkit-animation-iteration-count: infinite;
               }
               @keyframes shake {
               from,
               to {
               transform: translate3d(0, 0, 0);
               }
               10%,
               30%,
               50% {
               transform: translate3d(0, -5px, 0);
               }
               20%,
               40%,
               60% {
               transform: translate3d(0, 5px, 0);
               }
               70%,
               100% {
               transform: translate3d(0, 0, 0);
               }
               }
               .shake {
               animation-delay: 1s;
               animation-name: shake;
               }
               .row-section {
               font-size: 1.6rem;
               }
               .row-section.dark-block a {
               color: white;
               }
               .w-container {
               max-width: 1440px !important;
               }
               #header .w-nav-link { 
               letter-spacing: 3.3px;
               font-size: 1.2rem;
               padding-left: 15px;
               padding-right: 15px;
               font-family: "Adriane", "Times new Roman", serif;
               }
               #header .w-nav-link.w--current {
               color: #2d3239;
               }
               #header .w-nav-link::after {
               background-color: #2d3239;
               bottom: -3px;
               left: -1px;
               content: '';
               display: block;
               height: 1px;
               margin: 0 auto;
               position: relative;
               transition: width .16s ease-in-out;
               width: 0;
               }
               #header .w-nav-link:hover::after,
               #header .w-nav-link.w--current::after {
               width: 100%;
               }
               .title-with-border,
               .title-with-doubleborder {
               border-top: 1px solid #2d3239;
               color: #2d3239;
               display: block;
               position: relative;
               width: 100%;
               }
               .column-line {
               border-right: 1px solid #2d3239;
               color: #2d3239;
               display: block;
               position: relative;
               width: 100%;
               }
               .title-with-border::before,
               .title-with-doubleborder::before {
               border-top: 3px solid #2d3239;
               display: block;
               content: '';
               height: 1px;
               position: absolute;
               top: 0;
               width: 220px;
               }
               .title-with-doubleborder.doubleborder-light {
               border-color: rgba(255,255,255, .5);
               }
               .title-with-doubleborder.doubleborder-light::before {
               border-color: white;
               }
               .section-divider::before,
               .section-divider::after {
               content: '';
               display: block;
               height: 50px;
               left: 50%;
               position: absolute;
               width: 1px;
               }
               .section-divider::before {
               bottom: 0;
               background-color: #2d3239;
               }
               .section-divider::after {
               bottom: -50px;
               background-color: white;
               }
               .section-divider.invert::before {background-color: white;}
               .section-divider.invert::after {background-color: #2d3239;}
               .aside-nav-item-link {
               font-family: "Adriane", "Times new Roman", serif;
               }
               .aside-nav-item:not(.first) .aside-nav-item-link::before {
               border-bottom: 1px solid #ddd;
               content: '';
               bottom: 0;
               position: absolute;
               width: 1000px;
               right: 0;
               }
               .aside-nav-item .aside-nav-item-sub {
               display: none;
               }
               .aside-nav-item .aside-nav-item-link.w--current + .aside-nav-item-sub {
               display: block;
               }
               .aside-nav-item .aside-nav-item-sub .aside-nav-item-sub-link.w--current {
               font-weight: bold;
               }
               @media screen and (max-width: 767px) {
               .aside-nav-item-link:not(.mobile-nav-toggle),
               .aside-nav-item > .aside-nav-item-sub{
               border-left: 1px solid #ddd;
               }
               .aside-nav-item:not(.first) .aside-nav-item-link::before {
               width: 100%;
               }
               }
               .collapsible {
               overflow: hidden;
               }
               .collapsible .collapsible-body {
               transition: opacity 0.3s ease-in-out;
               height: 0;
               opacity: 0;
               }
               .collapsible .collapsible-body.show,
               .collapsible.open .collapsible-body {
               height: auto;
               opacity: 1;
               }
               .rket-table-item-col.last {
               font-family: "Neuzeit", "Arial", sans-serif;
               }
               .rket-table-item-col.last a {
               color: #2d3239;
               font-weight: 600;
               }
               .w-tab-link .tab-title::after {
               background-color: transparent;
               content: '';
               display: block;
               height: 1px;
               width: 1px;
               transition: background-color .15s ease-in-out, width .15s ease-in-out;
               }
               .w-tab-link.w--current {
               background-color: transparent;
               }
               .w-tab-link.w--current .tab-title::after {
               background-color: #2d3239;
               width: 100%;
               }
               .news-item a {
               font-family: "Adriane", "Times new Roman", serif;
               }
               .rket-table a,
               .rket-v-table .w-richtext a {
               font-weight: bold;
               }
               sup,
               .superscript {
               font-size: 75%;
               vertical-align: super;
               }
               .ghost-button {
               transition: background-color .15s ease-in-out, border-color .15s ease-in-out, color .15s ease-in-out;
               }
               @media screen and (min-width: 768px) {
               .ghost-button:hover {
               color: #d2cdc6;
               background-color: #2d3239;
               border-color: #121417;
               }
               .ghost-button.ghost-button--white:hover {
               color: #000;
               background-color: #fff;
               border-color: #e0e0e0;
               }
               .ghost-button.ghost-button--white.ghost-button--inverse:hover {
               color: #d2cdc6;
               background-color: #2d3239;
               border-color: #e0e0e0;
               }
               }
               a > .icon-arrow {
               transition: transform .15s ease-in-out;
               }
               a:hover > .icon-arrow {
               transform: translateX(6px);
               }
               a.footer-link:hover {
               color: #b3b3b3;
               }
               @media screen and (max-width: 767px) {
               .hide-mobile {
               display: none;
               }
               #header .w-nav[data-collapse="small"] .w-nav-menu {
               background-color: #2d3239;
               }
               #header .w-nav[data-collapse="small"] .w-nav-menu a.mobile-nav-link,
               #header .w-nav[data-collapse="small"] .w-nav-menu a.mobile-nav-link.w--current{
               color: white;
               }
               #header .w-nav[data-collapse="small"] .w-nav-menu a.mobile-nav-link.w--current {
               font-weight: bold;
               }
               }
               .rket-table-item:last-of-type {
               border-bottom: none;
               }
               .visible {
               display: block !important;
               }
               .hide {
               display: none !important;
               }
               .icon-arrow-down.icon-arrow-up, .icon-arrow-up.icon-arrow-up {
               transform: rotate(180deg) translateY(10px) !important;
               }

               /*.page-first-row {
    
                   max-width: 1000px;
                   margin-right: auto;
                   margin-left: auto;
                   
               }*/


            </style>


         </div>


         <div data-collapse="small" data-animation="default" data-duration="400" data-no-scroll="1" data-doc-height="1" role="banner" class="navbar w-nav">
            <div class="container container-header w-container">
               <a href="" aria-current="page" class="brand w-nav-brand w--current">
                  <div class="html-embed w-embed"><img src="<?= $dirAssests?>/pictures/logo-menu.png" alt="" class="heading" width="150" ></div>
               </a>
               <nav role="navigation" class="nav-menu w-nav-menu">
                  <a href="#" class="mobile-nav-link w-nav-link">HOME</a>
                  <a href="#" class="mobile-nav-link w-nav-link">ABOUT</a>
                  <a href="#" class="mobile-nav-link investors w-nav-link">PORTFOLIO</a>
                  <a href="#" class="mobile-nav-link w-nav-link">BLOG</a>
                  <a href="#" class="mobile-nav-link w-nav-link">APPLY</a>
               </nav>
               <div class="menu-button text-uppercase w-nav-button">
                  <div class="text-block">menu</div>
               </div>
            </div>
         </div>

      </header>

       <div class="row-section padding-tb-xxl homepage-first-row">
         <img src="<?= $dirAssests?>/pictures/logo-hatchniaga.png" alt="" class="heading" width="500"><br/>
         
         <h2 class="heading-2"><?=Html::encode($intro->title_content)?><br/></h2>
         <p class="paragraph font-size-small text-grey text-center"><?=Html::encode($intro->intro_content)?><br/></p>
         
      </div>