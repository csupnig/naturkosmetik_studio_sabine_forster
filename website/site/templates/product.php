<?php snippet('header');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->url().")"; 
else $backgroundStyle = ""; ?>
<body class="product beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('head'); ?>
  <section class="product width100 padding">
    <div class="width2C topMargin">

        <div class="item">
          <div class="width100 square">
            <?php if ($image = $page->image()->toFile()) { ?>
              <img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $page->name()->html() ?>"/>
            <?php } ?>
            <div class="overlay darkGreenCutOut relative">
              <span class="footnote top right"><?= $page->category()->html() ?></span>
            </div>
          </div>
        </div>

    </div>
  </section>
	<?php snippet('footer'); ?>
</body>
