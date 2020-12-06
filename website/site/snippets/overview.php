<?php

$sort = $_GET['sort'];
if (!isset($sort)) {
  $sort = 'relevance';
}

if ($content == "treatments") $items = $site->find("treatments")->children()->filterBy("intendedTemplate", "treatmentcategory")->published();
else if ($content == "product") {
  $items = $page->children()->filterBy("intendedTemplate", "product")->published();
  if ($sort == 'price' || $sort == 'name') {
    $items = $items->sortBy($sort, 'asc');
  }
}
else if ($content == "productcategory") $items = $page->children()->filterBy("intendedTemplate", "productcategory")->published();

if (count($items) > 0) { ?>
	<section class="overview width100 hPadding">
		<h2 class="darkGreen">
			<?php if ($page->template() == "treatments") echo "Meine<br/>Behandlungen";
      else if ($page->template() == "shop") echo "Shop<br/>Kategorien";
			else if (in_array($page->template(), ["shop", "productCategory", "product"])) echo "Produkte in<br/>dieser Kategorie";
			else echo $page->overviewHeadline()->kirbyText();

			if ($page->template() == "products") {
			  ?>
        (<?=sprintf('%02d', count($items)) ?>) Produkte
        <form class="inline" method="GET">
        <span class="small darkGreen floatRight">Sortieren Nach: <select name="sort" class="darkGreen sort" onchange="this.form.submit()">
          <option value="relevance" <?=($sort == 'relevance' ? 'selected' : '') ?>>Relevanz</option>
          <option value="name" <?=($sort == 'name' ? 'selected' : '') ?>>Name</option>
          <option value="price" <?=($sort == 'price' ? 'selected' : '') ?>>Preis</option>
        </select>
        </span>
        </form>
        <?php
      }
			?>
		</h2>
		<div class="grid3C topMargin">
			<?php foreach ($items as $item) {
			  $isProduct = $item->template() == "product";
			  ?>
				<div class="item <?= $isProduct ? "product" : "hoverFlip"?>">
					<a class="noUnderline" href="<?= $item->url() ?>">
						<div class="width100 square relative whiteBackground">
              <?php
              if (!$isProduct) { ?>
							<div class="cutout darkGreen">
								<span class="footnote top right white"><?= $item->name()->html() ?></span>
							</div>
							<?php
              }
              if ($image = $item->previewImage()->toFile()) { ?>
								<img class="absolute width100 cover" src="<?= $image->url() ?>" alt="<?= $item->name()->html() ?>"/>
							<?php } else if ($image = $item->productImage()->toFile()) { ?>
                <img class="absolute width100 scaleDown" src="<?= $image->url() ?>" alt="<?= $item->name()->html() ?>"/>
              <?php }
              if (!$isProduct) { ?>
							<div class="text width100 flex square extraSmallPadding relative darkGreen">
								<h3 class="width75 flexGrow"><?= $item->name()->html() ?></h3>
								<span class="large alignFlexEnd">(<?= count($item->children()->published()); ?>)</span>
							</div>
              <?php } ?>
						</div>
					</a>
					<div class="details width100 smallTopMargin">
            <?php
              if ($isProduct) {
                $productPrice = floatval(str_replace(',', '.', str_replace('.', '', $item->price()->html())));
                ?>
                <div>
                  <span class="darkGreen"><?= $item->name()->html() ?></span>
                  <span class="darkGreen floatRight"><?= number_format($productPrice, 2, ",", "") ?> €</span>
                </div>
							<?php
              } ?>
						<span class="small flip inlineBlock darkGreen"><?= $item->shortDescription()->html() ?></span>
            <?php if (!$isProduct) { ?>
              <a class="flip" href="<?= $item->url() ?>"><button class="width100 next large darkGreen">Mehr</button></a>
							<?php
              }
              ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>
<?php } ?>
