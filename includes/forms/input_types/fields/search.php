<?php
	class Search extends KFields
	{
		protected $spellCheck;
		protected $autocorrect;
		protected $incremental;
		protected $mozactionhint;
		protected $results;

		protected $onChange;
		protected $onInput;
		protected $onSearch;

		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
			$this->setType( 'search' );
		}

		public function isSpellCheck() {
			return $this->spellCheck;
		}

		public function setSpellCheck( $spellCheck = true ) {
			$this->spellCheck = $spellCheck;
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

		public function setOnChange( $function, ...$param ) {
			parent::setOn( 'change', $function, ...$param );
		}

		public function getOnChange() {
			return $this->onChange;
		}

		public function setOnInput( $function, ...$param ) {
			parent::setOn( 'input', $function, ...$param );
		}

		public function getOnInput() {
			return $this->onInput;
		}

		public function setOnSearch( $function, ...$param ) {
			parent::setOn( 'search', $function, ...$param );
		}

		public function getOnSearch() {
			return $this->onSearch;
		}
	}