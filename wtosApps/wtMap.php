<? function loadMap($mapConfig=array()){
  if($mapConfig['zoom']<1){$mapConfig['zoom']=8;}
 ?>
   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
      var geocoder;
      var map;
      function initialize() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(51.5085133, -0.2284655);
        var mapOptions = {
          zoom: <? echo $mapConfig['zoom']?>,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
		wtPlot();
      }

      function codeAddress(address,info) {
       // var address = document.getElementById('address').value;
        geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
			
			

			
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
			 
			if(info!='')
			{
		      //	var infowindow = new google.maps.InfoWindow({ content: info});
		      //	google.maps.event.addListener(marker, 'click', function() {  infowindow.open(map,marker);});
			}
          
		  } else {
		      // alert(address);
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
	  
	  
	     </script>
<?  } 

function wtCanvas($style)
{
?>
<div id="map_canvas" <? echo $style ?> ></div>
 <script>initialize();</script>
<? 
}

function wtPlot($data)
{?>
<script>
	var addList = new Array();
    var t=0;
	  function wtPlot()
	  {
	     <? if(is_array($data)){ foreach($data as $k =>$val){  
		 
		 $addressP=$val['address'];
		 $info=addslashes($val['info']);
		
		 if($addressP!=''){
		 
		 ?>t='<? echo $k ?>'; t=parseInt(t); var InterVAl=t*600; setTimeout("codeAddress('<? echo $addressP ?>','<? echo $info ?>');",InterVAl);<?  
	 
          }	 
	  }    }?>
	    
		 
	  }
   
   
 </script>	  
<? 
}





loadMap($mapConfig);
?> 
	  
	 
 <script>
	/*  
	  function wtPlot()
	  {
	  
	    codeAddress('kolkata, india','mizanur82@gmail.com');
		codeAddress('mumbai, india','mizanur82@gmail.com');
		codeAddress('murshidabad, india','mizanur82@gmail.com');
	  }
   
   */
 </script>	  
	  
	  
	  
 <!--<div id="map_canvas_demo" style="top:30px; height:500px; width:700px;"></div>-->
 <script>// initialize();</script>


	
  
