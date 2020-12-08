<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")"; 
else $backgroundStyle = ""; ?>
<body class="about beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
	<section class="intro width100 vPadding">
		<div class="grid2C topMargin">
			<div class="item hPadding vFlex">
				<h3 class="width75 darkGreen smallTopMargin"><?=$page->introHeadline()->kirbyText() ?></h3>
				<span class="small width75 darkGreen topMargin flexGrow"><?=$page->introText()->kirbyText() ?></span>
				<a href="#contact"><button class="width100 arrow darkGreen topMargin">Hallo sagen</button></a>
			</div>
			<div class="item relative">
				<?php if ($image = $page->introImage()->toFile()) { ?>
				  <img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $page->introHeadline()->html() ?>"/>
				<?php } ?>
			</div>
		</div>
	</section>
	<?php snippet('callToAction', ["content" => "newsletter", 'color' => 'darkGreen']); ?>
	<section class="education darkGreen bottomPadding">
		<h2 class="hPadding">Beruflicher<br/>Werdegang</h2>
		<div class="grid2C topMargin">
			<div class="item hPadding">
				<span class="large dataList"><?= $page->educationIntro()->kirbyText() ?></span>
			</div>
			<div class="item rightPadding">
				<?= $page->educationText()->kirbyText() ?>
			</div>
		</div>
	</section>
	<?php if ($image = $page->philsophyBackground()->toFile()) { ?>
		<section class="philosophy darkGreen vPadding" style="background-image:url('<?= $image->url() ?>');">
			<h2 class="hPadding">Was mir<br/>wichtig ist</h2>
			<div class="grid2C topMargin">
				<div class="item hPadding">
					<h3><?= $page->philosophyHeadline()->html() ?></h3>
					<span class="large"><?= $page->philsophyIntro()->kirbyText() ?></span>
				</div>
				<div class="item largeRightPadding">
					<?= $page->philosophyText()->kirbyText() ?>
				</div>
			</div>
		</section>		
	<?php } ?>
	<section id="#contact" class="contact darkGreen">
		<div class="hPadding">
			<h2>Kontakt<br/>Informationen</h2>
			<h3 class="topMargin"><a href="tel:<?= $site->phone()->html() ?>" target="_blank"><?= $site->phone()->html() ?></a></h3><br/>
			<h3><a href="mailto:<?= $site->email()->html() ?>" target="_blank"><?= $site->email()->html() ?></a></h3>
		</div>
		<div class="grid2C topMargin">
			<div class="item hPadding">
				<div class="darkGreen topBorder">
					<h3 class="small"><?= $site->find("treatments")->studioName1()->html() ?></h3>
					<span class="small topMargin"><?= $site->find("treatments")->studioAddress1()->kirbyText() ?>
					<a href="<?= $site->find('treatments')->url() ?>#studios"><button class="rectangle width100 darkGreen">Mehr zum Studio</button></a>
				</div>
			</div>
			<div class="item largeRightPadding">
				<div class="darkGreen topBorder">
					<h3 class="small"><?= $site->find("treatments")->studioName2()->html() ?></h3>
					<span class="small topMargin"><?= $site->find("treatments")->studioAddress2()->kirbyText() ?>
					<a href="<?= $site->find('treatments')->url() ?>#studios"><button class="rectangle width100 darkGreen">Mehr zum Studio</button></a>
				</div>
			</div>
		</div>
	</section>
  	<?php snippet('callToAction', ["content" => "book", 'color' => 'darkGreen']); ?>
	<section class="legal largeBottomPadding">
		<div class="grid2C">
			<div class="item darkGreen rightBorder hPadding">
				<h2>Impressum</h2>
				<span class="extraSmall topMargin"><?= $site->address()->kirbyText() ?></span>
			</div>
			<div class="item largeRightPadding">
				<h2>Kontodaten</h2>
				<span class="extraSmall topMargin"><?= $site->bankData()->kirbyText() ?></span>
			</div>
	</section>
	<?php snippet('footer'); ?>
</body>