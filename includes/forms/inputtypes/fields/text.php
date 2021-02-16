<?php
    class text extends KFields
    {
		protected $onblur;
		protected $oninput;
		protected $onfocus;
		protected $onchange;
		protected $onselect;
		protected $onkeydown;
		protected $onkeyup;
		protected $onkeypress;
	    public function __construct( array $attributes = [] ) {
        parent::__construct($attributes);
        parent::setType('text');
	}
    
		public function setOnBlur( $function, ...$param ) {
			parent::setOn('blur', $function, ...$param );
		}
		public function getOnBlur() {
			return $this->onblur;
        }
        
		public function setOnFocus( $function, ...$param ) {
			parent::setOn('focus',$function,...$param);
		}
		public function getOnFocus() {
			return $this->onfocus;
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

		public function setOnKeyDown($function,...$param) {
			parent::setOn('keydown',$function,...$param);
		}
		public function getOnKeyDown() {
			return $this->onkeydown;
		}

		public function setOnKeyUp($function,...$param) {
			parent::setOn('keyup',$function,...$param);
		}
		public function getOnKeyUp() {
			return $this->onkeyup;
		}
		public function setOnKeyPress($function,...$param) {
			parent::setOn('keypress',$function,...$param);
		}
		public function getOnKeyPress() {
			return $this->onkeypress;
		}

    }