<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
             <div class="row">
             <div class="col-md-4 col-md-offset-4"></div>
                 <div class="col-md-4 col-md-offset-4">
                    <section> 
                        <div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <h3 style="padding-bottom:10px">Ajouter un utilisateur</h3>
        </div>
    </div>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <?php
            echo $this->Form->control('first_name', array('label' => "Prénom", 'placeholder' => "Prénom"));
            echo $this->Form->control('last_name', array('label' => "Nom",'Placeholder' => "Nom"));
            echo $this->Form->control('username', array('label' => "Nom d'Utilisateur",'Placeholder' => "Nom d'Utilisateur"));
            echo $this->Form->control('password', array('label' => "Mot de Passe", 'Placeholder' => "Mot de Passe", "type" => "text"));
            echo $this->Form->control('email', array('placeholder' => "E-mail", "label" => "E-mail"));
            echo $this->Form->control('role_id', ['options' => $roles, "label" => "Rôle"]);
            echo $this->Form->control('status', array('label' => "Statut", "selected" => 1, "options" => array(0 => "Bloqué", 1 => "Actif")));
            echo $this->Form->control('folders._ids', ['options' => $folders, "style" => "width:100%;height:200px", "label" => "Répertoires"]);
        ?>
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
