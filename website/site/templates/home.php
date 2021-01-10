<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")"; 
else $backgroundStyle = ""; ?>
<body class="home beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
	<section class="headline largeTopPadding">
		<div class="width100 alignFarRight hPadding bottomPadding">
			<h1 class="darkGreen"><?= $page->headlineHeadline()->kirbyText() ?></h1>
			<span class="darkGreen"><?= $page->headlineSubline()->html() ?></span>
		</div>
		<div class="width85 floatLeft relative">
			<?php if ($image = $page->headlineImage()->toFile()) { ?>
				<img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $page->headlineHeadline()->html() ?>"/>
			<?php } ?>
			<button class="sticker top right darkGreen lightGreenBackground"><a href="<?= $page->headlineLinkTarget()->url() ?>"><?= $page->headlineLinkText()->html() ?></a></button>
		</div>
	</section>
	<?php snippet('intro', ['link' => true, 'signature' => false]); ?>
	<section class="treatments width100 hPadding">
		<h2 class="darkGreen">Behandlungs-<br/>Highlights</h2>
		<div class="grid3C topMargin">
			<?php $i = 1;
			foreach ($page->treatmentHighlights()->toPages() as $treatment) { 
				if ($i == 1) { 
					$textClass = "white";
					$backgroundClass = "greenBackground";
				} else if ($i == 2) {
					$textClass = "darkGreen";
					$backgroundClass = "lightGreenBackground";
				} else if ($i == 3) {
					$textClass = "darkGreen";
					$backgroundClass = "brownBackground";
				}
				$i++ ?>
				<div class="item hoverFlip">
					<div class="width100 flex square extraSmallPadding relative <?= $textClass ?> <?= $backgroundClass ?>">
						<h3 class="width75 flexGrow"><a href="<?= $treatment->parent()->url() ?>#<?= $treatment->title()->html() ?>"><?= $treatment->name()->html() ?></a></h3>
						<span class="footnote top right"><?= $treatment->duration()->html() ?></span>
						<span class="large alignFlexEnd">€<?= $treatment->price()->html() ?></span>
					</div>
					<div class="details width100 smallTopMargin">
						<span class="small flip width75 inlineBlock darkGreen"><?= $treatment->shortDescription()->html() ?></span>
						<a class="flip" href="<?= $treatment->parent()->url() ?>#<?= $treatment->title()->html() ?>"><button class="width100 next large darkGreen">Details</button></a>
					</div>
				</div>
			<?php } ?>
		</div>
		<?php $treatmentsPage = $site->find("treatments"); ?>
		<a href="<?= $treatmentsPage->url() ?>"><button class="circledNext topMargin floatRight darkGreen">Alle Behandlungen</button></a>
	</section>
	<?php snippet('productHighlights', ['filter' => 'manual']); ?>
	<?php if ($page->eventHighlight()->isNotEmpty()) { 
		$event = $page->eventHighlight()->toPage(); ?>
		<section class="events width100 vPadding">
			<h2 class="darkGreen hPadding">Events</h2>
			<div class="grid2C topMargin">
				<div class="item hPadding vFlex">
					<div class="width100 darkGreen topBorder"></div>
					<h3 class="width75 darkGreen smallTopMargin"><?= $event->category()->html().":<br/>".$event->name()->html() ?></h3>
					<span class="small width75 darkGreen topMargin flexGrow"><?= $event->shortDescription()->kirbyText() ?></span>
					<div class="width75 doubleColumns topMargin">
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
					<a href="<?= $site->find("events")->url() ?>#<?= $event->title()->html() ?>"><button class="width100 rectangle darkGreen topMargin">Mehr zu diesem Event</button></a>
				</div>
				<div class="item relative">
					<?php if ($image = $page->eventsImage()->toFile()) { ?>
						<img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $page->eventsHeadline()->html() ?>"/>
					<?php } ?>
					<button class="sticker top left white greenBackground"><a href="<?= $site->find("events")->url() ?>">Zu allen Events</a></button>
				</div>
			</div>
		</section>
	<?php } ?>
	<?php $reviews = $page->children()->filterBy("intendedTemplate", "review")->published();
	if (count($reviews) > 0) { ?>
		<section class="reviews padding centeredText topMargin">
			<div class="width75 inlineBlock">
				<h2 class="darkGreen">Reviews meiner<br/>KundInnen</h2>
				<div class="carousel directAccess">
					<div class="navigation topMargin bottomMargin">
						<?php $itemNumber = 0;
						foreach($reviews as $review) {
							$itemNumber++; ?>
							<button class="direct line lightGreenBackground <?php if ($itemNumber == 1) echo 'active'; ?>" data-selection="review<?=$itemNumber?>"></button>
						<?php } ?>
					</div>
					<div class="width66 items inlineBlock">
						<?php $itemNumber = 0;
						foreach ($reviews as $review) {
							$itemNumber++; ?>
							<div class="item review<?=$itemNumber?>">
								<span class="darkGreen"><?= $review->text()->kirbyText() ?></span>
								<h4 class="darkGreen topMargin"><?= $review->name()->html() ?></h4>
								<span class="extraSmall darkGreen"><?= $review->location()->html() ?></span>
							</div>
						<?php } ?>
					</div>
					<button class="previous floatLeft darkGreen topMargin"></button>
					<button class="next floatRight darkGreen topMargin"></button>
				</div>
			</div>
		</section>
	<?php } ?>
	<?php
  $articlesPage = $site->find("articles");

  $articles = $articlesPage ? $articlesPage->children()->filterBy("intendedTemplate", "article")->published()->limit(3) : [];
	if (count($articles) > 0) { ?>
		<section class="articles width100 topMargin hPadding">
			<h2 class="darkGreen">Aktuelle<br/>Artikel</h2>
			<div class="grid3C topMargin">
				<?php foreach ($articles as $article) { ?>
					<div class="item hoverFlip">
						<a href="<?= $article->url() ?>">
							<div class="width100 square relative">
								<?php if ($image = $article->previewImage()->toFile()) { ?>
									<img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $article->name()->html() ?>"/>
								<?php } ?>
								<div class="cutout darkGreen">
									<span class="footnote top right white"><?= $article->category()->html() ?></span>
								</div>
							</div>
						</a>
						<div class="details width100 smallTopMargin">
							<span class="flip darkGreen"><?= $article->name()->html() ?></span>
							<a class="flip" href="<?= $article->url() ?>"><button class="width100 next large darkGreen">Zum Artikel</button></a>
						</div>
					</div>
				<?php } ?>
			</div>
			<a href="<?= $site->children()->find("articles")->url() ?>"><button class="circledNext topMargin floatRight darkGreen"><?= $site->children()->find("articles")->name() ?></button></a>
		</section>
	<?php } ?>
  	<?php snippet('callToAction', ["content" => "newsletter", 'color' => 'darkGreen']); ?>
	<?php snippet('footerExtension'); ?>
	<?php snippet('footer'); ?>
</body>
