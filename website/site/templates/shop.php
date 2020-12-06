<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")";
else $backgroundStyle = ""; ?>
<div id="snipcart" data-api-key="<?= $site->snipcartkey()->text() ?>" data-config-modal-style="side"></div>
<body class="product beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
	<?php snippet('intro', ['link' => false, 'signature' => true]); ?>
	<?php snippet('infoList'); ?>
	<?php snippet('overview', ["content" => "productcategory", "filter" => "off"]); ?>
	<?php snippet('productHighlights', ['filter' => 'manual']); ?>
	<?php snippet('callToAction', ['content' => 'newsletter', 'color' => 'darkGreen']); ?>
	<?php snippet('footer'); ?>
</body>
