<?php

class RegistrationForm extends KTemplate
{
	public $email;
	public $password;
	public $name;
	public $telephone;

	public function __construct( array $attributes = []) {
		$this->createRegistrationForm();
		parent::__construct( $attributes );
	}

	public function createRegistrationForm() {
		$this->name = new Text();
		$this->email = new Email();
		$this->password = new Password();
		$this->telephone = new Tel();
		$this->mainForm->addInputs( [$this->name, $this->email, $this->password, $this->telephone] );
	}
}