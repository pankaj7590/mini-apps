<?php
$custom_free_shipping = ['2000', '2006-2011', '2015-2050', '2055', '2060-2077', '2079-2090', '2092-2097', '2099-2108', '2110-2128', '2130-2138', '2140-2148', '2150-2168', '2170-2173', '2175-2179', '2190', '2192-2200', '2203-2214', '2216-2234', '2256', '2257', '2508', '2557-2560', '2564-2566', '2756', '2759-2763', '2765-2768', '2770'];
		$custom_free_shipping_expanded = [];
		foreach($custom_free_shipping as $k=>$v){
			if(strpos($v,"-")){
				$split=explode("-",$v);
				for($i=$split[0];$i<=$split[1];$i++){
					$custom_free_shipping_expanded[]=$i; 
				}
			}else{
				$custom_free_shipping_expanded[] = $v;
			}
		}
		echo "<pre>Original : ";print_r($custom_free_shipping);
		echo "<pre>Expanded : ";print_r($custom_free_shipping_expanded);exit;
?>