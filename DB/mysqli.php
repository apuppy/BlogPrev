<?php
	class MySQLi{
		public $host;
		public $user;
		public $password;
		
		public function __construct(){
			$this->host = 'localhost';
			$this->user = 'blog';
			$this->password = 'MyBlogSince201509';
			return $this->connect($this->host,$this->user,$this->password);
		}
		public function connect($host,$user,$password){
			$link = mysqli_connect($host,$user,$password);
			if($link){
				mysqli_error('Error' . mysqli_error($link));
			}else{
				return $link;
			}
		}
		public function __destruct(){
			mysqli_close($this->link);
		}
	}
?>
