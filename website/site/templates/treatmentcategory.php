<?php snippet('head');
//Set background image
if ($page->parent()->toPage()->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")"; 
else $backgroundStyle = ""; ?>
<body class="treatmentCategory beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
	<?php snippet('breadcrumb'); ?>
	<section class="headline">
		<div class="width55 floatLeft relative">
			<?php if ($image = $page->headlineImage()->toFile()) { ?>
				<img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $page->headlineHeadline()->html() ?>"/>
			<?php } ?>
			<a href="#treatments"><button class="circle more darkGreen absolute right bottom"></button></a>
		</div>
		<div class="floatLeft hPadding">
			<h1 class="small darkGreen"><?= $page->headlineHeadline()->kirbyText() ?></h1>
		</div>
	</section>
	<?php snippet('infoList');
	if ($page->treatmentHighlight()->isNotEmpty()) { 
		$highlight = $page->treatmentHighlight()->toPage(); ?>
		<section class="highlight padding">
			<h2 class="darkGreen">Aktuelles aus<br/>dem Studio</h2>
			<div class="grid2C flex whiteBackground topMargin">
				<div class="item relative">
					<?php if ($image = $highlight->previewImage()->toFile()) { ?>
						<img class="width100 height100 cover" src="<?= $image->url() ?>" alt="<?= $highlight->name()->html() ?>"/>
					<?php } ?>
					<button class="highlight white greenBackground top right">Highlight</button>
				</div>
				<div class="item smallPadding darkGreen vFlex">
					<h4>Aktuelles</h4>
					<h3 class="smallTopMargin smallBottomMargin"><?= $highlight->name()->html() ?></h3>
					<span class="small flexGrow"><?= $highlight->description()->kirbyText() ?></span>
					<div class="width100 doubleColumns smallTopMargin">
						<div class="data strongTopBorder darkGreen vSmallPadding">
							<h4>Dauer</h4>
							<span class="extraSmall"><?= $highlight->duration()->html() ?></span>
						</div>
						<div class="data strongTopBorder darkGreen vSmallPadding">
							<h4>Kosten</h4>
							<span class="extraSmall"><?= $highlight->price()->html() ?></span>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php }
	$treatments = $page->children()->filterBy("intendedTemplate", "treatment")->published();
	if (count($treatments) > 0) { ?>
		<section id="treatments" class="treatments padding">
			<h2 class="darkGreen"><?= $page->name()->html() ?><br/>Behandlungen</h2>
			<div class="grid2C ratio3-2 topMargin darkGreen">
				<?php foreach ($treatments as $treatment) { ?>
					<div class="item">
						<h3 class="small"><?= $treatment->name()->html() ?></h3>
						<span class="small smallTopMargin"><?= $treatment->description()->kirbyText() ?></span>
						<span class="extraSmall contact absolute"><a class="uppercase" href="mailto:<?= $site->email()->url() ?>?subject=Anfrage zu <?= $treatment->name()->html() ?>">Behandlung anfragen</a></span>
					</div>
					<div class="item">
						<div class="width100 doubleColumns">
							<div class="data strongTopBorder darkGreen vSmallPadding">
								<h4>Dauer</h4>
								<span class="extraSmall"><?= $treatment->duration()->html() ?></span>
							</div>
							<div class="data strongTopBorder darkGreen vSmallPadding">
								<h4>Kosten</h4>
								<span class="extraSmall"><?= $treatment->price()->html() ?></span>
							</div>
						</div>
						<div class="width100">
							<div class="data darkGreen vSmallPadding">
								<h4>Gut bei</h4>
								<span class="extraSmall"><?= $treatment->usage()->html() ?></span>
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