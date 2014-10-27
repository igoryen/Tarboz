<?php 

		//$city = isset($_GET['q'])?$_GET['q']:"";
        require_once '../config.php';
        require_once BUSINESS_DIR_LOCATION . 'LocationManager.php';
			
		//$city="To";	
      
		$city = isset($_GET['q'])?$_GET['q']:"";

		$LocationManager = new LocationManager();
        
        $arrayval[]="";

        $City = $LocationManager->searchCity($city);

        //echo "<br/><br/><br/><b>See All Countries</b><br>";
        $userCount = count($City);
        $i=0;

        if ($userCount > 0) {

          foreach ($City as $city) {
            $i++;

            //$countryid = $city->getCountryId();
            echo $city->getCityName()."\n";


          } // end of foreach loop

        } // end of if statement

?>