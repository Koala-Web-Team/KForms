<?php

class KValidation
{
	private $data;
	private $rules;
	private $errormsg;
	private $errors = [];
	private $validationStyle;

	public function __construct( $data, $rules, $errormsg = null, $validationStyle = "default" ) {
		$this->data = $data;
		$this->rules = $rules;
		$this->errormsg = $errormsg;
		$this->validationStyle = $validationStyle;
	}

	public function validate() {
		try {
			foreach ( $this->rules as $key => $keyRules ) {
				$keyRules = $this->getKeyRules( $keyRules );
				if ( array_key_exists( $key, $this->data ) ) {
					foreach ( $keyRules as $keyRule ) {
						$_rule = explode( ":", $keyRule );
						$ruleName = $_rule[0];
						$ruleValue = $_rule[1] ?? null;

						if ( is_array( $this->errormsg ) && sizeof( $this->errormsg ) > 0 ) {
							$key_rule = $key . '.' . $ruleName;
							if ( array_key_exists( $key_rule, $this->errormsg ) ) {
								$this->$ruleName( $key, $ruleValue, $this->errormsg[$key_rule] );
							} elseif ( array_key_exists( $ruleName, $this->errormsg ) ) {
								$this->$ruleName( $key, $ruleValue, $this->errormsg[$ruleName] );
							} else {
								$this->$ruleName( $key, $ruleValue );
							}
						} else {
							$this->$ruleName( $key, $ruleValue );
						}
					}
				} else {
					$this->errors[$key][] = "There is No Such Input: " . $key;
				}
			}
			if ( count( $this->errors ) > 0 ) {
				throw new ValidationException();
			}
		} catch ( ValidationException $e ) {
			KoalaSessionHandler::init();
			KoalaSessionHandler::setErrors( $this->errors );
			header( "Location: {$_SERVER['HTTP_REFERER']}" );
		} catch ( InvalidArgumentException $e ) {
			KoalaSessionHandler::init();
			KoalaSessionHandler::setErrors( [] );
			header( "Location: {$_SERVER['HTTP_REFERER']}" );
		}
	}

	private function getKeyRules( $value ) {
		if ( is_array( $value ) ) {
			return $value;
		} else {
			return explode( "|", $value );
		}
	}

	private function required( $key, $rulevalue = null, $errormsg = null ) {
		$errormsg = $errormsg ?? "The $key is required";
		if ( !isset( $this->data[$key] ) || trim( $this->data[$key] ) == "" ) {
			$this->errors[$key][] = $errormsg;
		}
	}

	private function email( $key, $rulevalue = null, $errormsg = null ) {
		$errormsg = $errormsg ?? "$key is not a valid email address";
		/**
		 * TODO: use Regular Expression
		 */
		if ( true ) {
			$this->errors[$key][] = $errormsg;
		}
	}

	/**
	 * @throws ValidationException
	 */
	private function min( $key, $rulevalue = null, $errormsg = null ) {
		//echo "test";
		$errormsg = $errormsg ?? "The $key must be at least $rulevalue characters";
		if ( $rulevalue != null ) {
			if ( trim( strlen( $this->data[$key] ) ) < $rulevalue ) {
				$this->errors[$key][] = $errormsg;
			}
		} else {
			throw new ValidationException(/*$this->validator*/ );
		}
	}

	private function max( $key, $rulevalue = null, $errormsg = null ) {
		$errormsg = $errormsg ?? "The $key must be at most $rulevalue characters";
		if ( $rulevalue != null ) {
			if ( trim( strlen( $this->data[$key] ) ) > $rulevalue ) {
				$this->errors[$key][] = $errormsg;
			}
		} else {
			throw new ValidationException();
		}
	}

	public function url( $key, $rulevalue = null, $errormsg = null ) {
		$errormsg = $errormsg ?? "$key Is Not A Valid URL";
		if ( !filter_var( $this->data[$key], FILTER_VALIDATE_URL ) ) {
			$this->errors[$key][] = $errormsg;
		}
	}

	private function tel( $key, $errormsg = null ) {
		$errormsg = $errormsg ?? "$key Must Be A Valid Phone Number";
		$pattern = '/(01)[0-9]{9}/';
		if ( !preg_match( $pattern, $this->data[$key] ) ) {
			$this->errors[$key][] = $errormsg;
		}
	}

