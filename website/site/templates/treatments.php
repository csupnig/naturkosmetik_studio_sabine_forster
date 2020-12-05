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
	<?php snippet('callToAction', ["content" => "cancellation"]); ?>
	<?php snippet('footerExtension'); ?>
	<?php snippet('footer'); ?>
</body>