<footer id="footer" class="width100 vFlex padding darkGreen lightGreenBackground">
	<div class="width100 inlineBlock flexGrow">
		<div class="width66 floatLeft">
			<h2 class="large"><?= $site->newsletterCall()->kirbyText() ?></h2>
			<span class="large"><a class="newsletter" href="#">Newsletter Anmeldung</a></span>
		</div>
		<div class="floatRight noUnderline">
			<?php if ($site->termsConditionsFile()->isNotempty()) { ?>
				<span class="small"><a href="<?= $site->termsConditionsFile()->toFile()->url() ?>">Nutzungsbedinungen</a></span><br/>
			<?php } else if ($site->termsConditionsPage()->isNotEmpty()) { ?>
				<span class="small"><a href="<?= $site->termsConditionsPage()->toPage()->url() ?>">Nutzungsbedinungen</a></span><br/>
			<?php } 
			$aboutPage = $site->find("about"); ?>
			<span class="small"><a href="<?= $aboutPage->url() ?>"><?= $aboutPage->name()->html() ?></a></span><br/>
			<span class="small"><a href="<?= $aboutPage->url() ?>#contact">Kontakt</a></span><br/>
			<span class="small"><a href="<?= $site->designLink()->html() ?>" target="_blank">Design: <?= $site->design()->html() ?></a></span><br/>
		</div>
	</div>
	<div class="width100 inlineBlock noUnderline">
		<div class="width50 floatLeft">
			<span><a href="tel:<?= $site->phone()->html() ?>" target="_blank"><?= $site->phone()->html() ?></a></span><br/>
			<span><a href="mailto:<?= $site->email()->html() ?>" target="_blank"><?= $site->email()->html() ?></a></span><br/>
		</div>
		<div class="floatRight">
			<?php $treatmentsPage = $site->children()->find("treatments")->toPage(); ?>
			<span><a href="<?= $treatmentsPage->url() ?>#studios">Studio Linz</a></span><br/>
			<span><a href="<?= $treatmentsPage->url() ?>#studios">Studio Lichtenberg</a></span><br/>
		</div>
	</div>
</footer>