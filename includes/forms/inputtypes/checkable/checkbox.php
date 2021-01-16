<?php
	class checkbox extends KCheckables
	{
		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
			$this->setType("checkbox");
		}

		public function render() {
			parent::render();
			if ( !empty( $this->getLabel() ) ) {
				echo "<label for='" . $this->getId() . "'>" . $this->getLabel() . "</label>";
			}
		}
	}