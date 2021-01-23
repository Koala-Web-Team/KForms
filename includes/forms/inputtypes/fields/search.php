<?php
	class search extends KFields
	{
		protected $spellcheck;
		protected $autocorrect;
		protected $incremental;
		protected $mozactionhint;
		protected $results;
		
		public function __construct( array $attributes = [] ) {
			parent::__construct($attributes);
			parent::setType('search');
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

		public function setAutocorrect( $autocorrect ) {
			$this->autocorrect = $autocorrect;
		}

		public function getAutocorrect() {
			return $this->autocorrect;
		}

		public function setIncremental( $incremental ) {
			$this->incremental = $incremental;
		}

		public function getIncremental() {
			return $this->incremental;
		}

		public function setMozactionhint( $mozactionhint ) {
			$this->mozactionhint = $mozactionhint;
		}

		public function getMozactionhint() {
			return $this->mozactionhint;
		}

		public function setResults( $results ) {
			$this->results = $results;
		}

		public function getResults() {
			return $this->results;
		}
	}