<?php
    class times extends KTimes
    {
        public function __construct( array $attributes = [] ) {
            parent::__construct( $attributes );
            $this->setType("datetime-local");
        }
    }