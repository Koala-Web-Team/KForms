<?php
	class Tel extends KFields
	{
		protected $spellCheck;
		
		public function __construct( array $attributes = [] ) {
			parent::__construct($attributes);
			$this->setType('tel');
			$this->setPattern('^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$');
		}
		
		public function isSpellCheck() {
			return $this->spellCheck;
		}

		public function setSpellCheck( $spellCheck = true ) {
			$this->spellCheck = $spellCheck;
		}
	}