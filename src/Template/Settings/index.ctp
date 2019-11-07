<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setting[]|\Cake\Collection\CollectionInterface $settings
 */

$types = array(1 => "Appareil", 2 => "Internet", 3 => "Confort", 4 => "Energie", 6 => "Décodeur", 7 => "Options Jeux");
$colors = array(1 => "#dff0d8", 2 => "#d9edf7", 3 => "#fcf8e3", 4 => "#f2dede", 6 => "#EDD7F0", 7 => "#E1E1E1");
?>
<section>

    <!-- Begin Users Profile -->
    <div class="card">
        <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <h3 style="padding-bottom:10px">Configuration</h3>
            </div>
        </div>
  
                    <a href="<?= ROOT_DIREC ?>/settings/add" style="color:white"><button type="button" class="btn btn-primary" style="float:right;margin-top:-52px">
                         Nouvelle Configuration
                    </button></a>

            <div class="card-dashboard">
                <div class="table-responsive">
                    <table class="table zero-configuration" id="check-slct">
                        <thead>
                            <tr class="text-uppercase">
                                <th class="text-left">Type</th>
                                <th class="text-center">Description</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($settings as $setting) : ?>
                                <tr style="background-color:<?= $colors[$setting->type] ?>">
                                    <td class="text-left"><?= $types[$setting->type] ?></td>
                                    <td class="text-center"><?= $setting->name ?></td>
                                    <td class="text-right"><a href="<?= ROOT_DIREC ?>/settings/edit/<?= $setting->id ?>"><i class="m-1 feather icon-edit-2"></i></a>
                                        <a href="<?= ROOT_DIREC ?>/furnitures/settings/<?= $setting->id ?>"><i class="feather icon-trash"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Users Profile -->
</section>