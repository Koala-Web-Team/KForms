<?php
    class Range extends KNumeric
    {
        public function __construct( array $attributes = [] ) {
            parent::__construct($attributes);
            parent::setType('range');
        }
        
    }
