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
                            <h3>Editer Banque : <strong><?= $bank->name ?></strong></h3>
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
                            <?= $this->Form->control('type', array('empty' => "--Choisissez --",'label' => "Type", "options" => array(1 => "Station d'Essence"))); ?>
                        </div>
                    </div>
                    <fieldset>
                        <?php
                            echo $this->Form->control('address', array('label' => "Adresse",'Placeholder' => "Adresse", "type" => "text"));
                            echo $this->Form->control('rooms', array('label' => "Nb de Pièces",'Placeholder' => "Nombre de Pièces"));
                            echo $this->Form->control('price', array('label' => "Prix",'Placeholder' => "Prix de Location", "type" => "text"));
                            echo $this->Form->control('rental_date', ["type" => "text", 'label' => "Date de Location", 'id' => "datepicker1", "value" => date('Y-m-d', strtotime($bank->rental_date))]);
                            echo $this->Form->control('expiration', ["type" => "text",'label' => "Expiration Contrat", 'id' => "datepicker2", "value" => date('Y-m-d', strtotime($bank->expiration))]);
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
                    <div class="row">
                        <?php foreach($bank->photos as $photo): ?>
                            <div class="col-md-2" style="height:170px;overflow:hidden">
                            <a href="<?= ROOT_DIREC ?>/photos/delete/<?= $photo->id ?>" style="margin-bottom: -8px"><small style="color:red">Remove</small></a>
                            <img src="<?= ROOT_DIREC ?>/tmp/files/<?= $photo->location ?>" style="width:100%;">

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                </div>
            </section>
         </div>
         <div class="col-md-6 col-md-offset-4">
            

            

            
            
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
                                    <?php $h=0;$j=3; foreach($bank->settings as $setting) : ?>
                                    <?php 
                                    if(!empty($setting->get('_joinData')['date'])){
                                        $date = date("Y-m-d", strtotime($setting->get('_joinData')['date']));
                                    } else{
                                        $date = "";
                                    }
                                    ?>
                                        <tr style="background-color:<?= $colors[$setting->type] ?>">
                                            <td class="text-left"><?= $types[$setting->type] ?></td>
                                            <td class="text-center"><?= $setting->name ?></td>
                                            <td>
                                                <?php echo $this->Form->control('settings.'.$h.'.quantity', array('label' => false,'Placeholder' => "Quantité", "required" => false, "value" => $setting->get('_joinData')['quantity'])); ?>
                                            </td>
                                            <td>
                                                <?php echo $this->Form->control('settings.'.$h.'.price', array('label' => false,'Placeholder' => "Prix", "required" => false, "value" => $setting->get('_joinData')['price'])); ?>
                                            </td>
                                            <td>
                                                <?php echo $this->Form->control('settings.'.$h.'.date', array('label' => false,'Placeholder' => "Date", "required" => false, 'id' => "datepicker".$j, "type" => "text", "value" => $date)); ?>
                                                <?php echo $this->Form->control('settings.'.$h.'.setting_id', array('value' => $setting->id, "type" => "hidden")); ?>
                                                <?php echo $this->Form->control('settings.'.$h.'.id', array('value' => $setting->get('_joinData')['id'], "type" => "hidden")); ?>
                                            </td>
                                            <td>
                                                <?php echo $this->Form->control('settings.'.$h.'.status', array('label' => false,'options' => array("Oui", "Non"), "required" => false, "value" => $setting->get('_joinData')['status'])); ?>
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
<div class="col-md-4">
        <section> 
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="padding-bottom:10px">Propriétaire</h3>
                        </div>
                    </div>
                    <?php
                        echo $this->Form->control('owner_id', array('label' => "Propriétaire",'empty' => "-- Choisissez --", "options" => $owners, "required" => false));
                    ?>
                    
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
                            <h3 style="padding-bottom:10px">Responsable</h3>
                        </div>
                    </div>
                    <fieldset>
                    <?php
                        echo $this->Form->control('manager_id', array('label' => "Responsable",'empty' => "-- Choisissez --", "options" => $managers, "required" => false));
                    ?>
                        
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
                            <h3 style="padding-bottom:10px">Vendeurs</h3>
                        </div>
                    </div>
                    <strong>Liste :</strong><br>
                    <?php foreach($bank->sellers as $seller): ?>
                        <?php echo $seller->first_name." ".strtoupper($seller->last_name) ?> <a href="<?= ROOT_DIREC ?>/sellers/delete3/<?= $seller->id ?>"><i class="feather icon-trash" style="color:red"></i></a><br>
                    <?php endforeach; ?>
                    <br>
                    <label>Ajoutez un nouveau vendeur</label>
                    <?php
                        echo $this->Form->control('seller_id', array('label' => false,'empty' => "-- Choisissez --", "options" => $sellers, "required" => false));
                    ?>
                    
                </div>
                </div>
            </section>
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
      <?php 
        echo "<script> var lattitude = ".$bank->lattitude."; var longitude = ".$bank->longitude."</script>"
    ?>

      <script type="text/javascript">
    var myLatlng = new google.maps.LatLng(lattitude,longitude);
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
    document.getElementById('lattitude').value= lattitude
    document.getElementById('longitude').value= longitude
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