<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manager[]|\Cake\Collection\CollectionInterface $managers
 */
?>
<section>

    <!-- Begin Users Profile -->
    <div class="card">
        <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <h3 style="padding-bottom:10px">Responsables</h3>
            </div>
        </div>
  
                    <a href="<?= ROOT_DIREC ?>/managers/add" style="color:white"><button type="button" class="btn btn-primary" style="float:right;margin-top:-52px">
                         Nouveau Responsable
                    </button></a>

            <div class="card-dashboard">
                <div class="table-responsive">
                    <table class="table zero-configuration" id="check-slct">
                        <thead>
                            <tr class="text-uppercase">
                                <th class="text-left">Nom</th>
                                <th class="text-center">Téléphone</th>
                                <th class="text-center">Adresse</th>
                                <th class="text-center">NIF</th>
                                <th class="text-center">Frais</th>
                                <th class="text-center">Contrat</th>
                                <th class="text-center">Identité</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $extensions = array("pdf.png", "word.png", "excel.png", "ppt.png", "image.png") ?>
                            <?php foreach($managers as $manager) : ?>
                                <tr>
                                    <td>  <?= $manager->first_name." ".$manager->last_name ?></td>
                                    <td class="text-center">+509-<?= $manager->phone ?></td>
                                    <td class="text-center"><?= $manager->address ?></td>
                                    <td class="text-center"><?= $manager->nif ?></td>
                                    <td class="text-center"><?= $manager->frais_fonctionnement ?> HTG</td>
                                    <?php if(!empty($manager->contrat)) : ?>
                                        <td class="text-center"><a href="<?= ROOT_DIREC ?>/tmp/files/<?= $manager->contrat ?>" target="_blank"><div class="w-100 badge badge-success">Voir</div></a></td>
                                    <?php else : ?>
                                        <td class="text-center">-</td>
                                    <?php endif; ?>

                                    <?php if(!empty($manager->ci)) : ?>
                                        <td class="text-center"><a href="<?= ROOT_DIREC ?>/tmp/files/<?= $manager->ci ?>" target="_blank"><div class="w-100 badge badge-info">Voir</div></a></td>
                                    <?php else : ?>
                                        <td class="text-center">-</td>
                                    <?php endif; ?>
                    
                                    <td class="text-right"><a href="<?= ROOT_DIREC ?>/managers/edit/<?= $manager->id ?>"><i class="m-1 feather icon-edit-2"></i></a>
                                        <a href="<?= ROOT_DIREC ?>/managers/delete/<?= $manager->id ?>"><i class="feather icon-trash"></i></a></td>
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
                <!-- User Table
        </div>
      </div>
    </div>
    <!-- END: Content-->

