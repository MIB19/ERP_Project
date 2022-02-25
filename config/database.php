<?php
class database{
	public $user		= "root";
	public $password	= "";
	public $database	= "erp_web";
}
$database		= new database();
$conn	        = new mysqli('localhost',$database->user,$database->password,$database->database);
?>