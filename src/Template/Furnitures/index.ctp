<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Furniture[]|\Cake\Collection\CollectionInterface $furnitures
 */
?>
<section>

    <!-- Begin Users Profile -->
    <div class="card">
        <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <h3 style="padding-bottom:10px">Aménagements</h3>
            </div>
        </div>
  
                    <a href="<?= ROOT_DIREC ?>/furnitures/add" style="color:white"><button type="button" class="btn btn-primary" style="float:right;margin-top:-52px">
                         Nouvel aménagement
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
                            <?php foreach($furnitures as $furniture) : ?>
                                <tr>
                                    <td class="text-left"><?= $furniture->name ?></td>
                    
                                    <td class="text-right"><a href="<?= ROOT_DIREC ?>/furnitures/edit/<?= $furniture->id ?>"><i class="m-1 feather icon-edit-2"></i></a>
                                        <a href="<?= ROOT_DIREC ?>/furnitures/delete/<?= $furniture->id ?>"><i class="feather icon-trash"></i></a></td>
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
              