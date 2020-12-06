<?php snippet('head');
//Set background image
if ($page->backgroundImage()->isNotEmpty()) $backgroundStyle = "background-image:url(".$page->backgroundImage()->toFile()->url().")";
else $backgroundStyle = ""; ?>
<body class="newsletter beigeBackground" style="<?= $backgroundStyle ?>">
	<?php snippet('header'); ?>
  <section class="newsletter width100 largeTopPadding padding">
    <div class="width100">
      <h1 class="small darkGreen"><?= $page->name()->text() ?></h1>
    </div>
    <div class="w100">
      <script id="n2g_script">
        !function(e,t,n,c,r,a,i){e.Newsletter2GoTrackingObject=r,e[r]=e[r]||function(){(e[r].q=e[r].q||[]).push(arguments)},e[r].l=1*new Date,a=t.createElement(n),i=t.getElementsByTagName(n)[0],a.async=1,a.src=c,i.parentNode.insertBefore(a,i)}(window,document,"script","//static.newsletter2go.com/utils.js","n2g");
        n2g('create', '3ocrden7-ef3e7fwj-10ex');
        n2g('subscribe:createForm');
      </script>
    </div>
    <div class="width100">
      <span class="darkGreen">
        <?= $page->newsletterAgreement()->kirbyText() ?>
      </span>
    </div>
  </section>
	<?php snippet('footer'); ?>
</body>
