<?php

	class Reset extends KButton
	{
		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
			$this->setType('reset');
		}
	}