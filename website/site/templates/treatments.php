<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")"; 
else $backgroundStyle = ""; ?>
<body class="home beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
	<?php snippet('overview', ["content" => "treatments", "filter" => "off"]); ?>
	<section class="studios">
		<div class="width50 darkGreen floatLeft">
			<h2><?= $page->studioName1()->kirbyText() ?></h2>
			<div class="width100 whiteBackground relative padding">
				<h4><?= $page->studioSubline1()->html() ?></h4>
				<h3 class="smallTopMargin"><?= $page->studioHeadline1()->html() ?></h3>
				<div class="flexGrow">
					<div class="data width100 darkGreen strongTopBorder vSmallPadding">
						<h4>Adresse</h4>
						<span class="small"><?= $page->studioAdress1()->html() ?></span>
					</div>
					<div class="data width100 darkGreen vSmallPadding">
						<h4>Praxistage</h4>
						<span class="small"><?= $page->studioDays1()->html() ?></span>
					</div>
					<div class="data width100 darkGreen vSmallPadding">
						<h4>Telefonnummer</h4>
						<span class="small"><a href="tel:<?= $page->studioPhone1()->html() ?>"><?= $page->studioPhone1()->html() ?></a></span>
					</div>
					<div class="data width100 darkGreen vSmallPadding">
						<h4>E-Mail Adresse</h4>
						<span class="small"><a href="mailto:<?= $page->studioEmail1()->html() ?>"><?= $page->studioEmail1()->html() ?></a></span>
					</div>
				</div>
				<span class="small uppercase"><?= $page->studioRemark()->html() ?></span>
				<?php if ($image = $page->studioImage1()->toFile()) { ?>
					<img class="absolute width100 cover" src="<?= $image->url() ?>" alt="<?= $page->studioName1()->html() ?>"/>
				<?php } ?>
			</div>
		</div>
		<div class="width50 darkGreen floatLeft">
			<h2><?= $page->studioName2()->kirbyText() ?></h2>
			<div class="width100 whiteBackground relative padding">
				<h4><?= $page->studioSubline2()->html() ?></h4>
				<h3 class="smallTopMargin"><?= $page->studioHeadline2()->html() ?></h3>
				<div class="flexGrow">
					<div class="data width100 darkGreen strongTopBorder vSmallPadding">
						<h4>Adresse</h4>
						<span class="small"><?= $page->studioAdress2()->html() ?></span>
					</div>
					<div class="data width100 darkGreen vSmallPadding">
						<h4>Praxistage</h4>
						<span class="small"><?= $page->studioDays2()->html() ?></span>
					</div>
					<div class="data width100 darkGreen vSmallPadding">
						<h4>Telefonnummer</h4>
						<span class="small"><a href="tel:<?= $page->studioPhone2()->html() ?>"><?= $page->studioPhone2()->html() ?></a></span>
					</div>
					<div class="data width100 darkGreen vSmallPadding">
						<h4>E-Mail Adresse</h4>
						<span class="small"><a href="mailto:<?= $page->studioEmail2()->html() ?>"><?= $page->studioEmail2()->html() ?></a></span>
					</div>
				</div>
				<span class="small uppercase"><?= $page->studioRemark()->html() ?></span>
				<?php if ($image = $page->studioImage2()->toFile()) { ?>
					<img class="absolute width100 cover" src="<?= $image->url() ?>" alt="<?= $page->studioName2()->html() ?>"/>
				<?php } ?>
			</div>
		</div>
	</section>
	<section class="newsletter width100 padding centeredText">
		<h3 class="width50 darkGreen inlineBlock"><?= $page->newsletterText()->kirbyText() ?></h3><br/>
		<button class="newsletter topMargin"></button>
	</section>
	<section class="callToAction width100 padding" style="<?php if ($image = $page->ctaImage()->toFile()) echo 'background-image:url('.$image->url().');' ?>">
		<h1 class="large white bottomMargin"><?= $page->ctaHeadline()->kirbyText() ?></h1>
		<span class="width33 inlineBlock small white topMargin"><?= $page->ctaText()->kirbyText() ?></span><br/>
		<a href="<?= $page->ctaLinkTarget()->toPage()->url() ?>"><button class="width100 rectangle white topMargin"><?= $page->ctaLinkText()->url() ?></button></a>
	</section>
	<?php snippet('footer'); ?>
</body>