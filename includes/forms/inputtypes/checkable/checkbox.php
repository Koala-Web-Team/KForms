<?php

class Checkbox extends KCheckables
{

	public function __construct( array $attributes = [] ) {
		parent::__construct( $attributes );
		$this->setType("checkbox");
	}
}