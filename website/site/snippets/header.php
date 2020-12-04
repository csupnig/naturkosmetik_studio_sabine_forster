<header class="width100 absolute padding">
  <nav class="collapsed width100 darkGreen noUnderline">
    <div class="width25 logo floatLeft">
      <a href="<?=$site->url() ?>"><img class="width100" src="<?= $site->url() ?>/../assets/images/logo.png" alt="<?= $site->name()->html() ?>"/></a>
    </div>
    <div class="navigation floatRight">
        <?php foreach($site->children()->listed() as $item): ?>
            <span class="smallLeftMargin <?= $item->title()->html() ?> <?= r($item->isOpen(), 'active') ?>">
              <a href="<?= $item->url() ?>" title="<?= $item->name()->html() ?>"><?= $item->name()->html() ?></a>
            </span>
        <?php endforeach ?>
  </nav>
  <div class="toggle"></div>
  <div class="close"></div>
</header>