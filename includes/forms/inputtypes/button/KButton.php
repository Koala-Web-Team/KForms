<?php

	Abstract class KButton extends KInput
	{
		protected $onClick;

		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
		}

		/**
		 * @param mixed $onClick
		 */
		public function setOnClick( $onClick ) {
			$this->onClick = str_replace( "'", "\"", $onClick );
		}

		/**
		 * @return mixed
		 */
		public function getOnClick() {
			return $this->onClick;
		}
	}