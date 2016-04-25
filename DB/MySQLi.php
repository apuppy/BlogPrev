<?php
    require_once('../helper.php');
	class MDB extends mysqli{
		public $host;
		public $user;
		public $password;

		public function __construct(){
			$this->host = 'localhost';
			$this->user = 'blog';
			$this->password = 'MyBlogSince201509';
            $mysqli = new mysqli('localhost', 'blog', 'MyBlogSince201509', 'blog');
            //vd($mysqli);
		}
	}
    $mysqli = new MDB();
?>
