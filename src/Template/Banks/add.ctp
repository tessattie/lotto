<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bank $bank
 */
$types = array(1 => "Appareil", 2 => "Internet", 3 => "Confort", 4 => "Energie", 6 => "Décodeur", 7 => "Options Jeux");
$colors = array(1 => "#dff0d8", 2 => "#d9edf7", 3 => "#fcf8e3", 4 => "#f2dede", 6 => "#EDD7F0", 7 => "#E1E1E1");
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
<div class="row">
    <div class="col-md-12">
        
        <section> 
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Nouvelle Banque</h3>
                        </div>
                    </div>
                    
                </div>
                </div>
            </section>
    </div>
</div>
<?= $this->Form->create($bank, ['enctype' => 'multipart/form-data']) ?>
<div class="row">
    <div class="col-md-6">
        <section> 
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="padding-bottom:10px">Profile</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $this->Form->control('name', array('label' => "Nom",'Placeholder' => "Nom", "type" => "text")); ?>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->control('type', array('empty' => "--Choisissez --",'label' => "Type", "options" => array("Station d'Essence"))); ?>
                        </div>
                    </div>
                    <fieldset>
                        <?php
                            echo $this->Form->control('address', array('label' => "Adresse",'Placeholder' => "Adresse", "type" => "text"));
                            echo $this->Form->control('rooms', array('label' => "Nb de Pièces",'Placeholder' => "Nombre de Pièces"));
                            echo $this->Form->control('price', array('label' => "Prix",'Placeholder' => "Prix de Location", "type" => "text"));
                            echo $this->Form->control('rental_date', ["type" => "text", 'label' => "Date de Location", 'id' => "datepicker1"]);
                            echo $this->Form->control('expiration', ["type" => "text",'label' => "Expiration Contrat", 'id' => "datepicker2"]);
                            echo $this->Form->control('lattitude', array('label' => "Lattitude",'Placeholder' => "Lattitude"));
                            echo $this->Form->control('longitude', array('label' => "Longitude",'Placeholder' => "Longitude", "type" => "text"));
                        ?>
                    </fieldset>
                </div>
                </div>
            </section>
    </div>
    <div class="col-md-6">
        <section> 
                    <div class="card" style="padding-bottom: 10px;">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="padding-bottom:10px">Localisation</h3>
                        </div>
                    </div>
                    <div id="googleMap" style="height: 409px;"></div>
                    
                     
                    
                </div>
                </div>
            </section>
    </div>
</div>

