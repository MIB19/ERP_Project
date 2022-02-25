<?php

class config{
	public $base_url	= "http://192.168.1.196/coba/";

	function base_url(){
		return $this->base_url;
	}
	function base_gambar(){
		return $this->base_gambar;
	}
	function api_key(){
		return $this->apiKey;
	}
	function server(){
		return $this->database;
	}
}
$config	= new config();
?>