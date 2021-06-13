<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);

$dirAssests=Yii::$app->assetManager->getPublishedUrl('@frontend/views/myassets');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?= $dirAssests?>/icon/favicon.io">
    <link rel="canonical" href="https://www.bisnest.my/">
    <meta property="og:site_name" content="BISNEST">
    <meta property="og:title" content="BISNEST">
    <meta property="og:url" content="https://www.bisnest.my">
    <meta property="og:type" content="website">
    <meta property="og:description" content="BISNEST is a nationally ranked accelerator that invests in high-growth startups. One time a year we invest $100K in each of five startups.">
    <meta property="og:image" content="http://static1.squarespace.com/static/5b4766dacc8fed56f6a0f21c/t/5b804919aa4a996cc795b18e/1535133980766/Sharing-12.jpg?format=1500w">
    <meta property="og:image:width" content="1500">
    <meta property="og:image:height" content="825">
    <meta itemprop="name" content="BISNEST">
    <meta itemprop="url" content="https://www.bisnest.my">
    <meta itemprop="description" content="BISNEST is a nationally ranked accelerator that invests in high-growth startups. One time a year we invest $100K in each of five startups.">


    <meta name="twitter:url" content="https://www.bisnest.my">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="BISNEST is a nationally ranked accelerator that invests in high-growth startups. One time a year we invest $100K in each of five startups.">
    <meta name="description" content="BISNEST is a nationally ranked accelerator that invests in high-growth 
    startups. One time a year we invest $100K in each of five startups.">

    <link rel="preconnect" href="https://images.squarespace-cdn.com/">

    <title>BISNEST</title>

    <?php $this->head() ?>
    <?php $this->registerCsrfMetaTags() ?>

   <script crossorigin="anonymous" src="//assets.squarespace.com/universal/scripts-compressed/moment-js-vendor-26ddeab7fa5f90b6c8cb3-min.en-US.js" ></script>

    <script crossorigin="anonymous" src="//assets.squarespace.com/universal/scripts-compressed/cldr-resource-pack-7d6dc599f0e9e5882dcca-min.en-US.js" ></script>

    <script crossorigin="anonymous" src="//assets.squarespace.com/universal/scripts-compressed/common-vendors-stable-db6e1a9e95959c0432ba5-min.en-US.js" ></script>

    <script crossorigin="anonymous" src="//assets.squarespace.com/universal/scripts-compressed/common-vendors-48e41544b77f688bf85c6-min.en-US.js" ></script>

    <script crossorigin="anonymous" src="//assets.squarespace.com/universal/scripts-compressed/common-3311b727f642a44e067d9-min.en-US.js" ></script>

    <script data-name="static-context">Static = window.Static || {}; Static.SQUARESPACE_CONTEXT = {"facebookAppId":"314192535267336","facebookApiVersion":"v6.0","rollups":{"squarespace-announcement-bar":{"js":"//assets.squarespace.com/universal/scripts-compressed/announcement-bar-82f255bfca0a9c6697cdc-min.en-US.js"},"squarespace-audio-player":{"css":"//assets.squarespace.com/universal/styles-compressed/audio-player-7273d8fcec67906942b35-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/audio-player-e0a966d644916e4ada238-min.en-US.js"},"squarespace-blog-collection-list":{"css":"//assets.squarespace.com/universal/styles-compressed/blog-collection-list-3d55c64c25996c7633fc2-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/blog-collection-list-41fb020c05858537c749a-min.en-US.js"},"squarespace-calendar-block-renderer":{"css":"//assets.squarespace.com/universal/styles-compressed/calendar-block-renderer-9433b542cea7a0e43eaa9-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/calendar-block-renderer-928174be82da56fe6d386-min.en-US.js"},"squarespace-chartjs-helpers":{"css":"//assets.squarespace.com/universal/styles-compressed/chartjs-helpers-58ae73137091cd0a61360-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/chartjs-helpers-90a05700972d4d6f84fa8-min.en-US.js"},"squarespace-comments":{"css":"//assets.squarespace.com/universal/styles-compressed/comments-eeb99f32a31032af774cb-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/comments-94904fbbcf09dd72b75b2-min.en-US.js"},"squarespace-commerce-cart":{"js":"//assets.squarespace.com/universal/scripts-compressed/commerce-cart-c0b90fe225b2702fde40d-min.en-US.js"},"squarespace-dialog":{"css":"//assets.squarespace.com/universal/styles-compressed/dialog-5c8a844a52d51995a3a8a-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/dialog-9ef8ccee654ac4a85cea0-min.en-US.js"},"squarespace-events-collection":{"css":"//assets.squarespace.com/universal/styles-compressed/events-collection-9433b542cea7a0e43eaa9-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/events-collection-44854e228ef561353833e-min.en-US.js"},"squarespace-form-rendering-utils":{"js":"//assets.squarespace.com/universal/scripts-compressed/form-rendering-utils-cf7a381bb3ca53f099f6e-min.en-US.js"},"squarespace-forms":{"css":"//assets.squarespace.com/universal/styles-compressed/forms-1cc007b21ede0b73086c9-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/forms-3abd95a8e461d7e6d315e-min.en-US.js"},"squarespace-gallery-collection-list":{"css":"//assets.squarespace.com/universal/styles-compressed/gallery-collection-list-3d55c64c25996c7633fc2-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/gallery-collection-list-cd5d8e548068a3a2586f7-min.en-US.js"},"squarespace-image-zoom":{"css":"//assets.squarespace.com/universal/styles-compressed/image-zoom-4a2adec1e747da2a6c89f-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/image-zoom-fa19933bfc5ac12f6e17f-min.en-US.js"},"squarespace-pinterest":{"css":"//assets.squarespace.com/universal/styles-compressed/pinterest-3d55c64c25996c7633fc2-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/pinterest-e302f36b8d7ccb4384f0b-min.en-US.js"},"squarespace-popup-overlay":{"css":"//assets.squarespace.com/universal/styles-compressed/popup-overlay-e4ea05bd2ae9c1568e432-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/popup-overlay-8a3209a119252d7a54d88-min.en-US.js"},"squarespace-product-quick-view":{"css":"//assets.squarespace.com/universal/styles-compressed/product-quick-view-845801b442674594b4fd4-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/product-quick-view-bf1cc3c00be4d222a1952-min.en-US.js"},"squarespace-products-collection-item-v2":{"css":"//assets.squarespace.com/universal/styles-compressed/products-collection-item-v2-4a2adec1e747da2a6c89f-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/products-collection-item-v2-e6ac31f86e24c364a738c-min.en-US.js"},"squarespace-products-collection-list-v2":{"css":"//assets.squarespace.com/universal/styles-compressed/products-collection-list-v2-4a2adec1e747da2a6c89f-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/products-collection-list-v2-1836a36b2936989782757-min.en-US.js"},"squarespace-search-page":{"css":"//assets.squarespace.com/universal/styles-compressed/search-page-568ad8f2a40e76c0175c8-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/search-page-3536366c3fe4f5d941186-min.en-US.js"},"squarespace-search-preview":{"js":"//assets.squarespace.com/universal/scripts-compressed/search-preview-f2cf92c34e62fab63bb92-min.en-US.js"},"squarespace-share-buttons":{"js":"//assets.squarespace.com/universal/scripts-compressed/share-buttons-c4214afe6907e5aa1c4cc-min.en-US.js"},"squarespace-simple-liking":{"css":"//assets.squarespace.com/universal/styles-compressed/simple-liking-99bb613caaed2bf3e1efa-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/simple-liking-86a6810967083b1f49e97-min.en-US.js"},"squarespace-social-buttons":{"css":"//assets.squarespace.com/universal/styles-compressed/social-buttons-8d9d49ea1937426a8305f-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/social-buttons-a81030c5da5e4e5015246-min.en-US.js"},"squarespace-tourdates":{"css":"//assets.squarespace.com/universal/styles-compressed/tourdates-3d55c64c25996c7633fc2-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/tourdates-701b545f75773303953a9-min.en-US.js"},"squarespace-website-overlays-manager":{"css":"//assets.squarespace.com/universal/styles-compressed/website-overlays-manager-5c2f030f6ee94f066dc3d-min.en-US.css","js":"//assets.squarespace.com/universal/scripts-compressed/website-overlays-manager-a6d26244542816bc55a8d-min.en-US.js"}},"pageType":1,"website":{"id":"5b4766dacc8fed56f6a0f21c","identifier":"bumblebee-chimes-cw9b","websiteType":1,"contentModifiedOn":1619617283715,"cloneable":false,"hasBeenCloneable":false,"siteStatus":{},"language":"en-US","timeZone":"America/New_York","machineTimeZoneOffset":-14400000,"timeZoneOffset":-14400000,"timeZoneAbbr":"EDT","siteTitle":"THE BRANDERY","fullSiteTitle":"The Brandery","siteTagLine":"A Concierge Startup Accelerator","siteDescription":"<p>The Brandery is a nationally-ranked accelerator that leverages the expertise of the Cincinnati region, namely branding, marketing, and design. In addition to an elite mentor network, startups are paired with world-class creative agencies and have access to some of the biggest companies in the world, including Procter &amp; Gamble and Kroger. The Brandery runs one,16-week accelerator program a year for five companies. The participating startups each receive $100K, a year of free office space, and over $200K in additional benefits.</p><p><br></p>","location":{"addressLine1":"","addressLine2":"","addressCountry":""},"logoImageId":"5b80495703ce64a5a99cb2d8","socialLogoImageId":"5b804919aa4a996cc795b18e","shareButtonOptions":{"8":true,"7":true,"1":true,"3":true,"6":true,"4":true,"2":true},"logoImageUrl":"//static1.squarespace.com/static/5b4766dacc8fed56f6a0f21c/t/5b80495703ce64a5a99cb2d8/1619617283715/","socialLogoImageUrl":"//static1.squarespace.com/static/5b4766dacc8fed56f6a0f21c/t/5b804919aa4a996cc795b18e/1619617283715/","authenticUrl":"https://www.brandery.org","internalUrl":"https://bumblebee-chimes-cw9b.squarespace.com","baseUrl":"https://www.brandery.org","primaryDomain":"www.brandery.org","sslSetting":3,"isHstsEnabled":false,"socialAccounts":[{"serviceId":4,"userId":"163649390","userName":"brandery","screenname":"The Brandery","addedOn":1531500408195,"profileUrl":"https://twitter.com/brandery","iconUrl":"http://pbs.twimg.com/profile_images/876994777287462912/FdzV7MLu_normal.jpg","collectionId":"5b48d778e17ba36b74b75b9d","iconEnabled":true,"serviceName":"twitter"},{"serviceId":10,"userId":"413371789","userName":"gobrandery","screenname":"The Brandery","addedOn":1531500586248,"profileUrl":"http://instagram.com/gobrandery","iconUrl":"https://scontent.cdninstagram.com/vp/86c7b27f7aaa30d3ccf2ca222cc7eb5b/5BE91760/t51.2885-19/11325153_507303829424602_1135305870_a.jpg","collectionId":"5b48d82a70e8027af983c039","iconEnabled":true,"serviceName":"instagram"},{"serviceId":2,"userId":"2082000535382257","screenname":"The Brandery","addedOn":1531501146378,"profileUrl":"https://www.facebook.com/Brandery/","iconUrl":"http://graph.facebook.com/2082000535382257/picture?type=square","metaData":{"service":"facebook"},"iconEnabled":true,"serviceName":"facebook"}],"typekitId":"","statsMigrated":false,"imageMetadataProcessingEnabled":false,"screenshotId":"7bb79fc084287076c74c1b167e1938824872c7667d5cc8bcb2fcd8c4d4f98f63","showOwnerLogin":false},"websiteSettings":{"id":"5b4766dacc8fed56f6a0f21f","websiteId":"5b4766dacc8fed56f6a0f21c","type":"Business","subjects":[],"country":"US","state":"OH","simpleLikingEnabled":true,"mobileInfoBarSettings":{"isContactEmailEnabled":false,"isContactPhoneNumberEnabled":false,"isLocationEnabled":false,"isBusinessHoursEnabled":false},"announcementBarSettings":{"style":1,"text":"<p class=\"\" style=\"white-space:pre-wrap;\"><strong><em>Startups: The Batch 12 Accelerator Applications Now Open!</em></strong></p>","clickthroughUrl":{"url":"https://www.brandery.org/apply","newWindow":false}},"commentLikesAllowed":true,"commentAnonAllowed":true,"commentThreaded":true,"commentApprovalRequired":false,"commentAvatarsOn":true,"commentSortType":2,"commentFlagThreshold":0,"commentFlagsAllowed":true,"commentEnableByDefault":true,"commentDisableAfterDaysDefault":0,"disqusShortname":"","commentsEnabled":false,"contactPhoneNumber":"","businessHours":{"monday":{"text":"","ranges":[{}]},"tuesday":{"text":"","ranges":[{}]},"wednesday":{"text":"","ranges":[{}]},"thursday":{"text":"","ranges":[{}]},"friday":{"text":"","ranges":[{}]},"saturday":{"text":"","ranges":[{}]},"sunday":{"text":"","ranges":[{}]}},"storeSettings":{"returnPolicy":null,"termsOfService":null,"privacyPolicy":null,"expressCheckout":false,"continueShoppingLinkUrl":"/","useLightCart":false,"showNoteField":false,"shippingCountryDefaultValue":"US","billToShippingDefaultValue":false,"showShippingPhoneNumber":true,"isShippingPhoneRequired":false,"showBillingPhoneNumber":true,"isBillingPhoneRequired":false,"currenciesSupported":["CHF","HKD","MXN","EUR","DKK","USD","CAD","MYR","NOK","THB","AUD","SGD","ILS","PLN","GBP","CZK","SEK","NZD","PHP","RUB"],"defaultCurrency":"USD","selectedCurrency":"USD","measurementStandard":1,"showCustomCheckoutForm":false,"enableMailingListOptInByDefault":false,"contactLocation":{"addressLine1":"","addressLine2":"","addressCountry":""},"businessName":"The Brandery","sameAsRetailLocation":false,"businessId":"","merchandisingSettings":{"scarcityEnabledOnProductItems":false,"scarcityEnabledOnProductBlocks":false,"scarcityMessageType":"DEFAULT_SCARCITY_MESSAGE","scarcityThreshold":10,"multipleQuantityAllowedForServices":true,"restockNotificationsEnabled":false,"restockNotificationsMailingListSignUpEnabled":false,"relatedProductsEnabled":false,"relatedProductsOrdering":"random","soldOutVariantsDropdownDisabled":false,"productComposerOptedIn":false,"productComposerABTestOptedOut":false},"isLive":false,"multipleQuantityAllowedForServices":true},"useEscapeKeyToLogin":true,"ssBadgeType":1,"ssBadgePosition":4,"ssBadgeVisibility":1,"ssBadgeDevices":1,"pinterestOverlayOptions":{"mode":"disabled"},"ampEnabled":false},"cookieSettings":{"isCookieBannerEnabled":false,"isRestrictiveCookiePolicyEnabled":false,"isRestrictiveCookiePolicyAbsolute":false,"cookieBannerText":"","cookieBannerTheme":"","cookieBannerVariant":"","cookieBannerPosition":"","cookieBannerCtaVariant":"","cookieBannerCtaText":"","cookieBannerAcceptType":"OPT_IN","cookieBannerOptOutCtaText":""},"websiteCloneable":false,"collection":{"title":"Home","id":"5b4767402b6a28f6ea5f9720","fullUrl":"/","type":1,"permissionType":1},"subscribed":false,"appDomain":"squarespace.com","templateTweakable":true,"tweakJSON":{"aspect-ratio":"Auto","banner-slideshow-controls":"Arrows","gallery-arrow-style":"No Background","gallery-aspect-ratio":"3:2 Standard","gallery-auto-crop":"true","gallery-autoplay":"false","gallery-design":"Grid","gallery-info-overlay":"Show on Hover","gallery-loop":"false","gallery-navigation":"Bullets","gallery-show-arrows":"true","gallery-transitions":"Fade","galleryArrowBackground":"rgba(34,34,34,1)","galleryArrowColor":"rgba(255,255,255,1)","galleryAutoplaySpeed":"3","galleryCircleColor":"rgba(255,255,255,1)","galleryInfoBackground":"rgba(0, 0, 0, .7)","galleryThumbnailSize":"100px","gridSize":"280px","gridSpacing":"10px","logoContainerWidth":"105px","product-gallery-auto-crop":"false","product-image-auto-crop":"true","siteTitleContainerWidth":"220px","tweak-v1-related-products-title-spacing":"50px"},"templateId":"52a74dafe4b073a80cd253c5","templateVersion":"7","pageFeatures":[1,2,4],"gmRenderKey":"QUl6YVN5Q0JUUk9xNkx1dkZfSUUxcjQ2LVQ0QWVUU1YtMGQ3bXk4","templateScriptsRootUrl":"https://static1.squarespace.com/static/ta/52a74d9ae4b0253945d2aee9/1039/scripts/","betaFeatureFlags":["local_listings","commerce_pdp_survey_modal","campaigns_new_subscriber_search","domains_transfer_flow_hide_preface","member_areas_discounts","commerce_product_composer_ab_test_all_users","commerce_restock_notifications","campaigns_newsletter_block_v3","customer_account_creation_recaptcha","commerce_pdp_layout_catalog","domain_locking_via_registrar_service","commerce_minimum_order_amount","seven-one-main-content-preview-api","member_areas_annual_subscriptions","commerce_onboarding_tools_screen_test","commerce_subscription_order_delay","generic_iframe_loader_for_campaigns","commerce_category_id_discounts_enabled","commerce_afterpay_pdp","commerce_payment_survey","category-delete-product-service-enabled","uas_swagger_site_user_account_client","domain_deletion_via_registrar_service","nested_categories_migration_enabled","domains_transfer_flow_improvements","reduce_general_search_api_traffic","member_areas_ga","member_areas_schedule_interview","animations_august_2020_new_preset","domains_universal_search","uas_swagger_token_client","seven-one-content-preview-section-api","domain_info_via_registrar_service","commerce_activation_experiment_add_payment_processor_card","commerce_setup_wizard","campaigns_user_templates_in_sidebar","member_areas_installments","campaigns_single_opt_in","seven_one_frontend_render_header_release","uas_swagger_unauthenticated_session_client","seven-one-menu-overlay-theme-switcher","commerce_etsy_product_import","commerce_instagram_product_checkout_links","domains_use_new_domain_connect_strategy","uas_swagger_session_client","seven_one_image_effects","commerce_product_branching"],"impersonatedSession":false,"demoCollections":[{"collectionId":"5334844be4b08e81fa54dc33","deleted":false},{"collectionId":"540e1d25e4b0d6dca0c75795","deleted":false}],"tzData":{"zones":[[-300,"US","E%sT",null]],"rules":{"US":[[1967,2006,null,"Oct","lastSun","2:00","0","S"],[1987,2006,null,"Apr","Sun>=1","2:00","1:00","D"],[2007,"max",null,"Mar","Sun>=8","2:00","1:00","D"],[2007,"max",null,"Nov","Sun>=1","2:00","0","S"]]}},"campaignsContext":{"reCaptchaSiteKey":"6LeDzNAaAAAAAEkjrk4yKez3Zm1UQ_MANiUGTq7O"}};</script>

