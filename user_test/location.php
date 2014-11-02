    <?php
        // Include utility files
        require_once '../config.php';
        require_once BUSINESS_DIR_LOCATION . 'LocationManager.php';

        $LocationManager = new LocationManager();
        $arrayval[]="";

        $Country = $LocationManager->getCountries();

        echo "<br/><br/><br/><b>See All Countries</b><br>";
        $userCount = count($Country);
        $i=0;

        if ($userCount > 0) {

          foreach ($Country as $country) {
            $i++;

            $countryid = $country->getCountryId();
            $countryname = $country->getCountryName();
            $countrycode = $country->getCountryCode();

            $arrayval[$i]=$countryname;
             
             echo "The user is: testest" . $countryname . "<br/>";


          } // end of foreach loop

          //$data = json_encode($arrayval);

        } // end of if statement

        
        //For Provinces
        $provincesbycountryid = $LocationManager->getProvincesByCountryId(1);
        $getProvincesByCountryName = $LocationManager->getProvincesByCountryName("AfghAnistan");

        $citybyCountryid = $LocationManager->getCitiesByCountryId(1);

        $citybyprovinceid = $LocationManager->getCitiesByProvinceId(1);


        echo "<br/><br/><br/><b>Provinces by CountryId</b><br>";
        $userCount = count($provincesbycountryid);

        if ($userCount > 0) {

          foreach ($provincesbycountryid as $provinces) {

            $provinceid = $provinces->getProvinceId();
            $ProvinceName = $provinces->getProvinceName();
            $CountryId = $provinces->getCountryId();
             
            ?>

            <?php echo "The user is: test" . $ProvinceName . "<br>"; ?>

            <?php
          } // end of foreach loop
        } // end of if statement

        echo "<br/><br/><br/><b>Provinces by Country Name</b><br>";
        $userCount = count($getProvincesByCountryName);

        if ($userCount > 0) {

          foreach ($getProvincesByCountryName as $provinces) {

            $provinceid = $provinces->getProvinceId();
            $ProvinceName = $provinces->getProvinceName();
            $CountryId = $provinces->getCountryId();
             
            ?>

            <?php echo "The user is: " . $ProvinceName . "<br>"; ?>

            <?php
          } // end of foreach loop
        } // end of if statement


         echo "<br/><br/><br/><b>Cities by Country Id</b><br>";
          $userCount = count($citybyCountryid);

        if ($userCount > 0) {

          foreach ($userCount as $cities) {

            $cityid = $cities->getCityId();
            $cityname = $cities->getCityName();
             
            ?>

            <?php echo "The user is: " . $cityname . "<br>"; ?>

            <?php
          } // end of foreach loop
        } // end of if statement





        echo "<br/><br/><br/><b>Cities by Province Id</b><br>";
          $userCount = count($citybyprovinceid);

        if ($userCount > 0) {

          foreach ($citybyprovinceid as $Cities) {

            $cityid = $Cities->getCityId();
            $cityname = $Cities->getCityName();
             
            ?>

            <?php echo "The user is: " . $cityname . "<br>"; ?>

            <?php
          } // end of foreach loop
        } // end of if statement
        
        

        $countrybycityname = $LocationManager->getCountryByCityName("Toronto");
        
        echo "<br/><br/><br/><b>Country By City Name</b><br>";

            $countryid = $countrybycityname->getCountryId();
            $countryname = $countrybycityname->getCountryName();
            $countrycode = $countrybycityname->getCountryCode();
             

            echo "The Country  is: " . $countryname . "<br>"; 

         $countryByCityId = $LocationManager->getCountryByCityId(1);
        
         echo "<br/><br/><br/><b>Country By City Id</b><br>";

            $countryid = $countrybycityname->getCountryId();
            $countryname = $countrybycityname->getCountryName();
            $countrycode = $countrybycityname->getCountryCode();
             
          

            echo "The Country  is: " . $countryname . "<br>"; 


        $countryByProvinceName = $LocationManager->getCountryByProvinceName("ontario");
        
         echo "<br/><br/><br/><b>Country By Provice Name</b><br>";

            $countryid = $countryByProvinceName->getCountryId();
            $countryname = $countryByProvinceName->getCountryName();
            $countrycode = $countryByProvinceName->getCountryCode();
             
          

            echo "The Country  is: " . $countryname . "<br>"; 

            


        $countryByProvinceId = $LocationManager->getCountryByProvinceId(1);
        
         echo "<br/><br/><br/><b>Country By Provice Id</b><br>";

            $countryid = $countryByProvinceId->getCountryId();
            $countryname = $countryByProvinceId->getCountryName();
            $countrycode = $countryByProvinceId->getCountryCode();
             
          

            echo "The Country  is: " . $countryname . "<br>"; 

        $provincebyId = $LocationManager->getProvinceById(1);
        
         echo "<br/><br/><br/><b>Provice by Id</b><br>";

            $provinceid = $provincebyId->getProvinceId();
            $ProvinceName = $provincebyId->getProvinceName();
            $CountryId = $provincebyId->getCountryId();
             

            echo "The Country  is: " . $ProvinceName . "<br>";  
        //getProvinceByName

        $provincebyId = $LocationManager->getProvinceByName("balkh");
        
         echo "<br/><br/><br/><b>Provice by Name</b><br>";

            $provinceid = $provincebyId->getProvinceId();
            $ProvinceName = $provincebyId->getProvinceName();
            $CountryId = $provincebyId->getCountryId();
             

            echo "The Country  is: " . $ProvinceName . "<br>";  

        $citybyid = $LocationManager->getCityById(1);
        
         echo "<br/><br/><br/><b>CITYBY ID</b><br>";

           
            $cityid = $citybyid->getCityId();
            $cityname = $citybyid->getCityName();
             
            echo "The Country  is: " . $cityname . "<br>";  

        $citybyid = $LocationManager->getCityByName("Toronto");
        
         echo "<br/><br/><br/><b>CITYBY name</b><br>";

           
            $cityid = $citybyid->getCityId();
            $cityname = $citybyid->getCityName();
             
            echo "The Country  is: " . $cityname . "<br>"; 

            //getAddressesByCityId

        $addressbycityid = $LocationManager->getAddressesByCityId($cityid);
        
         echo "<br/><br/><br/><b>ADDRESSES BY CITY</b><br>";
         $userCount = count($addressbycityid);

         echo "Address:<br>";
        
        if ($userCount > 0) {

          foreach ($addressbycityid as $add) {
           
            $addressid      =   $add->getAddressId();
            $address        =   $add->getAddress();
            $postalcode     =   $add->getPostalCode();

            echo  $address . "<br>";     
        }
    }
                     
        $addressbycityid = $LocationManager->getAddressByPostalCode($postalcode);
        
         echo "<br/><br/><br/><b>ADDRESSES POSTALCODE</b><br>";
        
            $addressid      =   $add->getAddressId();
            $address        =   $add->getAddress();
            $postalcode     =   $add->getPostalCode();

        echo  "The Address is: ".$address . "<br>";    
            
  ?>



<!DOCTYPE HTML>
<html>
  <head>
    <title>TESTING PAGE</title>
     <script src="//code.jquery.com/jquery-1.10.2.js"></script>
     <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script>
        $(function() {
            
            //document.getElementById("gg").innerHTML="<?php echo print_r($rrayval); ?>";
         availableTags = "<?php echo print_r($arrayval); ?>";
        /*r availableTags = [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
        "C++",
        "Clojure",
        "COBOL",
        "ColdFusion",
        "Erlang",
        "Fortran",
        "Groovy",
        "Haskell",
        "Java",
        "JavaScript",
        "Lisp",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
        "Scala",
        "Scheme"
        ];
        */
        $( "#tags" ).autocomplete({
        source: availableTags
        });
        });
        </script>

  </head>
  <body>
<div class="ui-widget">
<label for="tags">Tags: </label>
<input id="tags">
</div>
      

   <br/>   <br/>   <br/>   <br/>   <br/>  

   <div id="gg">testtt</div>
  </body>
</html>

