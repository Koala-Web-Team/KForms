<?php

class LabelBehavior
{
	private $label;

	public function setLabel( $label ): void {
		$this->label = $label;
	}

	public function getLabel() {
		return $this->label;
	}
}