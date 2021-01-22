<?php
	class radiobutton extends KCheckables
	{
		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
			$this->setType("radio");
		}
	}