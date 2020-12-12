<?php if (($page->template() == "articles") || ($page->template() == "article")) $headerColor = "white";
else $headerColor = "darkGreen"; ?>
<div id="snipcart" hidden data-api-key="<?= $site->snipcartkey()->text() ?>" data-config-modal-style="side"></div>
<header class="width100 absolute padding <?= $headerColor ?>">
  <nav class="width100 inlineBlock noUnderline">
    <a href="<?=$site->url() ?>"><div class="logo <?= $headerColor ?> floatLeft"></div></a>
    <div class="navigation floatRight">
      <?php foreach($site->children()->listed() as $item) { ?>
        <div class="primary <?= $item->template() ?> extraSmallLeftPadding floatLeft relative">
          <a class="<?= $headerColor ?> <?= r($item->isOpen(), 'active strong bottomBorder') ?>" href="<?= $item->url() ?>" title="<?= $item->name()->html() ?>"><?= $item->name()->html() ?></a>
          <?php if (in_array($item->template(), ["treatments", "brands", "about", "shop", "productcategory", "products", "product"])) { ?>
            <div class="tertiary absolute noWrap">
              <?php foreach ($item->children()->listed() as $subItem) { ?>
                <a class="<?= $headerColor ?> <?= r($subItem->isOpen(), 'active strong bottomBorder') ?>" href="<?= $subItem->url() ?>" title="<?= $subItem->name()->html() ?>"><?= $subItem->name()->html() ?></a><br/>
              <?php } ?>
              <?php if ($item->template() == "treatments") { ?>
                <a class="<?= $headerColor ?> smallTopMargin inlineBlock" href="<?= $site->find('treatments')->url() ?>#studios" title="studios">Studios</a>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
      <div class="primary extra extraSmallLeftPadding floatLeft relative">
          <button class="snipcart-checkout <?= $headerColor ?>">
          <span class="snipcart-items-count"></span>
        </button>
      </div><br/>
      <?php /* <div class="subNavigation shop floatRight">
        <?php foreach ($site->find("shop")->children()->filterBy("intendedTemplate", "productcategory")->listed() as $item) { ?>
          <div class="secondary shop extraSmallLeftPadding floatLeft relative">
            <a class="<?= $headerColor ?> <?= r($item->isOpen(), 'active strong bottomBorder') ?>" href="<?= $item->url() ?>" title="<?= $item->name()->html() ?>"><?= $item->name()->html() ?></a><br/>
            <div class="tertiary absolute">
              <?php foreach ($item->children()->listed() as $subItem) { ?>
                <a class="<?= $headerColor ?> <?= r($subItem->isOpen(), 'active strong bottomBorder') ?>" href="<?= $subItem->url() ?>" title="<?= $subItem->name()->html() ?>"><?= $subItem->name()->html() ?></a><br/>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      </div> */ ?>
    </div>
  </nav>
  <div class="toggle"></div>
  <div class="close"></div>
</header>
