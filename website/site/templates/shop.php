<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")";
else $backgroundStyle = ""; ?>
<div id="snipcart" data-api-key="<?= $site->snipcartkey()->text() ?>" data-config-modal-style="side"></div>
<body class="product beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
  <section class="product width100 largeTopPadding padding">
    <!--?php snippet('breadcrumb'); ?-->
  </section>
  <?php snippet('intro', ['link' => false, 'signature' => true]); ?>
  <section class="products width100 padding">
    <h2 class="darkGreen">
      Meine<br/>Produkte
    </h2>
    <div class="width2C topMargin">
      <div class="item">
        <h3 class="darkGreen"><?= $page->myProductsHeadline()->kirbyText() ?></h3>
        <span class="darkGreen smallTopMargin"><?= $page->myProductsText()->kirbyText() ?></span>
      </div>
    </div>
  </section>
  <?php snippet('overview', ["content" => "productcategory", "filter" => "off"]); ?>
  <?php snippet('productHighlights', ['filter' => 'manual']); ?>
  <?php snippet('callToAction', ['content' => 'newsletter']); ?>
	<?php snippet('footer'); ?>
</body>
