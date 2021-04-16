<?php
    class Range extends KNumeric
	{
		protected $onChange;

		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
			$this->setType( 'range' );
		}

		public function setOnChange( $function, ...$param ) {
			$this->setOn( 'change', $function, ...$param );
		}

		public function getOnChange() {
			return $this->onChange;
		}
	}
