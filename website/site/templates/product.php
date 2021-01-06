<?php snippet('head');
//Set background image
if ($site->find("shop")->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$site->find("shop")->backgroundImage()->toFile()->url().")";
else $backgroundStyle = ""; ?>
<body class="shop product beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
  <?php snippet('breadcrumb'); ?>
  <section class="product width100 hPadding bottomMargin">
    <div class="grid2C">

        <div class="item">
          <div class="width100 square">
            <?php if ($image = $page->productImage()->toFile()) { ?>
              <img class="productPhoto width100 contain whiteBackground" src="<?= $image->url() ?>" alt="<?= $page->name()->html() ?>"/>
            <?php } ?>
          </div>
        </div>
        <div class="item smallLeftPadding">
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
          <?php //Only render SnipCart elements if cookies have been accepted
          if(true || $_COOKIE["cookie-note"] == 1) { ?>
            <form class="width100 shopForm topPadding">
              <div class="grid2C smallBottomMargin">
                <div class="item darkGreen grid2C amount-input">
                  <div class="item"><span>Menge</span></div>
                  <div class="item controls">
                    <button class="amount-minus">-</button>
                    <div class="amount-number centeredText"><span>1</span></div>
                    <button class="amount-plus">+</button></div>
                </div>
                <div class="item price rightText"><span class="large darkGreen"><?= number_format($productPrice, 2, ",", "") ?> €</span></div>
              </div>
              <button class="rectangle white darkGreenBackground snipcart-add-item width100"
                      data-item-id="<?= "ID".preg_replace('/[^A-Za-z0-9\-]/', '_', $page->id()) ?>"
                      data-item-name="<?= $page->name()->text() ?>"
                      data-item-price="<?= number_format($productPrice, 2) ?>"
                      data-item-url="<?= $page->url() ?>"
                      data-item-quantity="1"
                      data-item-description="<?= $page->description()->text() ?>"
                    <?php if ($image = $page->productImage()->toFile()) { ?>
                      data-item-image="<?= $image->url() ?>"
                    <?php } ?>

                      data-item-name="$page->name()->text()">Zum Warenkorb hinzufügen</button>
              <div class="darkGreen smallTopMargin"><span class="extraSmall">Preis inkl. MwSt., zzgl. <a class="uppercase" href="<?= $site->deliveryPage()->url() ?>">Versand</a></span></div>
            </form>
          <?php } ?>
        </div>

    </div>
  </section>
  <section class="productDetails width100 padding">
    <div class="grid2C topMargin">
      <div class="item smallRightPadding vFlex">
        <h2 class="darkGreen">Mehr Details</h2>
        <div class="width100 darkGreen topMargin strongTopBorder extraSmallTopPadding">
          <h4>Marke</h4>
          <span class="extraSmall"><?=$page->brand()->html() ?></span>
        </div>
        <div class="width100 darkGreen smallTopMargin topBorder extraSmallTopPadding lightBorder">
          <h4>Menge</h4>
          <span class="extraSmall"><?=$page->size()->html() ?></span>
        </div>
        <div class="width100 darkGreen smallTopMargin topBorder extraSmallTopPadding lightBorder">
          <h4>Inhalt</h4>
          <span class="extraSmall"><?=$page->ingredients()->html() ?></span>
        </div>

      </div>
      <div class="item smallLeftPadding relative leftBorder darkGreen lightBorder">
        <?php if ($page->application()->isNotEmpty()) { ?>
          <h2 class="darkGreen">Anwendung</h2>
          <div class=" width100 darkGreen topMargin">
                <h3 class="extraSmall darkGreen">
                  <?= $page->application()->kirbyText() ?>
                </h3>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <?php snippet('callToAction', ['content' => 'question', 'color' => 'darkGreen']); ?>
  <?php snippet('productHighlights', ['filter' => 'category']); ?>
	<?php snippet('footer'); ?>
</body>
