<?php 

require_once DB_CONNECTION . 'DBHelper.php';

require_once BUSINESS_DIR_LOCATION . 'Location.php';

//has constants for the table; USER
require_once(DB_CONNECTION . 'datainfo.php');

class LocationDataAccessor {
  /* ----------------------------------------------
    takes a User object and inserts it into the data
    ----------------------------------------------- */

private function getLocationByIp($ip){
     //A request goes to the geobytes.com and retrieves us the user information, based on his/her browser
  return get_meta_tags('http://www.geobytes.com/IpLocator.htm?GetLocation&template=php3.txt&IpAddress='.$ip);
    
}

//A function, that finds the user's present location and then inserts it in the database if doesn't exist
//if exists, then return the city id to the user
public function getuserLocation(){
  $ip="";
    //Retrieving user ip
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    //$tags = $this->getLocationByIp($ip);
    $tags=get_meta_tags('http://www.geobytes.com/IpLocator.htm?GetLocation&template=php3.txt&IpAddress='.$ip);

    $location = new Location();

    $city_id="";
    //getting the values from the tags
    $location->setCountryName($tags['country']);
    $location->setProvinceName($tags['region']);
    $location->setCityName($tags['city']);

    //passing the values to the variables
    $countryname    =  $location->getCountryName();
    $provincename   =  $location->getProvinceName();
    $cityname       =  $location->getCityName();

    //Finding if the countries, and cities already exist
    $country_res    =   $this->getCountryByName($countryname);
    $province_res   =   $this->getProvinceByName($provincename);
    $city_res       =   $this->getCityByName($cityname);



    //If the information is not in the databse, then add it
    if($country_res->getCountryName()=="" && $province_res->getProvinceName()=="" && $city_res->getCityName()==""){
        $city_id = $this->addLocation($location);
        echo "All Empty Result";
      }
    else if($country_res->getCountryName()!="" && $province_res->getProvinceName()=="" && $city_res->getCityName()==""){ 
      $provinceid = addProvince($provincename,$country_res->getCountryId());
      addCity($cityname,$provinceid);
      }
    else if($country_res->getCountryName()!="" && $province_res->getProvinceName()!="" && $city_res->getCityName()==""){ 

      $provinceid = addProvince($provincename,$country_res->getCountryId());

      $city_id = addCity($cityname);
      
    }
    else{
        $cityres = $this->getCityByName($cityname);
        $city_id  =  $cityres->getCityId();
    }

      //Return city Id at the end
     return $city_id;
  } 

public function addLocation($location) {

  	$countryname=$location->getCountryName();

  	$provincename=$location->getProvinceName();

  	$cityname=$location->getCityName();

  	$countrycode=$location->getCountryCode();

    $query_insert = "INSERT INTO " .COUNTRY ." VALUES('', '".$countryname."','".$countrycode."')";

    $dbHelper = new DBHelper();

    $result_country = $dbHelper->executeInsertQuery($query_insert);
    if($result_country) { echo "Data Inserted";}
    $country_id = $result_country;

    //INSERTING DATA INTO THE PROVINCE TABLE

    $query_insert = "INSERT INTO " .PROVINCE ." VALUES('', '".$provincename."','".$country_id."')";

    $dbHelper = new DBHelper();

    $result_province = $dbHelper->executeInsertQuery($query_insert);

    $province_id = $result_province;

    //INSERTING DATA INTO THE CITY TABLE

    $query_insert = "INSERT INTO " .CITY ." VALUES('', '".$cityname."','".$province_id."')";

    $dbHelper = new DBHelper();
    $result_city = $dbHelper->executeInsertQuery($query_insert);

    $city_id = $result_city;

    //returns the city id
    return $city_id;
  }

  //List of Countries
public function getCountries() {

    //Selecting country by City Name
    $query = "select * from tbl_country order by con_country_name ASC";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $loc = $this->getCountryList($result);

    return $loc;
  }

public function getCountriesNameById($countryid) {

    $query = "select * from " .COUNTRY ." where con_country_id= "."'".$countryid."'";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $loc = $this->getCountryList($result);

    return $loc;
  }
    
  //for search
public function getCountryByCityName($cityname) {

  	//Selecting country by City Name
    $query = "select * from tbl_country c 
    inner join tbl_province pro
    on c.con_country_id = pro.pro_country_id
    where pro.pro_province_id 
    in
    (select cty_province_id from tbl_city where upper(cty_city_name)= " . " '".strtoupper($cityname)."' )";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $loc = $this->getCountry($result);

    return $loc;
  }

