<?php
	Abstract class KFields extends KInput
	{
		protected $pattern;
		protected $minLength;
		protected $maxLength;
		protected $size;

		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
			$this->setAutocompleteBehavior( new autocompleteBehavior() );
			$this->setPlaceholderBehavior( new placeholderbehavior() );
		}

		public function setPattern( $pattern ) {
			$this->pattern = $pattern;
		}

		public function getPattern() {
			return $this->pattern;
		}

		public function setMinLength( $minLength ) {
			$this->minLength = $minLength;
		}

		public function getMinLength() {
			return $this->minLength;
		}

		public function setMaxLength( $maxLength ) {
			$this->maxLength = $maxLength;
		}

		public function getMaxLength() {
			return $this->maxLength;
		}

		public function setSize( $size ) {
			$this->size = $size;
		}

		public function getSize() {
			return $this->size;
		}
	}