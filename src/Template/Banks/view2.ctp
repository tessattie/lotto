<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bank $bank
 */
$stations = array(0 => "Banque" ,1=> "Station d'Essence");
$types = array(1 => "Appareil", 2 => "Internet", 3 => "Confort", 4 => "Energie", 6 => "Décodeur", 7 => "Options Jeux");
$colors = array(1 => "#dff0d8", 2 => "#d9edf7", 3 => "#fcf8e3", 4 => "#f2dede", 6 => "#EDD7F0", 7 => "#E1E1E1");
$ouinon = array('Oui', 'Non')
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
<div class="row">
    <div class="col-md-12">
        
        <section> 
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Profil Banque : <strong><?= $bank->name ?></strong></h3>
                        </div>
                    </div>
                    
                </div>
                </div>
            </section>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
    <section> 
        <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4 style="padding-bottom:20px">Profil</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <strong>Nom</strong><hr>
                    <strong>Adresse</strong><hr>
                    <strong>Responsable</strong><hr>
                    <strong>Type de Point</strong><hr>
                    <strong>Nombre de Pièces</strong><hr>
                    <strong>Prix Mensuel</strong><hr>
                    <strong>Date de Debut de Contrat</strong><hr>
                    <strong>Date d'expiration de Contrat</strong>
                </div>
                <div class="col-md-6" style="text-align:right">
                    <strong style="text-align:right"><?= $bank->name ?></strong><hr>
                    
                    
                    <strong><?=(!empty($bank->address)) ? $bank->address : " - " ?></strong><hr>
                    <strong style="text-align:right"><?= $bank->manager->first_name . " " . strtoupper($bank->manager->last_name)  ?></strong><hr>
                    <strong><?= $stations[$bank->type] ?></strong><hr>
                    <strong><?=(!empty($bank->rooms)) ? $bank->rooms : " - " ?></strong><hr>
                    <strong><span class="badge badge-danger"><?= number_format($bank->price, 0, ".", ",") ?> HTG</span></strong><hr>
                    <strong><?= date("j M Y", strtotime($bank->rental_date)) ?></strong><hr>
                    <strong><?= date("j M Y", strtotime($bank->expiration)) ?></strong>
                </div>
            </div>
            
        </div>
        </div>
    </section>

    <section> 
        <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4 style="padding-bottom:20px">Responsable : <?= $bank->manager->first_name . " " . strtoupper($bank->manager->last_name)  ?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <strong>Nom</strong><hr>
                    <strong>Adresse</strong><hr>
                    <strong>Téléphone</strong><hr>
                    <strong>NIF / CIN</strong><hr>
                    <strong>Frais de Fonctionnement</strong><hr>
                    <strong>Copie CI</strong><hr>
                    <strong>Copie Contrat</strong>
                </div>
                <div class="col-md-6" style="text-align:right">
                    <strong style="text-align:right"><?= $bank->manager->first_name . " " . strtoupper($bank->manager->last_name)  ?></strong><hr>
                    <strong><?= $bank->manager->address ?></strong><hr>
                    <?php if(!empty($bank->manager->phone)) : ?>
                        <strong>+509-<?= $bank->manager->phone ?></strong><hr>
                    <?php else : ?>
                        <strong>-</strong><hr>
                    <?php endif; ?>
                    
                    <strong><?=(!empty($bank->manager->nif)) ? $bank->manager->nif : " - " ?></strong><hr>
                    <?php if(!empty($bank->manager->frais_fonctionnement)) : ?>
                        <strong><?= number_format($bank->manager->frais_fonctionnement, 0, ".", ",") ?> HTG</strong><hr>
                    <?php else : ?>
                        <strong>-</strong><hr>
                    <?php endif; ?>
                    <strong style="width:150px;height:35px"><a style="width:150px;height:35px" href="<?= ROOT_DIREC ?>/tmp/files/<?= $bank->manager->contrat ?>" target="_blank"><div class="w-100 badge badge-success" style="width:70px!important;padding:5px">Voir</div></a></strong><hr>
                    <strong style="width:150px;height:35px"><a style="width:150px;height:35px" href="<?= ROOT_DIREC ?>/tmp/files/<?= $bank->manager->ci ?>" target="_blank"><div class="w-100 badge badge-primary" style="width:70px!important;padding:5px">Voir</div></a></strong>
                </div>
            </div>
            
        </div>
        </div>
    </section>

    <section> 
        <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4 style="padding-bottom:20px">Propriétaire : <?= $bank->owner->first_name . " " . strtoupper($bank->owner->last_name)  ?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <strong>Nom</strong><hr>
                    <strong>Adresse</strong><hr>
                    <strong>Téléphone</strong><hr>
                    <strong>NIF / CIN</strong><hr>
                    <strong>Copie CI</strong><hr>
                    <strong>Copie Contrat</strong>
                </div>
                <div class="col-md-6" style="text-align:right">
                    <strong style="text-align:right"><?= $bank->owner->first_name . " " . strtoupper($bank->owner->last_name)  ?></strong><hr>
                    <strong><?= $bank->owner->address ?></strong><hr>
                    <?php if(!empty($bank->owner->phone)) : ?>
                        <strong>+509-<?= $bank->owner->phone ?></strong><hr>
                    <?php else : ?>
                        <strong>-</strong><hr>
                    <?php endif; ?>
                    
                    <strong><?= $bank->owner->nif ?></strong><hr>
                    <strong style="width:150px;height:35px"><a style="width:150px;height:35px" href="<?= ROOT_DIREC ?>/tmp/files/<?= $bank->owner->contrat ?>" target="_blank"><div class="w-100 badge badge-success" style="width:70px!important;padding:5px">Voir</div></a></strong><hr>
                    <strong style="width:150px;height:35px"><a style="width:150px;height:35px" href="<?= ROOT_DIREC ?>/tmp/files/<?= $bank->owner->ci ?>" target="_blank"><div class="w-100 badge badge-primary" style="width:70px!important;padding:5px">Voir</div></a></strong>
                </div>
            </div>
            
        </div>
        </div>
    </section>

    <?php foreach($bank->sellers as $seller) : ?>
        <section> 
        <div class="card" style="padding-bottom:60px">
            <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4 style="padding-bottom:20px">Vendeur : <?= $seller->first_name." ".strtoupper($seller->last_name) ?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <strong>Nom</strong><hr>
                    <strong>Adresse</strong><hr>
                    <strong>Téléphone</strong><hr>
                    <strong>NIF / CIN</strong><hr>
                    <strong>Copie CI</strong><hr>
                    <strong>Copie Contrat</strong>
                </div>
                <div class="col-md-6" style="text-align:right">
                    <strong style="text-align:right"><?= $seller->first_name." ".strtoupper($seller->last_name) ?></strong><hr>
                    <strong><?= $seller->address ?></strong><hr>
                    <?php if(!empty($seller->phone)) : ?>
                        <strong>+509-<?= $seller->phone ?></strong><hr>
                    <?php else : ?>
                        <strong>-</strong><hr>
                    <?php endif; ?>
                    
                    <strong><?= $seller->nif ?></strong><hr>
                    <strong style="width:150px;height:35px"><a style="width:150px;height:35px" href="<?= ROOT_DIREC ?>/tmp/files/<?= $seller->contrat ?>" target="_blank"><div class="w-100 badge badge-success" style="width:70px!important;padding:5px">Voir</div></a></strong><hr>
                    <strong style="width:150px;height:35px"><a style="width:150px;height:35px" href="<?= ROOT_DIREC ?>/tmp/files/<?= $seller->ci ?>" target="_blank"><div class="w-100 badge badge-primary" style="width:70px!important;padding:5px">Voir</div></a></strong>
                </div>
            </div>
            
        </div>
        </div>
    </section>
    <?php endforeach; ?>

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
                                        <tr style="background-color:<?= $colors[$setting->type] ?>">
                                            <td class="text-left"><?= $types[$setting->type] ?></td>
                                            <td class="text-center"><?= $setting->name ?></td>
                                            <td>
                                                <?=$setting->get('_joinData')['quantity'] ; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= number_format($setting->get('_joinData')['price'],0,".", ",") ; ?> HTG
                                            </td>
                                            <td class="text-center">
                                                <?=$setting->get('_joinData')['date'] ; ?>
                                            </td>
                                            <td class="text-right">
                                            <?php if($setting->get('_joinData')['status'] == 1) : ?>
                                                <span class="badge badge-danger"><?= $ouinon[$setting->get('_joinData')['status']]  ; ?></span>
                                            <?php else : ?>
                                                <span class="badge badge-success"><?= $ouinon[$setting->get('_joinData')['status']]  ; ?></span>
                                            <?php endif; ?>
                                                
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
    <div class="col-md-4">
    <section> 
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Photos</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <?php foreach($bank->photos as $photo) : ?>
                                <img src="<?= ROOT_DIREC ?>/tmp/files/<?= $photo->location ?>" style="width:100%;margin-top:20px">
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                </div>
                </div>
            </section>

        <section> 
                    <div class="card">
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
    <?php 
        echo "<script> var lattitude = ".$bank->lattitude."; var longitude = ".$bank->longitude."</script>"
    ?>

      <script type="text/javascript">
    var myLatlng = new google.maps.LatLng(lattitude,longitude);
  var mapProp = {
    center:myLatlng,
    zoom:15,
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
