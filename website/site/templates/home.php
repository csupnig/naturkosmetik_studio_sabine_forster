<?php snippet('header');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->url().")"; 
else $backgroundStyle = ""; ?>
<body class="home beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('head'); ?>
	<section class="intro">
		<div class="width100 alignRight padding">
			<h1 class="darkGreen"><?= $page->headlineHeadline()->kirbyText() ?></h1>
			<span class="darkGreen"><?= $page->headlineSubline()->html() ?></span>
		</div>
		<div class="width100 leftAlign hPadding">
			<?php if ($image = $page->headlineImage()->toFile()) { ?>
				<img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $page->headlineHeadline()->html() ?>"/>
			<?php } ?>
			<button class="sticker top right darkGreen lightGreenBackground"><a href="<?= $page->headlineLinkTarget()->url() ?>"><?= $page->headlineLinkText()->html() ?></a></button>
		</div>
	</section>
	<section class="intro width2C paddingbottomMargin">
		<div class="item">
			<h3 class="darkGreen"><?= $page->introIntro()->kirbyText() ?></h3>
			<span class="darkGreen"><?= $page->introText()->kirbyText() ?></span>
			<a href="<?= $page->introLinkTarget()->url() ?>"><button class="rectangle darkGreen"><?= $page->introLinkText()->html() ?></button></a>
		</div>
		<div class="item vEnd">
			<?php if ($image = $page->introImage()->toFile()) { ?>
				<img class="width50 cover circle" src="<?= $image->url() ?>" alt="<?= $site->name()->html() ?>"/>
			<?php } ?>
		</div>
	</section>
	<section class="treatments width100 hPadding">
		<h2 class="darkGreen">Behandlungs-<br/>Highlights</h2>
		<div class="width3C topMargin">
			<?php $i = 1;
			foreach ($page->treatmentHighlights()->toPages() as $treatment) { 
				if ($i == 1) { 
					$textClass = "white";
					$backgroundClass = "greenBackground";
				} else if ($i == 2) {
					$textClass = "darkGreen";
					$backgroundClass = "lightGreenBackground";
				} else if ($i == 2) {
					$textClass = "darkGreen";
					$backgroundClass = "brownBackground";
				}
				$i++ ?>
				<div class="item">
					<div class="width100 square relative <?= $textClass ?> <?= $backgroundClass ?>">
						<h3><a href="<?= $treatment->url() ?>"><?= $treatment->name()->html() ?></a></h3>
						<span class="footnote top right"><?= $treatment->duration()->html() ?></span>
						<span class="large flexEnd">€<?= $treatment->price()->html() ?></span>
					</div>
					<div class="details width100 smallTopMargin hoverFlip">
						<span class="small darkGreen"><?= $treatment->shortDescription()->html() ?></span>
						<a href="<?= $treatment->url() ?>"><button class="width100 arrow large darkGreen">Details</button></a>
					</div>
				</div>
			<?php } ?>
		</div>
		<?php $treatmentsPage = $site->find("treatments"); ?>
		<a href="<?= $treatmentsPage->url() ?>"><button class="arrow topMargin floatRight darkGreen">Alle Behandlungen</button></a>
	</section>
	<section class="products width100 padding">
		<h2 class="darkGreen">Produkt-<br/>Highlights</h2>
		<div class="width2C topMargin">
			<?php foreach ($page->productHighlights()->toPages() as $product) { ?>
				<div class="item">
					<?php if ($image = $product->image()->toFile()) { ?>
						<img class="width100 height85 cover" src="<?= $image->url() ?>" alt="<?= $product->name()->html() ?>"/>
					<?php } ?>
					<div class="details width100 smallTopMargin hoverFlip">
						<div class="width100">
							<h3 class="darkGreen floatLeft"><?= $product->name()->html() ?></h3>
							<span class="small darkGreen floatLeft"><?= $product->shortDescription()->html() ?></span>
							<span class="darkGreen floatRight">€<?= $product->price()->html() ?></span>
						</div>
						<a href="<?= $treatment->url() ?>"><button class="width100 arrow large darkGreen">Details</button></a>
					</div>
				</div>
			<?php } ?>
		</div>
		<?php $shopPage = $site->children()->find("shop"); ?>
		<a href="<?= $shopPage->url() ?>"><button class="arrow topMargin floatRight darkGreen">Zum Shop</button></a>
	</section>
	<?php if ($page->eventHighlight()->isNotEmpty()) { 
		$event = $page->eventHighlight()->toPage(); ?>
		<section class="events width2C alignRight padding">
			<h2 class="darkGreen">Events</h2>
			<div class="hFlex">
				<div class="item darkGreen topBorder rightPadding vFlex">
					<h2 class="darkGreen"><?= $event->category()->html().":<br/>".$event->name()->html() ?></h2>
					<span class="small darkGreen topMargin flexGrow"><?= $event->shortDescription()->kirbyText() ?></span>
					<div class="width75 doubleColumns">
						<div class="darkGreen topBorder vSmallPadding">
							<h4>Zeit</h4>
							<span class="small"><?= $event->date()->toDate("d.m.Y").", ".$event->time()->html() ?></span>
						</div>
						<div class="darkGreen topBorder vSmallPadding">
							<h4>Dauer</h4>
							<span class="small"><?= $event->duration()->html() ?></span>
						</div>
						<div class="darkGreen topBorder vSmallPadding">
							<h4>Dauer</h4>
							<span class="small"><?= $event->location()->html() ?></span>
						</div>
						<div class="darkGreen topBorder vSmallPadding">
							<h4>Dauer</h4>
							<span class="small">€<?= $event->price()->html() ?></span>
						</div>
					</div>
					<a href="<?= $event->url() ?>"><button class="rectangle darkGreen">Mehr zu diesem Event</button></a>
				</div>
				<div class="item">
					<?php if ($image = $page->eventsImage()->toFile()) { ?>
						<img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $page->eventsHeadline()->html() ?>"/>
					<?php } ?>
					<button class="sticker top right white greenBackground"><a href="<?= $site->find("about")->find("events")->toPage()->url() ?>">Zu allen Events</a></button>
				</div>
			</div>
		</section>
	<?php } ?>
	<?php $reviews = $page->children()->filterBy("intendedTemplate", "review")->published();
	if (count($reviews) > 0) { ?>
		<section class="reviews padding centeredText">
			<h2 class="darkGreen">Rewviews meiner<br/>KundInnen</h2>
			<div class="carousel directAccess">
				<div class="navigation">
					<?php $itemNumber = 0;
					foreach($reviews as $review) {
						$itemNumber++; ?>
						<button class="direct line lightGreenBackground" data-selection="review<?=$itemNumber?>"></button>
					<?php } ?>
				</div>
				<?php $itemNumber = 0;
				foreach ($reviews as $review) {
					$itemNumber++; ?>
					<div class="item width50 inlineBlock review<?=$itemNumber?>">
						<span class="darkGreen"><?= $review->text()->kirbyText() ?></span>
						<h4 class="darkGreen topMargin"><?= $review->name()->html() ?></h4>
						<span class="small darkGreen"><?= $review->location()->html() ?></span>
					</div>
				<?php } ?>
				<button class="previous floatLeft"></button>
				<button class="next floatRight"></button>
			</div>
		</section>
	<?php } ?>
	<?php $articles = $site->find("articles")->children()->filterBy("intendedTemplate", "article")->published()->limit(3);
	if (count($articles) > 0) { ?>
		<section class="articles width100 padding">
			<h2 class="darkGreen">Aktuelle<br/>Artikel</h2>
			<div class="width3C topMargin">
				<?php foreach ($articles as $article) { ?>
					<div class="item">
						<div class="width100 square">
							<?php if ($image = $article->previewImage()->toFile()) { ?>
								<img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $article->name()->html() ?>"/>
							<?php } ?>
							<div class="overlay darkGreenCutOut relative">
								<span class="footnote top right"><?= $article->category()->html() ?></span>
							</div>
						</div>
						<div class="details width100 smallTopMargin hoverFlip">
							<span class="darkGreen"><?= $article->name()->html() ?></span>
							<a href="<?= $article->url() ?>"><button class="width100 arrow large darkGreen">Zum Artikel</button></a>
						</div>
					</div>
				<?php } ?>
			</div>
			<a href="<?= $site->children()->find("articles")->url() ?>"><button class="arrow topMargin floatRight darkGreen"><?= $site->children()->find("articles")->name() ?></button></a>
		</section>
	<?php } ?>
	<section class="newsletter width100 padding centeredText">
		<h2 class="darkGreen"><?= $page->newsletterText()->kirbyText() ?></h2>
		<button class="newsletter"></button>
	</section>
	<section class="callToAction width100 padding">
		<h2 class="large white"><?= $page->ctaHeadline()->kirbyText() ?></h2>
		<span class="width33 small white topMargin"><?= $page->ctaText()->kirbyText() ?></span>
		<a href="<?= $page->ctaLinkTarget()->url() ?>"><button class="rectangle white"><?= $page->ctaLinkText()->url() ?></button></a>
	</section>
	<?php snippet('footer'); ?>
</body>