<script type="text/javascript"> SquarespaceFonts.loadViaContext(); Squarespace.load(window);</script>
<script>Static.COOKIE_BANNER_CAPABLE = true;</script>


    <script>/* Must be below squarespace-headers */(function(){var e='ontouchstart'in window||navigator.msMaxTouchPoints;var t=document.documentElement;if(!e&&t){t.className=t.className.replace(/touch-styles/,'')}})()
    </script>
    
  <style type="text/css">.disable-hover:not(.sqs-layout-editing), .disable-hover:not(.sqs-layout-editing) * { pointer-events: none  ; }</style>

</head>
<body>
<?php $this->beginBody() ?>

<body id="collection-5b4767402b6a28f6ea5f9720" class="transparent-header enable-nav-button nav-button-style-outline nav-button-corner-style-square banner-button-style-outline banner-button-corner-style-square banner-slideshow-controls-arrows meta-priority-category center-entry-title--meta hide-list-entry-footer hide-blog-sidebar center-navigation--info event-thumbnails event-thumbnail-size-32-standard event-date-label event-date-label-time event-list-show-cats event-list-date event-list-time event-list-address event-icalgcal-links event-excerpts event-item-back-link gallery-design-grid aspect-ratio-auto lightbox-style-light gallery-navigation-bullets gallery-info-overlay-show-on-hover gallery-aspect-ratio-32-standard gallery-arrow-style-no-background gallery-transitions-fade gallery-show-arrows gallery-auto-crop product-list-titles-under product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center newsletter-style-dark opentable-style-light small-button-style-solid small-button-shape-square medium-button-style-outline medium-button-shape-square large-button-style-outline large-button-shape-square image-block-poster-text-alignment-center image-block-card-dynamic-font-sizing image-block-card-content-position-center image-block-card-text-alignment-left image-block-overlap-dynamic-font-sizing image-block-overlap-content-position-center image-block-overlap-text-alignment-left image-block-collage-dynamic-font-sizing image-block-collage-content-position-top image-block-collage-text-alignment-left image-block-stack-dynamic-font-sizing image-block-stack-text-alignment-left button-style-solid button-corner-style-square tweak-product-quick-view-button-style-floating tweak-product-quick-view-button-position-bottom tweak-product-quick-view-lightbox-excerpt-display-truncate tweak-product-quick-view-lightbox-show-arrows tweak-product-quick-view-lightbox-show-close-button tweak-product-quick-view-lightbox-controls-weight-light native-currency-code-usd collection-type-index collection-layout-default collection-5b4767402b6a28f6ea5f9720 homepage view-list mobile-style-available has-banner-image index-page" data-new-gr-c-s-check-loaded="14.1001.0" data-gr-ext-installed="">
  
  <div class="show-on-scroll-wrapper" id="showOnScrollWrapper"><header id="header" class="show-on-scroll" data-offset-el=".index-section" data-offset-behavior="bottom" role="banner">
        <div class="header-inner">
          <div id="logoWrapper" class="wrapper" data-content-field="site-title">
            
              <h1 id="logoImage"><a href="https://www.bisnest.my/"><img src="<?= $dirAssests?>/images/logo.png" alt="BISNEST"></a></h1>
            
          </div><!--
          --><div class="mobile-nav-toggle"><div class="top-bar"></div><div class="middle-bar"></div><div class="bottom-bar"></div></div><div class="mobile-nav-toggle fixed-nav-toggle"><div class="top-bar"></div><div class="middle-bar"></div><div class="bottom-bar"></div></div><!--
          --><div id="headerNav">

  <div id="mainNavWrapper" class="nav-wrapper" data-content-field="navigation-mainNav">
    <nav id="mainNavigation" data-content-field="navigation-mainNav">
      

      
        
          
          <div class="index active homepage">
            <a href="https://www.bisnest.my/">
              Home
            </a>
          </div>
          
        

      
        
          

          
          <div class="folder">
            <div class="folder-toggle" data-href="/programs-1">Programs</div>
            <div class="subnav">
            

              
              <div class="collection">
                <a href="https://www.bisnest.my/programs">
                  BISNEST
                </a>
              </div>
              
              
            

              
              
              <div class="external">
                <a href="https://www.gbetaaccelerator.com/cincy" target="_blank">
                  gBETA Cincy
                </a>
              </div>
              
            

              
              
              <div class="external">
                <a href="https://www.gener8tor.com/" target="_blank">
                  gener8tor
                </a>
              </div>
              
            
            </div>
          </div>
          
        
        

      
        
          

          
          <div class="folder">
            <div class="folder-toggle" data-href="/about">About</div>
            <div class="subnav">
            

              
              <div class="collection">
                <a href="#">
                  Team
                </a>
              </div>
              
              
            

              
              <div class="collection">
                <a href="#">
                  Sponsorship
                </a>
              </div>
              
              
            
            </div>
          </div>
          
        
        

      
        
          

          
          <div class="folder">
            <div class="folder-toggle" data-href="/office-hours">Office Hours</div>
            <div class="subnav">
            

              
              <div class="collection">
                <a href="#">
                  Virtual Office Hours
                </a>
              </div>
              
              
            
            </div>
          </div>
          
        
        

      
        
          

          

            
            <div class="collection">
              <a href="#">
                Statistics
              </a>
            </div>
 
            
            <div class="collection">
              <a href="#">
                Portfolio
              </a>
            </div>
            

          
        
        

      
        
          

          

            
            <div class="collection">
              <a href="#">
                BISNEST Store
              </a>
            </div>
            

          
        
        

      
        
          

          

            
            <div class="collection">
              <a href="#">
                Apply
              </a>
            </div>
            

          
        
        

      
    </nav>
  </div>
  <!-- style below blocks out the mobile nav toggle only when nav is loaded -->
  <style>.mobile-nav-toggle-label { display: inline-block !important; }</style>


