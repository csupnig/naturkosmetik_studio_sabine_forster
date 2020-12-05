<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")";
else $backgroundStyle = ""; ?>
<div id="snipcart" data-api-key="<?= $site->snipcartkey()->text() ?>" data-config-modal-style="side"></div>
<body class="category beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
  <section class="product width100 largeTopPadding padding">
    <?php snippet('breadcrumb'); ?>
    <div class="width2C topMargin">
      <div class="item rightPadding vFlex">
        <h1 class="small width75 darkGreen smallTopMargin"><?= $page->name()->html() ?></h1>


      </div>
      <div class="item relative">
        <span class="width75 small darkGreen topMargin flexGrow"><?= $page->shortDescription()->kirbyText() ?></span>
      </div>
    </div>
  </section>
  <?php snippet('overview', ["content" => "product", "filter" => "off"]); ?>
  <?php snippet('callToAction', ['content' => 'newsletter']); ?>
	<?php snippet('footer'); ?>
</body>
