<section class="footerExtension width100 padding" style="<?php if ($image = $page->footerExtensionImage()->toFile()) echo 'background-image:url('.$image->url().');' ?>">
	<h1 class="large white bottomMargin"><?= $page->footerExtensionHeadline()->kirbyText() ?></h1>
	<span class="width33 inlineBlock small white topMargin"><?= $page->footerExtensionText()->kirbyText() ?></span><br/>
	<a href="<?= $page->footerExtensionLinkTarget()->toPage()->url() ?>"><button class="width100 rectangle white topMargin"><?= $page->footerExtensionLinkText()->url() ?></button></a>
</section>