</div>
        </div>
      </header></div>
    <a href="https://www.bisnest.my/#" class="body-overlay"></a>
    <div class="sqs-announcement-bar-dropzone"><div class="sqs-announcement-bar-custom-location"><div id="yui_3_17_2_1_1617087493649_426" class="yui3-widget sqs-widget sqs-announcement-bar"><div id="yui_3_17_2_1_1617087493649_428" class="sqs-announcement-bar-content"><a class="sqs-announcement-bar-url" href="https://www.bisnest.my/apply" aria-labelledby="announcement-bar-text-inner-id"></a>


</div></div></div></div>
    <div id="sidecarNav">
      

  <div id="mobileNavWrapper" class="nav-wrapper" data-content-field="navigation-mobileNav">
    <nav id="mobileNavigation">
      

      
        
          
          <div class="index active homepage">
            <a href="https://www.bisnest.my/">
              Home
            </a>
          </div>
          
        

      
        
          

          
          <div class="folder">
            <div class="folder-toggle" data-href="/programs-1">Programs</div>
            <div class="subnav">
            

              
              <div class="collection">
                <a href="https://www.bisnest.my/programs">
                  BISNEST
                </a>
              </div>
              
              
            

              
              
              <div class="external">
                <a href="https://www.gbetaaccelerator.com/cincy" target="_blank">
                  gBETA Cincy
                </a>
              </div>
              
            

              
              
              <div class="external">
                <a href="https://www.gener8tor.com/" target="_blank">
                  gener8tor
                </a>
              </div>
              
            
            </div>
          </div>
          
        
        

      
        
          

          
          <div class="folder">
            <div class="folder-toggle" data-href="/about">About</div>
            <div class="subnav">
            

              
              <div class="collection">
                <a href="https://www.bisnest.my/team">
                  Team
                </a>
              </div>
              
              
            

              
              <div class="collection">
                <a href="https://www.bisnest.my/sponsorship">
                  Sponsorship
                </a>
              </div>
              
              
            
            </div>
          </div>
          
        
        

      
        
          

          
          <div class="folder">
            <div class="folder-toggle" data-href="/office-hours">Office Hours</div>
            <div class="subnav">
            

              
              <div class="collection">
                <a href="https://www.bisnest.my/officehours">
                  Virtual Office Hours
                </a>
              </div>
              
              
            
            </div>
          </div>
          
        
        

      
        
          

          

            
            <div class="collection">
              <a href="https://www.bisnest.my/statistics">
                Statistics
              </a>
            </div>
            

          
        
        

      
        
          

          

            
            <div class="collection">
              <a href="https://www.bisnest.my/portfolio">
                Portfolio
              </a>
            </div>
            

          
        
        

      
        
          

          

            
            <div class="collection">
              <a href="https://www.bisnest.my/bisnest-store">
                BISNEST Store
              </a>
            </div>
            

          
        
        

      
        
          

          

            
            <div class="collection">
              <a href="https://www.bisnest.my/apply">
                Apply
              </a>
            </div>
            

          
        
        

      
    </nav>
  </div>



    </div>
    <div id="siteWrapper" class="clearfix">

      <div class="sqs-cart-dropzone" style="top: 83px;"></div>

      <header id="header" class="show-on-scroll" data-offset-el=".index-section" data-offset-behavior="bottom" role="banner">
        <div class="header-inner">
          <div id="logoWrapper" class="wrapper" data-content-field="site-title">
            
              <h1 id="logoImage"><a href="https://www.bisnest.my/"><img src="<?= $dirAssests?>/images/logo.png" alt="BISNEST"></a></h1>
            
          </div><!--
          --><div class="mobile-nav-toggle"><div class="top-bar"></div><div class="middle-bar"></div><div class="bottom-bar"></div></div><div class="mobile-nav-toggle fixed-nav-toggle"><div class="top-bar"></div><div class="middle-bar"></div><div class="bottom-bar"></div></div><!--
          --><div id="headerNav">

  <div id="mainNavWrapper" class="nav-wrapper" data-content-field="navigation-mainNav">
    <nav id="mainNavigation" data-content-field="navigation-mainNav">
      

      
        
          
          <div class="index active homepage">
            <a href="https://www.bisnest.my/">
              Home
            </a>
          </div>
          
        

      
        
          

          
          <div class="folder">
            <div class="folder-toggle" data-href="/programs-1">Programs</div>
            <div class="subnav">
            

              
              <div class="collection">
                <a href="https://www.bisnest.my/programs">
                  BISNEST
                </a>
              </div>
              
              
            

              
              
              <div class="external">
                <a href="https://www.gbetaaccelerator.com/cincy" target="_blank">
                  gBETA Cincy
                </a>
              </div>
              
            

              
              
              <div class="external">
                <a href="https://www.gener8tor.com/" target="_blank">
                  gener8tor
                </a>
              </div>
              
            
            </div>
          </div>
          
        
        

      
        
          

          
          <div class="folder">
            <div class="folder-toggle" data-href="/about">About</div>
            <div class="subnav">
            

              
              <div class="collection">
                <a href="https://www.bisnest.my/team">
                  Team
                </a>
              </div>
              
              
            

              
              <div class="collection">
                <a href="https://www.bisnest.my/sponsorship">
                  Sponsorship
                </a>
              </div>
              
              
            
            </div>
          </div>
          
        
        

      
        
          

          
          <div class="folder">
            <div class="folder-toggle" data-href="/office-hours">Office Hours</div>
            <div class="subnav">
            

              
              <div class="collection">
                <a href="https://www.bisnest.my/officehours">
                  Virtual Office Hours
                </a>
              </div>
              
              
            
            </div>
          </div>
          
        
        

      
        
          

          

            
            <div class="collection">
              <a href="https://www.bisnest.my/statistics">
                Statistics
              </a>
            </div>
            

          
        
        

      
        
          

          

            
            <div class="collection">
              <a href="https://www.bisnest.my/portfolio">
                Portfolio
              </a>
            </div>
            

          
        
        

      
        
          

          

            
            <div class="collection">
              <a href="https://www.bisnest.my/bisnest-store">
                BISNEST Store
              </a>
            </div>
            

          
        
        

      
        
          

          

            
            <div class="collection">
              <a href="https://www.bisnest.my/apply">
                Apply
              </a>
            </div>
            

          
        
        

      
    </nav>
  </div>
  <!-- style below blocks out the mobile nav toggle only when nav is loaded -->
  <style>.mobile-nav-toggle-label { display: inline-block !important; }</style>


