<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->url().")"; 
else $backgroundStyle = ""; ?>
<div id="snipcart" data-api-key="<?= $site->snipcartkey()->text() ?>" data-config-modal-style="side"></div>
<body class="product beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
  <section class="product width100 largeTopPadding padding">
    <?php snippet('breadcrumb'); ?>
    <div class="width2C smallTopPadding">
      <?php snippet('intro', ['link' => false, 'signature' => true]); ?>


    </div>
  </section>

  <?php snippet('productHighlights', ['filter' => 'manual']); ?>
  <?php snippet('newsletterInline'); ?>
	<?php snippet('footer'); ?>
</body>
