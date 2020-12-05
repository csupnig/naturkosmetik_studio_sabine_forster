<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->url().")"; 
else $backgroundStyle = ""; ?>
<div id="snipcart" data-api-key="<?= $site->snipcartkey()->text() ?>" data-config-modal-style="side"></div>
<body class="product beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
  <section class="product width100 largeTopPadding padding">
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
    <div class="width2C smallTopPadding">



    </div>
  </section>

  <?php snippet('productHighlights', ['filter' => 'manual']); ?>
  <?php snippet('newsletterInline'); ?>
	<?php snippet('footer'); ?>
</body>
