<?php

    class select extends KSelect
	{
		private $options = [];

		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
		}

		public function addOption( option $option ) {
			$this->options[] = $option;
		}

		public function addOptions( array $options ) {
			foreach ( $options as $option ) {
				$this->addoption( $option );
			}
		}

		public function getOptions() {
			return $this->options;
		}

		public function renderOptions() {
			foreach ( $this->options as $option ) {
				$option->render();
			}
		}

		protected function render() {
			if ( !$this->label->isAfterElement() ) {
				$this->label->render();
				echo "<select " . $this->getHtmlAttributes() . ">";
				$this->renderOptions();
				echo "</select>";
			} else {
				echo "<select " . $this->getHtmlAttributes() . ">";
				$this->renderOptions();
				echo "</select>";
				$this->label->render();
			}
		}
	}