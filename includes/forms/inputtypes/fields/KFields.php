<?php
	Abstract class KFields extends KInput
	{
		protected $pattren;
		protected $minlength;
		protected $maxlength;
		protected $size;

		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
			$this->setAutocompleteBehavior( new autocompleteBehavior() );
			$this->setPlaceholderBehavoir( new placeholderbehavior() );
			$this->setReadonlyBehavior( new readonlyBehavior() );
			$this->getLabel()->setAfterElement();
		}

		public function setPattren( $pattren ) {
			$this->pattren = $pattren;
		}

		public function getPattren() {
			return $this->pattren;
		}

		public function setMinlength( $minlength ) {
			$this->minlength = $minlength;
		}

		public function getMinlength() {
			return $this->minlength;
		}

		public function setMaxlength( $maxlength ) {
			$this->maxlength = $maxlength;
		}

		public function getMaxlength() {
			return $this->maxlength;
		}

		public function setSize( $size ) {
			$this->size = $size;
		}

		public function getSize() {
			return $this->size;
		}
	}