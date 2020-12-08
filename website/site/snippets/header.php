<?php $headerColor = "darkGreen";
$headerBackgroundColor = "whiteBackground"; ?>
<div id="snipcart" hidden data-api-key="<?= $site->snipcartkey()->text() ?>" data-config-modal-style="side"></div>
<header class="width100 noUnderline noWrap">
  <nav class=" width100 <?= $headerColor ?>">
    <div class="width25 logo absolute">
      <a href="<?=$site->url() ?>"><img class="width100" src="<?= $site->url() ?>/../assets/images/logo_<?= $headerColor ?>.png" alt="<?= $site->name()->html() ?>"/></a>
    </div>
    <div class="navigation">
      <ul class="padding">
        <?php foreach($site->children()->listed() as $item) { ?>
            <li class="darkGreen <?= $item->title()->html() ?> <?= r($item->isOpen(), 'active strong bottomBorder') ?>">
              <a href="<?= $item->url() ?>" title="<?= $item->name()->html() ?>"><?= $item->name()->html() ?></a>
              <ul class="">
                <?php foreach ($item->children()->listed() as $subitem) { ?>
                  <li>
                    <a href="<?= $subitem->url() ?>" title="<?= $subitem->name()->html() ?>"><?= $subitem->name()->html() ?></a>
                  </li>
                <?php } ?>
              </ul>
            </li>
        <?php } ?>
      </ul>
    </div>
  </nav>
</header>
