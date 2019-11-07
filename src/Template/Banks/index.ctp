<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bank[]|\Cake\Collection\CollectionInterface $banks
 */
?>
<section>

                    <!-- Begin Users Profile -->
                    <div class="card">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="padding-bottom:10px">Banques</h3>
                            </div>
                        </div>
                  
                                    <a href="<?= ROOT_DIREC ?>/banks/add" style="color:white"><button type="button" class="btn btn-primary" style="float:right;margin-top:-52px">
                                         Nouvelle Banque
                                    </button></a>
       
                            <div class="card-dashboard">
                                <div class="table-responsive">
                                    <table class="table zero-configuration" id="check-slct">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th class="text-left">Nom</th>
                                                <th class="text-center">Responsable</th>
                                                <th class="text-center">Nb de Pièces</th>
                                                <th class="text-center">Date Location</th>
                                                <th class="text-center">Expiration</th>
                                                <th class="text-center">Prix Location</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($banks as $bank): ?>
                                                <tr>
                                                    <td><?= h($bank->name) ?></td>
                                                    <td class="text-center"><?= $bank->has('manager') ? $bank->manager->first_name." ".$bank->manager->last_name : '' ?></td>
                                                    <td class="text-center"><?= $this->Number->format($bank->rooms) ?></td>
                                                    <td class="text-center"><?= h($bank->rental_date) ?></td>
                                                    <td class="text-center"><?= h($bank->expiration) ?></td>
                                                    <td class="text-center"><?= $this->Number->format($bank->price) ?> HTG</td>
                                                        <td class="text-right"><a href="<?= ROOT_DIREC ?>/banks/view/<?= $bank->id ?>"><i class="feather icon-eye"></i></a> <a href="<?= ROOT_DIREC ?>/banks/edit/<?= $bank->id ?>"><i class="m-1 feather icon-edit-2"></i></a>
                                                        <a href="<?= ROOT_DIREC ?>/banks/delete/<?= $bank->id ?>"><i class="feather icon-trash"></i></a>
                                                        </td>
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
