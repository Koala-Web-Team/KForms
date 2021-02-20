<?php
	class Textarea extends KFields
	{
		protected $text;
		protected $autoCapitalize;
		protected $cols;
		protected $rows;
		protected $spellCheck;
		protected $wrap;

		protected $onChange;
		protected $onInput;
		protected $onSelect;

		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
		}

		public function setText( $text ) {
			$this->text = $text;
		}

		public function getText() {
			return $this->text;
		}

		public function setSpellCheck( $spellCheck = true ) {
			$this->spellCheck = $spellCheck;
		}

		public function isSpellCheck() {
			return $this->spellCheck;
		}

		public function setAutoCapitalize( $autoCapitalize = true ) {
			$this->autoCapitalize = $autoCapitalize;
		}

		public function getAutocapitalize() {
			return $this->autoCapitalize;
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

		public function setOnChange( $function, ...$param ) {
			$this->setOn( 'change', $function, ...$param );
		}

		public function getOnChange() {
			return $this->onChange;
		}

		public function setOnInput( $function, ...$param ) {
			$this->setOn( 'input', $function, ...$param );
		}

		public function getOnInput() {
			return $this->onInput;
		}

		public function setOnSelect( $function, ...$param ) {
			$this->setOn( 'select', $function, ...$param );
		}

		public function getOnSelect() {
			return $this->onSelect;
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