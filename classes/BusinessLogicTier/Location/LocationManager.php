<?php

/* -------------------------
  a constant to be put it inside the include files
  where it will show the location to the files
  --------------------------- */
require_once DATA_ACCESSOR_DIR_Location . 'LocationDataAccessor.php';

class LocationManager {

  //will return the city id..
  public function getuserLocation() {

    $LocationDataAccessor = new LocationDataAccessor();

    $City_id = $LocationDataAccessor->getuserLocation();

    return $City_id;
  }


  //well be a function that adds the Location data to the database
  public function addLocation($Location) {

    $LocationDataAccessor = new LocationDataAccessor();

    $last_inserted_id = $LocationDataAccessor->addLocation($Location);

    return $last_inserted_id;
  }

  public function deleteLocation($Locationid) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->deleteLocation($Locationid);
    return $result;
  }

  public function getCountries() {
    $LocationDataAccessor = new LocationDataAccessor();
    $Locations = $LocationDataAccessor->getCountries();
    return $Locations;
  }

public function getCountriesNameById($countryid) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor-> getCountriesNameById($countryid);
    return $result;      
}
  public function getCountryByCityName($cityname) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->getCountryByCityName($cityname);
    return $result;
  }
   
  public function getCountryByCityId($cityid) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->getCountryByCityId($cityid);
    return $result;
  }
  
  public function getCountryByProvinceName($provname) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->getCountryByProvinceName($provname);
    return $result;
  }

  public function getCountryByProvinceId($provid) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->getCountryByProvinceId($provid);
    return $result;
  } 

  ////
  public function getProvincesByCountryName($countryname) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->getProvincesByCountryName($countryname);
    return $result;
  }

  public function getProvincesByCountryId($countryid) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->getProvincesByCountryId($countryid);
    return $result;
  }

  public function getProvinceByCityName($cityname) {
    $LocationDataAccessor = new LocationDataAccessor();

    $result = $LocationDataAccessor->getProvinceByCityName($cityname);

    return $result;
  }

  public function getProvinceById($provid) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->getProvinceById($provid);
    return $result;
  } 

  public function getProvinceByName($provname) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->getProvinceByName($provname);
    return $result;
  }

  public function getCitiesByCountryId($countryid) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->getCitiesByCountryId($countryid);
    return $result;
  } 

  public function getCitiesByProvinceId($provid) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->getCitiesByProvinceId($provid);
    return $result;
  } 

  public function getCityById($cityid) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->getCityById($cityid);
    return $result;
  } 

   //Filter Cities based on the search keyword 
  public function searchCity($cityname) {
      $LocationDataAccessor = new LocationDataAccessor();

      $result = $LocationDataAccessor->searchCity($cityname);

    return $result;
  } 
    //Filter Provinces based on the search keyword
   public function searchProvince($provincename) {
      $LocationDataAccessor = new LocationDataAccessor();

      $result = $LocationDataAccessor->searchProvince($provincename);

    return $result;
  } 

    //Filter Countries based on the search keyword
   public function searchCountry($countryname) {
      $LocationDataAccessor = new LocationDataAccessor();

      $result = $LocationDataAccessor->searchCountry($countryname);

    return $result;
  } 


  public function getCityByName($cityname) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->getCityByName($cityname);
    return $result;
  } 

  public function addCountry($location) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->addCountry($location);
    return $result;//true/false
  } 

  public function addProvince($location) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->addProvince($location);
    return $result;//true/false
  } 

  public function addCity($location) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->addCity($location);
    return $result;
  } 

  public function addAddress($location) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->addAddress($location);
    return $result;
  } 

  public function getAddressByPostalCode($postalcode) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->getAddressByPostalCode($postalcode);
    return $result;
  } 

  public function getAddressesByCityId($cityid) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->getAddressesByCityId($cityid);
    return $result;
  } 
  //for profile page   
  public function getLocationBylocationId($locationId) {
    $LocationDataAccessor = new LocationDataAccessor();
    $result = $LocationDataAccessor->getLocationBylocationId($locationId);
    return $result;
  } 

}

?>