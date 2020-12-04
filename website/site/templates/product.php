<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->url().")"; 
else $backgroundStyle = ""; ?>
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
            <h1 class="small darkGreen"><?= $page->name()->kirbyText() ?></h1>
            <p class="darkGreen large">
              <?= $page->description()->kirbyText() ?>
            </p>
          </div>
        </div>

    </div>
  </section>
	<?php snippet('footer'); ?>
</body>
