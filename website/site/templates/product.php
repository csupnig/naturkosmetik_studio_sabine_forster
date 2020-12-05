<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->url().")"; 
else $backgroundStyle = ""; ?>
<div id="snipcart" data-api-key="<?= $site->snipcartkey()->text() ?>" data-config-modal-style="side"></div>
<body class="product beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
  <section class="product width100 largeTopPadding padding">
    <nav class="breadcrumb largeTopPadding" aria-label="breadcrumb">
      <ol>
        <?php foreach($site->breadcrumb() as $crumb): ?>
          <li>
            <a class="<?= e($crumb->isActive(), 'green', 'darkGreen') ?>" href="<?= $crumb->url() ?>" <?= e($crumb->isActive(), 'aria-current="page"') ?>>
              <?= html($crumb->name()) ?>
            </a>
          </li>
        <?php endforeach ?>
      </ol>
      <div class="clear"></div>
    </nav>
    <div class="width2C smallTopPadding">

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
        <div class="width100 darkGreen topMargin strongTopBorder smallTopPadding">
          <h4>Marke</h4>
          <span class="small"><?=$page->brand()->html() ?></span>
        </div>
        <div class="width100 darkGreen smallTopMargin topBorder smallTopPadding lightBorder">
          <h4>Menge</h4>
          <span class="small"><?=$page->size()->html() ?></span>
        </div>
        <div class="width100 darkGreen smallTopMargin topBorder smallTopPadding lightBorder">
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
  <section class="question width100 padding centeredText">
    <h3 class="width50 darkGreen inlineBlock">Haben Sie noch Fragen zu diesem Product?<br/>Ich berate Sie gerne.</h3><br/>
    <button class="question topMargin"></button>
  </section>
  <section class="products width100 padding">
    <h2 class="darkGreen">Ähnliche<br/>Produkte für Sie</h2>
    <div class="width2C topMargin">
      <?php foreach ($page->similarProducts()->toPages() as $product) { ?>
        <div class="item hoverFlip">
          <a href="<?= $product->url() ?>">
            <?php if ($image = $product->productImage()->toFile()) { ?>
              <img class="width100 height85 cover" src="<?= $image->url() ?>" alt="<?= $product->name()->html() ?>"/>
            <?php } ?>
          </a>
          <div class="details width100 smallTopMargin hoverFlip">
            <div class="width100 flip">
              <h3 class="width75 small darkGreen floatLeft"><?= $product->name()->html() ?><?php if ($product->size()->isNotEmpty()) echo ", ".$product->size()->html() ?></h3>
              <span class="width75 small darkGreen floatLeft"><?= $product->shortDescription()->html() ?></span>
              <span class="darkGreen floatRight">€<?= $product->price()->html() ?></span>
            </div>
            <a class="flip" href="<?= $product->url() ?>"><button class="width100 next large darkGreen">Details</button></a>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
	<?php snippet('footer'); ?>
</body>
