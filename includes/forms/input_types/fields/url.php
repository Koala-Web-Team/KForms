<?php
	class Url extends KFields
	{
		protected $spellCheck;
		
		public function __construct( array $attributes = [] ) {
			parent::__construct($attributes);
			$this->setType('url');
			$this->setPattern('^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$');
		}

		public function isSpellCheck() {
			return $this->spellCheck;
		}

		public function setSpellCheck( $spellCheck = true ) {
			$this->spellCheck = $spellCheck;
		}
	}