<div class="row">
<div class="col-md-4">
        <section> 
                <div class="card" style="padding-bottom:70px">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="padding-bottom:10px">Propriétaire</h3>
                        </div>
                    </div>
                    <label>Choisissez un propriétaire ou créez un nouveau...</label>
                    <?php
                        echo $this->Form->control('owner_id', array('label' => "Propriétaire",'empty' => "-- Choisissez --", "options" => $owners, "required" => false));
                    ?>
                    <div id="ownerrnew">
                        <hr>
                    <fieldset>
                        <?php
                            echo $this->Form->control('owner.first_name', array('label' => "Prénom",'Placeholder' => "Prénom", "required" => false, 'class' => "ownerfield"));
                            echo $this->Form->control('owner.last_name', array('label' => "Nom",'Placeholder' => "Nom", "required" => false, 'class' => "ownerfield"));
                            echo $this->Form->control('owner.phone', array('label' => "Téléphone",'Placeholder' => "Téléphone", "required" => false, 'class' => "ownerfield"));
                            echo $this->Form->control('owner.address', array('label' => "Adresse",'Placeholder' => "Adresse", "required" => false, 'class' => "ownerfield"));
                            echo $this->Form->control('owner.nif', array('label' => "NIF",'Placeholder' => "NIF", "required" => false, 'class' => "ownerfield"));
                          

                        ?>
                        <hr>
        <div class="form-group">
            <label for="exampleInputFile">Copie Pièce d'identité</label>
            <input type="file" name="owner[ci]" class="ownerfield">
            <p class="help-block">Nous acceptons les PDF</p>
          </div>
          <hr>
        <div class="form-group">
            <label for="exampleInputFile">Copie du Contrat</label>
            <input type="file" name="owner[contrat]" class="ownerfield">
            <p class="help-block">Nous acceptons les PDF</p>
          </div>
                    </fieldset> 
                    </div>
                    
                </div>
                </div>
            </section>
    </div>
    <div class="col-md-4">
        <section> 
                <div class="card" style="padding-bottom:80px">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="padding-bottom:10px">Responsable</h3>
                        </div>
                    </div>
                    <fieldset>
                    <label>Choisissez un responsable ou créez un nouveau...</label>
                    <?php
                        echo $this->Form->control('manager_id', array('label' => "Responsable",'empty' => "-- Choisissez --", "options" => $managers, "required" => false));
                    ?>
                    <div id="managernew">                    <hr>

                        <?php
            echo $this->Form->control('manager.first_name', array('label' => "Prénom",'Placeholder' => "Prénom", "required" => false, 'class' => "manfield"));
            echo $this->Form->control('manager.last_name', array('label' => "Nom",'Placeholder' => "Nom", "required" => false, 'class' => "manfield"));
            echo $this->Form->control('manager.phone', array('label' => "Téléphone",'Placeholder' => "Téléphone", "required" => false, 'class' => "manfield"));
            echo $this->Form->control('manager.address', array('label' => "Adresse",'Placeholder' => "Adresse", "required" => false, 'class' => "manfield"));
            echo $this->Form->control('manager.nif', array('label' => "NIF",'Placeholder' => "NIF", "required" => false, 'class' => "manfield"));
            

        ?>
        <hr>
        <div class="form-group">
            <label for="exampleInputFile">Copie Pièce d'identité</label>
            <input type="file" name="manager[ci]" class="manfield">
            <p class="help-block">Nous acceptons les PDF</p>
          </div>
          <hr>
        <div class="form-group">
            <label for="exampleInputFile">Copie du Contrat</label>
            <input type="file" name="manager[contrat]" class="manfield">
            <p class="help-block">Nous acceptons les PDF</p>
          </div>

                    </div>
                        
                    </fieldset>
                    
                </div>
                </div>
            </section>
    </div>
    

    <div class="col-md-4">
        <section> 
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="padding-bottom:10px">Vendeur</h3>
                        </div>
                    </div>
                    <label>Choisissez un vendeur ou créez un nouveau...</label>
                    <?php
                        echo $this->Form->control('seller_id', array('label' => "Vendeur",'empty' => "-- Choisissez --", "options" => $sellers, "required" => false));
                    ?>
                    <div id="sellernew">
                        <hr>
                    <fieldset>
                        <?php
                            echo $this->Form->control('sellers.0.first_name', array('label' => "Prénom",'Placeholder' => "Prénom", "required" => false, 'class' => "sellerfield"));
                            echo $this->Form->control('sellers.0.last_name', array('label' => "Nom",'Placeholder' => "Nom", "required" => false, 'class' => "sellerfield"));
                            echo $this->Form->control('sellers.0.phone', array('label' => "Téléphone",'Placeholder' => "Téléphone", "required" => false, 'class' => "sellerfield"));
                            echo $this->Form->control('sellers.0.address', array('label' => "Adresse",'Placeholder' => "Adresse", "required" => false, 'class' => "sellerfield"));
                            echo $this->Form->control('sellers.0.nif', array('label' => "NIF",'Placeholder' => "NIF", "required" => false, 'class' => "sellerfield"));
                            echo $this->Form->control('sellers.0.frais_fonctionnement', array('label' => "Frais de Fonctionnement",'Placeholder' => "HTG", "required" => false, 'class' => "sellerfield"));

                        ?>
                        <hr>
        <div class="form-group">
            <label for="exampleInputFile">Copie Pièce d'identité</label>
            <input type="file" name="sellers[0][ci]" multiple class="sellerfield">
            <p class="help-block">Nous acceptons les PDF</p>
          </div>
          <hr>
        <div class="form-group">
            <label for="exampleInputFile">Copie du Contrat</label>
            <input type="file" name="sellers[0][contrat]" class="sellerfield">
            <p class="help-block">Nous acceptons les PDF</p>
          </div>
                    </fieldset> 
                    </div>
                    
                </div>
                </div>
            </section>
    </div>
