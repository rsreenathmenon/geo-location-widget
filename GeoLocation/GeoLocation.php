<?php
class GeoLocation extends CWidget
{
	
	 public $_options = array(
                'zip'=>'',
        );
	public $options=array();
	
	
	
	  public function run()
		{
			extract($this->_options);
			extract($this->options);
			$arr=array();
			$address=$zip;
			$result=file_get_contents("http://maps.google.com/maps/api/geocode/json?address=" . urlencode($address) . "&sensor=false" );
   		    $geocodedinfo=json_decode($result);
			 $geo['country'] = $geocodedinfo->results[0]->address_components[4]->long_name;
    		 $geo['state'] = $geocodedinfo->results[0]->address_components[3]->long_name;
			 $geo['city'] = $geocodedinfo->results[0]->address_components[1]->long_name;
    		  $geo['lat'] = $geocodedinfo->results[0]->geometry->location->lat;
   			 $geo['long'] = $geocodedinfo->results[0]->geometry->location->lng;
	       
			echo $geo['city'];
			
			 
		}
	
	
	
}
?>