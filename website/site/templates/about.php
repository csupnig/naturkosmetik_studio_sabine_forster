<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")"; 
else $backgroundStyle = ""; ?>
<body class="about beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
	<section class="intro width100 vPadding">
		<div class="grid2C topMargin">
			<div class="item hPadding vFlex">
				<h3 class="darkGreen smallTopMargin"><?=$page->introHeadline()->kirbyText() ?></h3>
				<span class="small darkGreen topMargin flexGrow"><?=$page->introText()->kirbyText() ?></span>
				<a href="#contact"><button class="width100 next small darkGreen topMargin">Hallo sagen</button></a>
			</div>
			<div class="item">
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
				<span class="large"><?= $page->educationIntro()->kirbyText() ?></span>
			</div>
			<div class="item rightPadding">
				<div class="dataList small darkGreen smallRightPadding">
					<?= $page->educationText()->kirbyText() ?>
				</div>
			</div>
		</div>
	</section>
	<?php if ($image = $page->philosophyBackground()->toFile()) { ?>
		<section class="philosophy darkGreen topPadding largeBottomPadding" style="background-image:url('<?= $image->url() ?>');">
			<h2 class="hPadding">Was mir<br/>wichtig ist</h2>
			<div class="grid2C topMargin">
				<div class="item hPadding">
					<h3><?= $page->philosophyHeadline()->html() ?></h3>
					<h3 class="small smallTopMargin"><?= $page->philosophyIntro()->kirbyText() ?></span>
				</div>
				<div class="item largeRightPadding">
					<span><?= $page->philosophyText()->kirbyText() ?></span>
				</div>
			</div>
		</section>		
	<?php } ?>
	<section id="#contact" class="contact vPadding darkGreen">
		<div class="padding">
			<h2>Kontakt<br/>Informationen</h2>
			<h3 class="topMargin"><a href="tel:<?= $site->phone()->html() ?>" target="_blank"><?= $site->phone()->html() ?></a></h3><br/>
			<h3><a href="mailto:<?= $site->email()->html() ?>" target="_blank"><?= $site->email()->html() ?></a></h3>
		</div>
		<div class="grid2C largeTopMargin">
			<div class="item hPadding">
				<div class="darkGreen topBorder">
					<h3 class="small smallTopMargin"><?= $site->find("treatments")->studioName1()->html() ?></h3>
					<span class="small topMargin"><?= $site->find("treatments")->studioAddress1()->kirbyText() ?></span>
					<a href="<?= $site->find('treatments')->url() ?>#studios"><button class="rectangle width100 darkGreen topMargin">Mehr zum Studio</button></a>
				</div>
			</div>
			<div class="item largeRightPadding">
				<div class="darkGreen topBorder">
					<h3 class="small smallTopMargin"><?= $site->find("treatments")->studioName2()->html() ?></h3>
					<span class="small topMargin"><?= $site->find("treatments")->studioAddress2()->kirbyText() ?></span>
					<a href="<?= $site->find('treatments')->url() ?>#studios"><button class="rectangle width100 darkGreen topMargin">Mehr zum Studio</button></a>
				</div>
			</div>
		</div>
	</section>
  	<?php snippet('callToAction', ["content" => "book", 'color' => 'darkGreen']); ?>
	<section class="legal largeBottomPadding topMargin darkGreen">
		<div class="grid2C">
			<div class="item darkGreen rightBorder hPadding">
				<h2>Impressum</h2>
				<span class="extraSmall topMargin"><?= $site->address()->kirbyText() ?></span>
			</div>
			<div class="item smallLeftPadding largeRightPadding">
				<h2>Kontodaten</h2>
				<span class="extraSmall topMargin"><?= $site->bankData()->kirbyText() ?></span>
			</div>
	</section>
	<?php snippet('footer'); ?>
</body>