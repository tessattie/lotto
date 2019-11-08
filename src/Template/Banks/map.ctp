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


<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqsNkg3p56W1yip6YbeYRtTa9JxoTZoOY&callback=initMap">
</script>
<?php echo "<script> var locations = [];"; ?>
<?php 
    $i=0;
    foreach($banks as $bank){
        echo "locations.push(['".$bank->name."', ".$bank->lattitude.", ".$bank->longitude." ]);console.log(locations)";
        $i=$i+1;
    }
?>
<?php echo "</script>" ?>


<script type="text/javascript">
console.log(locations);
    function initMap() {
  var center = {lat: 18.546021921994914, lng: -72.29759255371096};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: center
  });
  // var marker = new google.maps.Marker({
  //   position: center,
  //   map: map
  // });

  // var locations = [
  //   ['Los Angeles', 34.052235, -118.243683],
  //   ['Santa Monica', 34.024212, -118.496475],
  //   ['Redondo Beach', 33.849182, -118.388405],
  //   ['Newport Beach', 33.628342, -117.927933],
  //   ['Long Beach', 33.770050, -118.193739]
  // ];
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