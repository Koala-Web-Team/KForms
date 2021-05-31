<?php

abstract class KTemplate extends Form
{
	public $submitButton;
	public $form;
	public $mainForm;

	public function __construct( array $attributes = []) {
		parent::__construct( $attributes );
		$this->submitButton = new Submit();
		$this->addInput( $this->submitButton );
	}
}

