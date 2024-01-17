<?php

namespace App\Api;
use Illuminate\Http\Response;

class ApiMessages{

	private $message = [];

	public function __construct(string $message, $data = []){
		$this->message['message'] 	= $message;
		$this->message['errors'] 	= $data;
 	}

 	public function getMessage(){
 		return $this->message;
 	}
}