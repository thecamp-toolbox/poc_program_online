<!doctype html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= $site->description() ?>">
        <meta name="keywords" content="<?= $site->tags() ?>">
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,400i,500" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <?= css('assets/css/theme.css') ?>
        <?= css('assets/css/custom.css') ?>
    </head>

    <body>

    	 <!-- sticky-top data-spy="affix" data-offset-top="60"  -->
    