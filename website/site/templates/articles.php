<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")";
else $backgroundStyle = ""; ?>
<body class="articles lightGreenBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
  <?php $articles = $page->children()->filterBy("intendedTemplate", "article")->published()->filter(function ($item) use ($page) {
    return $item->id() !== $page->id();
  });
  if (count($articles) > 0) { ?>
    <section class="articles width100 padding darkGreenBackground">
      <h2 class="white">Weitere<br/>Artikel</h2>
      <div class="width3C topMargin">
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
  <?php snippet('callToAction', ['content' => 'newsletterwhite']); ?>
	<?php snippet('footer'); ?>
</body>
