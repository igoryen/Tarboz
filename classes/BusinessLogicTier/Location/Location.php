<?php
class Location{

	private $country_id;
	private $country_name;
	private $country_code;

	private $province_id;
	private $province_name;

	private $city_id;
	private $city_name;

	private $address;
	private $postal_code;
	private $address_id;


	//Country Getters and setters
	public function getCountryId(){

		return $this->country_id;
	}

	public function setCountryId($country_id){

		$this->country_id = $country_id;
	}

	public function getCountryName(){

		return $this->country_name;
	}

	public function setCountryName($country_name){

		$this->country_name = $country_name;
	}

	public function getCountryCode(){

		return $this->country_code;
	}

	public function setCountryCode($country_code){

		$this->country_code = $country_code;
	}

	//***************************************************************************
	//Province Getters and setters

	public function getProvinceId(){

		return $this->province_id;
	}

	public function setProvinceId($province_id){

		$this->province_id = $province_id;
	}

	public function getProvinceName(){

		return $this->province_name;
	}

	public function setProvinceName($province_name){

		$this->province_name = $province_name;
	}

	//***************************************************************************
	//city Getters and setters

	public function getCityId(){

		return $this->city_id;
	}

	public function setCityId($city_id){

		$this->city_id = $city_id;
	}

	public function getCityName(){

		return $this->city_name;
	}

	public function setCityName($city_name){

		$this->city_name = $city_name;
	}


	//************************************************************************************************************
	//ADDRESS
	//************************************************************************************************************

	public function getAddressId(){

		return $this->address_id;
	}

	public function setAddressId($address_id){

		$this->address_id = $address_id;
	}

	public function getAddress(){

		return $this->address;
	}

	public function setAddress($address){

		$this->address = $address;
	}

	public function getPostalCode(){

		return $this->postal_code;
	}

	public function setPostalCode($postal_code){

		$this->postal_code = $postal_code;
	}



}


?>