<?php
	class textarea extends KFields
	{
		protected $text;
		protected $autocapitalize;
		protected $cols;
		protected $rows;
		protected $spellcheck;
		protected $wrap;

    protected $onchange;
		protected $oninput;
		protected $onselect;

		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
		}

		public function setText( $text ) {
			$this->text = $text;
		}

		public function getText() {
			return $this->text;
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

		public function setAutocapitalize( $autocapitalize ) {
			$this->autocapitalize = $autocapitalize;
		}

		public function getAutocapitalize() {
			return $this->autocapitalize;
		}

		public function setCols( $cols ) {
			$this->cols = $cols;
		}

		public function getCols() {
			return $this->cols;
		}

		public function setRows( $rows ) {
			$this->rows = $rows;
		}

		public function getRows() {
			return $this->rows;
		}

		public function setWrap( $wrap ) {
			$this->wrap = $wrap;
		}

		public function getWrap() {
			return $this->wrap;
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
		public function setOnSelect($function,...$param) {
			parent::setOn('select',$function,...$param);
		}
		public function getOnSelect() {
			return $this->onselect;
		}

		protected function render() {
			if ( !$this->label->isAfterElement() ) {
				$this->label->render();
				echo "<textarea  " . $this->getHtmlAttributes() . ">" . $this->text . "</textarea>";
			} else {
				echo "<textarea  " . $this->getHtmlAttributes() . ">" . $this->text . "</textarea>";
				$this->label->render();
			}
		}

	}