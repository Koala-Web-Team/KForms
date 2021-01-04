<?php

Abstract class KCheckables extends KInput
{
	protected $checked;

	public function __construct( array $attributes = [] ) {
		parent::__construct( $attributes );
		$this->setPlaceholderBehavoir( new noplaceholderbehavior() );
		$this->getLabel()->setAfterElement();
	}

	public function isChecked() {
		return $this->checked;
	}

	public function check() {
		$this->checked = true;
	}

	public function uncheck() {
		$this->checked = false;
	}

}