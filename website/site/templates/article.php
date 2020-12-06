<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")";
else $backgroundStyle = ""; ?>
<body class="article lightGreenBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
  <section class="article width100 padding largeRightPadding darkGreenBackground">
    <div class="grid2C ratio1-2 topMargin">
      <div class="item vFlex">
      </div>
      <div class="item relative">
        <h1 class="small width75 white smallTopMargin"><?= $page->name()->html() ?></h1>
        <span class="extraSmall width100 white topMargin flexGrow"><?= $page->shortDescription()->kirbyText() ?></span>
      </div>
    </div>
    <div class="grid2C ratio1-2 topMargin">
      <div class="item vFlex relative">
        <h2 class="white">Details</h2>
        <div class="width100 white topMargin strongTopBorder extraSmallTopPadding">
          <h4>Datum</h4>
          <span class="extraSmall"><?=$page->articleDate()->toDate("d F Y") ?></span>
        </div>
        <div class="width100 white smallTopMargin topBorder extraSmallTopPadding lightBorder">
          <h4>Lesezeit</h4>
          <span class="extraSmall"><?=$page->readingTime()->text() ?></span>
        </div>
        <div class="width100 white smallTopMargin topBorder exstraSmallTopPadding lightBorder">
          <h4>Thema</h4>
          <span class="extraSmall"><?=$page->category()->html() ?></span>
        </div>

        <div class="absolute bottom smallTopPadding white width100 topBorder">
          <span class="white">Share this article</span>
        </div>
      </div>
      <div class="item relative">
        <?php if ($page->articleImages()->isNotEmpty()) { ?>
          <div class="carousel cycle">
            <div class="items">
              <?php foreach ($page->articleImages()->toFiles() as $image) { ?>
                <div class="item">
                  <img class="width75" src="<?=$image->url() ?>">
                </div>
              <?php } ?>
            </div>
            <div class="navigation">
              <button class="next"></button>
              <button class="previous"></button>
            </div>
          </div>
        <?php } ?>
        <span class="extraSmall width100 white topMargin flexGrow"><?= $page->articleText()->kirbyText() ?></span>
      </div>
    </div>
  </section>
  <?php $articles = $page->siblings()->filterBy("intendedTemplate", "article")->published()->filter(function ($item) use ($page) {
    return $item->id() !== $page->id();
  })->limit(3);
  if (count($articles) > 0) { ?>
    <section class="articles width100 padding darkGreenBackground">
      <h2 class="white">Weitere<br/>Artikel</h2>
      <div class="grid3C topMargin">
        <?php foreach ($articles as $article) { ?>
          <div class="item hoverFlip">
            <a href="<?= $article->url() ?>">
              <div class="width100 square relative">
                <?php if ($image = $article->previewImage()->toFile()) { ?>
                  <img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $article->name()->html() ?>"/>
                <?php } ?>
                <div class="cutout white">
                  <span class="footnote top right white"><?= $article->category()->html() ?></span>
                </div>
              </div>
            </a>
            <div class="details width100 smallTopMargin">
              <span class="flip white"><?= $article->name()->html() ?></span>
              <a class="flip" href="<?= $article->url() ?>"><button class="width100 next large white">Zum Artikel</button></a>
            </div>
          </div>
        <?php } ?>
      </div>
    </section>
  <?php } ?>
	<?php snippet('footer'); ?>
</body>
