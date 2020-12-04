<footer id="footer" class="width100 padding darkGreen lightGreenBackground">
	<div class="width100 bottomMargin">
		<div class="width50 floatLeft">
			<h2><?= $site->newsletterCall()->kirbyText() ?></h2>
			<span class="large"><a href="#">Newsletter Anmeldung</a></span>
		</div>
		<div class="floatRight">
			<?php if ($site->termsConditionsFile()->isNotempty()) { ?>
				<span class="small"><a href="<?= $site->termsConditionsFile()->toFile()->url() ?>">Nutzungsbedinungen</a></span><br/>
			<?php } else if ($site->termsConditionsPage()->isNotEmpty()) { ?>
				<span class="small"><a href="<?= $site->termsConditionsPage()->toPage()->url() ?>">Nutzungsbedinungen</a></span><br/>
			<?php } 
			$aboutPage = $site->children()->find("about")->toPage() ?>
			<span class="small"><a href="<?= $aboutPage->url() ?>"><?= $aboutPage->name()->html() ?></a></span><br/>
			<span class="small"><a href="<?= $aboutPage->url() ?>#contact"><?= $contactPage->name()->html() ?></a></span><br/>
			<span class="small"><a href="<?= $site->designLink()->html() ?>" target="_blank">Design: <?= $site->design()->html() ?></a></span><br/>
		</div>
	</div>
	<div class="wdith100 topMargin">
		<div class="width50 floatLeft">
			<a href="tel:<?= $site->phone()->html() ?>" target="_blank"><?= $site->phone()->html() ?></a><br/>
			<a href="mailto:<?= $site->email()->html() ?>" target="_blank"><?= $site->email()->html() ?></a><br/>
		</div>
		<div class="floatRight">
			<?php $treatmentsPage = $site->children()->find("treatments")->toPage(); ?>
			<span class="large"><a href="<?= $treatmentsPage->url() ?>#studios">Studio Linz</a></span><br/>
			<span class="large"><a href="<?= $treatmentsPage->url() ?>#studios">Studio Lichtenberg</a></span><br/>
		</div>
	</div>
</footer>