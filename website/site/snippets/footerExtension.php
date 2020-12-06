<section class="footerExtension width100 padding" style="<?php if ($image = $site->footerExtensionImage()->toFile()) echo 'background-image:url('.$image->url().');' ?>">
	<h1 class="large white bottomMargin"><?= $site->footerExtensionHeadline()->kirbyText() ?></h1>
	<span class="extraSmall width33 inlineBlock white topMargin"><?= $site->footerExtensionText()->kirbyText() ?></span><br/>
	<a href="<?= $site->footerExtensionLinkTarget()->toPage()->url() ?>"><button class="width100 rectangle white topMargin"><?= $site->footerExtensionLinkText()->url() ?></button></a>
</section>