	// public function in_array($key, $rulevalue, $errormsg = null)
	// {
	//     $errormsg = $errormsg ?? "$key Is Not In The Array [$rulevalue]";
	//     $myArray=explode(",", $rulevalue);
	//     if (!array_search($this->data[$key], $myArray)) {
	//         $this->errors[$key][] = $errormsg;
	//     }
	// }

	public function in_array( $key, $rulevalue = null, $errormsg = null ) {
		$errormsg = $errormsg ?? "$key Is Not In The Field [$rulevalue]";

		$myArray = explode( ",", $rulevalue );

		if ( !array_search( $this->data[$key], $myArray ) ) {
			$this->errors[$key][] = $errormsg;
		}
	}

	public function in( $key, $rulevalue, $errormsg = null ) {
		//in (input only two options (something,something else))
		// in:something,something else;
		$errormsg = $errormsg ?? "$key Input Is Not In The Allowed Option [$rulevalue]";
		$myArray = explode( ",", $rulevalue );
		if ( !array_search( $this->data[$key], $myArray ) || count( $myArray ) !== 2 ) {
			$this->errors[$key][] = $errormsg;
		}
	}

	public function not_in( $key, $rulevalue, $errormsg = null ) {
		$errormsg = $errormsg ?? "$key Is In The Allowed Option [$rulevalue]";
		$myArray = explode( ",", $rulevalue );
		if ( array_search( $this->data[$key], $myArray ) ) {
			$this->errors[$key][] = $errormsg;
		}
	}

	private function not_regex( $key, $rulevalue = null, $errormsg = null ) {
		$errormsg = $errormsg ?? "The $key Must Not Match The Regex $rulevalue";
		if ( $rulevalue != null ) {
			if ( preg_match( $rulevalue, $this->data[$key] ) ) {
				$this->errors[$key][] = $errormsg;
			}
		} else {
			throw new ValidationException();
		}
	}

	private function regex( $key, $rulevalue = null, $errormsg = null ) {
		$errormsg = $errormsg ?? "The $key Must  Match The Regex $rulevalue";
		if ( $rulevalue != null ) {
			if ( !preg_match( $rulevalue, $this->data[$key] ) ) {
				$this->errors[$key][] = $errormsg;
			}
		}
	}

	private function date( $key, $ruleValue = null, $errormsg = null ) {
		$errormsg = $errormsg ?? "The $key must be a Date";
		if ( $this->data[$key] instanceof DateTimeInterface ) {
			return;
		}

		if ( (!is_string( $this->data[$key] ) && !is_numeric( $this->data[$key] ))
			|| strtotime( $this->data[$key] ) === false ) {
			$this->errors[$key][] = $errormsg;
			return;
		}

		$date = date_parse( $this->data[$key] );
		if ( !checkdate( $date['month'], $date['day'], $date['year'] ) ) {
			$this->errors[$key][] = $errormsg;
		}
	}

	private function date_format( $key, $ruleValue, $errormsg = null ) {
		$errormsg = $errormsg ?? "The $key must be match the format: $ruleValue";

		if ( !is_string( $this->data[$key] ) && !is_numeric( $this->data[$key] ) ) {
			$this->errors[$key][] = $errormsg;
			return;
		}

		$format = $ruleValue;

		$date = DateTime::createFromFormat( '!' . $format, $this->data[$key] );
		if ( !($date && $date->format( $format ) == $this->data[$key]) ) {
			$this->errors[$key][] = $errormsg;
		}
	}

	private function file( $key, $ruleValue = null, $errormsg = null ) {
		$errormsg = $errormsg ?? "The $key must be a Valid File";
		$file = $_FILES[$key];
		if ( !file_exists( $file['tmp_name'] ) || $file['size'] == 0 ) {
			$this->errors[$key][] = $errormsg;
		}
	}

	/**
	 * @return mixed|string
	 */
	public function getValidationStyle() {
		return $this->validationStyle;
	}
}

$data = [
	"name" => "test",
	"password" => "wsfsdf",
	"Tel"=>"0545",
	"Url"=>"ww.com",
	"test"=>"test"
    ];
$rules = [
	"name" => "min:5|max:10|required",
	"password" => "max:3",
	"Tel"=>"tel",
	"Url"=>"ww.com",
	'test'=>"in_array:ramaj,test"
	

];

$errormsg = [
	"name.required" => "You Must Enter The Name",
	"required" => "You Must enter this key",
	"Tel"=>"Not Valid Phone Number",
	"Url"=>"Not Valid URL ",
	"in_array"=>"not in Array"
	
];