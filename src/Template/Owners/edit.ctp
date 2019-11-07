<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Owner $owner
 */
?>

            <div class="row">
             <div class="col-md-3 col-md-offset-4"></div>
                 <div class="col-md-6 col-md-offset-4">
                    <section> 
                        <div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <h3 style="padding-bottom:10px">Editer le Propriétaire : <?= $owner->first_name." ".$owner->last_name ?></h3>
        </div>
    </div>
    <?= $this->Form->create($owner, ['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <?php
            echo $this->Form->control('first_name', array('label' => "Prénom",'Placeholder' => "Prénom"));
            echo $this->Form->control('last_name', array('label' => "Nom",'Placeholder' => "Nom"));
            echo $this->Form->control('phone', array('label' => "Téléphone",'Placeholder' => "Téléphone"));
            echo $this->Form->control('address', array('label' => "Adresse",'Placeholder' => "Adresse"));
            echo $this->Form->control('nif', array('label' => "NIF",'Placeholder' => "NIF"));

        ?>
        <hr>
        <div class="form-group">
            <label for="exampleInputFile">Copie Pièce d'identité</label>
            <input type="file" name="ci">
            <p class="help-block">Nous acceptons les PDF</p>
          </div>
          <hr>
        <div class="form-group">
            <label for="exampleInputFile">Copie du Contrat</label>
            <input type="file" name="contrat">
            <p class="help-block">Nous acceptons les PDF</p>
          </div>
    </fieldset>
    <?= $this->Form->button(__('Valider', array('class' => "btn btn-success"))) ?>
    <?= $this->Form->end() ?>
</div>
</div>
                    </section>
                 </div>
             </div>       <!-- Begin Users Profile -->


<style type="text/css">
    label{
        font-weight:bold;
        margin-right:20px!important;
    }
    .input {
        margin:10px 0px 10px;
    }
    input, button, select, optgroup, textarea {

    border-radius: 3px;
    height:40px;
    border: 1px solid #ddd;
    padding:5px;
}
</style>