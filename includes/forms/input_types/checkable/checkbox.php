<?php

class Checkbox extends KCheckables
{
	protected $onChange;

	public function __construct( array $attributes = [] ) {
		parent::__construct( $attributes );
		$this->setType( "checkbox" );
	}

	public function render() {
		parent::render();
		if ( !empty( $this->getLabel() ) ) {
			echo "<label for='" . $this->getId() . "'>" . $this->getLabel()->getText() . "</label>";
		}
	}

	public function setOnChange( $function, ...$param ) {
		parent::setOn( 'change', $function, ...$param );
	}

	public function getOnChange() {
		return $this->onChange;
	}
}
