<?php 
	
	class User 
	{
		private $user_name;
		private $password;
		private $longitude;
		private $latitude;
		private $signed_in;
		private $id;
		
		function __constuct($user_name, $password, $longitude, $latitude, $signed_in, $id = null)
		{
			$this->user_name = $user_name;
			$this->password = $password;
			$this->longitude = $longitude;
			$this->latitude = $latitude;
			$this->signed_in = $signed_in;
			$this->id = $id; 
		}
		
		function setUserName($new_user_name)
		{
			$this->user_name = $new_user_name;
		}
		
		function getUserName()
		{
			return $this->user_name;
		}
		
		function setPassword($new_password)
		{
			$this->password = $new_password;
		}
		
		function getPassword()
		{
			return $this->password;
		}
		
		function setLongitude($new_longitude)
		{
			$this->longitude = $new_longitude;
		}
		
		function getLongitude()
		{
			return $this->longitude;
		}
		
		function setLatitude($new_latitude)
		{
			$this->latitude = $new_latitude;
		}
		
		function getLatitude()
		{
			return $this->latitude;
		}
		
		function setSignedIn($new_signed_in)
		{
			$this->signed_in = $new_signed_in;
		}
		
		function getSignedIn()
		{
			return $this->signed_in;
		}
		
		function setId($new_id)
		{
			$this->id = $id;
		}
		
		function getId()
		{
			return $this->id;
		}
		
		function save()
		{
			$GLOBALS['DB']->exec("INSERT INTO users (user_name, password, lng, lat, signed_in) VALUES ('{$this->getUserName()}', '{$this->getPassword()}', {$this->getLongitude()}, {$this->getLatitude()}, {$this->getSignedIn()});");
			$this->setId($GLOBALS['DB']->lastInsertId());
		}
		
		function updateLocation($new_longitude, $new_latitude)
		{
			$GLOBALS['DB']->exec("UPDATE users SET lng = {$new_longitude} WHERE id = {$this->getId()};");
			$GLOBALS['DB']->exec("UPDATE users SET lat = {$new_latitude} WHERE id = {$this->getId()};");
			$this->setLongitude($new_longitude);
			$this->setLatitude($new_latitude);
		}
		
		function updatePassword($new_password)
		{
			$GLOBALS['DB']->exec("UPDATE users SET password = '{$new_password}' WHERE id = {$this->getId()};");
			$this->setPassword($new_password);
		}
		
		function updateUserName($new_user_name)
		{
			$GLOBALS['DB']->exec("UPDATE users SET user_name = '{$new_user_name}' WHERE id = {$this->getId()};");
			$this->setUserName($new_user);
		}
		
		function updateSignedIn($new_signed_in)
		{
			$GLOBALS['DB']->exec("UPDATE users SET signed_in = {$new_signed_in} WHERE id = {$this->getId()};");
			$this->setSignedIn($new_signed_in);
		}
		
		function update($new_user_name, $new_password, $new_longitude, $new_latitude, $new_signed_in)
		{
			$this->updateUserName($new_user_name);
			$this->updatePassword($new_password);
			$this->updateLocation($new_longitude, $new_latitude);
			$this->update($new_signed_in);
		}
	}
?>