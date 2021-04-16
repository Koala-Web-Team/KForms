<?php
	class Password extends KFields
	{
		protected $inputMode;
		protected $onInput;
		protected $onChange;
		protected $onSelect;

		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
			$this->setType( 'password' );
			$this->setPattern( '^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})' );
		}

		public function setInputMode( $inputMode ) {
			$this->inputMode = $inputMode;
		}

		public function getInputMode() {
			return $this->inputMode;
		}

		public function setOnChange( $function, ...$param ) {
			$this->setOn( 'change', $function, ...$param );
		}

		public function getOnChange() {
			return $this->onChange;
		}

		public function setOnInput( $function, ...$param ) {
			$this->setOn( 'input', $function, ...$param );
		}

		public function getOnInput() {
			return $this->onInput;
		}

		public function setOnSelect( $function, ...$param ) {
			$this->setOn( 'select', $function, ...$param );
		}

		public function getOnSelect() {
			return $this->onSelect;
		}
	}