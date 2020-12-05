<?php
  $color = "darkGreen";
  $background = "";
  if ($content == "newsletterwhite") {
    $color = "white";
    $background = " darkGreenBackground";
  }
?>
<section class="callToAction width100 padding centeredText<?=$background ?>">
	<h3 class="width50 <?=$color ?> inlineBlock">
		<?php if ($content == "newsletter" || $content == "newsletterwhite") {
  			echo $site->newslettercall()->kirbyText();
  			$content = "newsletter white";
  		} else if ($content == "cancellation") {
  			echo "Sie sind verhindert?<br/> Mehr Informationen zu den Stornobedinungen<br/>finden Sie in den AGBS";
		} else if ($content == "question") {
  			echo "Haben Sie noch Fragen?<br/>Ich berate Sie gerne";
  		} ?>
	</h3><br/>
	<button class="<?=$content ?> topMargin">
		<?php if ($content == "cancellation") {
			if ($site->termsConditionsFile()->isNotempty()) { ?>
				<a href="<?= $site->termsConditionsFile()->toFile()->url() ?>">Nutzungsbedinungen</a>
			<?php } else if ($site->termsConditionsPage()->isNotEmpty()) { ?>
				<a href="<?= $site->termsConditionsPage()->toPage()->url() ?>">Nutzungsbedinungen</a>
			<?php }
		} else if ($content == "question") { ?>
			<a href="mailto:<?= $site->email()->html() ?>" target="_blank"><?= $site->email()->html() ?></a>
		<?php } ?>
  	
	</button>
</section>