</div>
    
    <div class="row">
        <div class="col-md-12">
            <section>
                    <!-- Begin Users Profile -->
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="padding-bottom:10px">Informations Supplémentaires</h3>
                        </div>
                    </div>
            
   
                        <div class="card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration" id="check-slct">
                                    <thead>
                                        <tr class="text-uppercase">
                                            <th class="text-left">Type</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Quantité</th>
                                            <th class="text-center">Prix</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-right">Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $h=0;$j=3; foreach($settings as $setting) : ?>
                                        <tr style="background-color:<?= $colors[$setting->type] ?>">
                                            <td class="text-left"><?= $types[$setting->type] ?></td>
                                            <td class="text-center"><?= $setting->name ?></td>
                                            <td>
                                                <?php echo $this->Form->control('settings.'.$h.'.quantity', array('label' => false,'Placeholder' => "Quantité", "required" => false)); ?>
                                            </td>
                                            <td>
                                                <?php echo $this->Form->control('settings.'.$h.'.price', array('label' => false,'Placeholder' => "Prix", "required" => false)); ?>
                                            </td>
                                            <td>
                                                <?php echo $this->Form->control('settings.'.$h.'.date', array('label' => false,'Placeholder' => "Date", "required" => false, 'id' => "datepicker".$j, "type" => "text")); ?>
                                                <?php echo $this->Form->control('settings.'.$h.'.setting_id', array('value' => $setting->id, "type" => "hidden")); ?>
                                            </td>
                                            <td>
                                                <?php echo $this->Form->control('settings.'.$h.'.status', array('label' => false,'options' => array("Oui", "Non"), "required" => false)); ?>
                                            </td>
                                        </tr>
                                        
                                        <?php 
                                            echo '<script type="text/javascript">
                                            $(function(){
                                                $( "#datepicker'.$j.'" ).datepicker({ dateFormat: "yy-mm-dd" });
                                            });
                                        </script>';
                                        ?>
                                        <?php $j=$j+1;$h=$h+1; ?>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Users Profile -->
            </section>
        </div>
    </div>

<div class="row">
     <div class="col-md-12">
            

            

            <section> 
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="padding-bottom:10px">Photos</h3>
                        </div>
                    </div>
                    <fieldset>
                    <div class="form-group">
            <label for="exampleInputFile">Photos Banque</label>
            <input type="file" name="Photos[location][]" multiple>
            <p class="help-block">Vous pouvez ajouter plusieurs images</p>
          </div>
                    </fieldset>
                    
                </div>
                </div>
            </section>
         </div>
         <div class="col-md-6 col-md-offset-4">
            

            

            
            
         </div>
     </div>  
     <?= $this->Form->button(__('Valider'), array('class' => "btn btn-success", "style" => "float:right")) ?>
     <?= $this->Form->end() ?>

             

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
<script>
      $( function() {
        $( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
        
        $('#manager-id').change(function(){
            if($(this).val() == ""){
                $(".manfield").each(function(){
                    $(this).attr('disabled', false);
                });
            }else{
                $(".manfield").each(function(){
                    $(this).attr('disabled', true);
                });
            }
        })

        $('#seller-id').change(function(){
            if($(this).val() == ""){
                $(".sellerfield").each(function(){
                    $(this).attr('disabled', false);
                });
            }else{
                $(".sellerfield").each(function(){
                    $(this).attr('disabled', true);
                });
            }
        })

        $('#owner-id').change(function(){
            if($(this).val() == ""){
                $(".ownerfield").each(function(){
                    $(this).attr('disabled', false);
                });
            }else{
                $(".ownerfield").each(function(){
                    $(this).attr('disabled', true);
                });
            }
        })

        $('#lattitude').change(function(){

        })
      } );
      </script>
      <script type="text/javascript">
    var myLatlng = new google.maps.LatLng(18.546021921994914,-72.29759255371096);
  var mapProp = {
    center:myLatlng,
    zoom:12,
    mapTypeId:google.maps.MapTypeId.ROADMAP
      
  };
  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
    var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Lotto',
      draggable:true  
  });
    document.getElementById('lattitude').value= 18.546021921994914
    document.getElementById('longitude').value= -72.29759255371096
    // marker drag event
    google.maps.event.addListener(marker,'drag',function(event) {
        document.getElementById('lattitude').value = event.latLng.lat();
        document.getElementById('longitude').value = event.latLng.lng();
    });

    //marker drag event end
    google.maps.event.addListener(marker,'dragend',function(event) {
        document.getElementById('lattitude').value = event.latLng.lat();
        document.getElementById('longitude').value = event.latLng.lng();
    });

$( function(){
    $('#lattitude').change(function(){
            var latlng = new google.maps.LatLng($(this).val(), $('#longitude').val());
    marker.setPosition(latlng);
        })
    $('#longitude').change(function(){
            var latlng = new google.maps.LatLng($('#lattitude').val(), $(this).val());
    marker.setPosition(latlng);
        })
})
      </script>