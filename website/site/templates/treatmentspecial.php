<?php snippet('head');
//Set background image
if ($page->parent()->toPage()->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")"; 
else $backgroundStyle = ""; ?>
<body class="treatmentSpecial beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
	<?php snippet('breadcrumb'); ?>
	<section class="headline">
		<div class="width55 floatLeft relative">
			<?php if ($image = $page->headlineImage()->toFile()) { ?>
				<img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $page->headlineHeadline()->html() ?>"/>
			<?php } ?>
			<a href="#treatments"><button class="circle more darkGreen absolute right bottom"></button></a>
		</div>
		<div class="width45 floatLeft hPadding">
			<h1 class="small darkGreen"><?= $page->headlineHeadline()->kirbyText() ?></h1>
			<span class="darkGreen smallTopMargin"><?= $page->headlineText()->kirbyText() ?></span>
		</div>
	</section>
	<?php snippet('infoList'); ?>
	<section id="methods" class="methods padding darkGreen">
		<h2>Unsere<br/>Methdoen</h2>
		<div class="grid3C topMargin">
			<?php for ($i = 1; $i < 7; $i++) { ?>
				<div class="item">
					<h3 class="extraSmall"><?= $page->{"methodHeadline".$i}()->html() ?></h3>
					<span class="small smallTopMargin"><?= $page->{"methodText".$i}()->kirbyText() ?></span>
				</div>
			<?php } ?>
		</div>
	</section>
	<section id="usage" class="usage vPadding flex">
		<div class="width50 floatLeft">
			<?php if ($image = $page->usageImage()->toFile()) { ?>
				<img class="width100 height100 cover" src="<?= $image->url() ?>" alt="<?= $page->name()->html() ?>"/>
			<?php } ?>
		</div>
		<div class="width50 darkGreen whiteBackground floatLeft smallPadding vFlex">
			<h2>Kann hilfreich<br/>sein bei</h2>
			<div class="flexGrow dataList extraSmall darkGreen topMargin">
				<?= $page->usageText()->kirbyText() ?>
			</div>
			<span class="extraSmall uppercase"><?= $page->usageRemark()->html() ?></span>
		</div>
	</section>
	<section id="treatments" class="treatments vPadding topMargin">
		<?php $i = 1;
		foreach ($page->children()->filterBy("intendedTemplate", "treatment")->published() as $treatment) { ?>
			<div class="width50 floatLeft darkGreen rightBorder hPadding">
				<h2><?= $treatment->name()->html() ?></h2>
				<div class="data strongTopBorder darkGreen vSmallPadding topMargin">
					<h4>Details</h4>
					<span class="extraSmall"><?= $treatment->description()->html() ?></span>
				</div>
				<div class="data width100 darkGreen vSmallPadding">
					<h4>Dauer</h4>
					<span class="extraSmall"><?= $treatment->duration()->html() ?></span>
				</div>
				<div class="data width100 darkGreen vSmallPadding">
					<h4>Kosten</h4>
					<span class="extraSmall">€<?= $treatment->price()->html() ?></span>
				</div>
			</div>
			<?php $i++;
		} ?>
	</section>
	<?php snippet('callToAction', ["content" => "book", "color" => 'darkGreen']); ?>
	<?php snippet('footer'); ?>
</body>