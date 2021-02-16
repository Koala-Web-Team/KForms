<?php
    class Range extends KNumeric
    {
        protected $onchange;

        public function __construct( array $attributes = [] ) {
            parent::__construct($attributes);
            parent::setType('range');
        }

    public function setOnChange($function,...$param) {
			parent::setOn('change',$function,...$param);
		}
		public function getOnChange() {
			return $this->onchange;
		}

        
    }
