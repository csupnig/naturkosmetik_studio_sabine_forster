<section class="intro grid2C padding bottomMargin">
	<div class="item">
		<h3 class="darkGreen"><?= $page->introIntro()->kirbyText() ?></h3>
		<span class="darkGreen smallTopMargin"><?= $page->introText()->kirbyText() ?></span>
		<?php //Display Signature if requested in snippet call
		if ($signature == true) { ?>
			<span class="extraSmall darkGreen topMargin">Mit freundlichen Grüßen</span><br/>
			<h3 class="small darkGreen">Ihre Sabine Forster</h3>
		<?php }
		//Display extra link if requested in snippet call
		if ($link == true) { ?>
			<a href="<?= $page->introLinkTarget()->url() ?>"><button class="rectangle darkGreen topMargin"><?= $page->introLinkText()->html() ?></button></a>
		<?php } ?>
	</div>
	<div class="item vEnd">
		<?php if ($image = $page->introImage()->toFile()) { ?>
			<img class="width50 cover circle alignFlexEnd" src="<?= $image->url() ?>" alt="<?= $site->name()->html() ?>"/>
		<?php } ?>
	</div>
</section>
