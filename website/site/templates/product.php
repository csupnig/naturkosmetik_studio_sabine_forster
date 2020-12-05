<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")";
else $backgroundStyle = ""; ?>
<div id="snipcart" data-api-key="<?= $site->snipcartkey()->text() ?>" data-config-modal-style="side"></div>
<body class="product beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
  <section class="product width100 largeTopPadding padding">
    <?php snippet('breadcrumb'); ?>
    <div class="width2C extraSmallTopPadding">

        <div class="item">
          <div class="width100 square">
            <?php if ($image = $page->productImage()->toFile()) { ?>
              <img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $page->name()->html() ?>"/>
            <?php } ?>
          </div>
        </div>
        <div class="item leftPadding">
          <div class="width100">
            <h1 class="small darkGreen"><?= $page->name()->text() ?></h1>
            <div class="topMargin">
              <span class="darkGreen">
                <?= $page->description()->kirbyText() ?>
              </span>
            </div>
          </div>
          <?php
          $productPrice = floatval(str_replace(',', '.', str_replace('.', '', $page->price()->html())));
          ?>
          <form class="width100 shopForm largeTopPadding">
            <div class="width2C smallBottomMargin">
              <div class="item darkGreen width2C amount-input">
                <div class="item"><span>Menge</span></div>
                <div class="item controls">
                  <button class="amount-minus">-</button>
                  <div class="amount-number centeredText"><span>1</span></div>
                  <button class="amount-plus">+</button></div>
              </div>
              <div class="item price rightText"><span class="large darkGreen"><?= number_format($productPrice, 2, ",", "") ?> €</span></div>
            </div>
            <button class="rectangle white darkGreenBackground snipcart-add-item width100"
                    data-item-id="<?= $page->id() ?>"
                    data-item-name="<?= $page->name()->text() ?>"
                    data-item-price="<?= number_format($productPrice, 2) ?>"
                    data-item-url="<?= $page->url() ?>"
                    data-item-quantity="1"
                    data-item-description="<?= $page->description()->text() ?>"
                  <?php if ($image = $page->productImage()->toFile()) { ?>
                    data-item-image="<?= $image->url() ?>"
                  <?php } ?>

                    data-item-name="$page->name()->text()">Zum Warenkorb hinzufügen</button>
            <div class="darkGreen smallTopMargin"><span class="small">Preis inkl. MwSt., zzgl. <a class="uppercase" href="<?= $site->deliveryPage()->url() ?>">Versand</a></span></div>
          </form>
        </div>

    </div>
  </section>
  <section class="productDetails width100 padding">
    <div class="width2C topMargin">
      <div class="item rightPadding vFlex">
        <h2 class="darkGreen">Mehr Details</h2>
        <div class="width100 darkGreen topMargin strongTopBorder extraSmallTopPadding">
          <h4>Marke</h4>
          <span class="small"><?=$page->brand()->html() ?></span>
        </div>
        <div class="width100 darkGreen smallTopMargin topBorder extraSmallTopPadding lightBorder">
          <h4>Menge</h4>
          <span class="small"><?=$page->size()->html() ?></span>
        </div>
        <div class="width100 darkGreen smallTopMargin topBorder extraSmallTopPadding lightBorder">
          <h4>Inhalt</h4>
          <span class="small"><?=$page->ingredients()->html() ?></span>
        </div>

      </div>
      <div class="item leftPadding relative leftBorder darkGreen lightBorder">
        <h2 class="darkGreen">Anwendung</h2>
        <div class="width100 darkGreen topMargin">
              <h3 class="small darkGreen">
                <?= $page->application()->kirbyText() ?>
              </h3>
        </div>
      </div>
    </div>
  </section>
  <?php snippet('callToAction', ['content' => 'question', 'color' => 'darkGreen']); ?>
  <?php snippet('productHighlights', ['filter' => 'category']); ?>
	<?php snippet('footer'); ?>
</body>
