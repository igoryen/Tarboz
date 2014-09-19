<?php

	//this is a constant ,we will put it inside the include files, where it will show the location to the files,
	require_once DATA_ACCESSOR_DIR_USER . 'UserDataAccessor.php';
	
	class UserManager {
		
		//well be a function that adds the user data to the database
		public function addUser($user){
			// implementation

			$userDataAccessor = new userDataAccessor();			

			$last_inserted_id = $userDataAccessor->addUser($user);

			//returns the last inserted row..
			return $last_inserted_id;

		}

		//A method inside the  UserDataAccessor that updates the data
		//if  A user wants to make changes to his/her account
		public function updateUser($user){
			// implementation			

			$userDataAccessor = new UserDataAccessor();			

			$result = $userDataAccessor->updateUser($user);

			return $result;
		}
		
		//if user requests password change
		public function changePassword($user){
			// implementation			

			$userDataAccessor = new UserDataAccessor();			

			$result = $userDataAccessor->changePassword($user);

			return $result;
		}

		public function deleteUser($userid){
			// implementation

			$userDataAccessor = new UserDataAccessor();			

			$result = $userDataAccessor->deleteUser($userid);

			return $result;

		}
		
		//for searching, if searched by userid
		public function getUserByLoginId($userlogin){

			$userDataAccessor = new UserDataAccessor();			
			
			$user = $userDataAccessor->getUserByLoginId($userlogin);
			
			return $user;			
			
		}
		
		public function getAllUsers(){
			
			$userDataAccessor = new UserDataAccessor();
			
			$users = $userDataAccessor->getAllUsers();

			return $users;

		}

		public function getUserByTypeId($usertypeid){
			// implementation

			$userDataAccessor = new UserDataAccessor();			

			$users = $userDataAccessor->getUserByTypeId($usertypeid);

			return $users;	
		}

		public function getUserByName($userfname,$userlname){
			// implementation

			$userDataAccessor = new UserDataAccessor();			

			$user= $userDataAccessor->getUserByName($userfname,$userlname);

			return $users;	
		}
		
		public function getUserByLanguage($languageid){
			// implementation

			$userDataAccessor = new UserDataAccessor();			

			$users = $userDataAccessor->getUserByLanguage($languageid);

			return $users;	
		}
		
	
		public function getUserByLocation($locationid){
			// implementation
			$userDataAccessor = new UserDataAccessor();
			
			$users = $userDataAccessor->getUserByLocation($locationid);

			return $users;

		}
	
	}



?>