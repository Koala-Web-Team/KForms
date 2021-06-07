<?php

class LoginForm extends KTemplate
{
	public $authType;
	public $password;

	public function __construct( array $attributes = [], array $attributesAuthType = ["type"=>"Email"], array $attributesPass = []) {
		$this->authType = new $attributesAuthType['type']($attributesAuthType);
		$this->password = new Password($attributesPass);
		$this->addInputs( [$this->authType, $this->password] );
		parent::__construct( $attributes );
	}
}