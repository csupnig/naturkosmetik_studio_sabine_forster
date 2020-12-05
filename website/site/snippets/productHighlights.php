<?php //Select products according to filter
if ($filter == "manual") $products = $page->productHighlights()->toPages();
else if ($filter == "category") $products = $page->siblings()->filterBy("intendedTemplate", "product")->limit(2);
//Display section only if product selection is not empty
if (count($products) >= 1) { ?>
<section class="products width100 padding">
	<h2 class="darkGreen">
		<?php 
		//Alter headline according to filter
		if ($filter == "manual") echo "Produkt-<br/>Highlights";
		else if ($filter == "category") echo "Ähnliche<br/>Produkte"; ?>
	</h2>
	<div class="width2C topMargin">
		<?php foreach ($products as $product) { ?>
			<div class="item hoverFlip">
				<a href="<?= $product->url() ?>">
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
					<a class="flip" href="<?= $product->url() ?>"><button class="width100 next large darkGreen">Details</button></a>
				</div>
			</div>
		<?php } ?>
	</div>
	<?php //Display link to shop only if element isn't displayed on a shop page already
	if (!in_array($page->template(), ["shop", "productCategory", "products", "product"], true)) {
		$shopPage = $site->children()->find("shop"); ?>
		<a href="<?= $shopPage->url() ?>"><button class="circledNext topMargin floatRight darkGreen">Zum Shop</button></a>
	<?php } ?>
</section>
<?php } ?>