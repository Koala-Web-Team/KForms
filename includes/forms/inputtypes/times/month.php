<?php

class month extends KTimes
{
    public function __construct( array $attributes = [] ) {
        parent::__construct( $attributes );
        $this->setType("month");
	}
}