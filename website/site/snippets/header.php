<header class="width100 absolute">
  <nav class="collapsed hFlex width100 black noUnderline hoverBold hoverItalic">
    <div class="logo floatLeft <?php if (isset($headerBackground)) { echo $headerBackground; } ?>">
      <a href="<?=$site->url() ?>"><img class="height100" src="<?= $site->url() ?>/../assets/images/logo-fs-cutout.png" alt="<?= $site->name()->html() ?>"/></a>
    </div>
    <div class="flexGrow whiteBackground"></div>
    <div class="navigation whiteBackground width50 floatRight">
      <div class="menu width75 floatLeft hSmallPadding">
        <?php foreach($site->children()->listed() as $item): ?>
            <span class="width50 floatLeft <?= $item->title()->html() ?> <?= r($item->isOpen(), 'active') ?>">
              <a href="<?= $item->url() ?>" title="<?= $item->name()->html() ?>"><?= $item->name()->html() ?></a>
            </span>
        <?php endforeach ?>
      </div>
      <div class="extras width25 floatLeft rightText">
        <?php $languageNumber = 0;
        foreach($kirby->languages() as $language): ?>
          <span <?php e($kirby->language() == $language, ' class="active"') ?>>
            <?php $languageNumber++;
            if ($languageNumber != 1) echo " / "; ?>
            <a href="<?= $page->url($language->code()) ?>" hreflang="<?php echo $language->code() ?>">
              <?= html($language->name()) ?>
            </a>
          </span>
        <?php endforeach ?>
        <button id="searchButton" class="search floatRight"></button>
      </div>
  </nav>
  <div class="toggle"></div>
  <div class="close"></div>
</header>