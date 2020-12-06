<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")"; 
else $backgroundStyle = ""; ?>
<body class="home beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>

    <section class="intro width100 grid2C padding">
      <div class="item width50">
        <h1 class="small darkGreen"><?=$page->header()->html()?></h1>
      </div>
      <div class="item">
        <ul class="arrow width50 darkGreen floatRight">
          <?php
            //In the shop template, this snippet lists all available brands
            $brands = $page->children()->filterBy('intendedTemplate', 'brand');

            foreach ($brands as $brand) { ?>
              <li class="width100"><a href="#<?=$brand->slug() ?>"><?= $brand->name()->html() ?></a></li>
            <?php }
          ?>
        </ul>
      </div>
    </section>
  <?php
  $count = 0;
  foreach ($brands as $brand) {

    if (++$count%2) {
    ?>
		<section class="brand width100 vPadding">
			<div class="grid2C topMargin">
        <div class="item relative">
          <?php if ($image = $brand->brandImage()->toFile()) { ?>
            <img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $brand->name()->html() ?>"/>
          <?php } ?>
          <button class="sticker top right white greenBackground"><a href=""><?= $brand->name()->html() ?> im Shop</a></button>
        </div>
				<div class="item hPadding vFlex">
					<div class="width100 darkGreen topBorder"></div>
					<h3 class="width75 darkGreen smallTopMargin"><?=$brand->name()->html() ?></h3>
					<span class="small width75 darkGreen topMargin flexGrow"><?=$brand->description()->kirbyText() ?></span>

					<a href="<?= $page->url() ?>"><button class="width100 rectangle darkGreen topMargin">Behandlungen mit <?=$brand->name()->html() ?></button></a>
				</div>
			</div>
		</section>
  <?php } else { ?>
    <section class="brand width100 vPadding">
      <div class="grid2C topMargin">
        <div class="item hPadding vFlex">
          <div class="width100 darkGreen topBorder"></div>
          <h3 class="width75 darkGreen smallTopMargin">BLA 1</h3>
          <span class="small width75 darkGreen topMargin flexGrow"> bl1 2</span>
          <div class="width75 doubleColumns">

          </div>
          <a href="<?= $page->url() ?>"><button class="width100 rectangle darkGreen topMargin">Mehr zu diesem Event</button></a>
        </div>
        <div class="item relative">
          <?php if ($image = $page->eventsImage()->toFile()) { ?>
            <img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $page->eventsHeadline()->html() ?>"/>
          <?php } ?>

        </div>
      </div>
    </section>


	<?php
    }
  }
  snippet('footer'); ?>
</body>
