<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Seller[]|\Cake\Collection\CollectionInterface $sellers
 */
?>

<section>

    <!-- Begin Users Profile -->
    <div class="card">
        <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <h3 style="padding-bottom:10px">Vendeurs</h3>
            </div>
        </div>
  
                    <a href="<?= ROOT_DIREC ?>/sellers/add" style="color:white"><button type="button" class="btn btn-primary" style="float:right;margin-top:-52px">
                         Nouveau Vendeur
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
                                <th class="text-center">Contrat</th>
                                <th class="text-center">Identité</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($sellers as $seller) : ?>
                                <tr>
                                    <td>  <?= $seller->first_name." ".$seller->last_name ?></td>
                                    <td class="text-center">+509-<?= $seller->phone ?></td>
                                    <td class="text-center"><?= $seller->address ?></td>
                                    <td class="text-center"><?= $seller->nif ?></td>
                                    <?php if(!empty($seller->contrat)) : ?>
                                        <td class="text-center"><a href="<?= ROOT_DIREC ?>/tmp/files/<?= $seller->contrat ?>" target="_blank"><div class="w-100 badge badge-success">Voir</div></a></td>
                                    <?php else : ?>
                                        <td class="text-center">-</td>
                                    <?php endif; ?>

                                    <?php if(!empty($seller->ci)) : ?>
                                        <td class="text-center"><a href="<?= ROOT_DIREC ?>/tmp/files/<?= $seller->ci ?>" target="_blank"><div class="w-100 badge badge-info">Voir</div></a></td>
                                    <?php else : ?>
                                        <td class="text-center">-</td>
                                    <?php endif; ?>
                    
                                    <td class="text-right"><a href="<?= ROOT_DIREC ?>/sellers/edit/<?= $seller->id ?>"><i class="m-1 feather icon-edit-2"></i></a>
                                        <a href="<?= ROOT_DIREC ?>/sellers/delete/<?= $seller->id ?>"><i class="feather icon-trash"></i></a></td>
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
