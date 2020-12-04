<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : 'en' ?>">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="<?= $site->description()->html() ?>">
    <meta name="keywords" content="<?= $site->keywords()->html() ?>">
    <title><?= $site->name()->html() ?> | <?= $page->name()->html() ?></title>

    <!--Favicon-->
    <link rel="icon" href="/assets/images/favicon.gif" type="image/gif"/>

    <!--Styles-->
    <link rel="stylesheet" href="https://use.typekit.net/iuq0gym.css">
    <?= css(['assets/css/index.css', '@auto']) ?>

    <!--Scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/scripts/scripts.js"></script>
  </head>
