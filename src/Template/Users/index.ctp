<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<section>

                    <!-- Begin Users Profile -->
                    <div class="card">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="padding-bottom:10px">Utilisateurs</h3>
                            </div>
                        </div>
                  
                                    <a href="<?= ROOT_DIREC ?>/users/add" style="color:white"><button type="button" class="btn btn-primary" style="float:right;margin-top:-52px">
                                         Nouvel Utilisateur
                                    </button></a>
       
                            <div class="card-dashboard">
                                <div class="table-responsive">
                                    <table class="table zero-configuration" id="check-slct">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th class="text-left">Nom</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Nom d'Utilisateur</th>
                                                <th class="text-center">Rôle</th>
                                                <th class="text-center">Statut</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($users as $user) : ?>
                                                <tr>
                                                <td><?= ucfirst(strtolower($user->first_name))." ".strtoupper($user->last_name) ?></td>
                                                <td class="text-center"><?= $user->email ?></td>
                                                <td class="text-center"><?= $user->username ?></td>
                                                <td class="text-center"><?= $user->role->name ?></td>
                                                <td class="text-center">
                                                <?php if($user->status == 0) : ?>
                                                    <div class="w-100 badge badge-danger">Bloqué</div>
                                                <?php else : ?>
                                                    <div class="w-100 badge badge-success">Actif</div>
                                                <?php endif; ?>
                                                </td>
                                                <td class="text-right"><a href="<?= ROOT_DIREC ?>/users/edit/<?= $user->id ?>"><i class="m-1 feather icon-edit-2"></i></a>
                                                    <a href="<?= ROOT_DIREC ?>/users/delete/<?= $user->id ?>"><i class="feather icon-trash"></i></a></td>
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