</div>
        </div>
      </header>

      
        
          
            
            
          
        
      


      
      
      

      <main id="page" role="main">
        
        <!--
        --><!--
        --><div id="content" class="main-content" data-content-field="main-content" data-collection-id="5b4767402b6a28f6ea5f9720">
         <!-- Create index sections -->

  
  <div id="intro" class="index-section" data-url-id="intro" data-collection-id="5b477a7c352f537741b5d0f0" data-edit-main-image="">
    <div class="promoted-gallery-wrapper"></div>
    
      
        <div class="banner-thumbnail-wrapper has-description" data-content-field="main-image">
        
          <figure id="thumbnail" class="loading content-fill" style="overflow: hidden;">
            <img data-src="<?= $dirAssests?>/images/bg.jpg" data-image="<?= $dirAssests?>/images/bg.jpg" data-image-dimensions="1152x534" data-image-focal-point="0.5,0.5" data-parent-ratio="2.7" alt="<?= $dirAssests?>/images/bg.jpg" class="" data-image-resolution="2500w" src="<?= $dirAssests?>/images/bg.jpg" style="font-size: 0px; left: 0px; top: -92.5599px; width: 1903px; height: 882.12px; position: relative;">
          </figure>
          <div class="desc-wrapper" data-content-field="description"><p class="" style="white-space:pre-wrap;" id="yui_3_17_2_1_1617762541328_52"><strong data-shrink-original-size="86">THE BISNEST</strong> <br>A CONCIERGE STARTUP ACCELERATOR</p><p class="" style="white-space:pre-wrap;"><a href="#" target="">Learn More</a></p></div>
        </div>
      
    

    <div class="index-section-wrapper page-content" id="yui_3_17_2_1_1617087493649_148">
      <div class="content-inner has-content" data-content-field="main-content" id="yui_3_17_2_1_1617087493649_147">
        <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1591027262856" id="page-5b477a7c352f537741b5d0f0"><div class="row sqs-row"><div class="col sqs-col-12 span-12"><div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1412381143917_19852"><div class="sqs-block-content"><h2 style="text-align:center;white-space:pre-wrap;">BISNEST is a nationally-ranked accelerator that leverages the expertise of the Malaysian region, namely branding, marketing, and design. In addition to an elite mentor network, startups are paired with world-class creative agencies and have access to some of the biggest companies in the world. BISNEST runs one,12-week accelerator program a year for five companies.</h2><p style="text-align:center;white-space:pre-wrap;" class="">&nbsp;</p></div></div></div></div><div class="row sqs-row" id="yui_3_17_2_1_1617087493649_146"><div class="col sqs-col-4 span-4" id="yui_3_17_2_1_1617087493649_145"><div class="sqs-block image-block sqs-block-image sqs-text-ready" data-aspect-ratio="75.0788643533123" data-block-type="5" id="block-89ba24c9b1b815930621"><div class="sqs-block-content" id="yui_3_17_2_1_1617087493649_144">



    
  
    <div class="image-block-outer-wrapper
          layout-caption-hidden
          design-layout-inline
          combination-animation-none
          individual-animation-none
          individual-text-animation-none
         sqs-narrow-width" data-test="image-block-inline-outer-wrapper" id="yui_3_17_2_1_1617087493649_143">

      

      
        <figure class="
              sqs-block-image-figure
              intrinsic
            " style="max-width:700px;" id="yui_3_17_2_1_1617087493649_142">
          
          <div style="padding-bottom: 75.0789%; overflow: hidden;" class="
                image-block-wrapper
                
          
        
                has-aspect-ratio
              " data-animation-role="image" id="yui_3_17_2_1_1617087493649_141">
 
            
            <img class="thumb-image loaded"  src="<?= $dirAssests?>/images/img1.jpg" data-image-resolution="750w" src="Goodwipes%20header.jpg" style="left: -29.6291%; top: 0%; width: 159.258%; height: 100%; position: absolute;">
          </div>
        
          
        

        
      
        </figure>
      

    </div>
  


  


