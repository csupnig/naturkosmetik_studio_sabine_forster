<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="<?= $site->description()->html() ?>">
    <meta name="keywords" content="<?= $site->keywords()->html() ?>">
    <title><?= $site->name()->html() ?> | <?= $page->name()->html() ?></title>

    <!--Favicon-->
    <link rel="icon" href="/assets/images/favicon.png" type="image/png"/>

    <!--Styles-->
    <link rel="stylesheet" href="https://use.typekit.net/iuq0gym.css">
    <?= css(['assets/css/snippets.css', '@auto']) ?>
    <?= css(['assets/css/index.css', '@auto']) ?>

    <!--Scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/scripts/snippets.js"></script>
    <script type="text/javascript" src="/assets/scripts/scripts.js"></script>

    <!--Snipcart-->
    <?php //Only render SnipCart elements if cookies have been accepted
    if (isset($_COOKIE["cookie-note"])) {
        if($_COOKIE["cookie-note"] == 1) { ?>
            <link rel="preconnect" href="https://app.snipcart.com">
            <link rel="preconnect" href="https://cdn.snipcart.com">
            <link rel="stylesheet" href="https://cdn.snipcart.com/themes/v3.0.26/default/snipcart.css" />
            <script async src="https://cdn.snipcart.com/themes/v3.0.26/default/snipcart.js"></script>
            <script type="text/javascript" src="/assets/scripts/shop.js"></script>
        <?php } 
    } ?>
  </head>