  //for search
public function getCountryByCityId($cityid) {

    //Selecting country by City Name
    $query = "select * from tbl_country c 
    inner join tbl_province pro
    on c.con_country_id = pro.pro_country_id
    where pro.pro_province_id 
    in
    (select cty_province_id from tbl_city where cty_city_id = " . " '".$cityid."' )";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $loc = $this->getCountry($result);

    return $loc;
  }


public function getCountryByProvinceName($provname) {

    //Selecting country by City Name
    $query = "select * from tbl_country c
    inner join tbl_province pro
    on 
    c.con_country_id = pro.pro_country_id
    where upper(pro.pro_province_name) =  " . " '".strtoupper($provname)."'";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $loc = $this->getCountry($result);

    return $loc;
  }

public function getCountryByProvinceId($provid) {

    //Selecting country by City Name
    $query = "select * from tbl_country where con_country_id in 
            (select pro_country_id from tbl_province where pro_province_id = " . " '".$provid."')";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $loc = $this->getCountry($result);

    return $loc;
  }

  public function getProvincesByCountryName($countryname) {

    //Selecting country by City Name
    $query = "select * from tbl_province pro
    where pro.Pro_country_id=
    (select con_country_id from tbl_country where upper(con_country_name) = " . " '".strtoupper($countryname)."' )";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $loc = $this->getProvinceList($result);

    return $loc;
  }

  public function getProvinceById($provinceId) {

    //Selecting country by City Name
    $query = "select * from tbl_province where pro_province_id  = " . " '".$provinceId."'";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $loc = $this->getProvince($result);

    return $loc;
  }

public function getProvinceByName($provincename) {

    //Selecting country by City Name
    $query = "select * from tbl_province where upper(pro_province_name)  = " . " '".strtoupper($provincename)."' ";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $loc = $this->getProvince($result);

    return $loc;
  }

public function getProvinceByCityName($Cityname) {

    //Selecting country by City Name
    $query = "select * from ".PROVINCE." where pro_province_id in (select cty_province_id from tbl_city where upper(cty_city_name)  = " . " '".strtoupper($Cityname)."' )";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $loc = $this->getProvince($result);

    return $loc;
  }

public function getProvincesByCountryId($countryid) {


    //Selecting country by City Name
    $query = "select * from ".PROVINCE." where pro_country_id  = ". " '".$countryid."' ";

    $dbHelper = new DBHelper();
     
    $result = $dbHelper->executeSelect($query);

    $loc = $this->getProvinceList($result);

    return $loc;
  }
  //**********************************************
  //Get city by countryname
  public function getCitiesByCountryId($countryid) {

    //Selecting Cities by countryid
    $query = "select * from tbl_city where cty_province_id in 
             (select pro_province_id  from tbl_province
              where pro_country_id = " . " '".$countryid."')";
    $dbHelper = new DBHelper();

    $result = $dbHelper->executeSelect($query);
    
    $loc = $this->getCityList($result);
    
    

    return $loc;
  }

    //**********************************************
  //Get cities by provinceid
  public function getCitiesByProvinceId($provinceid) {

    //Selecting Cities by ProvinceId
    $query = "select * from tbl_city
              where cty_province_id = " . " '".$provinceid."'";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $loc = $this->getCityList($result);

    return $loc;
  }

    /////
    //**********************************************
  //Get city by id
  public function getCityById($cityid) {

    //Selecting Cities by ProvinceId
    $query = "select * from tbl_city where cty_city_id= " . " '".$cityid."'";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $loc = $this->getCity($result);

    return $loc;
  }

   //**********************************************
  //Get city by id
  public function getCityByName($cityname) {

    //Selecting Cities by ProvinceId
    $query = "select * from tbl_city where upper(cty_city_name)= " . " '".strtoupper($cityname)."' ";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $loc = $this->getCity($result);

    return $loc;
  }

  public function getCountryByName($countryname) {
    echo $countryname;

    //Selecting Cities by ProvinceId
    $query = "select * from tbl_country where upper(con_country_name)= " . " '".strtoupper($countryname)."' ";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $loc = $this->getCountry($result);
    echo 'CountryName: '.$loc->getCountryName().'<br>'.$query;
    echo $countryname;

    return $loc;
  }

  //To Search for Cities
  public function searchCity($cityname) {

    //Selecting Cities by ProvinceId
    $query = "select * from tbl_city where upper(cty_city_name) like " . " '".strtoupper('%'.$cityname.'%')."' ";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $city = $this->getCityList($result);

    return $city;
  }

    //To filter provinces
   public function searchProvince($provincename) {

    //Selecting Cities by ProvinceId
    $query = "select * from tbl_province where upper(pro_province_name) like " . " '".strtoupper('%'.$provincename.'%')."' ";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $province = $this->getProvinceList($result);

    return $province;
  }

    //To filter provinces
  public function searchCountry($countryname) {

    //Selecting Cities by ProvinceId
    $query = "select * from tbl_country where upper(con_country_name) like " . " '".strtoupper('%'.$countryname.'%')."' ";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $province = $this->getCountryList($result);

    return $province;
  }



  //Add New Country
  public function addCountry($countryname,$country_code) {

    //Selecting Cities by ProvinceId
    $query = "insert into tbl_country values('' ,'".$countryname."','".$country_code."')";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    //$loc = $this->getUser($result);

    return $result;
  }