</div></div><div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1412379595434_17982"><div class="sqs-block-content"><h3 style="text-align:center;white-space:pre-wrap;">startups</h3><p style="text-align:center;white-space:pre-wrap;" class="">BISNEST offers financing,&nbsp;mentorship, amazing partnership opportunities and introductions to seed stage investors.</p></div></div></div><div class="col sqs-col-4 span-4" id="yui_3_17_2_1_1617087493649_167"><div class="sqs-block image-block sqs-block-image sqs-text-ready" data-aspect-ratio="74.44794952681389" data-block-type="5" id="block-ba568cf1c993e4f05d25"><div class="sqs-block-content" id="yui_3_17_2_1_1617087493649_166">








  

    
  
    <div class="image-block-outer-wrapper
          layout-caption-hidden
          design-layout-inline
          combination-animation-none
          individual-animation-none
          individual-text-animation-none
         sqs-narrow-width" data-test="image-block-inline-outer-wrapper" id="yui_3_17_2_1_1617087493649_165">

      

      
        <figure class="
              sqs-block-image-figure
              intrinsic
            " style="max-width:531px;" id="yui_3_17_2_1_1617087493649_164">
          
        
        

        
          
            
          <div style="padding-bottom: 74.448%; overflow: hidden;" class="
                image-block-wrapper
                
          
        
                has-aspect-ratio
              " data-animation-role="image" id="yui_3_17_2_1_1617087493649_163">

            
            <img class="thumb-image loaded"  alt="framerii*1024xx640-359-0-36.png" data-image-resolution="500w" src="<?= $dirAssests?>/images/img3.png" style="left: -5.0583%; top: 0%; width: 110.117%; height: 100%; position: absolute;">
          </div>

      
        </figure>
      

    </div>
  


