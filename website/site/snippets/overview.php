<?php if ($content == "treatments") $items = $site->find("treatments")->children()->filterBy("intendedTemplate", "treatmentcategory")->published();
else if ($content == "product") $items = $page->children()->filterBy("intendedTemplate", "product")->published();
else if ($content == "productcategory") $items = $page->children()->filterBy("intendedTemplate", "productcategory")->published();

if (count($items) > 0) { ?>
	<section class="overview width100 hPadding">
		<h2 class="darkGreen">
			<?php if ($page->template() == "treatments") echo "Meine<br/>Behandlungen";
      else if ($page->template() == "shop") echo "Shop<br/>Kategorien";
			else if (!in_array($page->template(), ["shop", "productCategory", "products", "product"], true)) echo "Produkte in<br/>dieser Kategorie";
			else echo $page->overviewHeadline->kirbyText();	?>	
		</h2>
		<div class="grid3C topMargin">
			<?php foreach ($items as $item) { ?>
				<div class="item hoverFlip">
					<a class="noUnderline" href="<?= $item->url() ?>">
						<div class="width100 square relative whiteBackground">
							<div class="cutout darkGreen">
								<span class="footnote top right white"><?= $item->name()->html() ?></span>
							</div>
							<?php if ($image = $item->previewImage()->toFile()) { ?>
								<img class="absolute width100 cover" src="<?= $image->url() ?>" alt="<?= $item->name()->html() ?>"/>
							<?php } ?>
							<div class="text width100 flex square extraSmallPadding relative darkGreen">
								<h3 class="width75 flexGrow"><?= $item->name()->html() ?></h3>
								<span class="large alignFlexEnd">(<?= count($item->children()->published()); ?>)</span>
							</div>
						</div>
					</a>
					<div class="details width100 smallTopMargin">
						<span class="small flip inlineBlock darkGreen"><?= $item->shortDescription()->html() ?></span>
						<a class="flip" href="<?= $item->url() ?>"><button class="width100 next large darkGreen">Mehr</button></a>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>
<?php } ?>
