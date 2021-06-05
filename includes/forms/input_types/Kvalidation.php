<?php
class KvalidationA {
	public $data;
	public $rules;
	public $errors = [];
    public $errorMsg;


	public $errorMessages = [
		"required" => [ "Field is Required" ],
		"string" => [ "Field Should Be String" ],
        "email" => [ "This Is An Email Field " ],
        "unique"=>["Field Should Be Unique"],
        "confirmed" => [ "The Password Doesn't Match" ],
		"phone"=>['Is Not A Valid Phone Number']
	];

	public function __construct( $data, $rules, $errorMsg = null) {
		$this->data = $data;
		$this->rules = $rules;
        $this->errorMsg = $errorMsg;


		foreach ($this->rules as $key => $value) {
			$rulesValue = explode(",", $value);

			foreach ($rulesValue as $rule) {
				$this->errorMsg=$this->validateInputField($key,$rule);
				}
			    return $this->errorMsg;	
			}
		}
	
	public function validateInputField($key,$rule) {
		if ( !isset( $this->data[$key] )) {
			$this->errors[] = $key .$this->errorMessages[$rule];
		}
		else{
			return "Undefined Index"." ".$key;
		}
	}

	public function getValidationErrorMessage($key,$rule) {
		if( isset( $this->errorMessages[$rule][$key] ) ) {
			return $this->errorMessages[$rule][$key];
		} else {
			return $key." ".$this->errorMessages[$rule][0];
		}
	}

}


// $validation = new KValidation($data, $rules);
// var_dump($validation);
// $validation->setRequiredError("name");
// var_dump($validation->setRequiredError("name"));

// var_dump($validation->getStringErrorMessage("test"));
// print_r($validation->checkRequired("test"));