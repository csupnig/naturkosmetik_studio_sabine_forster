<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")";
else $backgroundStyle = ""; ?>
<div id="snipcart" data-api-key="<?= $site->snipcartkey()->text() ?>" data-config-modal-style="side"></div>
<body class="category beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
  <section class="product width100 padding alignRight">
    <?php snippet('breadcrumb'); ?>
    <div class="width2C topMargin">
      <div class="item rightPadding vFlex">
        <h1 class="small width75 darkGreen smallTopMargin"><?= $page->name()->html() ?></h1>
        <span class="width75 small darkGreen topMargin flexGrow"><?= $page->description()->kirbyText() ?></span>


      </div>
      <div class="item relative">
        <?php if ($image = $page->headerImage()->toFile()) { ?>
          <img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $page->name()->html() ?>"/>
        <?php } ?>

      </div>
    </div>
  </section>
  <?php $overviews = $page->children()->filterBy('intendedTemplate', 'products')->published();
  if (count($overviews) > 0) { ?>
    <section class="productOverviews width100 padding">
      <h2 class="darkGreen">Kategorien<br/><?= $page->name()->html() ?></h2>
      <div class="width2C topMargin bigGap">
        <?php foreach ($overviews as $overview) { ?>
          <div class="item">
            <h3 class="darkGreen small"><?=$overview->name()->html() ?></h3>
            <span class="darkGreen"><?=$overview->shortDescription()->kirbyText() ?></span>
            <a href="<?=$overview->url() ?>">
              <button class="circledNext topMargin darkGreen circleOnly"></button>
            </a>
          </div>
        <?php } ?>
      </div>
    </section>
  <?php } ?>
  <?php
  if ($page->footerImage()->isNotEmpty()) $backgroundFooterStyle = "background-image:url(".$page->footerImage()->toFile()->url().")";
  else $backgroundFooterStyle = ""; ?>
  <section class="width100 centeredText" style="<?= $backgroundFooterStyle ?>">
    <h3 class="small width33 largeTopPadding white inlineBlock"><?=$page->footerIntro()->kirbyText() ?></h3>
    <div class="largeBottomPadding"><span class="white inlineBlock width50"><?=$page->footerText()->kirbyText() ?></span></div>
  </section>
  <?php snippet('callToAction', ['content' => 'newsletter', 'color' => 'darkGreen']); ?>
	<?php snippet('footer'); ?>
</body>
