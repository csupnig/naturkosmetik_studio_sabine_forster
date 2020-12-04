<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->url().")"; 
else $backgroundStyle = ""; ?>
<div id="snipcart" data-api-key="MGUyMjU1NDQtNTE3Ni00ODUxLTgzNzgtZWRmY2NjOTVhZDZjNjM3MzgxODMyMzYwNDQwODA1" data-config-add-product-behavior="none"></div>
<body class="product beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
  <section class="product width100 largeTopPadding padding">
    <div class="width2C topMargin">

        <div class="item">
          <div class="width100 square">
            <?php if ($image = $page->productImage()->toFile()) { ?>
              <img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $page->name()->html() ?>"/>
            <?php } ?>
          </div>
        </div>
        <div class="item">
          <div class="width100">
            <h1 class="small darkGreen"><?= $page->name()->text() ?></h1>
            <span class="darkGreen">
              <?= $page->description()->kirbyText() ?>
            </span>
          </div>
          <form class="width100">
            <div class="">Menge <div class="amount-input"><button>-</button><input type="number" name="amount"><button>+</button></div></div><div class="price"><?= $page->price()->html() ?>€</div>
            <button class="rectangle white darkGreenBackground snipcart-add-item"
                    data-item-id="<?= $page->id() ?>"
                    data-item-price="<?= $page->price()->html() ?>"
                    data-item-url="<?= $page->url() ?>"
                    data-item-description="<?= $page->description()->text() ?>"
                  <?php if ($image = $page->productImage()->toFile()) { ?>
                    data-item-image="<?= $image->url() ?>"
                  <?php } ?>

                    data-item-name="$page->name()->text()">Zum Warenkorb hinzufügen</button>
            <div>Preis inkl. MwSt., zzgl. Versand</div>
          </form>
        </div>

    </div>
  </section>
	<?php snippet('footer'); ?>
</body>