</div></div>

<div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1412379595434_26226"><div class="sqs-block-content"><h3 style="text-align:center;white-space:pre-wrap;">investors</h3><p style="text-align:center;white-space:pre-wrap;" class="">&nbsp;We turn great ideas into brands and then introduce them to those with the vision and means to help them grow.</p></div></div></div><div class="col sqs-col-4 span-4" id="yui_3_17_2_1_1617087493649_185"><div class="sqs-block image-block sqs-block-image sqs-text-ready" data-aspect-ratio="75.0788643533123" data-block-type="5" id="block-31b1741607adf5cd88cf"><div class="sqs-block-content" id="yui_3_17_2_1_1617087493649_184">


    <div class="image-block-outer-wrapper
          layout-caption-hidden
          design-layout-inline
          combination-animation-none
          individual-animation-none
          individual-text-animation-none
         sqs-narrow-width" data-test="image-block-inline-outer-wrapper" id="yui_3_17_2_1_1617087493649_183">

      

      
        <figure class="
              sqs-block-image-figure
              intrinsic
            " style="max-width:2500px;" id="yui_3_17_2_1_1617087493649_182">
          
        
        

        
          
            
          <div style="padding-bottom: 75.0789%; overflow: hidden;" class="
                image-block-wrapper
                
          
        
                has-aspect-ratio
              " data-animation-role="image" id="yui_3_17_2_1_1617087493649_181">
       
       
       <img class="thumb-image loaded"  alt="DSC04377.jpg" data-image-resolution="500w" src="<?= $dirAssests?>/images/img2.jpg" style="left: -6.29789%; top: 0%; width: 112.596%; height: 100%; position: absolute;">
          </div>
        
          
        

        
      
        </figure>
      

    </div>
  


  


