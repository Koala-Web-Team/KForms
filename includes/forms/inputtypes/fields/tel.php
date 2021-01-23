<?php
	class tel extends KFields
	{
		protected $spellcheck;
		
		public function __construct( array $attributes = [] ) {
			parent::__construct($attributes);
			parent::setType('tel');
			$this->setPattren('^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$');
		}
		
		public function isSpellcheck() {
			return $this->checked;
		}

		public function spellcheck() {
			$this->spellcheck = true;
		}

		public function unspellcheck() {
			$this->spellcheck = false;
		}
	}