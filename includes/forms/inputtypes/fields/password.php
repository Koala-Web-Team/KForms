<?php
	class password extends KFields
	{
		protected $inputmode;
		protected $oninput;
		protected $onchange;
		protected $onselect;
    
		public function __construct( array $attributes = [] ) {
			parent::__construct($attributes);
			parent::setType('password');
			$this->setPattren('^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})');
		}
		
		public function setInputmode( $inputmode ) {
			$this->inputmode = $inputmode;
		}

		public function getInputmode() {
			return $this->inputmode;
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
	}