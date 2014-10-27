<?php 

		//$city = isset($_GET['q'])?$_GET['q']:"";
        require_once '../config.php';
        require_once BUSINESS_DIR_LOCATION . 'LocationManager.php';
      
		$city = isset($_POST['city'])?$_POST['city']:"";

        //$city="Mazar-e-Sharif";

        if($city=="") echo "";

		$LocationManager = new LocationManager();

        
        $province = $LocationManager->getProvinceByCityName($city);
        //$country="";

        $country = $LocationManager->getCountryByProvinceName($province->getProvinceName());

                 echo $province->getProvinceName().",".$country->getCountryName()."\n";
    

           

?>