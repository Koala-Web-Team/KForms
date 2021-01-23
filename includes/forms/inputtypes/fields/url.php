<?php
	class url extends KFields
	{
		protected $spellcheck;
		
		public function __construct( array $attributes = [] ) {
			parent::__construct($attributes);
			parent::setType('url');
			$this->setPattren('^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$');
		}

		public function isSpellcheck() {
			return $this->spellcheck;
		}

		public function spellcheck() {
			$this->spellcheck = true;
		}

		public function unspellcheck() {
			$this->spellcheck = false;
		}

	}