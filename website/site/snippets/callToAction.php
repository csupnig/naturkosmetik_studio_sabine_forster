<?php if ($color == "white") $background = "darkGreenBackground"; 
else $background = ""; ?>
<?php
$modalTrigger = "";
if ($content == "newsletter") {
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
        echo "Mein Online-Shop bietet ein<br/>ausgewähltes Angebot an<br/>hochwertigen Naturprodukten.";
      } else if ($content == "events") {
        echo "Wollen Sie mehr zu meinen<br/>Seminaren, Workshops und<br/>Vorträgen erfahren?.";
      }?>
	</h3><br/>
  <?php if ($content == "shop") { ?>
    <a href="<?=$site->find("shop")->url() ?>">
  <?php } else if ($content == "cancellation") {
    if ($site->termsConditionsFile()->isNotempty()) { ?>
      <a href="<?= $site->termsConditionsFile()->toFile()->url() ?>">Nutzungsbedinungen</a>
    <?php } else if ($site->termsConditionsPage()->isNotEmpty()) { ?>
      <a href="<?= $site->termsConditionsPage()->toPage()->url() ?>">Nutzungsbedinungen</a>
    <?php }
  } else if (($content == "book") || ($content == "question") || ($content == "events")) { ?>
    <a href="mailto:<?= $site->email()->html() ?>" target="_blank">
  <?php } else { ?>
    <a href="#">
  <?php } ?>
	  <button class="circle <?= $content ?> <?= $color ?> topMargin"<?= $modalTrigger ?>></button>
  </a>
</section>
