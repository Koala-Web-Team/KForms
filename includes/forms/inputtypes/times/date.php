<?php
    class date extends KTimes
    {
        public function __construct( array $attributes = [] ) {
            parent::__construct( $attributes );
            $this->setType("date");
        }

        public function render() {
            parent::render();
        }
        
    }