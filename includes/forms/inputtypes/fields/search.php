<?php
	class search extends KFields
	{
			protected $spellcheck;
			protected $autocorrect;
			protected $incremental;
			protected $mozactionhint;
			protected $results;
			protected $onchange;
			protected $oninput;
			protected $onsearch;
		
			public function __construct( array $attributes = [] ) {
				parent::__construct($attributes);
				parent::setType('search');
			}
			
			public function isSpellcheck() {
				return $this->spellcheck;
			}

			public function setSpellcheck( $spellCheck = true ) {
				$this->spellcheck = $spellCheck;
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

				public function setOnChange($function,...$param) {
					parent::setOn('change',$function,...$param);
				}
				public function getOnChange() {
					return $this->onchange;
				}

				public function setOnInput($function,...$param) {
					parent::setOn('input',$function,...$param);
				}
				public function getOnInput() {
					return $this->oninput;
				}
				public function setOnSearch($function,...$param) {
					parent::setOn('search',$function,...$param);
				}
				public function getOnSearch() {
					return $this->onsearch;
				}
	}