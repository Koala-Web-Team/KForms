<?php

class Checkbox extends KCheckables
{
	protected $onchange;

	public function __construct( array $attributes = [] ) {
		parent::__construct( $attributes );
		$this->setType("checkbox");
	}

	public function render() {
		parent::render();
		if ( !empty( $this->getLabel() ) ) {
			echo "<label for='" . $this->getId() . "'>" . $this->getLabel() . "</label>";
		}
	}

	public function setOnChange($function,...$param) {
		parent::setOn('change',$function,...$param);
	}
	public function getOnChange() {
		return $this->onchange;
	}
}

