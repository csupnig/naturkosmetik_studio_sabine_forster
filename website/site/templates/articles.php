<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")";
else $backgroundStyle = ""; ?>
<body class="blog articles lightGreenBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
  <?php $highlight = $page->highlight()->toPage(); ?>
  <?php $articles = $page->children()->filterBy("intendedTemplate", "article")->published()->filter(function ($item) use ($highlight) {
    return $item->id() !== $highlight->id();
  });
  if (count($articles) > 0) { ?>
    <section class="articles width100 padding darkGreenBackground">
      <h2 class="white">Aktuelle<br/>Artikel</h2>
      <div class="grid2C topMargin">
        <div class="item relative">
          <div class="width75 topBorder white topPadding">
            <h3 class="white"><?= $highlight->name()->kirbyText() ?></h3>
            <span class="white smallTopMargin"><?= $highlight->shortDescription()->kirbyText() ?></span>
          </div>
          <div class="absolute bottom width75">
            <a href="<?= $highlight->url(); ?>">
              <button class="button next white width100">Mehr</button>
            </a>
          </div>
        </div>
        <div class="item relative">
          <?php if ($image = $highlight->previewImage()->toFile()) { ?>
            <img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $highlight->name()->html() ?>"/>
          <?php } ?>
          <button class="sticker top left white greenBackground"><a href="<?= $highlight->url(); ?>">Highlighted Article</a></button>
        </div>
      </div>
      <div class="grid3C topMargin topPadding">
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
  <?php snippet('callToAction', ['content' => 'newsletter', 'color' => 'white']); ?>
	<?php snippet('footer'); ?>
</body>
