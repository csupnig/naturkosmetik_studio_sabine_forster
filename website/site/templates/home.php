<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")"; 
else $backgroundStyle = ""; ?>
<body class="home beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
	<section class="intro largeTopPadding">
		<div class="width100 alignFarRight padding">
			<h1 class="darkGreen"><?= $page->headlineHeadline()->kirbyText() ?></h1>
			<span class="darkGreen"><?= $page->headlineSubline()->html() ?></span>
		</div>
		<div class="width100 alignLeft hPadding relative">
			<?php if ($image = $page->headlineImage()->toFile()) { ?>
				<img class="width100 cover" src="<?= $image->url() ?>" alt="<?= $page->headlineHeadline()->html() ?>"/>
			<?php } ?>
			<button class="sticker top right darkGreen lightGreenBackground"><a href="<?= $page->headlineLinkTarget()->url() ?>"><?= $page->headlineLinkText()->html() ?></a></button>
		</div>
	</section>
	<section class="intro width2C padding bottomMargin">
		<div class="item">
			<h3 class="darkGreen"><?= $page->introIntro()->kirbyText() ?></h3>
			<span class="darkGreen smallTopMargin"><?= $page->introText()->kirbyText() ?></span>
			<a href="<?= $page->introLinkTarget()->url() ?>"><button class="rectangle darkGreen"><?= $page->introLinkText()->html() ?></button></a>
		</div>
		<div class="item vEnd">
			<?php if ($image = $page->introImage()->toFile()) { ?>
				<img class="width50 cover circle alignFlexEnd" src="<?= $image->url() ?>" alt="<?= $site->name()->html() ?>"/>
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
				} else if ($i == 3) {
					$textClass = "darkGreen";
					$backgroundClass = "brownBackground";
				}
				$i++ ?>
				<div class="item hoverFlip">
					<div class="width100 flex square smallPadding relative <?= $textClass ?> <?= $backgroundClass ?>">
						<h3 class="width75 flexGrow"><a href="<?= $treatment->url() ?>"><?= $treatment->name()->html() ?></a></h3>
						<span class="footnote top right"><?= $treatment->duration()->html() ?></span>
						<span class="large alignFlexEnd">€<?= $treatment->price()->html() ?></span>
					</div>
					<div class="details width100 smallTopMargin">
						<span class="flip small darkGreen"><?= $treatment->shortDescription()->html() ?></span>
						<a class="flip" href="<?= $treatment->url() ?>"><button class="width100 next large darkGreen">Details</button></a>
					</div>
				</div>
			<?php } ?>
		</div>
		<?php $treatmentsPage = $site->find("treatments"); ?>
		<a href="<?= $treatmentsPage->url() ?>"><button class="circledNext topMargin floatRight darkGreen">Alle Behandlungen</button></a>
	</section>
	<section class="products width100 padding">
		<h2 class="darkGreen">Produkt-<br/>Highlights</h2>
		<div class="width2C topMargin">
			<?php foreach ($page->productHighlights()->toPages() as $product) { ?>
				<div class="item hoverFlip">
					<a href="<?= $treatment->url() ?>">
						<?php if ($image = $product->productImage()->toFile()) { ?>
							<img class="width100 height85 cover" src="<?= $image->url() ?>" alt="<?= $product->name()->html() ?>"/>
						<?php } ?>
					</a>
					<div class="details width100 smallTopMargin hoverFlip">
						<div class="width100 flip">
							<h3 class="width75 small darkGreen floatLeft"><?= $product->name()->html() ?><?php if ($product->size()->isNotEmpty()) echo ", ".$product->size()->html() ?></h3>
							<span class="width75 small darkGreen floatLeft"><?= $product->shortDescription()->html() ?></span>
							<span class="darkGreen floatRight">€<?= $product->price()->html() ?></span>
						</div>
						<a class="flip" href="<?= $treatment->url() ?>"><button class="width100 next large darkGreen">Details</button></a>
					</div>
				</div>
			<?php } ?>
		</div>
		<?php $shopPage = $site->children()->find("shop"); ?>
		<a href="<?= $shopPage->url() ?>"><button class="circledNext topMargin floatRight darkGreen">Zum Shop</button></a>
	</section>
	<?php if ($page->eventHighlight()->isNotEmpty()) { 
		$event = $page->eventHighlight()->toPage(); ?>
		<section class="events width100 alignRight padding">
			<h2 class="darkGreen">Events</h2>
			<div class="width2C topMargin">
				<div class="item rightPadding vFlex">
					<div class="width100 darkGreen topBorder"></div>
					<h3 class="width75 darkGreen smallTopMargin"><?= $event->category()->html().":<br/>".$event->name()->html() ?></h3>
					<span class="width75 small darkGreen topMargin flexGrow"><?= $event->shortDescription()->kirbyText() ?></span>
					<div class="width75 doubleColumns">
						<div class="data darkGreen vSmallPadding">
							<h4>Zeit</h4>
							<span class="small"><?= $event->date()->toDate("d.m.Y").", ".$event->time()->html() ?></span>
						</div>
						<div class="data darkGreen vSmallPadding">
							<h4>Dauer</h4>
							<span class="small"><?= $event->duration()->html() ?></span>
						</div>
						<div class="data darkGreen vSmallPadding">
							<h4>Ort</h4>
							<span class="small"><?= $event->location()->html() ?></span>
						</div>
						<div class="data darkGreen vSmallPadding">
							<h4>Kosten</h4>
							<span class="small">€<?= $event->price()->html() ?></span>
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
								<span class="small darkGreen"><?= $review->location()->html() ?></span>
							</div>
						<?php } ?>
					</div>
					<button class="previous floatLeft darkGreen topMargin"></button>
					<button class="next floatRight darkGreen topMargin"></button>
				</div>
			</div>
		</section>
	<?php } ?>
	<?php $articles = $site->find("articles")->children()->filterBy("intendedTemplate", "article")->published()->limit(3);
	if (count($articles) > 0) { ?>
		<section class="articles width100 padding">
			<h2 class="darkGreen">Aktuelle<br/>Artikel</h2>
			<div class="width3C topMargin">
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