</div></div><div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1412379595434_26996"><div class="sqs-block-content"><h3 style="text-align:center;white-space:pre-wrap;">Communty</h3><p style="text-align:center;white-space:pre-wrap;" class="">&nbsp;Our experts lead a series of classes geared towards fueling Cincinnati’s entrepreneurial ecosystem.</p></div></div></div></div><div class="row sqs-row"><div class="col sqs-col-12 span-12"><div class="sqs-block spacer-block sqs-block-spacer" data-aspect-ratio="2.156862745098039" data-block-type="21" id="block-yui_3_17_2_1_1571251032590_12502"><div class="sqs-block-content sqs-intrinsic" id="yui_3_17_2_1_1617087493649_280" style="padding-bottom: 2.15686%;">&nbsp;</div></div><div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1544036262540_7945">

<div class="sqs-block-content">


<h1 style="text-align:center;white-space:pre-wrap;"><strong>Agency Partners</strong></h1></div></div><div class="sqs-block gallery-block sqs-block-gallery" data-block-json="{&quot;hSize&quot;:null,&quot;floatDir&quot;:null,&quot;methodOption&quot;:&quot;transient&quot;,&quot;existingGallery&quot;:null,&quot;newWindow&quot;:false,&quot;aspect-ratio&quot;:&quot;anamorphic-widescreen&quot;,&quot;aspectRatio&quot;:null,&quot;auto-crop&quot;:true,&quot;blockAnimation&quot;:&quot;none&quot;,&quot;collectionId&quot;:&quot;5c08217421c67c2d9fb270a8&quot;,&quot;design&quot;:&quot;grid&quot;,&quot;lightbox&quot;:false,&quot;padding&quot;:1,&quot;show-meta&quot;:true,&quot;show-meta-basic&quot;:true,&quot;show-meta-only-title&quot;:false,&quot;show-meta-only-description&quot;:false,&quot;square-thumbs&quot;:false,&quot;thumbnails-per-row&quot;:3,&quot;vSize&quot;:null,&quot;transientGalleryId&quot;:&quot;5c08217421c67c2d9fb270a8&quot;}" data-block-type="8" id="block-yui_3_17_2_1_1544036447190_11088"><div class="sqs-block-content">




  

  


<div class="
  sqs-gallery-container
  sqs-gallery-block-grid
  sqs-gallery-aspect-ratio-anamorphic-widescreen
  sqs-gallery-thumbnails-per-row-3
  
  

  
    
    
  
  sqs-gallery-block-show-meta
  
  

  
  

  
  block-animation-none
  clear" id="yui_3_17_2_1_1617087493649_283">
  <div class="sqs-gallery sqs-gallery-design-grid" id="yui_3_17_2_1_1617087493649_300">
    
      

        

        

        
          
            <div class="slide sqs-gallery-design-grid-slide sqs-active-slide" data-type="image" data-animation-role="image" id="yui_3_17_2_1_1617087493649_334">
              <div class="margin-wrapper">
                
                <a href="#" class="
                    image-slide-anchor
                    
                    content-fit
                  ">
                  
           
                  
                  
                  <img class="thumb-image loaded" src="<?= $dirAssests?>/images/Oda-Bazaar-W.png" style="left: 0px; top: 0px; width: 230px; position: relative;">
                </a>
                
              </div>
            </div>
          

          
        

      

        

        

        
          
            <div class="slide sqs-gallery-design-grid-slide" data-type="image" data-animation-role="image" id="yui_3_17_2_1_1617087493649_335">
              <div class="margin-wrapper">
                
                <a href="http://iconmc.com/" class="
                    image-slide-anchor
                    
                    content-fit
                  ">
                  
           
                  <img class="thumb-image loaded" src="<?= $dirAssests?>/images/IbnAgroFarm-W.png" style="left: 0px; top: 0px; width: 180px;position: relative;">
                </a>
                
              </div>
            </div>
          

          
        

      

        

        

        
          
            <div class="slide sqs-gallery-design-grid-slide" data-type="image" data-animation-role="image" id="yui_3_17_2_1_1617087493649_336">
              <div class="margin-wrapper">
                
                <a role="presentation" class="
                    image-slide-anchor
                    
                    content-fit
                  ">
                  
         <img class="thumb-image loaded"  alt="GetLogoFile.png" data-image-resolution="500w" src="<?= $dirAssests?>/images/AyamGoreng-W.jpg" style="left: 0px; top: 0px; width: 150px; position: relative;">
                </a>
                
              </div>
            </div>
          

          
        

      
    
  </div>

  

</div>




<style type="text/css" id="design-grid-css">
#block-yui_3_17_2_1_1544036447190_11088 .sqs-gallery-block-grid .sqs-gallery-design-grid { margin-right: -1px; }
#block-yui_3_17_2_1_1544036447190_11088 .sqs-gallery-block-grid .sqs-gallery-design-grid-slide .margin-wrapper { margin-right: 1px; margin-bottom: 1px; }
</style>



</div></div></div></div></div>
      </div>
    </div>
  </div>
        </div><!--
        -->
        
      </main>

      <div id="preFooter" class="">
        <div class="pre-footer-inner" id="yui_3_17_2_1_1617087493649_207">
          <div class="sqs-layout sqs-grid-12 columns-12" data-layout-label="Pre-Footer Content" data-type="block-field" data-updated-on="1571250276907" id="preFooterBlocks"><div class="row sqs-row" id="yui_3_17_2_1_1617087493649_206"><div class="col sqs-col-12 span-12" id="yui_3_17_2_1_1617087493649_205"><div class="row sqs-row" id="yui_3_17_2_1_1617087493649_204"><div class="col sqs-col-3 span-3" id="yui_3_17_2_1_1617087493649_203"><div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1571248327237_5395"><div class="sqs-block-content"><h3 style="text-align:center;white-space:pre-wrap;">Proud Member:</h3></div></div><div class="sqs-block image-block sqs-block-image sqs-text-ready" data-block-type="5" id="block-yui_3_17_2_1_1531414292087_128180"><div class="sqs-block-content" id="yui_3_17_2_1_1617087493649_202">


  
    <div class="image-block-outer-wrapper
          layout-caption-hidden
          design-layout-inline
          combination-animation-none
          individual-animation-none
          individual-text-animation-none
         sqs-narrow-width" data-test="image-block-inline-outer-wrapper" id="yui_3_17_2_1_1617087493649_201">

        <figure class="
              sqs-block-image-figure
              intrinsic
            " style="max-width:378px;" id="yui_3_17_2_1_1617087493649_200">

            
          <div style="padding-bottom: 79.8942%; overflow: hidden;" class="
                image-block-wrapper
                
          
        
                has-aspect-ratio
              " data-animation-role="image" id="yui_3_17_2_1_1617087493649_199">
           <img class="thumb-image loaded"   data-image-resolution="300w" src="<?= $dirAssests?>/images/bizventur.png" style="left: -0.00773658%; top: 0%;  position: absolute;">
          </div>
        
          
        

        
      
        </figure>
      

    </div>
  


  


