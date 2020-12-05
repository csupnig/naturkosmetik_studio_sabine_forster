<nav class="breadcrumb largeTopPadding" aria-label="breadcrumb">
  <ol>
    <?php foreach($site->breadcrumb() as $crumb): ?>
      <li>
        <a class="<?= e($crumb->isActive(), 'green', 'darkGreen') ?>" href="<?= $crumb->url() ?>" <?= e($crumb->isActive(), 'aria-current="page"') ?>>
          <?= html($crumb->name()) ?>
        </a>
      </li>
    <?php endforeach ?>
  </ol>
  <div class="clear"></div>
</nav>
