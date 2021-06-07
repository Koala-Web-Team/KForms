<?php

class LoginForm extends KTemplate
{
	public $authType;
	public $password;

	public function __construct( array $attributes = [], $authType = "Email" ) {
		$this->authType = new $authType();
		$this->password = new Password();
		$this->addInputs( [$this->authType, $this->password] );
		parent::__construct( $attributes );
	}
}