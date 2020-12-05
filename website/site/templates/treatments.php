<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")"; 
else $backgroundStyle = ""; ?>
<body class="home beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
	<?php snippet('overview', ["content" => "treatments", "filter" => "off"]); ?>
	<section class="studios">
		<?php for ($i = 1; $i <= 2; $i++) { 
			?>
			<div class="studio width50 darkGreen floatLeft">
				<h2 class="hPadding topPadding topMargin bottomMargin"><?= $page->{"studioName".$i}()->kirbyText() ?></h2>
				<div class="item width100 whiteBackground relative flex">
					<div class="width100 smallPadding vFlex">
						<h4><?= $page->{"studioSubline".$i}()->html() ?></h4>
						<h3 class="smallTopMargin bottomMargin"><?= $page->{"studioHeadline".$i}()->html() ?></h3>
						<div class="flexGrow">
							<div class="data width100 darkGreen strongTopBorder vSmallPadding">
								<h4>Adresse</h4>
								<span class="small"><?= $page->{"studioAddress".$i}()->html() ?></span>
							</div>
							<div class="data width100 darkGreen vSmallPadding">
								<h4>Praxistage</h4>
								<span class="small"><?= $page->{"studioDays".$i}()->html() ?></span>
							</div>
							<div class="data width100 darkGreen vSmallPadding">
								<h4>Telefonnummer</h4>
								<span class="small"><a class="noUnderline" href="tel:<?= $site->phone()->html() ?>"><?= $site->phone()->html() ?></a></span>
							</div>
							<div class="data width100 darkGreen vSmallPadding">
								<h4>E-Mail Adresse</h4>
								<span class="small"><a class="noUnderline" href="mailto:<?= $site->email()->html() ?>"><?= $site->email()->html() ?></a></span>
							</div>
						</div>
						<span class="small uppercase"><?= $page->studioRemark()->html() ?></span>
					</div>
					<?php if ($image = $page->{"studioImage".$i}()->toFile()) { ?>
						<img class="absolute width100 cover top <?php if ($i == 1) echo 'right'; else echo 'left'; ?>" src="<?= $image->url() ?>" alt="<?= $page->{"studioName".$i}()->html() ?>"/>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
	</section>
	<?php snippet('callToAction', ["content" => "cancellation"]); ?>
	<?php snippet('footerExtension'); ?>
	<?php snippet('footer'); ?>
</body>