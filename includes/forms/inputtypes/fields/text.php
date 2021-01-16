<?php
    class text extends KFields
    {
	public function __construct( array $attributes = [] ) {
        parent::__construct($attributes);
        parent::setType('text');
	}
	
    }