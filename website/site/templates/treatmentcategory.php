<?php snippet('head');
//Set background image
if ($page->parent()->toPage()->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")"; 
else $backgroundStyle = ""; ?>
<body class="treatment beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
	<?php snippet('breadcrumb'); ?>
	<section class="headline">
		<div class="grid2C ratio55-45">
			<div class="item relative">
				<?php if ($image = $page->headlineImage()->toFile()) { ?>
					<img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $page->headlineHeadline()->html() ?>"/>
				<?php } ?>
				<a href="#treatments"><button class="sticker more darkGreen right bottom"></button></a>
			</div>
			<div class="item hPadding">
				<h1 class="small darkGreen"><?= $page->headlineHeadline()->kirbyText() ?></h1>
			</div>
		</div>
	</section>
	<?php snippet('infoList');
	if ($page->treatmentHighlight()->isNotEmpty()) { 
		$highlight = $page->treatmentHighlight()->toPage(); ?>
		<section class="highlight padding">
			<h2 class="darkGreen">Aktuelles aus<br/>dem Studio</h2>
			<div class="grid2C whiteBackground">
				<div class="item relative">
					<?php if ($image = $highlight->previewImage()) { ?>
						<img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $highlight->name()->html() ?>"/>
					<?php } ?>
					<button class="highlight green top right">Highlight</button>
				</div>
				<div class="item smallPadding darkGreen">
					<h4>Aktuelles</h4>
					<h3><?= $highlight->name()->html() ?></h3>
					<span><?= $highlight->description()->kirbyText() ?></span>
					<div class="width100">
						<div class="data strongTopBorder darkGreen vSmallPadding">
							<h4>Dauer</h4>
							<span class="small"><?= $highlight->duration()->html() ?></span>
						</div>
						<div class="data strongTopBorder darkGreen vSmallPadding">
							<h4>Kosten</h4>
							<span class="small"><?= $highlight->price()->html() ?></span>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php }
	$treatments = $page->children()->filterBy("intendedTemplate", "treatment")->published();
	if (count($treatments) > 0) { ?>
		<section class="treatments vPadding">
			<h2 class="darkGreen hPadding"><?= $page->name()->html() ?><br/>Behandlungen</h2>
			<div class="grid2C ratio55-45 topMargin darkGreen">
				<?php foreach ($treatments as $treatment) { ?>
					<div class="width55 floatLeft hPadding">
						<h3 class="small"><?= $treatment->name()->html() ?></h3><br/>
						<span class="smallTopMargin"><?= $treatment->description()->kirbyText() ?></span>
						<span class="contact"><a class="uppercase" href="<?= $site->deliveryPage()->url() ?>">Versand</a></span>
					</div>
					<div class="width45 floatLeft hPadding">
						<div class="width100 doubleColumns">
							<div class="data strongTopBorder darkGreen vSmallPadding">
								<h4>Dauer</h4>
								<span class="small"><?= $treatment->duration()->html() ?></span>
							</div>
							<div class="data strongTopBorder darkGreen vSmallPadding">
								<h4>Kosten</h4>
								<span class="small"><?= $treatment->price()->html() ?></span>
							</div>
						</div>
						<div class="width100">
							<div class="data darkGreen vSmallPadding">
								<h4>Gut bei</h4>
								<span class="small"><?= $treatment->usage()->html() ?></span>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</section>
	<?php } ?>
	<?php snippet('callToAction', ["content" => "book", "color" => 'darkGreen']); ?>
	<?php snippet('footerExtension'); ?>
	<?php snippet('footer'); ?>
</body>