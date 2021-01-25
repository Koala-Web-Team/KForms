<?php

class RadioButton extends KCheckables
{
	public function __construct( array $attributes = [] ) {
		parent::__construct( $attributes );
		$this->setType("radio");
	}
}
