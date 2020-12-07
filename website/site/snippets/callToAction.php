<?php if ($color == "white") $background = "darkGreenBackground"; 
else $background = ""; ?>
<?php
$modalTrigger = "";
if ($content == "newsletter") {
  snippet('newsletterSignup');
  $modalTrigger = " data-modal-trigger=\"newsletter\"";
}?>
<section class="callToAction width100 padding largeTopMargin largeBottomMargin centeredText <?=$background ?>">
	<h3 class="width50 <?= $color ?> inlineBlock">
		<?php if ($content == "newsletter") {
  			echo $site->newslettercall()->kirbyText();
  		} else if ($content == "cancellation") {
  			echo "Sie sind verhindert?<br/> Mehr Informationen zu den Stornobedinungen<br/>finden Sie in den AGBS";
		} else if ($content == "question") {
  			echo "Haben Sie noch Fragen?<br/>Ich berate Sie gerne";
  		} else if ($content == "book") {
  			echo "Möchten Sie einen Termin buchen? <br/>Bitte kontaktieren Sie mich per Email.";
  		} else if ($content == "shop") {
        echo "Mein Online-Shop bietet ein<br/>>ausgewähltes Angebot an<br/>hochwertigen Naturprodukten.";
      } ?>
	</h3><br/>
  <?php if ($content == "shop") {
    ?>
    <a href="<?=$site->find("shop")->url() ?>">
  <?php
  }?>
	<button class="circle <?= $content ?> <?= $color ?> topMargin"<?= $modalTrigger ?>>
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
  <?php if ($content == "shop") {
  ?>
    </a>
    <?php
    }?>
</section>
