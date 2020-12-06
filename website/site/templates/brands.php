<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")"; 
else $backgroundStyle = ""; ?>
<body class="home beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>

	<?php if ($page->eventHighlight()->isNotEmpty()) { 
		$event = $page->eventHighlight()->toPage(); ?>
		<section class="events width100 vPadding">
			<h2 class="darkGreen hPadding">Events</h2>
			<div class="grid2C topMargin">
				<div class="item hPadding vFlex">
					<div class="width100 darkGreen topBorder"></div>
					<h3 class="width75 darkGreen smallTopMargin"><?= $event->category()->html().":<br/>".$event->name()->html() ?></h3>
					<span class="small width75 darkGreen topMargin flexGrow"><?= $event->shortDescription()->kirbyText() ?></span>
					<div class="width75 doubleColumns">
						<div class="data darkGreen vSmallPadding">
							<h4>Zeit</h4>
							<span class="extraSmall"><?= $event->date()->toDate("d.m.Y").", ".$event->time()->html() ?></span>
						</div>
						<div class="data darkGreen vSmallPadding">
							<h4>Dauer</h4>
							<span class="extraSmall"><?= $event->duration()->html() ?></span>
						</div>
						<div class="data darkGreen vSmallPadding">
							<h4>Ort</h4>
							<span class="extraSmall"><?= $event->location()->html() ?></span>
						</div>
						<div class="data darkGreen vSmallPadding">
							<h4>Kosten</h4>
							<span class="extraSmall">€<?= $event->price()->html() ?></span>
						</div>
					</div>
					<a href="<?= $event->url() ?>"><button class="width100 rectangle darkGreen topMargin">Mehr zu diesem Event</button></a>
				</div>
				<div class="item relative">
					<?php if ($image = $page->eventsImage()->toFile()) { ?>
						<img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $page->eventsHeadline()->html() ?>"/>
					<?php } ?>
					<button class="sticker top left white greenBackground"><a href="<?= $site->find("about")->find("events")->toPage()->url() ?>">Zu allen Events</a></button>
				</div>
			</div>
		</section>

	<?php snippet('footer'); ?>
</body>
