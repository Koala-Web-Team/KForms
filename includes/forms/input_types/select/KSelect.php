<?php
    abstract class KSelect extends KInput
	{
		protected $searchable;
		protected $multiple;
		protected $tokens;
		protected $maxValues;
		protected $form;
		protected $size;
		protected $value;

		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
			$this->multiple = false;
		}

		public function setSearchable( $searchable = true ) {
			$this->searchable = $searchable;
		}

		public function isSearchable() {
			return $this->searchable;
		}

		public function setMultiple( $multiple = true ) {
			$this->multiple = $multiple;
		}
	
		public function isMultiple() {
			return $this->multiple;
		}

		public function setTokens( $tokens ) {
			$this->tokens = $tokens;
		}

		public function getTokens() {
			return $this->tokens;
		}

		public function setMaxValues( $maxValues ) {
			$this->maxValues = $maxValues;
		}

		public function getMaxValues() {
			return $this->maxValues;
		}

		public function setForm( $form ) {
			$this->form = $form;
		}

		public function getForm() {
			return $this->form;
		}

		public function setSize( $size ) {
			$this->size = $size;
		}

		public function getSize() {
			return $this->size;
		}
	}