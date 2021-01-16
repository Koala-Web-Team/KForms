<?php
    class email extends KFields
    {
        public function __construct( array $attributes = [] ) {
        parent::__construct($attributes);
        parent::setType('email');
        parent::setPattren("[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$");
        }

    }