  //Add New Province
  public function addProvince($provincename,$countryid) {

    //Selecting Cities by ProvinceId
    $query = "insert into tbl_country values('' ,'".$provincename."','".$countryid."')";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    
    $last_inserted_id = mysql_insert_id();
    return $last_inserted_id;
  }

  //Add New Province
  public function addCity($cityname,$provinceid) {

    
    $query = "insert into tbl_city values('' ,'".$cityname."','".$provinceid."')";

    $dbHelper = new DBHelper();

    $result = $dbHelper->executeSelect($query);

    $last_inserted_id = mysql_insert_id();

    return $last_inserted_id;

  }

  //Add New Province
  public function addAddress($loc) {

    $city       =  $loc->getCityName();
    $address    =  $loc->getAddress();
    $postalcode =  $loc->getPostalCode();

    //inserting address to the database
    $query = "insert into tbl_location values('' ,'".$address."','".$postalcode."','".$city."','')";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $last_inserted_id = mysql_insert_id();

    //Returns the province id
    return $last_inserted_id;
  }

  public function getAddressByPostalCode($postalcode) {

    
    $query = "select * from tbl_location where upper(replace(loc_postalcode,' ','')) = " . " '".strtoupper(str_replace(' ', '',$postalcode))."'";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $loc = $this->getAddressList($result);

    return $loc;
  }

  public function getAddressesByCityId($cityid) {

    $query = "select * from tbl_location where loc_city_id = " . " '".$cityid."'";

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $loc = $this->getAddressList($result);

    return $loc;
  }

  //for profile page
  public function getLocationBylocationId($locationId) {

    $query = "select * from tbl_location where loc_location_id = ".$locationId;

    $dbHelper = new DBHelper();
    $result = $dbHelper->executeSelect($query);
    $loc = $this->getAddressList($result);

    return $loc;
  }
  //***********************************************************************************************
  //PRIVATE FUNCTIONS
  //***********************************************************************************************
  private function getCountry($selectResult) {
    
    $count = 0;
    
    //$Country="";
$Country = new Location();

    while ($list = mysqli_fetch_assoc($selectResult)){

      //$Country = new Location();
      

      $Country->setCountryId($list['con_country_id']);
      $Country->setCountryName($list['con_country_name']);
      $Country->setCountryCode($list['con_country_code']);

      
    //}

    } // while

    return $Country;
    
  }

  
  private function getProvince($selectResult) {
    $province = new Location();
    $count = 0;
    while ($list = mysqli_fetch_assoc($selectResult)) {

      $province->setProvinceId($list['pro_province_id']);
      $province->setProvinceName($list['pro_province_name']);
      $province->setCountryId($list['pro_country_id']);
    } 

    //will return  the country data
    return $province;
  }

  private function getCity($selectResult) {
    $City = new Location();
    $count = 0;
    while ($list = mysqli_fetch_assoc($selectResult)) {

      $City->setCityId($list['cty_city_id']);
      $City->setCityName($list['cty_city_name']);
      $City->setProvinceId($list['cty_province_id']);
    } // while

    //will return  the country data
    return $City;
  }

  private function getCountryList($selectResult) {
    //Counter that keeps count of the users
    $count = 0;
   
    while ($list = mysqli_fetch_assoc($selectResult)) {
    $Countries[] = new Location();
      $Countries[$count]->setCountryId($list['con_country_id']);
      $Countries[$count]->setCountryName($list['con_country_name']);
      $Countries[$count]->setCountryCode($list['con_country_code']);
     
      $count++;
    } // while

    return $Countries;
  }

  private function getProvinceList($selectResult) {
    //Counter that keeps count of the users
    //$Provinces[] = new Location();
    $count = 0;

    //$Provinces[] = ""new Location()"";
      
    while ($list = mysqli_fetch_assoc($selectResult)) {
      $Provinces[] = new Location();
      $Provinces[$count]->setProvinceId($list['pro_province_id']);
      $Provinces[$count]->setProvinceName($list['pro_province_name']);
      $Provinces[$count]->setCountryId($list['pro_country_id']);
      
      $count++;

    } // while

    return $Provinces;
  }

  private function getCityList($selectResult) {
   
    $count = 0;

    $Cities="";

    while ($list = mysqli_fetch_assoc($selectResult)) {

      $Cities[] = new Location();

      $Cities[$count]->setCityId($list['cty_city_id']);
      $Cities[$count]->setCityName($list['cty_city_name']);
      $Cities[$count]->setProvinceId($list['cty_province_id']);
      

      $count++;

    } // while

    return $Cities;
  }

  private function getAddressList($selectResult) {
    //Counter that keeps count of the users
    $count = 0;
    $address[] = new Location();
    while ($list = mysqli_fetch_assoc($selectResult)) {
        
      $address[$count]->setAddressId($list['loc_location_id']);
      $address[$count]->setAddress($list['loc_address']);
      $address[$count]->setPostalCode($list['loc_postalcode']);
      $address[$count]->setCityId($list['loc_city_id']);

     
      $count++;
    } // while
    return $address;
  }

}





?>