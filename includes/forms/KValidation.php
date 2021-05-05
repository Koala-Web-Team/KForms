<?php

 class KValidation
{
	private $errors = [];

	public function __construct() {
	}

	public function validate( $request , $rules , $errormsg = null){
		foreach ( $rules as $key => $value ) {
			if(array_key_exists($key,$request)) {
				foreach ( $value as $val ) {
					$rule = explode(":",$val)[0];
					$rulevalue = explode(":",$val)[1];
					if ( count( $errormsg ) > 0 ) {
						$index = $key . '.' . $rule;
						if ( array_key_exists( $index, $errormsg ) ) {
							$this->$rule( $key, $request[$key], $rulevalue , $errormsg[$index] );
						} else {
							$this->$rule( $key, $request[$key] , $rulevalue);
						}
					} else {
						$this->$rule( $key, $request[$key] , $rulevalue);
					}
				}
			}
			else{
				throw new Exception('there is no input '.$key);
			}
		}
		if(count($this->errors) > 0){
			session_start();
			$_SESSION['errors'] = $this->errors;
			header("Location: {$_SERVER['HTTP_REFERER']}");
			exit;
		}
	}


	private function required($inputname , $inputvalue , $rulevalue = null , $errormsg = null){
		$errormsg = $errormsg == null ? "field is required" : $errormsg;
	 	if($inputvalue == null){
			$this->errors[$inputname][] = $errormsg;
		}
	}

	 private function string($inputname , $inputvalue , $rulevalue = null, $errormsg = null){
		 $errormsg = $errormsg == null ? "field is not string" : $errormsg;
		 if($inputvalue == null){
			 $this->errors[$inputname][] = $errormsg;
		 }
	 }

	 private function min($inputname , $inputvalue , $rulevalue = null , $errormsg = null){
		 $errormsg = $errormsg == null ? "minimum characters are $rulevalue" : $errormsg;
		 if($rulevalue != null) {
			 if ( strlen( $inputvalue ) < $rulevalue ) {
				 $this->errors[$inputname][] = $errormsg;
			 }
		 }
		 else{
		 	throw new Exception('you must add the number of characters');
		 }
	 }

	 private function max($inputname , $inputvalue , $rulevalue = null , $errormsg = null){
		 $errormsg = $errormsg == null ? "maximum characters are $rulevalue" : $errormsg;
		 if($rulevalue != null) {
			 if ( strlen( $inputvalue ) > $rulevalue ) {
				 $this->errors[$inputname][] = $errormsg;
			 }
		 }
		 else{
			 throw new Exception('you must add the number of characters');
		 }
	 }

}
