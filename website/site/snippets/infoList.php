<section class="infoList width100 vPadding">
	<h2 class="width20 darkGreen hPadding"><?= $page->name()->html() ?></h2>
	<div class="grid2C ratio3-2 topMargin">
		<div class="item hPadding">
			<h3 class="darkGreen"><?= $page->infoListIntro()->kirbyText() ?></h3>
			<span class="darkGreen smallTopMargin"><?= $page->infoListText()->kirbyText() ?></span>
		</div>
		<div class="item hPadding">
			<ul class="arrow width100 darkGreen">
				<?php if ($page->template() == "treatmentcategory") {
					$items = $page->siblings()->filterBy("intendedTemplate", "treatmentcategory")->published();
				} else if ($page->template() == "shop") {
					//Brand selection
				} else $items = $page->infoListPages()->toPages();
				foreach ($items as $item) { ?>
					<li class="width100"><a class="<?php if ($item == $page) echo 'strong'; ?>" href="<?= $item->url() ?>"><?= $item->name()->html() ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</section>