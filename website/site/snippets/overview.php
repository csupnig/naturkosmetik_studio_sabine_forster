<?php if ($content == "treatments") $items = $site->find("treatments")->children()->filterBy("intendedTemplate", "treatmentCategory")->published();
if (count($items) > 0) { ?>
	<section class="overview width100 hPadding">
		<h2 class="darkGreen">
			<?php if ($page->template() == "treatments") echo "Meine<br/>Behandlungen";
			else if (!in_array($page->template(), ["shop", "productCategory", "products", "product"], true)) echo "Produkte in<br/>dieser Kategorie";
			else echo $page->overviewHeadline->kirbyText();	?>	
		</h2>
		<div class="width3C topMargin">
			<?php foreach ($items as $item) { ?>
				<div class="item hoverFlip">
					<a href="<?= $item->url() ?>">
						<div class="width100 square relative whiteBackground">
							<h3 class="darkGreen"><?= $item->name()->html() ?></h3>
							<div class="cutout darkGreen">
								<span class="footnote top right white"><?= $item->footnote()->html() ?></span>
							</div>
							<?php if ($image = $item->previewImage()->toFile()) { ?>
								<img class="absolute width100 cover" src="<?= $image->url() ?>" alt="<?= $item->name()->html() ?>"/>
							<?php } ?>
							<div class="width100 flex square smallPadding relative <?= $textClass ?> <?= $backgroundClass ?>">
								<h3 class="width75 flexGrow"><?= $item->name()->html() ?></h3>
								<span class="large alignFlexEnd">(<?= count($item->children()->published()); ?>)</span>
							</div>
						</div>
					</a>
					<div class="details width100 smallTopMargin">
						<span class="flip width75 inlineBlock small darkGreen"><?= $item->shortDescription()->html() ?></span>
						<a class="flip" href="<?= $treatment->url() ?>"><button class="width100 next large darkGreen">Mehr</button></a>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>
<?php } ?>