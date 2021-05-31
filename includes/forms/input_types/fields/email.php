<?php
	class Email extends KFields
	{
		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
			$this->setType( 'email' );
			$this->setPattern( "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" );
		}

		public function toHtml( $divClass = "" ) {
			return parent::toHtml( "email" );
		}
	}