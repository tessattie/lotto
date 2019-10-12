<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 */

?>

<section>

                    <!-- Begin Users Profile -->
                    <div class="card">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="padding-bottom:10px">Rôles</h3>
                            </div>
                        </div>
                  
                                    <a href="<?= ROOT_DIREC ?>/roles/add" style="color:white"><button type="button" class="btn btn-primary" style="float:right;margin-top:-52px">
                                         Nouveau Rôle
                                    </button></a>
       
                            <div class="card-dashboard">
                                <div class="table-responsive">
                                    <table class="table zero-configuration" id="check-slct">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th class="text-left">Nom</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach($roles as $role) : ?>
                                                <tr>
                                                <td><?= $role->name ?></td>
                               
                                                <td class="text-right"><a href="<?= ROOT_DIREC ?>/roles/edit/<?= $role->id ?>"><i class="m-1 feather icon-edit-2"></i></a>

                                                    <a href="<?= ROOT_DIREC ?>/roles/delete/<?= $role->id ?>"><i class="feather icon-trash"></i></a></td>
                                            </tr>
                                            <!-- if(!empty($role->)) -->
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
