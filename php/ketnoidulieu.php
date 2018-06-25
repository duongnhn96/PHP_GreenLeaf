<?php

class db {
	public $conect = NULL;
	public $result = NULL;
	public $host = "localhost";
	public $user = "root";
	public $pass = "";
	public $db = "greenleaf";
	
	function __construct()
	{
		$connect = mysql_connect($this->host,$this->user,$this->pass);
		mysql_select_db($this->db);
		mysql_query("set names 'utf8'");		
	}



}




?>