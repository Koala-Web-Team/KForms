<?php
    class Text extends KFields
	{
		protected $onInput;
		protected $onChange;
		protected $onSelect;
		protected $onKeyDown;
		protected $onKeyUp;
		protected $onKeyPress;

		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
			$this->setType( 'text' );
		}

		public function setOnInput( $function, ...$param ) {
			$this->setOn( 'input', $function, ...$param );
		}

		public function getOnInput() {
			return $this->onInput;
		}

		public function setOnChange( $function, ...$param ) {
			$this->setOn( 'change', $function, ...$param );
		}

		public function getOnChange() {
			return $this->onChange;
		}

		public function setOnSelect( $function, ...$param ) {
			$this->setOn( 'select', $function, ...$param );
		}

		public function getOnSelect() {
			return $this->onSelect;
		}

		public function setOnKeyDown( $function, ...$param ) {
			$this->setOn( 'keydown', $function, ...$param );
		}

		public function getOnKeyDown() {
			return $this->onKeyDown;
		}

		public function setOnKeyUp( $function, ...$param ) {
			$this->setOn( 'keyup', $function, ...$param );
		}

		public function getOnKeyUp() {
			return $this->onKeyUp;
		}

		public function setOnKeyPress( $function, ...$param ) {
			$this->setOn( 'keypress', $function, ...$param );
		}

		public function getOnKeyPress() {
			return $this->onKeyPress;
		}
	}