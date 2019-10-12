<div class="modal fade" id="newFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau Fichier</h5>
      </div>
      <?= $this->Form->create($filee, ['enctype' => 'multipart/form-data']) ?>
      <div class="modal-body">
        <p>Répertoire : <?= $active_folder->name ?></p>
        <hr>    
        
    <fieldset>
        <?php
        echo $this->Form->control('type', ['type' => "hidden", "value" => 1]);
            echo $this->Form->control('name', array('label' => "Nom",'Placeholder' => "Nom du fichier"));
            echo $this->Form->control('description', array('label' => "Description",'Placeholder' => "Description Courte"));
            echo $this->Form->control('extension', array('label' => "Extension", "options" => ['PDF', 'DOC', 'EXCEL', 'PPT', "IMG", "AUTRE"]));
            echo $this->Form->control('folders._ids', ["type" => "hidden", "value" => $active_folder->id]);

        ?>
        <hr>
        <div class="form-group">
            <label for="exampleInputFile">Chargez votre fichier</label>
            <input type="file" name="location">
          </div>
    </fieldset>
    
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <?= $this->Form->button(__('Valider', array('class' => "btn btn-success"))) ?>
      </div>
      <?= $this->Form->end() ?>
    </div>
  </div></div>

  <div class="modal fade" id="newFolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau Répertoire</h5>
      </div>
      <?= $this->Form->create($folderr) ?>
      <div class="modal-body">
        <p>Répertoire : <?= $active_folder->name ?></p>
        <hr>    
        
    <fieldset>
        <?php
        echo $this->Form->control('type', ['type' => "hidden", "value" => 2]);
            echo $this->Form->control('name', array('label' => "Nom",'Placeholder' => "Nom du répertoire"));
        ?>
    </fieldset>
    
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <?= $this->Form->button(__('Valider', array('class' => "btn btn-success"))) ?>
      </div>
      <?= $this->Form->end() ?>
    </div>
  </div></div>

<section id="list-group-icons">
    <div class="row match-height">
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <ul class="list-group">

                        <?php foreach ($folders as $id => $name) : ?>
                            <?php if($id != 1) : ?>
                                <?php $i = substr_count($name, '_'); $p=20; ?>
                                <?php $active = "";
                                            if($active_folder->id == $id){
                                                $active = "active";
                                            }
                                         ?>
                                <?php if($i <= 1) : ?>
                                        
                            <li class="list-group-item d-flex <?= $active ?>" style="padding-left:<?= $p ?>px!important">
                        <?php else : ?>
                            <li class="list-group-item d-flex <?= $active ?>" style="padding-left:<?= $p + ($i-1)*20 ?>px!important">
                        <?php endif; ?>
                                <p class="float-left mb-0" style="margin-right:3px">
                                    <i class="feather icon-folder"></i>
                                </p>
                                <a href="<?= ROOT_DIREC ?>/folders/show/<?= $id ?>"><span> <?= str_replace("_", "", $name) ?></span></a>
                            </li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9">
        <div class="card" style="padding-top:12px">
                <div class="d-flex justify-content-start breadcrumb-wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb ml-1">
                                <?php   foreach ($breadcrumbs as $b) : ?>
                                    <li class="breadcrumb-item"><a href="<?= ROOT_DIREC ?>/folders/show/<?= $b->id ?>"><?= $b->name ?></a></li>
                                <?php   endforeach ; ?>
                                </ol>
                            </nav>
                        </div>
                            <?php if($current_user['role_id'] == 1) : ?>
                            <button class="btn btn-primary"  data-toggle="modal" data-target="#newFile" style="width: 68px;
    float: right;
    position: absolute;
    right: 10px;"><i class='feather icon-file'></i></button>  
    <button class="btn btn-warning"  data-toggle="modal" data-target="#newFolder" style="width: 68px;
    float: right;
    position: absolute;
    right: 88px;"><i class='feather icon-folder'></i></button>  
<?php   endif; ?>
                        </div>
        <section id="columns">
    <div class="row">
        <div class="col-12">
            <div class="card-deck-wrapper">
                <div class="row">
                <?php   foreach($active_folder->child_folders as $folder) : ?>
                    <div class="col-md-3">
                    <div class="card">
                    
                        <div class="card-content text-center" style="padding-top:10px">
                        <a href="<?= ROOT_DIREC ?>/folders/show/<?= $folder->id ?>">
                            <img class="card-img-top img-fluid" src="<?= ROOT_DIREC ?>/img/folder.png" style="width:95px" alt="Card image cap" />
                            <div class="card-body">
                                <h4 class="card-title"><?= $folder->name ?></h4>
                                <p class="card-text"><small class="text-muted">Last updated <?= $folder->modified ?></small></p>
                            </div></a>
                            <?php if($current_user['role_id'] == 1): ?>
                            <p class="float-right mb-0" style="margin-right:3px">
                                    <a href="<?= ROOT_DIREC ?>/folders/delete/<?= $folder->id ?>"><i class="feather icon-trash" style="position:absolute;right:5px;bottom:5px;color:red"></i></a>
                                </p>
                            <?php   endif; ?>
                        </div>
                    </div></div>
                <?php   endforeach; ?>
                <?php   foreach($active_folder->files as $file) : ?>
                    <div class="col-md-3">
                    <div class="card">
                    
                        <div class="card-content text-center" style="padding-top:10px">
                        <a target="_blank" href="<?= ROOT_DIREC ?>/tmp/files/<?= $file->location ?>">
                        <?php $extensions = array("pdf.png", "word.png", "excel.png", "ppt.png", "image.png") ?>
                            <img class="card-img-top img-fluid" src="<?= ROOT_DIREC ?>/img/<?= $extensions[$file->extension] ?>" style="width:65px" alt="Card image cap" />
                            <div class="card-body">
                                <h4 class="card-title"><?= $file->name ?></h4>
                                <p class="card-text"><?= $file->description ?></p>
                                <p class="card-text"><small class="text-muted">Last updated <?= $file->modified ?></small></p>
                                
                            </div></a>
                            <?php if($current_user['role_id'] == 1): ?>
                            <p class="float-right mb-0" style="margin-right:3px">
                                    <a href="<?= ROOT_DIREC ?>/files/delete/<?= $file->id ?>/<?= $active_folder->id ?>"><i class="feather icon-trash" style="position:absolute;right:5px;bottom:5px;color:red"></i></a>
                                </p>
                            <?php   endif; ?>
                        </div>
                    </div></div>
                <?php   endforeach; ?>
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
    </div>
</section>
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
li.active, li.active a{
    background-color:#5e50ee !important;
    color:white!important;
}

li a{
    color:black!important;
}
</style>