</div></div></div><div class="col sqs-col-5 span-5"><div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21" id="block-yui_3_17_2_1_1571248327237_12485"><div class="sqs-block-content">&nbsp;</div></div></div><div class="col sqs-col-4 span-4" id="yui_3_17_2_1_1617087493649_225"><div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1571248327237_11673"><div class="sqs-block-content"><h3 style="text-align:center;white-space:pre-wrap;">Program Sponsors:</h3></div></div><div class="sqs-block image-block sqs-block-image sqs-text-ready" data-block-type="5" id="block-yui_3_17_2_1_1571248327237_7061"><div class="sqs-block-content" id="yui_3_17_2_1_1617087493649_224">








  

    
  
    <div class="image-block-outer-wrapper
          layout-caption-hidden
          design-layout-inline
          combination-animation-none
          individual-animation-none
          individual-text-animation-none
         sqs-narrow-width" data-test="image-block-inline-outer-wrapper" id="yui_3_17_2_1_1617087493649_223">

      

      
        <figure class="
              sqs-block-image-figure
              intrinsic
            " style="max-width:478px;" id="yui_3_17_2_1_1617087493649_222">
          
        
        

        
          
            
          <div style="padding-bottom: 43.9331%; overflow: hidden;" class="
                image-block-wrapper
                
          
        
                has-aspect-ratio
              " data-animation-role="image" id="yui_3_17_2_1_1617087493649_221">
           <img class="thumb-image loaded"  src="<?= $dirAssests?>/images/bizventur.png" style="left: 0%; top: -0.0160927%; position: absolute;">
          </div>
        
          
        

        
      
        </figure>
      

    </div>
  


  


</div></div></div></div></div></div></div>
        </div>
      </div>

      <footer id="footer" role="contentinfo">
        <div class="footer-inner" id="yui_3_17_2_1_1617087493649_247">
          <div class="nav-wrapper back-to-top-nav"><nav><div class="back-to-top"><a href="https://www.bisnest.my/#header">Back to Top</a></div></nav></div>
          


          <div id="siteInfo"><a href="mailto:info@bisnest.my" class="site-email"><span>info@bisnest.my</span></a></div>
          <div class="sqs-layout sqs-grid-12 columns-12" data-layout-label="Footer Content" data-type="block-field" data-updated-on="1611786550099" id="footerBlocks"><div class="row sqs-row" id="yui_3_17_2_1_1617087493649_246"><div class="col sqs-col-12 span-12" id="yui_3_17_2_1_1617087493649_245"><div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1531414292087_59034"><div class="sqs-block-content"><p style="text-align:center;white-space:pre-wrap;" class=""><a href="https://www.bisnest.my/home">Home</a>&nbsp;|&nbsp;<a href="https://www.bisnest.my/programs">Programs</a>&nbsp;|&nbsp;<a href="https://www.bisnest.my/team">About</a>&nbsp;|&nbsp;<a href="https://www.bisnest.my/statistics">Statistics</a>&nbsp;|&nbsp;<a href="https://www.bisnest.my/portfolio">Portfolio</a></p><p style="text-align:center;white-space:pre-wrap;" class="">&nbsp;</p></div></div><div class="row sqs-row" id="yui_3_17_2_1_1617087493649_244"><div class="col sqs-col-4 span-4"><div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21" id="block-yui_3_17_2_1_1532555004579_10259"><div class="sqs-block-content">&nbsp;</div></div></div><div class="col sqs-col-4 span-4" id="yui_3_17_2_1_1617087493649_243"><div class="sqs-block image-block sqs-block-image sqs-text-ready" data-block-type="5" id="block-yui_3_17_2_1_1532555004579_9047"><div class="sqs-block-content" id="yui_3_17_2_1_1617087493649_242">








  

    
  
    <div class="image-block-outer-wrapper
          layout-caption-hidden
          design-layout-inline
          combination-animation-none
          individual-animation-none
          individual-text-animation-none
         sqs-narrow-width" data-test="image-block-inline-outer-wrapper" id="yui_3_17_2_1_1617087493649_241">

      

      
        <figure class="
              sqs-block-image-figure
              intrinsic
            " style="max-width:2500px;" id="yui_3_17_2_1_1617087493649_240">
          
        
        

        
          
      
        <img src="<?= $dirAssests?>/images/logo.png" alt="bisnest_logo" />
          
        

        
      
        </figure>
      

    </div>
  


  


</div></div></div>

<div class="col sqs-col-4 span-4"><div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21" id="block-yui_3_17_2_1_1532555004579_11398">

<div class="sqs-block-content">&nbsp;</div></div></div></div>

<div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1531414292087_28418">

<div class="sqs-block-content"><p style="text-align:center;white-space:pre-wrap;" class=""><br><strong>BISNEST</strong><br>Kota Bharu<br>Malaysia</p><p style="text-align:center;white-space:pre-wrap;" class=""><a href="http://info@bisnest.my/">info@bisnest.my</a></p></div></div>

<div class="sqs-block horizontalrule-block sqs-block-horizontalrule" data-block-type="47" id="block-yui_3_17_2_1_1579564975439_14532"><div class="sqs-block-content"><hr></div></div>

<div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1531414292087_93888"><div class="sqs-block-content"><p style="text-align:center;white-space:pre-wrap;" class="">Copyright © 2021 bisnest.my. All rights reserved.</p></div></div></div></div></div>
        </div>
      </footer>

    </div>

    <script src="site-bundle.js" type="text/javascript"></script>

<!-- Footer -->
<footer class="footer">
    
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
