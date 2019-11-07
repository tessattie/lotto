<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'LOTO LAKAY';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
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
    <?= $this->Html->css('jquery-ui.css') ?>
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
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" navigation-header"><span>Catalogue</span>
                </li>
                <?php  if($current_user['role_id'] == 1) : ?>
                        <li class=" nav-item"><a href="<?= ROOT_DIREC ?>/folders"><i class="feather icon-folder"></i><span class="menu-title" data-i18n="Email">Répertoires</span></a>
                    </li>
                    <li class=" nav-item"><a href="<?= ROOT_DIREC ?>/files"><i class="feather icon-file"></i><span class="menu-title" data-i18n="Chat">Fichiers</span></a>
                    </li>

                    <?php   endif; ?>
                    <li class=" nav-item"><a href="<?= ROOT_DIREC ?>/folders/show"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Chat">Fichiers</span></a>
                    </li>
                <?php  if($current_user['role_id'] == 1) : ?>
                <li class=" navigation-header"><span>Utilisateurs</span>
                </li>
                
                <li class="nav-item"><a href="<?= ROOT_DIREC ?>/users"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Colors">Utilisateurs</span></a></li>
                <li class=" nav-item"><a href="<?= ROOT_DIREC ?>/roles"><i class="feather icon-check"></i><span class="menu-title" data-i18n="Colors">Rôles</span></a></li>

                <li class=" navigation-header"><span>Raccourcis</span></li>
                <li class=" nav-item"><a href="<?= ROOT_DIREC ?>/files/add"><i class="feather icon-plus"></i><span class="menu-title" data-i18n="Chat">Fichier</span></a>
                </li>
                <li class=" nav-item"><a href="<?= ROOT_DIREC ?>/folders/add"><i class="feather icon-plus"></i><span class="menu-title" data-i18n="Email">Répertoire</span></a>
                </li>
                <li class="nav-item"><a href="<?= ROOT_DIREC ?>/users/add"><i class="feather icon-plus"></i><span class="menu-title" data-i18n="Colors">Utilisateur</span></a>
                <?php   endif; ?>
                <li class=" navigation-header"><span>Compte</span>
                </li>
                <li class=" nav-item"><a href="<?= ROOT_DIREC ?>/users/logout"><i class="feather icon-power" style="color:red"></i><span class="menu-title" data-i18n="Colors"  style="color:red">Déconnexion</span></a></li>
                </li>
                
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" style="overflow-y:scroll;height:100vh">
                <li class=" navigation-header"><span>Catalogue</span>
                </li>
                <?php  if($current_user['role_id'] == 1) : ?>
                        <li class=" nav-item"><a href="<?= ROOT_DIREC ?>/folders"><i class="feather icon-folder"></i><span class="menu-title" data-i18n="Email">Répertoires</span></a>
                    </li>
                    <li class=" nav-item"><a href="<?= ROOT_DIREC ?>/files"><i class="feather icon-file"></i><span class="menu-title" data-i18n="Chat">Fichiers</span></a>
                    </li>

                    <?php   endif; ?>
                    <li class=" nav-item"><a href="<?= ROOT_DIREC ?>/folders/show"><i class="feather icon-search"></i><span class="menu-title" data-i18n="Chat">Explorateur</span></a>
                    </li>
                <?php  if($current_user['role_id'] == 1) : ?>
                <li class=" navigation-header"><span>Utilisateurs</span>
                </li>
                
                <li class="nav-item"><a href="<?= ROOT_DIREC ?>/users"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Colors">Utilisateurs</span></a></li>
                <li class=" nav-item"><a href="<?= ROOT_DIREC ?>/roles"><i class="feather icon-check"></i><span class="menu-title" data-i18n="Colors">Rôles</span></a></li>

                <li class=" navigation-header"><span>Banques</span></li>
                <li class=" nav-item"><a href="<?= ROOT_DIREC ?>/banks/map"><i class="feather icon-map"></i><span class="menu-title" data-i18n="Chat">Map</span></a>
                </li>
                <li class=" nav-item"><a href="<?= ROOT_DIREC ?>/owners"><i class="feather icon-feather"></i><span class="menu-title" data-i18n="Chat">Propriétaires</span></a>
                </li>
                <li class=" nav-item"><a href="<?= ROOT_DIREC ?>/managers"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Chat">Responsables</span></a>
                </li>
                <li class=" nav-item"><a href="<?= ROOT_DIREC ?>/sellers"><i class="feather icon-credit-card"></i><span class="menu-title" data-i18n="Chat">Vendeurs</span></a>
                </li>
                <li class=" nav-item"><a href="<?= ROOT_DIREC ?>/banks"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Chat">Banques</span></a>
                </li>
                <li class=" nav-item"><a href="<?= ROOT_DIREC ?>/settings"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Chat">Configuration</span></a>
                </li>
                <?php   endif; ?>
                <li class=" navigation-header"><span>Compte</span>
                </li>
                <li class=" nav-item"><a href="<?= ROOT_DIREC ?>/users/logout"><i class="feather icon-power" style="color:red"></i><span class="menu-title" data-i18n="Colors" style="color:red">Déconnexion</span></a></li>
                </li>
            </ul>
        </div>
    </div>


    <div class="app-content content">

        <!-- BEGIN: Header-->
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
            <div class="navbar-wrapper">
                <div class="navbar-container content">
                    <div class="navbar-collapse" id="navbar-mobile">
                        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                            <ul class="nav navbar-nav">
                            <li class="nav-item mr-auto"><a class="navbar-brand" href="<?= ROOT_DIREC ?>">
                                    <h2 class="brand-text mb-0" style="width:100%;padding:0px!important">Loto Lakay</h2>
                                </a></li>
                                <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                            </ul>
                            <ul class="nav navbar-nav">
                                    <div class="bookmark-input search-input">
                                        <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                        <input class="form-control input" type="text" placeholder="Explore Vuesax..." tabindex="0" data-search="template-list" />
                                        <ul class="search-list"></ul>
                                    </div>
                                    <!-- select.bookmark-select-->
                                    <!--   option Chat-->
                                    <!--   option email-->
                                    <!--   option todo-->
                                    <!--   option Calendar-->
                                </li>
                            </ul>
                        </div>
                        <ul class="nav navbar-nav float-right">
                            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                    <div class="user-nav d-sm-flex d-none" style="padding-top:6px"><span class="user-name text-bold-600"><?= $current_user['first_name']." ".$current_user['last_name'] ?></span><span class="user-status">Disponible</span></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- END: Header-->

        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <div class="container-fluid clearfix" style = "padding-bottom:40px">
                  <?= $this->fetch('content') ?>
              </div>
                <!-- Dashboard Analytics end -->

            </div>
        </div>

    </div>

    <footer>
    </footer>
    <style>
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #ddd; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>
    <?= $this->Html->script("jquery-3.2.1.min.js") ?>
    <?= $this->Html->script("popper.min.js") ?>
    <?= $this->Html->script("bootstrap.min.js") ?>
    <?= $this->Html->script("jquery-ui.js") ?>

    
</body>
</html>
