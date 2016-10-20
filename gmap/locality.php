<?php
$deal_lat=19.190120;
$deal_long=72.978499;
$geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.$deal_lat.','.$deal_long.'&sensor=false');

        $output= json_decode($geocode);

    for($j=0;$j<count($output->results[0]->address_components);$j++){
               $cn=array($output->results[0]->address_components[$j]->types[0]);
           if(in_array("locality", $cn))
           {
            $country= $output->results[0]->address_components[$j]->long_name;
           }
            }
            echo $country;
/* It is simple code if you need to find city name then replace in_array("country", $cn) to in_array("locality", $cn) if you need to find Zip code then replacein_array("country", $cn) to in_array("postal_code", $cn) */
			?>