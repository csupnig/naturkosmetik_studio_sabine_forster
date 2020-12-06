<section class="infoList width100 padding">
	<h2 class="width20 darkGreen"><?= $page->name()->html() ?></h2>
	<div class="grid2C ratio3-2 topMargin">
		<div class="item">
			<h3 class="darkGreen"><?= $page->infoListIntro()->kirbyText() ?></h3>
			<span class="darkGreen smallTopMargin"><?= $page->infoListText()->kirbyText() ?></span>
		</div>
		<div class="item">
			<ul class="arrow width100 darkGreen">
				<?php if ($page->template() == "shop") {
					//In the shop template, this snippet lists all available brands
					$products = $site->index()->filterBy("intendedTemplate", "product")->published();
					$brands = [];
					foreach ($products as $product) {
						if (!in_array($product->brand()->html(), $brands)) $brands[] = $product->brand()->html();
					}
					foreach ($brands as $brand) { ?>
						<li class="width100"><a href="<?=$site->find("brand-overview")->url() ?>?brand=<?= $brand ?>"><?= $brand ?></a></li>
					<?php }
				} else {
					//In the treatment category template, this snippet lists all other treatment categories
					if ($page->template() == "treatmentcategory") $items = $page->siblings()->filterBy("intendedTemplate", "treatmentcategory")->published();
					//In all other instances, this snippet can list a manually selected collection of pages
					else $items = $page->infoListPages()->toPages();
					
					foreach ($items as $item) { ?>
						<li class="width100"><a class="<?php if ($item == $page) echo 'strong'; ?>" href="<?= $item->url() ?>"><?= $item->name()->html() ?></a></li>
					<?php }
				} ?>
			</ul>
		</div>
	</div>
</section>
