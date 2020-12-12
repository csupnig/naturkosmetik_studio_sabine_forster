<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")"; 
else $backgroundStyle = ""; ?>
<body class="brands beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>

    <section class="intro width100 grid2C ratio2-3 padding">
      <div class="item">

      </div>
      <div class="item">
        <h2 class=" darkGreen"><?=$page->name()->html()?></h2>
        <span class="darkGreen topMargin"><?=$page->termsIntro()->kirbyText()?></span>
      </div>
    </section>
    <section class="chapters width100 grid2C ratio2-3 padding">
      <div class="item">
        <ul class="arrow width100 darkGreen">
          <?php
          $chapters = $page->children()->filterBy('intendedTemplate', 'termschapter');

          foreach ($chapters as $chapter) { ?>
            <li class="width100"><a href="#<?=$chapter->slug() ?>"><?= $chapter->name()->html() ?></a></li>
          <?php } ?>
        </ul>
      </div>
      <div class="item">
        <?php
        $chapters = $page->children()->filterBy('intendedTemplate', 'termschapter');

        foreach ($chapters as $chapter) { ?>
          <div class="width100 bottomMargin" id="<?=$chapter->slug() ?>">
            <h3 class="darkGreen"><?=$chapter->name()->html()?></h3>
            <span class="darkGreen topMargin"><?=$chapter->text()->kirbyText()?></span>
          </div>
        <?php } ?>

      </div>
    </section>

  <?php
  snippet('footer'); ?>
</body>
