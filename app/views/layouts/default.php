<?php

use core\classes\Asset;

$asset = Asset::getInstance();
$asset->clear();
$asset->addCss('css/default.css');
$asset->addCss('css/styles.css');
$asset->addJs('js/scripts.js');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $asset->getMeta(); ?>
    <title><?= $title ?></title>
    <?php $asset->getCss(); ?>
</head>
<body>
<header class="header">
    <div class="wrapper">
        <h1>Cut your url online</h1>
    </div>
</header>

<?= $content ?>

<?php $asset->getJquery(); ?>
<?php $asset->getJs(); ?>
</body>
</html>
