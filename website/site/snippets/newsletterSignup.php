<section class="modal newsletter">
  <div class="header">
    <h1 class="small"><?= $site->newsletterHeader()->text() ?></h1>
  </div>
  <div class="content topMargin">
    <script id="n2g_script">
      !function(e,t,n,c,r,a,i){e.Newsletter2GoTrackingObject=r,e[r]=e[r]||function(){(e[r].q=e[r].q||[]).push(arguments)},e[r].l=1*new Date,a=t.createElement(n),i=t.getElementsByTagName(n)[0],a.async=1,a.src=c,i.parentNode.insertBefore(a,i)}(window,document,"script","//static.newsletter2go.com/utils.js","n2g");
      n2g('create', '3ocrden7-ef3e7fwj-10ex');
      n2g('subscribe:createForm');
    </script>
  </div>
  <div class="content topMargin">
      <span class="darkGreen">
        <?= $site->newsletterIntro()->kirbyText() ?>
      </span>
  </div>
</section>
