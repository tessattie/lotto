<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = 'LOTO LAKAY';
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?> -
        <?= $this->fetch('title') ?>
    </title>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <?= $this->Html->meta('icon') ?>

    
    <?= $this->Html->css('datatables.min.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->script("jquery-3.2.1.min.js") ?>


    <link rel="apple-touch-icon" href="/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= ROOT_DIREC ?>/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">


    <?= $this->Html->css('vendors/css/vendors.min.css') ?>
    <?= $this->Html->css('vendors/css/charts/apexcharts.css') ?>
    <?= $this->Html->css('vendors/css/extensions/tether-theme-arrows.css') ?>
    <?= $this->Html->css('vendors/css/extensions/tether.min.css') ?>
    <?= $this->Html->css('vendors/css/extensions/shepherd-theme-default.css') ?>
    <!-- BEGIN: Vendor CSS-->
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <?= $this->Html->css('theme/bootstrap.css') ?>
    <?= $this->Html->css('theme/bootstrap-extended.css') ?>
    <?= $this->Html->css('theme/colors.css') ?>
    <?= $this->Html->css('theme/themes/dark-layout.css') ?>
    <?= $this->Html->css('theme/components.css') ?>
    <?= $this->Html->css('theme/themes/semi-dark-layout.css') ?>
    <!-- <link rel="stylesheet" type="text/css" href="<?= ROOT_DIREC ?>/css/bootstrap.css"> --><!-- 
    <link rel="stylesheet" type="text/css" href="<?= ROOT_DIREC ?>/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT_DIREC ?>/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT_DIREC ?>/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT_DIREC ?>/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT_DIREC ?>/css/themes/semi-dark-layout.css"> -->

    <!-- BEGIN: Page CSS-->
    <?= $this->Html->css('theme/core/menu/menu-types/vertical-menu.css') ?>
    <?= $this->Html->css('theme/core/colors/palette-gradient.css') ?>
    <?= $this->Html->css('theme/pages/dashboard-analytics.css') ?>
    <?= $this->Html->css('theme/pages/card-analytics.css') ?>
    <?= $this->Html->css('theme/plugins/tour/tour.css') ?>
    <!-- <link rel="stylesheet" type="text/css" href="<?= ROOT_DIREC ?>/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT_DIREC ?>/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT_DIREC ?>/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT_DIREC ?>/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT_DIREC ?>/css/plugins/tour/tour.css"> -->

    <!-- <?= $this->fetch('meta') ?> -->
    <?= $this->fetch('css') ?>

    <style type="text/css">
      .shepherd-element{
        display:none;
      }
    </style>
    
</head>
<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
<?= $this->fetch('content') ?>
      <?= $this->fetch('script') ?>
      <?= $this->Html->script("vendors/js/charts/apexcharts.min.js") ?>

    <?= $this->Html->script("vendors/js/vendors.min.js") ?>
    <?= $this->Html->script("vendors/js/extensions/tether.min.js") ?>
    <?= $this->Html->script("vendors/js/extensions/shepherd.min.js") ?>

    <?= $this->Html->script("theme/core/app-menu.js") ?>
    <?= $this->Html->script("script.js") ?>
    <?= $this->Html->script("datatables.min.js") ?>
    <?= $this->Html->script("tables.js") ?>
    <?= $this->Html->script("theme/core/app.js") ?>

    <?= $this->Html->script("theme/scripts/components.js") ?>
    <?= $this->Html->script("theme/scripts/pages/dashboard-analytics.js") ?>




    <!-- BEGIN: Theme JS-->
    
</body>
</html>
