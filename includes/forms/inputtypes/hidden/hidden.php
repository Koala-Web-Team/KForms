<?php
	class hidden extends KInput
	{
		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
			$this->setType('hidden');
		}
	}