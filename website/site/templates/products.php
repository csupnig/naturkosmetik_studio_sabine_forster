<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")";
else $backgroundStyle = ""; ?>
<div id="snipcart" data-api-key="<?= $site->snipcartkey()->text() ?>" data-config-modal-style="side"></div>
<body class="products beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
  <?php snippet('breadcrumb'); ?>
  <section class="product width100 hPadding bottomMargin">
    <div class="grid2C">
      <div class="item smallRightPadding vFlex">
        <h1 class="small width75 darkGreen smallTopMargin"><?= $page->name()->html() ?></h1>


      </div>
      <div class="item relative">
        <span class="width75 small darkGreen topMargin flexGrow"><?= $page->shortDescription()->kirbyText() ?></span>
      </div>
    </div>
  </section>
  <?php snippet('overview', ["content" => "product", "filter" => "off"]); ?>
  <?php snippet('callToAction', ['content' => 'newsletter', 'color' => 'darkGreen']); ?>
	<?php snippet('footer'); ?>
</body>
