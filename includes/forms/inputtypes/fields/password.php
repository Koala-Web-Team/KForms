<?php

class password extends KFields
{
    protected $inputmode;
	public function __construct( array $attributes = [] ) {
        parent::__construct($attributes);
        parent::setType('password');
        $this->setPattren('^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})');
	}
    
    public function setInputmode( $inputmode ) {
		$this->inputmode = $inputmode;
	}

	public function getInputmode() {
		return $this->inputmode;
	}
}