<?php

class text extends KInput
{
	public function __construct( $attributes ) {
		parent::__construct( $attributes );
		$this->setType( "text" );
	}
}