<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")"; 
else $backgroundStyle = ""; ?>
<body class="about beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
	<section class="intro width100 vPadding">
		<div class="grid2C topMargin flex">
			<div class="item">
				<?php if ($image = $page->introImage()->toFile()) { ?>
				  <img class="width100 height100 cover" src="<?= $image->url() ?>" alt="<?= $page->introHeadline()->html() ?>"/>
				<?php } ?>
			</div>
			<div class="item hPadding vFlex">
				<h3 class="darkGreen"><?= $page->introHeadline()->kirbyText() ?></h3>
				<span class="small darkGreen topMargin smallBottomMargin flexGrow"><?= $page->introText()->kirbyText() ?></span>
				<?php $eventCategories = $page->children()->filterBy("intendedTemplate", "eventcategory")->published();
				foreach ($eventCategories as $eventCategory) { ?>
					<a href="#<?= $eventCategory->title()->html() ?>"><button class="width100 next small darkGreen smallTopMargin"><?= $eventCategory->name()->html() ?></button></a>
				<?php } ?>
			</div>		
		</div>
	</section>
	<?php snippet('callToAction', ["content" => "events", 'color' => 'darkGreen']); ?>
	<?php foreach ($eventCategories as $eventCategory) { ?>
		<section id="<?= $eventCategory->title()->html() ?>" class="eventCategory darkGreen padding">
			<div class="grid2C extraLargeGap">
				<div class="item">
					<h1 class="small width100 topBorder darkGreen extraSmallTopPadding"><?= $eventCategory->name()->html() ?></h1>
				</div>
			</div>
			<?php foreach ($eventCategory->children()->filterBy("intendedTemplate", "event")->published() as $event) { ?>
				<div id="<?= $event->title()->html() ?>" class="grid2C extraLargeGap vPadding">
					<div class="item">
						<h2><?= $event->category()->html() ?></h2>
						<h3 class="topMargin"><?= $event->name()->html() ?></h3>
					</div>
					<div class="item">
					</div>
					<div class="item vFlex">
						<span class="flexGrow"><?= $event->description()->kirbyText() ?></span>
						<div class="width100 grid2C topMargin">
							<?php if ($event->lecturerName1()->isNotEmpty()) { ?>
								<div class="item topBorder darkGreen tinyVPadding">
									<h4><?= $event->lecturerName1()->html() ?></h4>
									<span class="extraSmall"><?= $event->lecturerDescription1()->html() ?></span>
								</div>
							<?php }
							if ($event->lecturerName2()->isNotEmpty()) { ?>
								<div class="item topBorder darkGreen tinyVPadding">
									<h4><?= $event->lecturerName2()->html() ?></h4>
									<span class="extraSmall"><?= $event->lecturerDescription2()->html() ?></span>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="item vFlex">
						<div class="data width100 strongTopBorder darkGreen vSmallPadding">
							<h4>Zeit</h4>
							<span class="extraSmall"><?= $event->date()->toDate("d.m.Y").", ".$event->time()->html() ?></span>
						</div>
						<div class="data width100 darkGreen vSmallPadding">
							<h4>Dauer</h4>
							<span class="extraSmall"><?= $event->duration()->html() ?></span>
						</div>
						<div class="data width100 darkGreen vSmallPadding">
							<h4>Ort</h4>
							<span class="extraSmall"><?= $event->location()->html() ?></span>
						</div>
						<div class="data width100 darkGreen vSmallPadding flexGrow">
							<h4>Kosten</h4>
							<span class="extraSmall">€<?= $event->price()->html() ?></span>
						</div>
						<a href="mailto:<?= $site->email()->html() ?>?subject=Anfrage zu <?= $event->name()->html() ?>"><button class="width100 rectangle darkGreen topMargin">Anmeldung zu diesem Event</button></a>
					</div>
				</div>
			<?php } ?>
		</section>
	<?php } ?>
	<?php snippet('footer'); ?>
</body>