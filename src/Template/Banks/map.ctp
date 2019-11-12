<div class="row">
    <div class="col-md-12">
        
        <section> 
                <div class="card">
                    <div class="card-body">
                    <div id="map" style="height:72vh;width:100%"></div>
                </div>
                </div>
            </section>
    </div>
</div>

<?php echo "<script> var locations = [];"; ?>
<?php 
    $i=0;
    foreach($banks as $bank){
        echo "locations.push(['".$bank->name."', ".$bank->lattitude.", ".$bank->longitude." ]);";
        $i=$i+1;
    }
?>
<?php echo "</script>" ?>


<script type="text/javascript">
    function initMap() {
      var center = {lat: 18.546021921994914, lng: -72.29759255371096};
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: center
      });

      var infowindow =  new google.maps.InfoWindow({});
      var marker, count;
      for (count = 0; count < locations.length; count++) {
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[count][1], locations[count][2]),
            map: map,
            title: locations[count][0]
          });
      google.maps.event.addListener(marker, 'click', (function (marker, count) {
          return function () {
            infowindow.setContent(locations[count][0]);
            infowindow.open(map, marker);
          }
        })(marker, count));
  }
}
</script>


<script type="text/javascript">
    
</script>